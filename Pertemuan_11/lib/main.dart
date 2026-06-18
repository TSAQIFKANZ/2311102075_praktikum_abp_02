import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';

// 1. MODEL DATA
class Product {
  final String id;
  final String name;
  final double price;
  final IconData icon;

  Product({
    required this.id,
    required this.name,
    required this.price,
    required this.icon,
  });
}

// Model baru untuk menyimpan produk beserta jumlahnya di keranjang
class CartItem {
  final Product product;
  int quantity;

  CartItem({required this.product, this.quantity = 1});
}

// 2. STATE MANAGEMENT (CUBIT)
class CartCubit extends Cubit<List<CartItem>> {
  CartCubit() : super([]);

  // Menambah produk atau menambah quantity jika sudah ada
  void addToCart(Product product) {
    final index = state.indexWhere((item) => item.product.id == product.id);
    if (index >= 0) {
      // Jika sudah ada, tambah quantity
      final newState = List<CartItem>.from(state);
      newState[index].quantity++;
      emit(newState);
    } else {
      // Jika belum ada, masukkan sebagai item baru
      emit([...state, CartItem(product: product, quantity: 1)]);
    }
  }

  // Mengurangi quantity
  void decreaseQuantity(Product product) {
    final index = state.indexWhere((item) => item.product.id == product.id);
    if (index >= 0) {
      final newState = List<CartItem>.from(state);
      if (newState[index].quantity > 1) {
        newState[index].quantity--;
        emit(newState);
      } else {
        // Jika quantity 1 dan dikurangi, hapus dari keranjang
        newState.removeAt(index);
        emit(newState);
      }
    }
  }

  // Menghapus produk sepenuhnya dari keranjang (tombol tong sampah)
  void removeFromCart(Product product) {
    final newState = List<CartItem>.from(state)
      ..removeWhere((item) => item.product.id == product.id);
    emit(newState);
  }

  // Menghitung total seluruh barang (bukan cuma jenis barangnya)
  int get totalItems {
    return state.fold(0, (total, item) => total + item.quantity);
  }

  // Menghitung total harga seluruh barang di keranjang
  double get totalPrice {
    return state.fold(0, (total, item) => total + (item.product.price * item.quantity));
  }
}

// 3. MAIN APP & BLOC PROVIDER
void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return BlocProvider(
      create: (context) => CartCubit(),
      child: MaterialApp(
        title: 'Flutter BLoC Cart',
        theme: ThemeData(
          primarySwatch: Colors.orange,
          scaffoldBackgroundColor: const Color(0xFFF8F9FA),
          useMaterial3: true,
        ),
        home: ProductListScreen(),
        debugShowCheckedModeBanner: false,
      ),
    );
  }
}

// 4. TAMPILAN DAFTAR PRODUK (PRODUCT LIST)
class ProductListScreen extends StatelessWidget {
  ProductListScreen({super.key});

