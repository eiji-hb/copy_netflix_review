@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @foreach($videos as $video)
      {{$video->title}} <br>
    @endforeach
  </div>
</div>
@endsection