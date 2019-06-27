@extends('layouts.app')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Blog Admin Panel</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Blog Admin Panel</li>
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
        <div class="toolbox">
            <a href="/posts/create" class="btn btn-primary">Create Post</a>
        </div>

        <ul class="list-group">
            @foreach ($posts as $key => $post)
                <li class="list-group-item clearfix">
                    <div class="float-left">
                        <div class="title">{{ $post->title }}</div>
                        @if (isset($post->category))
                           <small class="d-block text-muted"><strong>分類：</strong>{{$post->category->name}}</small>
                        @endif

                       <small class="author"><strong>作者：</strong>{{ $post->user->name }}</small>
                    </div>

                    <span class="float-right">
                        <a href="/posts/show/{{ $post->id }}" class="btn btn-secondary">View</a>
                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="deletePost({{ $post->id }})">Delete</button>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

{{-- <form id="delete-form" method="POST" action="/posts/id">
    <input type="hidden" name="_method" value="delete">
    @csrf
</form> Http Delete--}}
@endsection