  // Data produk
  final List<Product> products = [
    Product(id: '1', name: 'Laptop', price: 8000000, icon: Icons.laptop_mac),
    Product(id: '2', name: 'Mouse', price: 150000, icon: Icons.mouse),
    Product(id: '3', name: 'Keyboard', price: 300000, icon: Icons.keyboard),
    Product(id: '4', name: 'Headset', price: 450000, icon: Icons.headset_mic),
    Product(id: '5', name: 'Smartwatch', price: 1200000, icon: Icons.watch),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Daftar Produk', style: TextStyle(color: Colors.white, fontWeight: FontWeight.w600)),
        backgroundColor: Colors.orange,
        elevation: 0,
        centerTitle: true,
        actions: [
          IconButton(
            icon: const Icon(Icons.shopping_cart, color: Colors.white),
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => const CartScreen()),
              );
            },
          ),
          Center(
            child: Padding(
              padding: const EdgeInsets.only(right: 16.0),
              child: BlocBuilder<CartCubit, List<CartItem>>(
                builder: (context, cart) {
                  // Menampilkan total quantity barang
                  final total = context.read<CartCubit>().totalItems;
                  return Text(
                    '$total',
                    style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: Colors.white),
                  );
                },
              ),
            ),
          ),
        ],
      ),
      body: ListView.builder(
        padding: const EdgeInsets.all(12),
        itemCount: products.length,
        itemBuilder: (context, index) {
          final product = products[index];
          return Card(
            color: Colors.white,
            elevation: 0,
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(12),
              side: BorderSide(color: Colors.grey.shade200),
            ),
            margin: const EdgeInsets.only(bottom: 12),
            child: Padding(
              padding: const EdgeInsets.symmetric(vertical: 8.0),
              child: ListTile(
                leading: CircleAvatar(
                  backgroundColor: Colors.orange.shade50,
                  child: Icon(product.icon, color: Colors.orange.shade800),
                ),
                title: Text(product.name, style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 15)),
                subtitle: Text('Rp ${product.price.toStringAsFixed(0)}', style: TextStyle(color: Colors.grey.shade600)),
                trailing: BlocBuilder<CartCubit, List<CartItem>>(
                  builder: (context, cart) {
                    // Cek apakah produk ini sudah ada di dalam state keranjang
                    final isInCart = cart.any((item) => item.product.id == product.id);

                    return OutlinedButton(
                      style: OutlinedButton.styleFrom(
                        foregroundColor: isInCart ? Colors.grey : Colors.orange.shade700,
                        side: BorderSide(color: isInCart ? Colors.grey.shade300 : Colors.orange.shade200),
                        backgroundColor: isInCart ? Colors.grey.shade50 : Colors.white,
                        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(20)),
                      ),
                      onPressed: () {
                        context.read<CartCubit>().addToCart(product);
                        if (!isInCart) {
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(
                              content: Text('${product.name} berhasil ditambahkan!'),
                              backgroundColor: Colors.black,
                              duration: const Duration(seconds: 1),
                            ),
                          );
                        }
                      },
                      child: Text(isInCart ? '✔️ditambahkan' : 'Tambah'),
                    );
                  },
                ),
              ),
            ),
          );
        },
      ),
    );
  }
}

