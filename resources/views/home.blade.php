@extends('app')

@section('title', 'Home')
@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Latest Posts</h2>
          @yield('title-meta')
      </div>
      <div class="panel-body">
        <div class="">
          @forelse( $posts as $post )
          <div class="list-group">
            <div class="list-group-item">
              <h3><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>
              @if(!Auth::guest() && ($post->user_id == Auth::user()->id || Auth::user()->is_admin()))
                @if($post->active == '1')
                  <button class="btn btn-default" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
                @else
                  <button class="btn btn-default" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
                @endif
              @endif
              </h3>
                <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
            </div>
            <div class="list-group-item">
              <article>
                {!! str_limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
              </article>
            </div>
          </div>
          @empty
          There is no post till now. Login and write a new post now!!!.
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
@endsection