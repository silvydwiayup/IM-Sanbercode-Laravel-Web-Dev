<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModels;


class CategoriesController extends Controller
{
    public function create()
    {
        return view('categories.tambah');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'required',
            ],
            [
                'required' => 'inputan :attribute Wajib diisi.',
                'min' => 'inputan : attribute minimal :min karakter'
            ]
        );

        CategoriesModels::create($request->only('name', 'description'));

        return redirect('/categories')->with('success', 'Berhasil Tambah Category!');
    }

    public function index()
    {
        $categories = CategoriesModels::all();

        return view('categories.tampil', ['categories' => $categories]);
    }

    public function show($id)
    {
        $category = CategoriesModels::findorFail($id);

        return view('categories.detail', ['detailCategory' => $category]);
    }

    public function edit($id)
    {
        $category = CategoriesModels::findorFail($id);

        return view('categories.edit', ['editCategory' => $category]);
    }

    public function update($id, Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'required',
            ],
            [
                'required' => 'inputan :attribute Wajib diisi.',
                'min' => 'inputan : attribute minimal :min karakter'
            ]
        );

        $category = CategoriesModels::findorFail($id);
        $category -> update($request->only('name', 'description'));

        return redirect('/categories')->with('success', 'Berhasil Update Category');
    }

    public function destroy($id)
    {
        $category = CategoriesModels::findorFail($id);
        $category->delete();

        return redirect('/categories')->with('success', 'Berhasil Hapus categories');
    }
}