@extends('layout.master')
@section('content')
    @include('home.banner')
    @include('home.list-product')
    <!-- Phần giới thiệu -->
    @include('home.about')
    <!--/ End phần giới thiệu -->
    <!-- Sản phẩm bán chạy -->
    @include('home.popular')
    <!--/Sản phẩm bán chạy -->
    <!-- Chương trình khuyến mãi -->
    @include('home.sale')
    <!--/End Chương trình khuyến mãi-->
    @include('home.subscribe-form')

    @include('home.news')
@endsection