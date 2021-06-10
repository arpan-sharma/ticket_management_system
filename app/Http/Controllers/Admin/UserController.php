<?php
namespace App\Http\Controllers\Admin;
use App\Models\User as app_modal;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Redirect;
use Sentinel;
use Validator;
use View;

class UserController extends Controller {
	/**
	 * Account sign in.
	 *
	 * @return View
	 */
	public function subadmin(Request $request) {

		if (Sentinel::check() && Sentinel::inRole('admin')) {
			return view('admin.user.list');
		}
		return Redirect::route("admin.logout");
		//return Redirect::to('https://gnt.helprays.com/signin');
	}
	public function agent(Request $request) {

		if (Sentinel::check() && Sentinel::inRole('admin')) {
			return view('admin.user.agent.list');
		}
		return Redirect::route("admin.logout");
		//return Redirect::to('https://gnt.helprays.com/signin');
	}
	public function data() {
		$data = app_modal::select('users.*')
			->join('role_users', 'role_users.user_id', '=', 'users.id')
			->join('roles', 'roles.id', '=', 'role_users.role_id')
			->where('roles.slug', 'subadmin')
			->where('users.user_type', 'Subadmin')
			->orderBy('id', 'desc')->get();

		return DataTables::of($data)
			->addColumn('actions', '<div class="btn-group">
        <a title="View" class="btn btn-success" href="#" data-toggle="modal" data-target="#modal-email">
        <i class="fa fa-eye"></i></a>
        <a class="btn btn-primary" href="#" title="Edit"><i class="fa fa-edit"></i> </a>
        <a data-original-title="Delete Record" class="btn btn-danger enable-tooltip" href="#" data-toggle="modal" data-target="#modal-regular"><i class="fa fa-trash"></i></a>
        </div>
        ')
			->rawColumns(['actions'])
			->make(true);
	}
	public function agent_data() {
		$data = app_modal::select('users.*')
			->join('role_users', 'role_users.user_id', '=', 'users.id')
			->join('roles', 'roles.id', '=', 'role_users.role_id')
			->where('roles.slug', 'agent')
			->where('users.user_type', 'Agent')
			->orderBy('id', 'desc')->get();

		return DataTables::of($data)
			->addColumn('actions', '<div class="btn-group">
    <a title="View" class="btn btn-success" href="#" data-toggle="modal" data-target="#modal-email">
    <i class="fa fa-eye"></i></a>
    <a class="btn btn-primary" href="#" title="Edit"><i class="fa fa-edit"></i> </a>
    <a data-original-title="Delete Record" class="btn btn-danger enable-tooltip" href="#" data-toggle="modal" data-target="#modal-regular"><i class="fa fa-trash"></i></a>
    </div>
    ')
			->rawColumns(['actions'])
			->make(true);
	}
	public function subadmin_register(Request $request) {

		if (Sentinel::check() && Sentinel::inRole('admin') || Sentinel::inRole('subadmin')) {
			return view('admin.user.create');
		}
		return Redirect::route("admin.logout");
		//return Redirect::to('https://gnt.helprays.com/signin');
	}
	public function subadmin_register_post(Request $request) {
		$input = $request->all();
		$user = Sentinel::getUser();
		if ($_POST) {
			$input = $request->all();
			$rules['username'] = "required|email|unique:users";
			$rules['mobileno'] = "required|numeric|unique:users|digits:10";
			$rules['first_name'] = "required";
			$rules['last_name'] = "required";
			// $rules['user_type'] = "required";
			$rules['profile_pic'] = "required|image|mimes:jpeg,png,jpg|max:200";

			$errorMsg = "Oops ! Please fill required fields.";
			$validator = Validator::make($request->all(), $rules);
			// if (!isset($input['g-recaptcha-response'])) {
			//  return response()->json(['errorArray' => $validator->errors(), 'error_msg' => "Please Check Recptcha", 'slideToTop' => 'yes']);
			// }
			if ($validator->fails()) {
				return response()->json(['errorArray' => $validator->errors(), 'error_msg' => $errorMsg, 'slideToTop' => 'yes']);
			}
			// $token = $input['g-recaptcha-response'];
			// $verifyData = json_decode($this->verify_captcha($token, $ip));
			// if ($verifyData->success == 'true') '
			if ($user->user_type == "Subadmin") {
				if ($request->user_type == "on") {
					$user_type = "Agent";

				} else {
					$user_type = "User";
				}
			} else {
				if ($request->user_type == "on") {
					$user_type = "Agent";

				} else {
					$user_type = "Subadmin";
				}
			}

			$password = ucfirst($request->first_name) . "@123";
			if ($file = $request->file('profile_pic')) {
				$fileName = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$folderName = '/user/profile';
				$safeName = Str::random(10) . '.' . $extension;
				Storage::disk('uploads')->putFileAs($folderName, $file, $safeName);
				$profile_pic = $safeName;
				$input['profile_pic'] = $profile_pic;
			}

			$credentials = [
				'email' => $request->username,
				'username' => $request->username,
				'mobileno' => $input['mobileno'],
				'first_name' => $input['first_name'],
				'last_name' => $input['last_name'],
				'user_type' => $user_type,
				'password' => $password,
				'profile_pic' => $profile_pic,

			];
			$user = Sentinel::register($credentials);
			$new_user_id = $user->id;
			//=========== Find & Attach User Role ==============//
			$role = Sentinel::findRoleByName($user_type);
			$role->users()->attach($user);
			$activation = Activation::create($user);
			$active_user = Sentinel::findById($new_user_id);
			if (Activation::exists($active_user) && Activation::complete($active_user, $activation->code)) {
// I Change this and put it on another page so code is more readable

				$table_template = '<table border="0" cellpadding="0" cellspacing="0" style="color:#333;background:#fff;padding:0;margin:0;width:100%;font:15px/1.25em "Helvetica Neue",Arial,Helvetica">
    <tbody>
    <tr width="100%">
    <td align="left" style="background:#eef0f1;font:15px/1.25em "Helvetica Neue",Arial,Helvetica" valign="top">
    <table style="border:none;padding:0 18px;margin:50px auto;width:500px">
    <tbody>
    <tr height="60" width="100%">
    <td align="left" style="border-top-left-radius:4px;border-top-right-radius:4px;background:#27709b url(#) bottom left repeat-x;padding:10px 18px;text-align:center" valign="top">Ticket Management System</td>
    </tr>
    <tr width="100%">
    <td align="left" style="background:#fff;padding:18px" valign="top">
    <h1 style="font-size:20px;margin:16px 0;color:#333;text-align:center">Dear {#name}</h1>

    <p style="font:15px/1.25em "Helvetica Neue" ,Arial,Helvetica;color:#333;text-align:center">Accouct Created successfully</p>

    <div style="background:#f6f7f8;border-radius:3px">&nbsp;
    <p style="text-align:center"><a href="#" style="color:#306f9c;font:13px/1.25em "Helvetica Neue",Arial,Helvetica;text-decoration:none;font-weight:bold" target="_blank">Username:-{#username}</a></p>

    <p style="text-align:center"><a href="#" style="color:#306f9c;font:13px/1.25em "Helvetica Neue",Arial,Helvetica;text-decoration:none;font-weight:bold" target="_blank">Password:-{#password}</a></p>
    <br />
    &nbsp;</div>
    <p style="font: 14px / 1.25em &quot;Helvetica Neue&quot;, Arial, Helvetica; color: rgb(51, 51, 51);">&nbsp;</p>

    <hr />
    <p>Regards,<br />
    {#site_title} Team</p>
    </td>
    </tr>
    <tr>
    <td align="left" style="background:#fff;padding:18px" valign="top">&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>';

				$adminemail = "arpan.sharma@neosoftmail.com";
				$siteName = "Ticket Management System";

				$str = str_replace("{#logo}", "Neosoft", $table_template);
				$str = str_replace("{#username}", $request->username, $str);
				$str = str_replace("{#name}", $request->first_name, $str);
				$str = str_replace("{#password}", $password, $str);
				$str = str_replace("{#subject}", ' Accouct Details', $str);
				$str = str_replace("{#site_title}", $siteName, $str);
				Mail::send('email.email', compact('str'), function ($m) use ($adminemail, $siteName, $request) {
					$m->from($adminemail, $siteName);
					$m->to($request->username, $siteName);
					$m->subject("Accouct Created Successfully");
				});
				$output['status'] = 'success';
				$output['step'] = 'step1';
				$output['success'] = true;
				$output['success_msg'] = "Thank you!, You are registered successfully!";
				$output['msg'] = "Thank you!, You are registered successfully!";
				$output['slideToTop'] = true;
				$output['resetform'] = true;
				$output['url'] = route('admin.dashboard');
				return ($output);
			}

			// }
			return Redirect::route("admin.logout");
		}
	}

}
