@extends('layout._admin')
@section('title', 'welcome')
@section('content')
    <a href="{{ route('product_cate.index') }}">Trang danh mục sản phẩm</a>
    <br>
    <a href="{{ route('admin.products.index') }}">Trang sản phẩm</a>
@endsection
