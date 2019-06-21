@extends('layouts.frontend')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Edit Post</h4>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="active"><a href="/posts/admin">Blog Admin Panel</a>
                    </li>
                    <li class="active">Edit Post</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--page title end-->
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <form method="post" action="/posts/{{ $post->id }}">
            @csrf
            <input type="hidden" name="_method" value="put">
            {{-- <input type="hidden" name="id" value="{{ $post->id }}">  id可直接放置aciton--}}
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Content</label>
            <textarea name="content" class="form-control" cols="30" rows="10">{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.history.back()">Cancel</button>
        </form>
    </div>
</div>
@endsection
