<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    //

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        //vali
        $request->validate([
            'name' => ['required', 'min:2'],
            'description' => ['required'],
        ], [
            'required' => "input :attribute wajib disi",
            'min' => "input :attribute minimal :min karakter"
        ]);

        //insert
        $now = Carbon::now();

        DB::table('categories')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);


        //redirec
        return redirect('/category')->with('success', 'Berhasil Membuat Category');
    }

    public function index()
    {
        $categories = DB::table('categories')->get();

        return view('category.show', ['category' => $categories]);
    }

    public function show(string $id)
    {
        $category = Category::find($id);

        return view('category.detail', ['category' => $category]);
    }

    public function edit(string $id)
    {
        $category = DB::table('categories')->find($id);

        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, string $id)
    {
        //vali
        $request->validate([
            'name' => ['required', 'min:2'],
            'description' => ['required'],
        ], [
            'required' => "input :attribute wajib disi",
            'min' => "input :attribute minimal :min karakter"
        ]);

        //update
        $now = Carbon::now();

        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);



        //redirec
        return redirect('/category')->with('success', 'Berhasil update Category');
    }

    public function destroy(string $id)
    {

        DB::table('categories')->where('id', '=', $id)->delete();
        //redirec
        return redirect('/category')->with('success', 'Berhasil Menghapus Category');
    }
}
