<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Hiển thị danh sách các sản phẩm.
     */
    public function index()
    {
        $products = Product::paginate();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Hiển thị form để tạo sản phẩm mới.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Lưu sản phẩm mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
            'product_cate_id' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo thành công.');
    }

    /**
     * Hiển thị chi tiết sản phẩm.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Hiển thị form để chỉnh sửa sản phẩm.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Cập nhật sản phẩm trong cơ sở dữ liệu.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
            'product_cate_id' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            if ($product->image) {
            Storage::disk('public')->delete($product->image);
            }
            // Lưu ảnh mới với tên file có thời gian thực
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $data['image'] = $request->file('image')->storeAs('images', $filename, 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index');
    }

    /**
     * Xóa sản phẩm khỏi cơ sở dữ liệu.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}

