@extends('admin.master')

@section('title','Create new file')

@section('content')

    @if(session()->get('result'))
        @include('admin.components.alert',['message'=> 'file saved on website !'])
    @endif

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New file</h4>
                    <p class="card-description">you can add & upload new file on website !</p>
                    <form class="forms-sample" action="{{route('file-manager.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="description-input">Description *</label>
                            <input type="text" id="description-input" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" autocomplete="description" placeholder="description">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>File upload *</label>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" src="{{old('file')}}">
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Upload</button>
                        <a href="{{route('file-manager.index')}}" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
