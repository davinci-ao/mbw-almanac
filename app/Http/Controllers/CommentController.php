<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Vote;
use App\Comment;
use Auth;
use App\UserImageSeen;
use Illuminate\Support\Facades\Http;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'comment' => 'required',
        ]);

        $name = Auth::user()->name;
        $id = Auth::user()->id;

        $comment = new Comment([
            "image_id" => $request->get('image_id'),
            "user_name" => $name,
            "comment" => $request->get('comment'),
            "user_id" => $id,
        ]);
        $comment->save(); // Finally, save the record.

        return redirect()->back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->get('edited_comment_id');
        $comment =  Comment::find($id);
        $comment->update(['comment' => $request->get('edited_comment')]);
        $comment->update(['edited' => true]);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
