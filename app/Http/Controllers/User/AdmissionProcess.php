<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\NotifyDocuments;
use App\Mail\NotifyInterview;
use App\Mail\NotifyPendingPayment;
use App\Mail\NotifyRejection;
use App\Mail\NotifyWelcome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdmissionProcess extends Controller
{
	public function requestFiles(Request $request)
	{
		$user = User::where('document_number', $request->id)->first();
		$status = "Pendiente de pago";

		Mail::to($user->email)->send(new NotifyDocuments($user->name));
		Mail::to($user->email)->send(new NotifyPendingPayment($user->name));

		if ($user->documentation_completed == true) {
			$status = "Admitido";
		}

		$user->status = $status;
		$user->documentation_needed = $request->requiredFiles;

		$documentation_completed = 0;

		if ($request->documentation_completed == true) {
			$documentation_completed = 1;
			$user->status = "Admitido";
			
			//Notificar programación de la prueba
			$user->quiz_date = \Carbon\Carbon::now()->addDays(2);
		}

		$user->documentation_completed = $documentation_completed;
		$user->update();

		return response()->json($user);
	}

	public function requestFilesByEmail(Request $request)
	{
		$user = User::where('document_number', $request->id)->first();
		$status = "Pendiente de pago";

		if ($user->documentation_completed == true) {
			$status = "Admitido";
		}

		$user->status = $status;
		$user->documentation_needed = $request->requiredFiles;

		$documentation_completed = 0;

		if ($request->documentation_completed == true) {
			$documentation_completed = 1;
			$user->status = "Admitido";
		}

		$user->documentation_completed = $documentation_completed;
		$user->update();

		return response()->json($user);
	}

	public function sendRejection(Request $request)
	{
		$user = User::where('document_number', $request->id)->first();
		$user->status = "Rechazado";
		$user->application_feedback = $request->rejectionReason;
		$user->update();

		Mail::to($user->email)->send(new NotifyRejection($user->name));

		return response()->json($user);
	}

	public function notifyRejection(Request $request)
	{
		$user = User::where('document_number', $request->id)->first();
		$user->status = "Rechazado";
		$user->application_feedback = "Lo sentimos, no pasaste la entrevista. Por lo tanto, hemos decidido rechazar tu solicitud.";
		$user->update();

		Mail::to($user->email)->send(new NotifyRejection($user->name));

		return response()->json($user);
	}

	public function notifyScore(Request $request)
	{
		$user = User::where('document_number', $request->id)->first();
		$user->status = "Rechazado";
		$user->test_score = $request->testScore;
		$user->application_feedback = "Hemos decidido rechazar tu solicitud debido a que no superaste la prueba de admisión";
		$user->update();

		Mail::to($user->email)->send(new NotifyRejection($user->name));

		return response()->json($user);
	}

	public function notifyInterview(Request $request)
	{
		$user = User::where('document_number', $request->id)->first();
		$user->interview_date = \Carbon\Carbon::now();
		$user->test_score = $request->testScore;
		$user->update();

		Mail::to($user->email)->send(new NotifyInterview($user->name));

		return response()->json($user);
	}

	public function saveInterviewResult(Request $request)
	{
		$user = User::where('document_number', $request->id)->first();
		$interviewPassed = false;

		if ($request->interviewPassed == true || $request->interviewPassed == 1 || $request->interviewPassed == "1") {
			$interviewPassed = 'yes';
			$user->interview_passed = $interviewPassed;
			$user->update();
		}

		return response()->json($user);
	}
	
	public function updateQuota(Request $request)
	{
		$user = User::where('document_number', $request->id)->first();
		$user->accept_quota = rand(0, 1) ? 'yes' : 'no';
		$user->update();

		if($user->accept_quota == 'yes') {
			Mail::to($user->email)->send(new NotifyWelcome($user->name));
		}

		return response()->json($user);
	}
}
