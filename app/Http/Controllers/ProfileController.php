<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
    	$user = User::where("id", "=", Auth::user()->id)->get();
    	return view('profile', compact('user'));
    }

    public function editpage(User $user)
    {
        $user = User::where("id", "=", Auth::user()->id)->get();
        return view('profileedit', compact('user'));
    }

    public function edit(User $user, Request $request)
    {
    	$this->validate(request(), [
    		'avatar' => 'nullable'
    	]);
    	if ($request->hasFile('avatar'))
    	{
    		$avatar = $request->file('avatar')->store('avatars');
    		$user->update([
    		'name' => request('name'),
    		'email' => request('email'),
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

    	return redirect()->route('profile')->with('success', 'Profil Berhasil Diperbarui');
    }

    public function destroy(User $user, Request $request)
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
