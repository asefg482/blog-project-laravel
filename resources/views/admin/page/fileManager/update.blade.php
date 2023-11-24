@extends('admin.master')

@section('title','Update file')

@section('content')

    @if(session()->get('result'))
        @include('admin.components.alert',['message'=> 'description saved on website !'])
    @endif

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit file</h4>
                    <p class="card-description">you can Edit description of\ file on website !</p>
                    <form class="forms-sample" action="{{route('file-manager.update',$slug)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="slug" value="{{$slug}}">
                        <div class="form-group">
                            <label for="description-input">Description *</label>
                            <input type="text" id="description-input" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') ??  $description ?? ''  }}" autocomplete="description" placeholder="description">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Edit</button>
                        <a href="{{route('file-manager.index')}}" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
