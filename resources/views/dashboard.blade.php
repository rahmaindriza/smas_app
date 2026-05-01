@extends('layouts.app')

@section('header')
    <div class="flex items-center gap-4">
        {{-- Memberikan jarak kanan (mr-3) dan memastikan tinggi yang proporsional --}}
        <img src="{{ asset('storage/assets/images/logo_mediatama.jpeg') }}"
             alt="Logo"
             class="h-12 w-auto object-contain">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Pesan Status --}}
                    <div class="mb-6">
                        {{ __("You're logged in!") }}
                    </div>

                    {{-- Navigasi Tombol --}}
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('items.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition duration-150">
                            Kelola Barang Aset
                        </a>

                        <a href="{{ route('categories.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition duration-150">
                            Kategori
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
