<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Base\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CheckAdmissionProcess extends Controller
{
	public function index()
	{
		return view('panel.index');
	}

	public function documents()
	{
		$documents = Document::where('user_id', Auth::id())->first();
		$dni = $documents ? $documents->dni : null;
		$diploma = $documents ? $documents->diploma : null;
		$acta_grado = $documents ? $documents->acta_grado : null;
		
		return view('panel.documents', compact([
			'diploma', 'dni', 'acta_grado'
		]));
	}

	public function documentCreate()
	{
		return view('panel.documents.create');
	}

	public function uploadFile(Request $request){

		$document = Document::where('user_id', Auth::id())->first();

		if ($request->hasfile('file')) {	
			$file = $request->file('file');	
			$ext = $file->getClientOriginalExtension();
			$imageName = Str::random(10) . '.' . $ext;
			$storage_url = "puj/files/" . Auth::id();
			$uploaded = Storage::disk('s3')->put($storage_url, $file, 'public');
			$path = Storage::disk('s3')->url($uploaded);
		}

		if($request->fileType === 'dni'){
			$document->dni = $path;
		}

		if($request->fileType === 'acta_grado'){
			$document->acta_grado = $path;
		}

		if($request->fileType === 'diploma'){
			$document->diploma = $path;
		}

		$document->update();

		Session::flash('info', ['success', __('Se ha subido el archivo')]);
		return back();
	}
}
