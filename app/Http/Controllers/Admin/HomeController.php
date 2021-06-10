<?php
namespace App\Http\Controllers\Admin;
use App\Models\Ticket as app_modal;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Sentinel;
use View;

class HomeController extends Controller {

	/**
	 * Message bag.
	 *
	 * @var Illuminate\Support\MessageBag
	 */
	protected $messageBag = null;
	protected $categorylist = null;

	/**
	 * Initializer.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->current_date = date("Y-m-d");
	}

	/**
	 * Crop Demo
	 */

	public function showHome() {
		$date = $this->current_date;
		$user = Sentinel::getUser();
		if (Sentinel::check()) {
			if (Sentinel::inRole('admin') || Sentinel::inRole('subadmin') || Sentinel::inRole('agent')) {
				$active_ticket = app_modal::whereDate('created_at', $date)->where('ticket_status', '!=', "Approved")->count();
				$reslove_ticket = app_modal::whereDate('created_at', $date)->where('ticket_status', "Approved")->count();
				$closed_ticket = app_modal::whereDate('created_at', $date)->where('ticket_status', "Closed")->count();
				$active_agent = User::whereDate('created_at', $date)->where('user_type', "Agent")->count();
				return View('admin.index', compact('active_ticket', 'reslove_ticket', 'closed_ticket', 'active_agent'));
			} else {
				return View('admin.login');
			}
			//return View('admin.index');
		} else {
			return Redirect::route("admin.logout");
		}

	}

}
