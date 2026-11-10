<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function landing(): View 
    {
         $products = product::query()->latest()->get();
        return view('landing', compact('products'));
    }

    public function index(): View
    {
        $products = product::query()->latest()->get();
        return view('produk.index', compact('products'));

    }
    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validated = request()->validate(
            [
                'nama_product' => ['required','string','max:100'],
                'deskripsi' => ['required','string'],
                'harga' => ['required','integer','min:0'],
                'gambar' => ['nullable','string','max:255'],
            ],
            $this->vallidationMessages()
        );
        
        product::query()->create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk Berhasil Dimasukan.');
    }
    
    public function edit(product $product) : View
    {
        return view('produk.edit', compact('product')); 
    }

    public function update(
        Request $request,
        product $product
    ): RedirectResponse {
        $validated = request()->validate(
            [
                'nama_product' => ['required','string','max:100'],
                'deskripsi' => ['required','string'],
                'harga' => ['required','integer','min:0'],
                'gambar' => ['nullable','string','max:255'],
            ],
            $this->vallidationMessages()
        );
        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk Berhasil Diperbarui.');     
  
  
   
    }
        public function destroy(product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk Berhasil Dihapus.');
    }

    private function vallidationMessages(): array
    {
        return [
            'nama_product.required' => 'Nama Produk Wajib Diisi.',
            'nama_product.max' => 'Nama Produk Maksimal 100 Karakter.',
            'deskripsi.required' => 'Deskripsi Wajib Diisi.',
            'harga.required' => 'Harga Wajib Diisi.',
            'harga.integer' => 'Harga Harus Berupa Angka.',
            'harga.min' => 'Harga Tidak Boleh Kurang Dari 0.',
            'gambar.max' => 'Gambar Maksimal 255 Karakter.',
        ];
    }
}
