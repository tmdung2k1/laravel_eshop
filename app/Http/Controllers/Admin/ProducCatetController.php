<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productcate;

class ProducCatetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mặc định là 15 bản ghi trên 1 trang
        $model = Productcate::paginate();
        return view('admin.product_cate.index', ['model' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product_cate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $model = new Productcate($data);
        $model->save();
        return redirect()->route('product_cate.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
