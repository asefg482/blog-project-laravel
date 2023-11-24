@extends('admin.master')

@section('title','Edit blog')

@section('content')

    @if(session()->get('result'))
        @include('admin.components.alert',['message'=>'Blog updated on website !'])
    @endif

    {{--    @include('admin.components.pageHeader',['title'=>'Edit blog','breadcrumb'=>['Admin','blogs','update']])--}}
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update new blog</h4>
                    <p class="card-description">you can update blog on website !</p>
                    <form class="forms-sample" action="{{route('blog.update',$slug)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title-input">Title *</label>
                            <input type="text" id="title-input" name="title" class="form-control @error('title') is-invalid @enderror" value=" {{ old('title') ??  $title ?? '' }}" autocomplete="title" placeholder="Title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug-input">Slug *</label>
                            <input type="text" id="slug-input" name="slug" class="form-control @error('slug') is-invalid @enderror" value="  {{old('slug') ??  $slug ?? '' }}" autocomplete="slug" placeholder="slug">
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description-input">Description *</label>
                            <input type="text" id="description-input" name="description" class="form-control @error('description') is-invalid @enderror" value="{{  old('description') ??  $description ?? '' }}" autocomplete="description" placeholder="description">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="short-description-input">Short description *</label>
                            <input type="text" id="short-description-input" name="short_description" class="form-control @error('short_description') is-invalid @enderror" value="{{  old('short_description') ??  $short_description ?? '' }}" autocomplete="short_description" placeholder="short description">
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="image">Short description *</label>--}}
                        {{--                            <input type="text" id="image" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" autocomplete="image" placeholder="image">--}}
                        {{--                            @error('image')--}}
                        {{--                            <span class="invalid-feedback" role="alert">--}}
                        {{--                                        <strong>{{ $message }}</strong>--}}
                        {{--                                    </span>--}}
                        {{--                            @enderror--}}
                        {{--                        </div>--}}

                        <div class="form-group">
                            <label>Image upload</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" src=" {{  old('image') ??  $image ?? '' }}">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <br>
                            <img class="form-group rounded mdi-format-float-center" src=" {{ route('file-manager.show',$image) ??    asset(old('image') ?? $image) ?? '' }}" alt="" width="40%">
                        </div>
                        <style>
                            :root {
                                /* Overrides the border radius setting in the theme. */
                                --ck-border-radius: 4px;

                                /* Overrides the default font size in the theme. */
                                --ck-font-size-base: 14px;

                                /* Helper variables to avoid duplication in the colors. */
                                --ck-custom-background: hsl(270, 1%, 29%);
                                --ck-custom-foreground: hsl(255, 3%, 18%);
                                --ck-custom-border: hsl(300, 1%, 22%);
                                --ck-custom-white: hsl(0, 0%, 100%);

                                /* -- Overrides generic colors. ------------------------------------------------------------- */

                                --ck-color-base-foreground: var(--ck-custom-background);
                                --ck-color-focus-border: hsl(208, 90%, 62%);
                                --ck-color-text: hsl(0, 0%, 98%);
                                --ck-color-shadow-drop: hsla(0, 0%, 0%, 0.2);
                                --ck-color-shadow-inner: hsla(0, 0%, 0%, 0.1);

                                /* -- Overrides the default .ck-button class colors. ---------------------------------------- */

                                --ck-color-button-default-background: var(--ck-custom-background);
                                --ck-color-button-default-hover-background: hsl(270, 1%, 22%);
                                --ck-color-button-default-active-background: hsl(270, 2%, 20%);
                                --ck-color-button-default-active-shadow: hsl(270, 2%, 23%);
                                --ck-color-button-default-disabled-background: var(--ck-custom-background);

                                --ck-color-button-on-background: var(--ck-custom-foreground);
                                --ck-color-button-on-hover-background: hsl(255, 4%, 16%);
                                --ck-color-button-on-active-background: hsl(255, 4%, 14%);
                                --ck-color-button-on-active-shadow: hsl(240, 3%, 19%);
                                --ck-color-button-on-disabled-background: var(--ck-custom-foreground);

                                --ck-color-button-action-background: hsl(168, 76%, 42%);
                                --ck-color-button-action-hover-background: hsl(168, 76%, 38%);
                                --ck-color-button-action-active-background: hsl(168, 76%, 36%);
                                --ck-color-button-action-active-shadow: hsl(168, 75%, 34%);
                                --ck-color-button-action-disabled-background: hsl(168, 76%, 42%);
                                --ck-color-button-action-text: var(--ck-custom-white);

                                --ck-color-button-save: hsl(120, 100%, 46%);
                                --ck-color-button-cancel: hsl(15, 100%, 56%);

                                /* -- Overrides the default .ck-dropdown class colors. -------------------------------------- */

                                --ck-color-dropdown-panel-background: var(--ck-custom-background);
                                --ck-color-dropdown-panel-border: var(--ck-custom-foreground);

                                /* -- Overrides the default .ck-splitbutton class colors. ----------------------------------- */

                                --ck-color-split-button-hover-background: var(--ck-color-button-default-hover-background);
                                --ck-color-split-button-hover-border: var(--ck-custom-foreground);

                                /* -- Overrides the default .ck-input class colors. ----------------------------------------- */

                                --ck-color-input-background: var(--ck-custom-background);
                                --ck-color-input-border: hsl(257, 3%, 43%);
                                --ck-color-input-text: hsl(0, 0%, 98%);
                                --ck-color-input-disabled-background: hsl(255, 4%, 21%);
                                --ck-color-input-disabled-border: hsl(250, 3%, 38%);
                                --ck-color-input-disabled-text: hsl(0, 0%, 78%);

                                /* -- Overrides the default .ck-labeled-field-view class colors. ---------------------------- */

                                --ck-color-labeled-field-label-background: var(--ck-custom-background);

                                /* -- Overrides the default .ck-list class colors. ------------------------------------------ */

                                --ck-color-list-background: var(--ck-custom-background);
                                --ck-color-list-button-hover-background: var(--ck-color-base-foreground);
                                --ck-color-list-button-on-background: var(--ck-color-base-active);
                                --ck-color-list-button-on-background-focus: var(--ck-color-base-active-focus);
                                --ck-color-list-button-on-text: var(--ck-color-base-background);

                                /* -- Overrides the default .ck-balloon-panel class colors. --------------------------------- */

                                --ck-color-panel-background: var(--ck-custom-background);
                                --ck-color-panel-border: var(--ck-custom-border);

                                /* -- Overrides the default .ck-toolbar class colors. --------------------------------------- */

                                --ck-color-toolbar-background: var(--ck-custom-background);
                                --ck-color-toolbar-border: var(--ck-custom-border);

                                /* -- Overrides the default .ck-tooltip class colors. --------------------------------------- */

                                --ck-color-tooltip-background: hsl(252, 7%, 14%);
                                --ck-color-tooltip-text: hsl(0, 0%, 93%);

                                /* -- Overrides the default colors used by the ckeditor5-image package. --------------------- */

                                --ck-color-image-caption-background: hsl(0, 0%, 97%);
                                --ck-color-image-caption-text: hsl(0, 0%, 20%);

                                /* -- Overrides the default colors used by the ckeditor5-widget package. -------------------- */

                                --ck-color-widget-blurred-border: hsl(0, 0%, 87%);
                                --ck-color-widget-hover-border: hsl(43, 100%, 68%);
                                --ck-color-widget-editable-focus-background: var(--ck-custom-white);

                                /* -- Overrides the default colors used by the ckeditor5-link package. ---------------------- */

                                --ck-color-link-default: hsl(190, 100%, 75%);
                            }


                            :root {
                                --color: red;
                            }

                            .ck-editor {
                                color: black;
                            }

                            .ck-editor .ck-content {
                                min-height: 400px;
                            }
                        </style>
                        <div class="form-group">
                            <label for="content-editor">Content *</label>
                            <textarea size="0,0" class="@error('content') is-invalid @enderror" name="content" id="content-editor" rows="0" cols="0"> {{  old('content') ??  $content ?? '' }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{url('/admin/blog/')}}" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
