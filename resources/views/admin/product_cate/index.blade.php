    {{-- hiển thị dữ liệu thì dùng get
    thêm dữ liệu dùng post
    cập nhật dữ liệu put/patch
    xóa dữ liệu delete --}}

    @extends('layout._admin')
    @section('title', 'product_cate')
    @section('content')
        <h1 style="text-align: center">Trang chủ</h1>
        <div class="container mt-5">
            <h1 class="mb-4">Product_Cate</h1>
            <div class="mb-3">
                <a href="{{ route('product_cate.create') }}" class="btn btn-primary">Thêm danh mục</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($model as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>

                            <td>
                                {{-- kiểu route --}}
                                {{-- <a href="{{ route('product_cate.edit', ['product_cate' => $value->id])}}" class="btn btn-warning btn-sm">Edit</a> --}}
                                <a href="product_cate/{{ $value->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="product_cate/{{ $value->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Xác nhận xóa')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $model->links() }}
        </div>
        </body>

        </html>
        @endsection
