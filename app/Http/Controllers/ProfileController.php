<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $comments = $user->setRelation('comments', $user->comments()->orderBy('created_at', 'desc')->paginate(2));

        return view('profile')
            ->with(compact('user'))
            ->with(compact('comments'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id)
            ],
            'file' => 'nullable|image',
            'password' =>'required'
        ]);

        $user = Auth::user();
        $user->uploadImage($request->file('file'));
        $user->editUser($request->all());
        $user->generatePassword($request->get('password'));


        return redirect()->back();
    }

}
