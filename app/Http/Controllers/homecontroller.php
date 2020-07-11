<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class homecontroller extends Controller
{
  public function index()
  {
    $videos = Video::all();
    return view('homes.index',['videos'=>$videos]);
  }
  public function show()
  {
    // return view('homes.index');
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
