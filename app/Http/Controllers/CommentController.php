<?php

namespace App\Http\Controllers;

use App\Comments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $comment=Comments::all();
        return  view('comments.index',compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user=Auth::user();
        $data=$this->validate($request,[
            'body'=>'required'
        ]);
        $data = [
            'user_id' => $request->user_id,
            'name' => $user->name,
            'email'=> $user->email,
            'body' => $request->body,
//            'photo' => $user->photo->file

        ];

        Comments::create($data);
//
        Session::flash('comment_msg','Your comment is submitted sucessfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comment=Comments::find($id);

        return view('comments.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        Comments::findOrFail($id)->update($request->all());
        return redirect('/comments');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comm=Comments::find($id);
        $comm->replies()->delete();
        $comm->delete();
        return redirect('/comments');
    }
}
