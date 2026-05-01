@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tambah Aset Barang Baru') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Form Start --}}
                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Nama Barang (name_item) --}}
                        <div class="mb-4">
                            <label for="name_item" class="block text-gray-700 font-bold mb-2">Nama Barang</label>
                            <input type="text" name="name_item" id="name_item" value="{{ old('name_item') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('name_item')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kode Barang (item_kode) --}}
                        <div class="mb-4">
                            <label for="item_kode" class="block text-gray-700 font-bold mb-2">Kode Barang</label>
                            <input type="text" name="item_kode" id="item_kode" value="{{ old('item_kode') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: LAP-001">
                            @error('item_kode')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kategori (category_id) --}}
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 font-bold mb-2">Kategori</label>
                            <select name="category_id" id="category_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Brand --}}
                        <div class="mb-4">
                            <label for="brand" class="block text-gray-700 font-bold mb-2">Brand/Merk</label>
                            <input type="text" name="brand" id="brand" value="{{ old('brand') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('brand')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Stok --}}
                        <div class="mb-4">
                            <label for="stock" class="block text-gray-700 font-bold mb-2">Jumlah Stok</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('stock')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Unit --}}
                        <div class="mb-4">
                            <label for="unit" class="block text-gray-700 font-bold mb-2">Unit Kerja</label>
                            <input type="text" name="unit" id="unit" value="{{ old('unit') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Lab Komputer">
                            @error('unit')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gambar Aset (image) --}}
                        <div class="mb-4 md:col-span-2">
                            <label for="image" class="block text-gray-700 font-bold mb-2">Upload Gambar Aset (Max 20MB)</label>
                            <input type="file" name="image" id="image"
                                class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-indigo-500">
                            <p class="text-gray-500 text-xs mt-1">Format: JPG, PNG, JPEG. Ukuran Maksimal 20MB.</p>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-4 md:col-span-2">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi Barang</label>
                            <textarea name="description" id="description" rows="3"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 mt-6">
                        <a href="{{ route('items.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition">
                            Batal
                        </a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow transition">
                            Simpan Aset
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
