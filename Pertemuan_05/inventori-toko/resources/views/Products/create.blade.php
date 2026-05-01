<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Produk Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg border border-gray-200 sm:rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">Informasi Produk</h3>
                    <p class="text-sm text-gray-500">Masukkan detail produk baru untuk toko Mas Wowo & Pak Cokomi.</p>
                </div>
                
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk</label>
                            <input type="text" name="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out" required placeholder="Contoh: Kopi Bubuk">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">SKU</label>
                            <input type="text" name="sku" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out" required placeholder="Contoh: SKU-1234">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                            <input type="text" name="category" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out" placeholder="Contoh: Minuman">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="price" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out" required placeholder="15000">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Stok Awal</label>
                            <input type="number" name="stock" class="block w-full sm:w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out" required placeholder="0">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Produk</label>
                            <textarea name="description" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition duration-150 ease-in-out" placeholder="Tuliskan deskripsi lengkap produk di sini..."></textarea>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 bg-gray-50 text-right rounded-b-xl border-t border-gray-200 flex justify-end gap-3">
                        <a href="{{ route('dashboard') }}" class="inline-flex justify-center rounded-lg border border-gray-300 bg-white py-2 px-4 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex justify-center items-center rounded-lg border border-transparent bg-indigo-600 py-2 px-6 text-sm font-semibold text-white shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>