<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::with('category')->latest()->get();
        $categories = Category::all();

        return view('items.index', compact('items', 'categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_item'   => 'required|string|max:255',
            'item_kode'   => 'required|string|unique:items,item_kode',
            'category_id' => 'required|exists:categories,id',
            'stock'       => 'required|integer|min:0',
            'brand'       => 'nullable|string|max:100',
            'unit'        => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:20480',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/items', 'public');
        }

       Item::create($data);

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan!');
    }


    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }


    public function update(Request $request, Item $item)
    {

        $request->validate([
            'name_item'   => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock'       => 'required|integer|min:0',
            'brand'       => 'nullable|string|max:100',
            'unit'        => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'item_kode'   => [
                'required',
                Rule::unique('items')->ignore($item->id),
            ],
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:20480', // Maks 20MB
        ], [

            'item_kode.unique' => 'Kode item sudah digunakan oleh barang lain.',
            'image.max' => 'Ukuran gambar maksimal adalah 20MB.',
        ]);

        $data = $request->only([
            'name_item',
            'category_id',
            'item_kode',
            'stock',
            'brand',
            'unit',
            'description'
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $path = $request->file('image')->store('assets/items', 'public');
            $data['image'] = $path;
        }

        $item->update($data);
        return redirect()->route('items.index')->with('success', 'Barang ' . $item->name_item . ' berhasil diperbarui!');
    }


    public function destroy(Item $item)
    {
       
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Barang ' . $item->name_item . ' berhasil dihapus (soft delete)!');
    }
}
