@php
    $product_cate = DB::table('products')->orderByDesc('id')->get();

@endphp
<select class="form-select" id="cate_id" name="cate_id" required>
    <option value="">--chọn danh mục--</option>
    @foreach ($product_cate as $cate)
        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
    @endforeach
</select>
