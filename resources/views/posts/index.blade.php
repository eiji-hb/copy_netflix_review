

@foreach($posts as $post)
  <div class="border-bottom">
    <p>内容：{{$post->content}}</p>
    <p>点数：{{$post->review}}</p>
    <p>投稿日: {{date('Y',strtotime($post->updated_at))}}年{{date('n',strtotime($post->updated_at))}}月{{date('d',strtotime($post->updated_at))}}日</p>
  </div>
  @endforeach
