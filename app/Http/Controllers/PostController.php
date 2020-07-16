<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Video;
class PostController extends Controller
{
  public function index()
  {
    $posts = Post::all();
    return view('posts.index',['posts'=>$posts]);
  }
  public function create($id)
  {
    $video = Video::find($id);
    return view('posts.create',['video'=>$video]);
  }
  public function store(Request $request)
  {
    $post = new Post;
    $post->content = $request->content;
    $post->video_id = $request->video_id;
    $post->review = $request->review;
    $user = Auth::user();
    $user->posts()->save($post);
    return redirect()->action(
      'PostController@show', ['id' => $post->id]
    );
  }
  public function show($id)
  {
    $post = Post::find($id);
    $auth_user = Auth::user();
    return view('posts.show',['post'=>$post],['auth_user'=>$auth_user]);
  }
  public function edit($id)
  {
    $post = Post::find($id);
    return view('posts.edit',['post'=>$post]);
  }
  public function update(Request $request ,$id)
  {
    $post = Post::find($id);
    $post->content = $request->content;
    $post->review = $request->review;
    $post->save();
    return redirect()->action(
      'PostController@show', ['id' => $post->id]
    );
  }
  public function destroy($id)
  {
    Post::destroy($id);
    return redirect('/');
  }
}
