<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homecontroller extends Controller
{
  public function index()
  {
    return view('homes.index');
  }
  public function show()
  {
    return view('show.index');
  }
  public function movie()
  {
    return view('movie.index');
  }
  public function series()
  {
    return view('series.index');
  }
}
