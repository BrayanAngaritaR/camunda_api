<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Base\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
	public function store(Request $request)
	{
		if ($request->college_degree === 'Ingeniería informática' || $request->college_degree === 'Ingeniería de software' || $request->college_degree === 'Ingeniería de sistemas' || $request->college_degree === 'Administración de empresas') {
			$canApply = 'yes';
		} else {
			$canApply = 'no';
		}

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'can_apply' => $canApply,
			'password' => Hash::make($request->password),
			'document_type' => $request->document_type,
			'document_number' => $request->document_number,
			'phone' => $request->phone,
			'birthdate' => $request->birthdate,
			'gender' => $request->gender,
		]);

		$document = Document::create([
			'user_id' => $user->id,
		]);

		return response()->json($user);
	}

	public function webStore(Request $request)
	{
		if ($request->college_degree === 'Ingeniería informática' || $request->college_degree === 'Ingeniería de software' || $request->college_degree === 'Ingeniería de sistemas' || $request->college_degree === 'Administración de empresas') {
			$canApply = 'yes';
		} else {
			$canApply = 'no';
		}

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'can_apply' => $canApply,
			'password' => Hash::make($request->password),
			'document_type' => $request->document_type,
			'document_number' => $request->document_number,
			'phone' => $request->phone,
			'birthdate' => $request->birthdate,
			'gender' => $request->gender,
			'college_degree' => $request->college_degree
		]);

		Auth::login($user);

		$document = Document::create([
			'user_id' => $user->id,
		]);

		return redirect()->route('user.panel.index');
	}

	public function show()
	{
		$url = url()->full();
		$id = Str::after($url, 'id=');
		$user = User::where('document_number', $id)->first();

		if($user){
			return response()->json($user);
		}

		return response()->json(["id" => 0]);
	}

	public function showDocuments()
	{
		$url = url()->full();
		$id = Str::after($url, 'id=');
		$user = User::where('document_number', $id)->first();
		$documents = Document::where('user_id', $user->id)->first();
		return response()->json($documents);
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('user.home');
	}

	public function login(Request $request)
	{
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);

		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();
			return redirect()->route('user.panel.index');
		}
	}
}
