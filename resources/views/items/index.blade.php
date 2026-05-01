@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Daftar Aset Barang') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-700">Manajemen Item</h3>
                    <a href="{{ route('items.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow transition">
                        + Tambah Barang
                    </a>
                </div>

                <div class="overflow-x-auto border rounded-lg">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
                                <th class="py-3 px-6 text-left">Gambar</th>
                                <th class="py-3 px-6 text-left">Info Barang</th>
                                <th class="py-3 px-6 text-left">Kategori</th>
                                <th class="py-3 px-6 text-center">Stok</th>
                                <th class="py-3 px-6 text-center">Unit</th>
                                <th class="py-3 px-6 text-center">Deskripsi</th>
                                <th class="py-3 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            @forelse($items as $item)
                                <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                                    <td class="py-3 px-6 text-left">
                                        <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/150' }}"
                                             alt="img" class="w-14 h-14 object-cover rounded-md border shadow-sm">
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex flex-col">

                                            <span class="text-gray-800 font-medium">{{ $item->full_name }}</span>
                                            <span class="text-xs text-gray-400">{{ $item->brand ?? '-' }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{ $item->category->name ?? 'N/A' }}
                                    </td>
                                    <td class="py-3 px-6 text-center font-semibold">
                                        {{ $item->stock }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{ $item->unit ?? '-' }}
                                    </td>
                                    <td class="py-3 px-6 text-center text-sm">
                                        <span class="text-gray-600">{{ Str::limit($item->description, 50) ?? '-' }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('items.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold underline">
                                                Edit
                                            </a>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 font-bold underline">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-10 text-center text-gray-400 italic">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
