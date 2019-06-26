@extends('layouts.app')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Category Admin Panel</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Category Admin Panel</li>
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
            <a href="/categories/create" class="btn btn-primary">Create Category</a>
        </div>

        <ul class="list-group">
            @foreach ($categories as $key => $category)
                <li class="list-group-item clearfix">
                    <div class="float-left">
                        <div class="title">{{ $category->name }}</div>
                    </div>

                    <span class="float-right">
                        <a href="/categories/{{ $category->id }}/edit" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="deleteCatrgory({{ $category->id }})">Delete</button>
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

