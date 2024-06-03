<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
	public function index()
	{
		if(Auth::check()){
			$chart_options = [
				'chart_title' => 'Aspirantes por mes',
				'report_type' => 'group_by_date',
				'model' => 'App\Models\User',
				'group_by_field' => 'created_at',
				'group_by_period' => 'month',
				'chart_type' => 'bar',
			];
	
			$usersByMonth = new LaravelChart($chart_options);
	
			$totalUsers = User::count();
			$pendingPayments = User::where('payment_status', 'Pendiente')->count();
			$allowedUsers = User::where('status', 'Admitido')->count();
			$rejectedUsers = User::where('status', '!=', 'Admitido')->count();
	
			return view('panel.home', compact('usersByMonth', 'pendingPayments', 'totalUsers', 'allowedUsers', 'rejectedUsers'));
		}

		return redirect()->route('user.login');
		
	}
}
