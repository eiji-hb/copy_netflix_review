<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Post;

class homecontroller extends Controller
{
  public function index()
  {
    $videos = Video::all();
    return view('homes.index',['videos'=>$videos]);
  }
  public function show($id)
  {
    $video = Video::find($id);
    $posts = $video->posts;
    return view('homes.show',['video'=>$video],['posts'=>$posts]);
  }
  public function movie()
  {
    return view('homes.movie');
  }
  public function series()
  {
    return view('homes.series');
  }
}
