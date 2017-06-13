@extends('app')
@section('title', 'Edit Post')
@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>@yield('title')</h2>
      </div>
      <div class="panel-body">
        <form method="post" action='{{ url("/update") }}'>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="post_id" value="{{ $post->id }}{{-- {{ old('post_id') }} --}}">
          <div class="form-group">
            <input required="required" placeholder="Enter title here" type="text" name="title" class="form-control" value="{{ $post->title }}{{-- {{$post->title}}@endif{{ old('title') }} --}}"/>
          </div>
          <div class="form-group">
            <textarea rows="10" name="body" class="form-control">@if(!old('body')){!! $post->body !!}@endif{!! old('body') !!}
            </textarea>
          </div>
          @if($post->active == '1')
            <input type="submit" name='publish' class="btn btn-success" value="Update" />
          @else
            <input type="submit" name='publish' class="btn btn-success" value="Publish" />
          @endif
          <input type="submit" name='save' class="btn btn-default" value="Save As Draft" />
          <a href="{{ url('delete/' . $post->id) }}" class="btn btn-danger">Delete</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection