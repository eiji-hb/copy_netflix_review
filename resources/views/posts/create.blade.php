@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <form action="{{route('post.store')}}" method="POST">
          @csrf
          <div class="form-group mt-1">
            <label for="titleInput">内容</label>
            <textarea class="form-control" id="bodyInput" rows="7" name="content"></textarea>
          </div>
            <input type="hidden" name="video_id" value="{{$video->id}}">
          <div>
          </div>
          <div class="form-group">
            <label for="bodyInput">点数:</label>
            <span id="number">5</span>
            <input id="review" type="range" name="review" max="10" step="0.1">
          </div>
          <button type="submit" class="btn btn-primary">投稿</button>
        </form>
      </div>
    </div>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="{{ mix('js/form.js')}}"></script>