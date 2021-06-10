<?php
namespace App\Http\Controllers\Admin;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use Redirect;
use Sentinel;
use Session;
use View;

class AdminAuthController extends Controller {
	/**
	 * Account sign in.
	 *
	 * @return View
	 */
	public function getSignin(Request $request) {

		if (Sentinel::check() && Sentinel::inRole('admin')) {
			return Redirect::route('dashboard');
		}
		return View('admin.login');
		//return Redirect::to('https://gnt.helprays.com/signin');
	}
	/**
	 * Account sign in form processing.
	 * @param Request $request
	 * @return Redirect
	 */
	public function postSignin(Request $request) {

		try {
			$credentials = array(
				'username' => $request->username,
				'password' => $request->password,
			);
			if (Sentinel::authenticate($credentials, false, true)) {
				$user = Sentinel::getUser();
				if (Sentinel::inRole('admin') || Sentinel::inRole('subadmin') || Sentinel::inRole('agent')) {
					$output['status'] = 'success';
					$output['success'] = true;
					$output['slideToTop'] = true;
					$output['success_msg'] = "Thank-You! You are successfully login.";
					$output['slideToTop'] = true;
					$output['url'] = route('admin.dashboard');
					return response()->json($output);
				}
			}
			return response()->json(['errorArray' => '', 'error_msg' => "Sorry! Your login details is not correct, please enter correct username and password.", 'msgColor' => "Red", 'slideToTop' => 'yes']);
		} catch (NotActivatedException $e) {
			return response()->json(['errorArray' => '', 'error_msg' => "Sorry! Your account not activated.", 'msgColor' => 'Red', 'slideToTop' => 'yes']);
		} catch (ThrottlingException $e) {
			$delay = $e->getDelay();
			return response()->json(['errorArray' => '', 'error_msg' => "Sorry! Your account has been suspended, Please try after " . $delay . " seconds.", 'msgColor' => 'Red', 'slideToTop' => 'yes']);
		}
		// Ooops.. something went wrong
		return back()->withInput()->withErrors($this->messageBag);
	}

	public function getLogout() {
		unset($_COOKIE['admin_login_cookie']);
		// Log the user out
		Sentinel::logout();
		session::forget('ADMIN');
		session::forget('redirectpage');
		// Redirect to the users page
		return Redirect::to('administrator')->with('success', 'You have successfully logged out!');
	}
}