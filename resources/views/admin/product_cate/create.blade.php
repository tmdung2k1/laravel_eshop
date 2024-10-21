@extends('layout._admin')
@section('title', 'product_cate')
@section('content')
    <div class="container mt-5">
        <h2>Create Product Category</h2>
        <form action="{{ route('product_cate.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
@endsection