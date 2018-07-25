<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;
use Auth;

class ProfileController extends Controller
{
    public function index(User $user)
    {
    	$user = User::where("id", "=", Auth::user()->id)->get();
    	return view('profile', compact('user'));
    }

    public function edit(User $user, Request $request)
    {
    	$avatar = $request->file('avatar')->store('avatars');
    	$user->update([
    		'name' => request('name'),
    		'email' => request('email'),
    		'NIP' => request('NIP'),
    		'jabatan' => request('jabatan'),	
    		'no_hp' => request('no_hp'),
    		'alamat' => request('alamat'),
    		'avatar' => $avatar
    	]);

    	// if($request->user()->avatar)
    	// {
    	// 	Storage::delete($request->user()->avatar);
    	// }

    	

    	// $request->user()->update([
    		
    	// ]);

    	return redirect()->back();
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
