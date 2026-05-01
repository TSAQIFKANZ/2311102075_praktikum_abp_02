<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Produk</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg border border-gray-200 sm:rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex items-center gap-3">
                    <div class="bg-indigo-100 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Ubah Data Produk</h3>
                        <p class="text-sm text-gray-500">Edit informasi untuk produk <b>{{ $product->name }}</b>.</p>
                    </div>
                </div>
                
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">SKU</label>
                            <input type="text" name="sku" value="{{ $product->sku }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out bg-gray-50" required readonly title="SKU biasanya tidak boleh diubah">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                            <input type="text" name="category" value="{{ $product->category }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="price" value="{{ $product->price }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Stok Barang</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="block w-full sm:w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Produk</label>
                            <textarea name="description" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 bg-gray-50 text-right rounded-b-xl border-t border-gray-200 flex justify-end gap-3">
                        <a href="{{ route('dashboard') }}" class="inline-flex justify-center rounded-lg border border-gray-300 bg-white py-2 px-4 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex justify-center items-center rounded-lg border border-transparent bg-indigo-600 py-2 px-6 text-sm font-semibold text-white shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>