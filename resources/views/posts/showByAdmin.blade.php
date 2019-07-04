@extends('layouts.app')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Blog Single</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/posts/admin">Blog Admin Panel</a>
                    </li>
                    <li class="breadcrumb-item active">Blog Single</li>
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
        <h1 class="mb-2">{{ $post->title }}</h1>
        @if (isset($post->category))
            <small class="d-block text-muted"><strong>分類：</strong>{{ $post->category->name }}</small>
        @endif
        <small class="d-block text-muted"><strong>標籤：</strong>{{ $post->tagsString() }}</small>
        <small class="author"><strong>作者：</strong>{{ $post->user->name }}</small>

        <div class="toolbox text-left mt-3">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
            <button class="btn btn-danger" onclick="deletePost({{ $post->id }})">Delete</button>
        </div>
        @if (!$post->thumbnail)
            <div class="text-danger">no thumbnail</div>
        @else
            <img width="320" src="{{ $post->thumbnail }}" alt="thumbnail">
        @endif
        <div class="content">
            {{ $post->content }}
        </div>
    </div>
</div>
@endsection
