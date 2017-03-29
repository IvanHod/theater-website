<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use \Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;

class NewController extends Controller
{
	public function index()
	{
		$news = News::GetList();
		return view('new/index', array('news' => $news));
	}

	public function createForm($id = '')
	{
		if(Auth::user()->can('create-new'))
		{
			$new = News::find($id);
			if(!$new)
			{
				$new = new News();
			}
			return view('new/edit', array('newModel' => $new));
		}
		else
			throw new Exception('You haven`t permission for this action');
	}

	public function create(Request $request)
	{
		$path = '';
		if($request->hasFile('pictureFile'))
		{
			$path = '/storage/app/' . $request->pictureFile->store('images');
		}
		$id = News::Create(array(
			'name' => $request->name,
			'picture' => $path,
			'description' => $request->description,
		));
		$this->index();
	}

	public function edit($id, Request $request)
	{
		$path = $request->picture;
		if($request->hasFile('pictureFile'))
		{
			$path = '/storage/app/' . $request->pictureFile->store('images');
		}
		$editnew = News::Edit(intval($id), array(
			'name' => $request->name,
			'picture' => $path,
			'description' => $request->description,
		));
		return view('new/view', array('newModel' => $editnew));
	}

	public function delete($id)
	{
		$new = News::find(intval($id));
		if($new)
		{
			$new->delete();
			return 1;
		}
		return 0;
	}

	public function view($id)
	{
		$new = News::find(intval($id));
		return view('new/view', array('newModel' => $new));
	}
}
