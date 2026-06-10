<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

use Illuminate\Support\Facades\File;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::get();

        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $categories = Category::get();
        return view('product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // 
        $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'min:2'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ], [
            'required' => "input :attribute wajib disi",
            'min' => "input :attribute minimal :min karakter",
            'numeric' => "input :attribute harus berupa angka",
            'image' => "input :attribute harus berupa gambar",
            'mimes' => "input :attribute harus berupa file dengan ekstensi: :values",
            'max' => "input :attribute maksimal :max kilobytes",
        ]);

        //insert
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        $product = new Product();
        $now = Carbon::now();

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->image = $imageName;
        $product->category_id = $request->input('category_id');

        $product->created_at = $now;
        $product->updated_at = $now;

        $product->save();
        //redirec
        // return $request;
        return redirect('/products')->with('success', 'Berhasil di Buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $product = Product::find($id);

        return view('product.detail', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $product = Product::find($id);
        $categories = Category::get();

        return view('product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'min:2'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ], [
            'required' => "input :attribute wajib disi",
            'min' => "input :attribute minimal :min karakter",
            'numeric' => "input :attribute harus berupa angka",
            'image' => "input :attribute harus berupa gambar",
            'mimes' => "input :attribute harus berupa file dengan ekstensi: :values",
            'max' => "input :attribute maksimal :max kilobytes",
        ]);

        $product = Product::find($id);
        $now = Carbon::now();

        if ($request->hasFile('image')) {

            $oldImage = public_path('images/' . $product->image);

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            $product->image = $imageName;
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');

        $product->created_at = $now;
        $product->updated_at = $now;


        $product->save();

        return redirect('/products')->with('success', 'Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);

        $oldImage = public_path('images/' . $product->image);

        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }

        $product->delete();

        return redirect('/products')->with('success', 'Berhasil di hapus');
    }
}
