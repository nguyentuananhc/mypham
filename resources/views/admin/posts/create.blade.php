@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/admin/custom.css">
@stop

@section('page_title', trans('string.create_post'))

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-pie-chart"></i>
        {{ trans('string.create_post') }}
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form class="form-edit-add"
                          action="{{ route('admin.posts.store', ['id' => $id, 'langCode' => $langCode]) }}"
                          method="POST" enctype="multipart/form-data">

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif

                        <!-- Adding / Editing -->
                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="name">{{ trans('string.post_title') }}</label>
                                    <input id="name" type="text" name="title" value="{{ old('title') }}"
                                           class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="lang">{{ trans('string.language') }}</label>
                                    <select name="lang_code" id="lang" class="form-control">
                                        @foreach($languages as $language)
                                            <option value="{{ $language->code }}"
                                                    {{ $language->code === $langCode ? 'selected' : '' }}>{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="description">{{ trans('string.description') }}</label>
                                    <textarea id="description" type="text" name="description"
                                              class="form-control">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="richtechcontent">{{ trans('string.content') }}</label>
                                <textarea name="content" id="richtechcontent" class="form-control richTextBox" cols="30"
                                          rows="10">{{ old('content') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="cover_image">{{ trans('string.cover_image') }}</label>
                                <div>
                                    <button type="button" id="add_cover_image"
                                            class="btn btn-primary btn-sm">{{ trans('string.choose_image') }}</button>
                                </div>
                                <input type="file" id="cover_image" name="cover_image"/>
                                <div id="preview-cover-image">
                                    @if(isset($post) && $post->cover_image)
                                        <img src="{{ cloud_link($post->cover_image) }}"/>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status">{{ trans('string.status') }}</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0">{{ trans('string.unpublished') }}</option>
                                    <option value="1" selected>{{ trans('string.published') }}</option>
                                </select>
                            </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit"
                                    onclick="this.disabled=true;this.form.submit()"
                                    class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                          enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                               onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="products">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
      $('document').ready(function () {
        //handle product image change
        $('#add_cover_image').click(function () {
          $('#cover_image').click()
          return false
        })


        $('#cover_image').change(function () {
          $('#preview-product-images').html('')
          if (this.files && this.files[0]) {
            var reader = new FileReader()
            reader.onload = function (event) {
              $('#preview-cover-image').html('<img src="' + event.target.result + '"/>')
            }

            reader.readAsDataURL(this.files[0])
          }
        })
      })
    </script>
@stop