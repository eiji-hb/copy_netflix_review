@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @foreach($videos as $video)
      <div class="col-12 col-md-6 col-lg-3 p-2">

          <img src={{$video->img}}>

      </div>
    @endforeach
  </div>
</div>
@endsection