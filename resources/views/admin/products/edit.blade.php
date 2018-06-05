@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/admin/custom.css">
@stop

@section('page_title', trans('string.edit_product'))

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-pie-chart"></i>
        {{ trans('string.edit_product') }}
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form class="form-edit-add"
                          action="{{ route('admin.products.update', ['id' => $id, 'langCode' => $langCode]) }}"
                          method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT"/>
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
                                    <label for="name">{{ trans('string.product_name') }}</label>
                                    <input id="name" type="text" name="name"
                                           value="{{ old('name', $product->translation->name) }}"
                                           class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="category">{{ trans('string.category') }}</label>
                                    <select name="category_id" id="category" class="form-control">
                                        @foreach($categories as $category)
                                            @if(count($category->translations) > 0)
                                                <option value="{{ $category->id }}"
                                                        {{ $category->id === $product->category_id ? 'selected' : '' }}>{{ $category->translations[0]->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="price">{{ trans('string.price') }}</label>
                                    <input id="price" type="text" name="price"
                                           value="{{ old('price', $product->translation->price) }}"
                                           class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="sale">{{ trans('string.sale') }}</label>
                                    <input id="sale" type="text" name="sale"
                                           value="{{ old('sale', $product->sale) }}"
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
                                              class="form-control">{{ old('description', $product->translation->description) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="richtechcontent">{{ trans('string.content') }}</label>
                                <textarea name="content" id="richtechcontent" class="form-control richTextBox" cols="30"
                                          rows="10">{{ old('content', $product->translation->content) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="product_images">{{ trans('string.product_images') }}</label>
                                <div>
                                    <button id="add_product_image"
                                            class="btn btn-primary btn-sm">{{ trans('string.choose_image') }}</button>
                                    <button id="clear_product_image"
                                            class="btn btn-danger btn-sm">{{ trans('string.clear') }}</button>
                                </div>
                                <input type="file" id="product_images" multiple name="product_images[]"/>
                                <div id="preview-product-images">
                                    @if(isset($product) && $product->images)
                                        @foreach($product->images as $image)
                                            <div class="mr-2"><img src="{{ cloud_link($image) }}"/></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status">{{ trans('string.available') }}</label>
                                <input type="checkbox" id="status"
                                       name="is_available" {{ $product->is_available ? 'checked' : '' }}/>
                            </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit"
                                    onclick="this.disabled=true;this.form.submit()"
                                    class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            <button type="button"
                                    data-toggle="modal" data-target="#confirm_delete_modal"
                                    class="btn btn-danger save pull-right">{{ __('string.delete_this_lang') }}</button>
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

    @include('admin.components.confirm-modal-delete', [
        'id' => $product->translation->id,
        'route' => 'admin.product_translations.destroy'
    ])
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
      $('document').ready(function () {
        //handle product image change
        $('#add_product_image').click(function () {
          $('#product_images').click()
          return false
        })


        $('#clear_product_image').click(function () {
          $('#product_images').val('')
          $('#preview-product-images').html('')
          return false
        })

        $('#product_images').change(function () {
          $('#preview-product-images').html('')
          if (this.files) {
            var filesAmount = this.files.length

            for (var i = 0; i < filesAmount; i++) {
              var reader = new FileReader()

              reader.onload = function (event) {
                $('#preview-product-images').append('<div class="mr-2"><img src="' + event.target.result + '"/> </div>')
              }

              reader.readAsDataURL(this.files[i])
            }
          } else {
            $('#preview-product-images').html('')
          }
        })
      })
    </script>
@stop