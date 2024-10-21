    {{-- hiển thị dữ liệu thì dùng get
    thêm dữ liệu dùng post
    cập nhật dữ liệu put/patch
    xóa dữ liệu delete --}}

    @extends('layout._admin')
    @section('title', 'product')
    @section('content')
        <div class="container mt-5">
            <h1 class="mb-4">Product List</h1>
            <table class="table table-bordered table-hover">
                <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Description</th>
                        <th>Category ID</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->cate_id }}</td>
                        <td><img src="{{ $product->image }}" alt="{{ $product->product_name }}" class="img-fluid" width="100"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>    </div>
        @endsection