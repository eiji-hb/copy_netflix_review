<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $videos = Video::all();
      return view('homes.index',['videos'=>$videos]);
    }
    public function show($id)
    {
      $video = Video::find($id);
      // dd($video);
      return view('homes.show',['video'=>$video]);
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
