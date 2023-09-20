<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }
    public function approve(Request $request)
    {
        $request->validate([
             "work" => "required|numeric",
             "city" => "required|numeric",
             "location" => "required|numeric",
             "job" => "required|numeric",
        ]);
        $post=Post::find($request->post_id);
        $post->work = $request->work;
        $post->city = $request->city;
        $post->location = $request->location;
        $post->job = $request->job;
        $post->status="approve";
        $post->update();

        return redirect()->back()->with('status', 'Post approve successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required|max:100",
            "description" => "required|max:500",
             "work" => "required|numeric",
             "city" => "required|numeric",
             "location" => "required|numeric",
             "job" => "required|numeric",
        ]);
        $post->worker_id = auth()->user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->work = $request->work;
        $post->city=$request->city;
        $post->location=$request->location;
        $post->job=$request->job;
        $post->update();
        return redirect()->route('post.index')->with('status', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('status', 'Post deleted successfully');
    }
}
