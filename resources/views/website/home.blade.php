@extends('website.master')

@section('title','hello blog !')
@section('description','test blog with laravel !')


@section('page_content')



    @foreach($blogs as $blog)
        @include('website.component.article',['blog'=>$blog])
    @endforeach

    @include('website.component.page',['page'=>$page,'pageLength'=>$pageLength])


@endsection
