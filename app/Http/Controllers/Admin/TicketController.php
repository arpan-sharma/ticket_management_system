<?php
namespace App\Http\Controllers\Admin;
use App\Models\Ticket;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Sentinel;
use Validator;
use View;

class TicketController extends Controller {

	public function create_ticket(Request $request) {

		if (Sentinel::check() && Sentinel::inRole('admin') || Sentinel::inRole('subadmin')) {
			return view('admin.ticket.create');
		}
		return Redirect::route("admin.logout");
		//return Redirect::to('https://gnt.helprays.com/signin');
	}
	public function all_tickets(Request $request) {

		if (Sentinel::check() && Sentinel::inRole('agent')) {
			return view('admin.ticket.list');
		}
		return Redirect::route("admin.logout");
		//return Redirect::to('https://gnt.helprays.com/signin');
	}
	public function data() {
		$user = Sentinel::getUser();
		$data = Ticket::select('tickets.*')
			->where('tickets.agent_id', $user->id)
			->orderBy('id', 'desc')->get();

		return DataTables::of($data)
			->addColumn('actions', '<div class="btn-group">
        <a title="View" class="btn btn-success" href="{{ route("admin.agent.ticket-status",$id) }}"  >
        <i class="fa fa-eye"></i></a>
        </div>
        ')
			->rawColumns(['actions'])
			->make(true);
	}
	public function genrate_report(Request $request) {

		if (Sentinel::check() && Sentinel::inRole('admin') || Sentinel::inRole('subadmin')) {
			return view('admin.ticket.report');
		}
		return Redirect::route("admin.logout");
		//return Redirect::to('https://gnt.helprays.com/signin');
	}
	public function subadmin_create_post(Request $request) {
		$input = $request->all();
		$user = Sentinel::getUser();
		if ($_POST) {
			$input = $request->all();
			$rules['user_id'] = "required";
			$rules['agent_id'] = "required";
			$rules['mobileno'] = "required|numeric|unique:users|digits:10";
			$rules['assets'] = "required";
			$rules['serial_no'] = "required|max:15";
			$rules['model_no'] = "required|max:15";
			$rules['priority'] = "required|max:15";
			// $rules['user_type'] = "required";
			$errorMsg = "Oops ! Please fill required fields.";
			$validator = Validator::make($request->all(), $rules);
			// if (!isset($input['g-recaptcha-response'])) {
			//  return response()->json(['errorArray' => $validator->errors(), 'error_msg' => "Please Check Recptcha", 'slideToTop' => 'yes']);
			// }
			if ($validator->fails()) {
				return response()->json(['errorArray' => $validator->errors(), 'error_msg' => $errorMsg, 'slideToTop' => 'yes']);
			}

			$banner = Ticket::Create($input);
			$output['status'] = 'success';
			$output['step'] = 'step1';
			$output['success'] = true;
			$output['success_msg'] = "Thank you!, You are Created successfully!";
			$output['msg'] = "Thank you!, You are Created successfully!";
			$output['slideToTop'] = true;
			$output['resetform'] = true;
			$output['url'] = route('admin.dashboard');
			return ($output);

		}
	}

	public function get_report(Request $request) {
		$input = $request->all();
		$user = Sentinel::getUser();
		if ($_POST) {
			$input = $request->all();
			$date = date("Y/m/d");
			$rules['starting_date'] = "required|date";
			$rules['end_date'] = "required|date|after_or_equal:starting_date";
			$rules['priority'] = "required";
			$rules['status'] = "required";
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
			$data = Ticket::select('tickets.*', 'users.first_name', 'users.last_name')
				->leftJoin('users', 'users.id', 'tickets.user_id')
				->whereDate('tickets.created_at', $request->starting_date)
				->whereDate('tickets.created_at', $request->end_date)
				->where('tickets.priority', $request->priority)
				->where('tickets.priority', $request->priority)
				->where('tickets.ticket_status', $request->status)
				->get();

			return view('admin.ticket.report_genration', compact('data'));

		}

	}

	public function reply($id) {
		$data = Ticket::select('ticket_status', 'priority', 'id')->where('id', $id)->first();
		return View('admin.ticket.reply', compact('data'));
	}

	public function reply_confirm(Request $request) {
		$input = $request->priority;

		if ($_POST) {
			$input = $request->all();
			$rules['priority'] = "required";
			$rules['ticket_status'] = "required";
			// $rules['user_type'] = "required";
			$agent_data = Sentinel::getUser();

			$errorMsg = "Oops ! Please fill required fields.";
			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return response()->json(['errorArray' => $validator->errors(), 'error_msg' => $errorMsg, 'slideToTop' => 'yes']);
			}

			$data = Ticket::where('id', $request->ticket_id)->update(['priority' => $request->priority, 'ticket_status' => $request->ticket_status]);
			$data_ticket_detail = Ticket::select('user_id', 'id')->where('id', $request->ticket_id)->first();

			$user_email = User::select('username')->where('id', $data_ticket_detail->user_id)->first();

			if (isset($request->message)) {
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

        <p style="font:15px/1.25em "Helvetica Neue" ,Arial,Helvetica;color:#333;text-align:center">Agent Reply</p>

        <div style="background:#f6f7f8;border-radius:3px">&nbsp;
        <p style="text-align:center"><a href="#" style="color:#306f9c;font:13px/1.25em "Helvetica Neue",Arial,Helvetica;text-decoration:none;font-weight:bold" target="_blank">Ticket No.:-{#ticket}</a></p>

        <p style="text-align:center"><a href="#" style="color:#306f9c;font:13px/1.25em "Helvetica Neue",Arial,Helvetica;text-decoration:none;font-weight:bold" target="_blank">Message:-{#message}</a></p>
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

				$adminemail = "$agent_data->email";
				$siteName = "Ticket Management System";

				$str = str_replace("{#logo}", "Neosoft", $table_template);
				$str = str_replace("{#ticket}", $data_ticket_detail->id, $str);
				$str = str_replace("{#name}", $agent_data->first_name, $str);
				$str = str_replace("{#message}", $request->message, $str);
				$str = str_replace("{#subject}", ' Agent Reply', $str);
				$str = str_replace("{#site_title}", $siteName, $str);
				Mail::send('email.email', compact('str'), function ($m) use ($adminemail, $siteName, $user_email) {
					$m->from($adminemail, $siteName);
					$m->to($user_email->username, $siteName);
					$m->subject("Accouct Created Successfully");
				});
				$output['status'] = 'success';
				$output['step'] = 'step1';
				$output['success'] = true;
				$output['success_msg'] = "Thank you!, for Reply";
				$output['msg'] = "Thank you!, for Reply";
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
