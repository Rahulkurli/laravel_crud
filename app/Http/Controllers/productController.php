<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
    public function index()
    {
        // $products = product::get();
        return view('products.index', ['products' => product::paginate(5)]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            "name" => "required",
            "desc" => "required",
            "image" => "required|mimes:jpeg, jpg,png,gif|max:10000",
        ]);
        // upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        // dd($request->all());
        // dd($imageName);
        $product = new product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->desc = $request->desc;

        $product->save();

        return back()->withSuccess('Product created successfully !');
    }

    public function edit($id)
    {
        $product = product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "desc" => "required",
            "image" => "nullable|mimes:jpeg, jpg,png,gif|max:10000",
        ]);

        $product = product::where('id', $id)->first();

        if (isset($request->image)) {
            // upload image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }


        $product->name = $request->name;
        $product->desc = $request->desc;

        $product->save();

        return back()->withSuccess('Product Updated successfully !');
    }


    public function destroy($id)
    {
        $product = product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted successfully !');
    }

    public function show($id)
    {
        $product = product::where('id', $id)->first();

        return view('products.show', ['product' => $product]);
    }
}
