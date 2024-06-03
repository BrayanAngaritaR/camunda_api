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
        $user->status = "Admitido";
        $user->documentation_needed = $request->requiredFiles;
        $user->update();

		return response()->json($user);
    }
}
