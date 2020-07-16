@extends('layouts.app')

@section('content')
<div class="container pt-5">
  <div class="row">
    <div class="col-sm-4">
      <img src={{$post->video->img}}>
    </div>
      <div class="col-sm-8">
        <h5>{{ $post->video->title }}</h5>
        <span class="text_muted">&#40;{{$post->video->year}}年制作&#41</span>
        <p>点数：{{$post->review}}</p>
        <p>内容：{{$post->content}}</p>
        @if($post->user->id === $auth_user->id)
          <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-primary">編集</a>

          <form method="POST" action="{{ route('post.destroy', ['id' => $post->id ])}}" >
          @csrf
          <button type="submit" class="btn btn-danger mt-2">消去</button>
          </form>
        @endif
      </div>
  </div>
</div>
@endsection