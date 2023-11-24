@extends('admin.master')

@section('title','admin panel')

@section('content')
    @include('admin.components.pageHeader',['title'=>'Blogs list','buttonContent'=>'Create Blog','buttonLink'=>route('blog.create')])
    @include('admin.page.blog.components.borderedTable',['title'=>'Blogs list','description'=>'this is blog lists','blogs'=>$blogs])
@endsection
