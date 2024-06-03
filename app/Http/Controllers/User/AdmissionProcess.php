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
        $user->documentation_completed = $request->documentation_completed;
        $user->update();

		return response()->json($user);
    }
}
