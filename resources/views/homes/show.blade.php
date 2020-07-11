@extends('layouts.app')

@section('content')
  <div class="container pt-5">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-8">
        <!-- <h1>{{ $video->jp_title }}</h1> -->
        <h5>{{ $video->title }}</h5>
        <span class="text_muted">&#40;{{$video->year}}年制作&#41</span>
        <p>Netflix追加日: {{date('Y',strtotime($video->titledate))}}年{{date('n',strtotime($video->titledate))}}月{{date('d',strtotime($video->titledate))}}日</p>
        <div class="vtype">
          @switch($video->vtype)
            @case("movie")
              <p>映画</p>
              @break
            @case("series")
              <p>ドラマ</p>
              @break
            @default
              <p>{{$video->vtype}}</p>
          @endswitch
        </div>
        <div class="synopsis">
          <p class="mb-0 font-weight-bold">あらすじ</p>
          <p>{{$video->synopsis}}</p>
        </div>
      </div>
    </div>
  </div>
@endsection