// 5. TAMPILAN KERANJANG (CART SCREEN)
class CartScreen extends StatelessWidget {
  const CartScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        // Menggunakan BlocBuilder di title agar jumlah item dinamis
        title: BlocBuilder<CartCubit, List<CartItem>>(
          builder: (context, cart) {
            final total = context.read<CartCubit>().totalItems;
            return Text('Keranjang ($total item)',
                style: const TextStyle(fontWeight: FontWeight.w600));
          },
        ),
        backgroundColor: Colors.orangeAccent,
        foregroundColor: Colors.white,
        elevation: 0,
      ),

      body: BlocBuilder<CartCubit, List<CartItem>>(
        builder: (context, cart) {
          if (cart.isEmpty) {
            return Center(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  // Icon keranjang besar
                  Icon(
                    Icons.shopping_cart_outlined,
                    size: 100,
                    color: Colors.blueGrey.shade200,
                  ),
                  const SizedBox(height: 16),
                  const Text(
                    'Keranjang masih kosong',
                    style: TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.w500,
                      color: Colors.grey,
                    ),
                  ),
                  const SizedBox(height: 8),
                  Text(
                    'Tambahkan produk dari halaman utama',
                    style: TextStyle(color: Colors.grey.shade500),
                  ),
                ],
              ),
            );
          }

          return ListView.builder(
            padding: const EdgeInsets.all(12),
            itemCount: cart.length,
            itemBuilder: (context, index) {
              final cartItem = cart[index];
              final product = cartItem.product;

              return Card(
                color: Colors.white,
                elevation: 0,
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(12),
                  side: BorderSide(color: Colors.grey.shade200),
                ),
                margin: const EdgeInsets.only(bottom: 12),
                child: Padding(
                  padding: const EdgeInsets.all(12.0),
                  child: Row(
                    children: [
                      // Bagian Kiri: Icon + Nama + Harga
                      CircleAvatar(
                        backgroundColor: Colors.blue.shade50,
                        child: Icon(product.icon, color: Colors.orange.shade800),
                      ),
                      const SizedBox(width: 12),
                      Expanded(
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(product.name, style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 15)),
                            const SizedBox(height: 4),
                            Text('Rp ${product.price.toStringAsFixed(0)}', style: TextStyle(color: Colors.grey.shade600)),
                          ],
                        ),
                      ),
                      // Bagian Kanan: Kontrol Minus, Quantity, Plus, dan Delete
                      Row(
                        mainAxisSize: MainAxisSize.min,
                        children: [
                          // Tombol Minus
                          IconButton(
                            icon: const Icon(Icons.remove_circle_outline, color: Colors.orange),
                            onPressed: () => context.read<CartCubit>().decreaseQuantity(product),
                            constraints: const BoxConstraints(),
                            padding: EdgeInsets.zero,
                          ),
                          const SizedBox(width: 8),
                          // Text Quantity
                          Text(
                            '${cartItem.quantity}',
                            style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 16),
                          ),
                          const SizedBox(width: 8),
                          // Tombol Plus
                          IconButton(
                            icon: const Icon(Icons.add_circle_outline, color: Colors.orange),
                            onPressed: () => context.read<CartCubit>().addToCart(product),
                            constraints: const BoxConstraints(),
                            padding: EdgeInsets.zero,
                          ),
                          const SizedBox(width: 8),
                          // Tombol Delete (Hapus Penuh) beserta Notifikasi
                          IconButton(
                            icon: const Icon(Icons.delete_outline, color: Colors.orange),
                            constraints: const BoxConstraints(),
                            padding: EdgeInsets.zero,
                            onPressed: () {
                              context.read<CartCubit>().removeFromCart(product);
                              ScaffoldMessenger.of(context).showSnackBar(
                                SnackBar(
                                  content: Text('${product.name} dihapus dari keranjang!'),
                                  backgroundColor: Colors.black,
                                  duration: const Duration(seconds: 1),
                                ),
                              );
                            },
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
              );
            },
          );
        },
      ),
      // BOTTOM NAVIGATION BAR
      bottomNavigationBar: BlocBuilder<CartCubit, List<CartItem>>(
        builder: (context, cart) {
          if (cart.isEmpty) return const SizedBox.shrink();

          final totalItems = context.read<CartCubit>().totalItems;
          final totalPrice = context.read<CartCubit>().totalPrice;

          return Container(
            padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 12),
            decoration: BoxDecoration(
              color: Colors.white,
              boxShadow: [
                BoxShadow(
                  color: Colors.grey.withOpacity(0.15),
                  spreadRadius: 1,
                  blurRadius: 10,
                  offset: const Offset(0, -3),
                ),
              ],
            ),
            child: SafeArea(
              child: Column(
                mainAxisSize: MainAxisSize.min,
                children: [
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Text(
                        'Total ($totalItems item):',
                        style: TextStyle(fontSize: 14, color: Colors.grey.shade600, fontWeight: FontWeight.w500),
                      ),
                      Text(
                        'Rp ${totalPrice.toStringAsFixed(0)}',
                        style: TextStyle(
                          fontSize: 18,
                          fontWeight: FontWeight.bold,
                          color: Colors.orange.shade700,
                        ),
                      ),
                    ],
                  ),
                  const SizedBox(height: 12),
                  SizedBox(
                    width: double.infinity,
                    child: ElevatedButton(
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Colors.orange.shade600,
                        foregroundColor: Colors.white,
                        padding: const EdgeInsets.symmetric(vertical: 14),
                        shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(8),
                        ),
                        elevation: 0,
                      ),
                      onPressed: () {
                        ScaffoldMessenger.of(context).showSnackBar(
                          const SnackBar(content: Text('Memproses Checkout...')),
                        );
                      },
                      child: const Text(
                        'Checkout',
                        style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                      ),
                    ),
                  ),
                ],
              ),
            ),
          );
        },
      ),
    );
  }
}