<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-lg font-bold">Inventori Toko Pak Cokomi & Mas Wowo</h1>
                        <a href="{{ route('products.create') }}" class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-200 ease-in-out">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah Produk Baru
                        </a>
                    </div>

                    <div class="overflow-x-auto border border-gray-200 sm:rounded-lg shadow-sm">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-indigo-50 border-b-2 border-indigo-200 divide-x divide-indigo-200">
                                    <th class="px-6 py-4 text-xs font-extrabold text-indigo-900 uppercase tracking-wider">Nama Produk</th>
                                    <th class="px-6 py-4 text-xs font-extrabold text-indigo-900 uppercase tracking-wider">SKU</th>
                                    <th class="px-6 py-4 text-xs font-extrabold text-indigo-900 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-4 text-xs font-extrabold text-indigo-900 uppercase tracking-wider">Harga</th>
                                    <th class="px-6 py-4 text-xs font-extrabold text-indigo-900 uppercase tracking-wider">Stok</th>
                                    <th class="px-6 py-4 text-xs font-extrabold text-indigo-900 uppercase tracking-wider text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($products as $item)
                                <tr class="hover:bg-blue-50 transition-colors duration-200 divide-x divide-gray-200">
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-800">{{ $item->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->sku }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->category }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 font-medium">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        @if($item->stock < 10)
                                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold shadow-sm">Sisa {{ $item->stock }}</span>
                                        @else
                                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold shadow-sm">{{ $item->stock }} Pcs</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm flex justify-center space-x-3">
                                        <a href="{{ route('products.edit', $item->id) }}" title="Edit Produk" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 p-2 rounded-md transition duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        
                                        <div x-data="{ open: false }">
                                            <button @click="open = true" title="Hapus Produk" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-md transition duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>

                                            <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-60 backdrop-blur-sm" x-transition.opacity style="display: none;">
                                                <div @click.away="open = false" class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full mx-4" x-transition>
                                                    <div class="flex items-center mb-4">
                                                        <div class="bg-red-100 p-2 rounded-full mr-3">
                                                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                                        </div>
                                                        <h3 class="text-lg font-bold text-gray-900">Konfirmasi Hapus</h3>
                                                    </div>
                                                    <p class="mb-6 text-gray-600 text-sm">Tindakan ini tidak bisa dibatalkan. Yakin ingin menghapus <b>{{ $item->name }}</b>?</p>
                                                    <div class="flex justify-end space-x-2">
                                                        <button @click="open = false" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2 px-4 rounded-lg transition duration-150">Batal</button>
                                                        <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150">Ya, Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>