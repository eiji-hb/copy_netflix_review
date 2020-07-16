@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <form action="{{route('post.update',['id'=>$post->id])}}" method="POST">
          @csrf
          <div class="form-group mt-1">
            <label for="titleInput">内容</label>
            <textarea class="form-control" id="bodyInput" rows="7" name="content">{{$post->content}}</textarea>
          </div>
          <div class="form-group">
            <label for="bodyInput">点数:</label>
            <span id="number">{{$post->review}}</span>
            <input id="review" type="range" name="review" max="10" step="0.1" value="{{$post->review}}">
          </div>
          <button type="submit" class="btn btn-primary">更新</button>
        </form>
      </div>
    </div>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="{{ mix('js/form.js')}}"></script>