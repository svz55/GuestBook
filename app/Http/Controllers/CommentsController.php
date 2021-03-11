<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at','desc')->paginate(2);
        return view('admin.comments', compact('comments'), ['title' => 'Комментарии']);
    }

    public function store(Request $request)
    {
        if (Auth::user()) {
            $this->validate($request, [
                'text' => 'required',
            ]);

            if ($request->file()) {
                $fileName = Str::random(10) . '.' . $request->file->getClientOriginalExtension();
                $filePath = $request->file('file')->storeAs('uploads', $fileName , 'public');

            }
            //dd($filePath);
            Comment::create(
                [
                    'user_id' => Auth::user()->id,
                    'email'       => Auth::user()->email,
                    'text'    => $request->get('text'),
                    'link'    => $filePath  ?? null,
                ]
            );

            return redirect()->back();
        } else {
            $this->validate($request, [
                'name'  => 'required',
                'email' => 'required',
                'text'  => 'required',
            ]);

            Comment::create(
                [
                    'name'  => $request->get('email'),
                    'email' => $request->get('email'),
                    'text'  => $request->get('text')
                ]
            );
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->route('comments.index');
    }
}
