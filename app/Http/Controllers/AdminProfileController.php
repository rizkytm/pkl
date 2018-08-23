<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;
use Auth;
use App\Admin;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Admin $user)
    {
    	$user = Admin::where("id", "=", Auth::user()->id)->get();
    	return view('adminprofile', compact('user'));
    }

    public function editpage(Admin $user)
    {
        $user = Admin::where("id", "=", Auth::user()->id)->get();
        return view('adminprofileedit', compact('user'));
    }

    public function edit(Admin $user, Request $request)
    {
    	$this->validate(request(), [
    		'avatar' => 'nullable'
    	]);
    	if ($request->hasFile('avatar'))
    	{
    		$avatar = $request->file('avatar')->store('avatars');
    		$user->update([
    		'name' => request('name'),
    		'email' => Auth::user()->email,
    		'no_hp' => request('no_hp'),
    		'alamat' => request('alamat'),
    		'avatar' => $avatar
    	]);
    	}
    	else
    	{
    		$user->update([
    		'name' => request('name'),
    		'email' => Auth::user()->email,
    		'no_hp' => request('no_hp'),
    		'alamat' => request('alamat'),
    	]);
    	}



    	// if($request->user()->avatar)
    	// {
    	// 	Storage::delete($request->user()->avatar);
    	// }



    	// $request->user()->update([

    	// ]);

      return redirect()->route('admin.profile')->with('success', 'Profil Berhasil Diperbarui');
    }

    public function destroy(Admin $user, Request $request)
    {
    	if($request->user()->avatar)
    	{
    		Storage::delete($request->user()->avatar);
    	}

    	$request->user()->update([
    		'avatar' => null
    	]);

    	return redirect()->back();
    }
}
