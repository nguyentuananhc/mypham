@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/admin/custom.css">
@stop

@section('page_title', trans('string.create_category'))

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-pie-chart"></i>
        {{ trans('string.create_category') }}
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form class="form-edit-add"
                          action="{{ route('admin.categories.store', ['id' => $id, 'langCode' => $langCode]) }}"
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
                                    <label for="name">{{ trans('string.name') }}</label>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}"
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

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit"
                                    onclick="this.disabled=true;this.form.submit()"
                                    class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Delete File Modal -->
@stop