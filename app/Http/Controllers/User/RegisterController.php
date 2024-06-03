<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
	public function store(Request $request)
	{
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'document_type' => $request->document_type,
			'document_number' => $request->document_number,
			'phone' => $request->phone,
			'birthdate' => $request->birthdate,
			'gender' => $request->gender,
		]);

		return response()->json($user);
	}

	public function show()
	{
		$url = url()->full();
		$id = Str::after($url, 'id=');
		$user = User::where('document_number', $id)->first();
		return response()->json($user);
	}
}
