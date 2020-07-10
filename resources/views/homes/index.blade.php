@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @foreach($videos as $video)
      <div class="col-12 col-md-6 col-lg-3 p-2">
        @if ($video->img === null)
          <img src="{ asset('storage/noimage.png') }">
        @else
          <img src={{$video->img}}>
        @endif
      </div>
    @endforeach
  </div>
</div>
@endsection