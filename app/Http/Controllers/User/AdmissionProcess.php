<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdmissionProcess extends Controller
{
    public function requestFiles(Request $request)
    {
        $user = User::where('document_number', $request->id)->first();
        $status = "Pendiente de pago";

        if($user->documentation_completed == true) {
            $status = "Admitido";
        }

        $user->status = $status;
        $user->documentation_needed = $request->requiredFiles;

        $documentation_completed = 0;

        if($request->documentation_completed == true) {
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

        if($user->documentation_completed == true) {
            $status = "Admitido";
        }

        $user->status = $status;
        $user->documentation_needed = $request->requiredFiles;

        $documentation_completed = 0;

        if($request->documentation_completed == true) {
            $documentation_completed = 1;
            $user->status = "Admitido";
        }

        $user->documentation_completed = $documentation_completed;
        $user->update();

		return response()->json($user);
    }
}
