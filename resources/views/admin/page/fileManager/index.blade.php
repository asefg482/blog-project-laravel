@extends('admin.master')

@section('title','file management')

@section('content')
    @include('admin.components.pageHeader',['title'=>'Blogs list','buttonContent'=>'New file','buttonLink'=>route('file-manager.create')])
    @include('admin.page.fileManager.components.borderedTable',['title'=>'Files list','description'=>'this is file lists','files'=>$files])
@endsection
