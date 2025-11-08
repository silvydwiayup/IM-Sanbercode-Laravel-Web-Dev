<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModels;
use App\Models\CategoriesModels;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('admin', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        $products = ProductModels::with('category')->get();
        return view('product.products', ['productsCard' => $products]);
    }

    public function create()
    {
        $categoriesNames = CategoriesModels::pluck('name', 'id');
        return view('product.tambahProduct', ['categoriesList' => $categoriesNames]);
    }

    public function store(Request $request)
    {
        $productValidated = $request->validate(
            [
                'categories_id' => 'required',
                'inputNama' => 'required|string|max:255',
                'inputDescription' => 'required|string',
                'inputPrice' => 'required|integer',
                'inputStock' => 'required|integer',
                'inputImage' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ],[
                'categories_id.required' => 'Category wajib dipilih.',
                'inputNama.required' => 'Nama wajib diisi.',
                'inputNama.max' => 'Nama Melebihi Maximal.',
                'inputDescription.required' => 'Deskripsi wajib diisi.',
                'inputPrice.required' => 'Price wajib diisi.',
                'inputPrice.integer' => 'Price Harus Berupa Angka.',
                'inputStock.required' => 'Stock wajib diisi.',
                'inputStock.integer' => 'Stock Harus Berupa Angka.',
                'inputImage.required' => 'Image wajib diisi.',
                'inputImage.image' => 'File harus berupa gambar.',
                'inputImage.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
                'inputImage.max' => 'Ukuran gambar maksimal 2 MB.',
            ]

        );
        
        $image = $request->file('inputImage')->store('images/products', 'public');

        ProductModels::create([
            'categories_id' => $productValidated['categories_id'],
            'name'=> $productValidated['inputNama'],
            'image' => $image,
            'price' => $productValidated['inputPrice'],
            'stock' => $productValidated['inputStock'],
            'description' => $productValidated['inputDescription']
        ]);

        return redirect('/products')->with('success', 'Berhasil Tambah Produk');
    }

    public function show($id)
    {
        $product = ProductModels::with('category')->find($id);
        return view('product.detailProduct', ['detailProduct' => $product]);
    }

    public function edit($id)
    {
        $product = ProductModels::with('category')->find($id);
        $categoriesNames = CategoriesModels::pluck('name', 'id');

        return view('product.editProduct', ['editProduct' => $product, 'editCategories' => $categoriesNames]);
    }

    public function update($id, Request $request)
    {
        $productValidated = $request->validate(
            [
                'categories_id' => 'required',
                'inputNama' => 'required|string|max:255',
                'inputDescription' => 'required|string',
                'inputPrice' => 'required|integer',
                'inputStock' => 'required|integer',
                'inputImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ],[
                'categories_id.required' => 'Category wajib dipilih.',
                'inputNama.required' => 'Nama wajib diisi.',
                'inputNama.max' => 'Nama Melebihi Maximal.',
                'inputDescription.required' => 'Deskripsi wajib diisi.',
                'inputPrice.required' => 'Price wajib diisi.',
                'inputPrice.integer' => 'Price Harus Berupa Angka.',
                'inputStock.required' => 'Stock wajib diisi.',
                'inputStock.integer' => 'Stock Harus Berupa Angka.',
                'inputImage.required' => 'Image wajib diisi.',
                'inputImage.image' => 'File harus berupa gambar.',
                'inputImage.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
                'inputImage.max' => 'Ukuran gambar maksimal 2 MB.',
            ]

        );

        $product = ProductModels::find($id);
        
        if ($request->hasFile('inputImage')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $image = $request->file('inputImage')->store('images/products', 'public');
            $product->image = $image;
        }


        $product->categories_id = $productValidated['categories_id'];
        $product->name = $productValidated['inputNama'];
        $product->description = $productValidated['inputDescription'];
        $product->price = $productValidated['inputPrice'];
        $product->stock = $productValidated['inputStock'];

        $product->save();

        return redirect('/products')->with('success', 'Berhasil Update Produk');
    }


    public function destroy($id)
    {
        $product = ProductModels::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Berhasil Hapus Produk');
    }

}
