<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Base\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmissionProcess extends Controller
{
	public function index()
	{
		return view('panel.index');
	}

	public function documents()
	{
		$documents = Document::where('user_id', Auth::id())->first();
		return view('panel.documents', compact('documents'));
	}

	public function documentCreate()
	{
		return view('panel.documents.create');
	}
}
