import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Praktikum Flutter',
      theme: ThemeData(
        useMaterial3: true,
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.blue),
      ),
      home: const DemoPage(),
    );
  }
}

class DemoPage extends StatelessWidget {
  const DemoPage({super.key});

  // Array untuk data ListView.builder
  final List<String> builderItems = const [
    'Data 1', 'Data 2', 'Data 3', 'Data 4', 'Data 5',
  ];

  // Array untuk data ListView.separated
  final List<String> separatedItems = const [
    'Satu', 'Dua', 'Tiga', 'Empat',
  ];

  // Widget custom untuk judul setiap bagian agar seragam
  Widget sectionTitle(String title) {
    return Padding(
      padding: const EdgeInsets.only(top: 16, bottom: 8),
      child: Text(
        title,
        style: const TextStyle(
          fontSize: 18,
          fontWeight: FontWeight.bold,
        ),
      ),
    );
  }

  // Widget custom untuk membungkus setiap tugas menjadi bentuk Card berbayang
  Widget demoCard({required Widget child, EdgeInsetsGeometry? padding}) {
    return Container(
      width: double.infinity,
      padding: padding ?? const EdgeInsets.all(12),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(16),
        border: Border.all(color: Colors.blue.shade100),
        boxShadow: const [
          BoxShadow(
            blurRadius: 8,
            offset: Offset(0, 3),
            color: Colors.black12,
          ),
        ],
      ),
      child: child,
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Widget UI', style: TextStyle(color: Colors.white)),
        backgroundColor: Colors.blueAccent,
      ),

      body: ListView(
        padding: const EdgeInsets.all(16),
        children: [

          // 1. CONTAINER: wadah serbaguna untuk mengatur tata letak seperti border radius.
          sectionTitle('1. Container'),
          demoCard(
            child: Container(
              height: 100,
              alignment: Alignment.center,
              decoration: BoxDecoration(
                color: Colors.orangeAccent,
                borderRadius: BorderRadius.circular(12),
              ),
              child: const Text(
                'Container box',
                style: TextStyle(
                  fontSize: 18,
                  fontWeight: FontWeight.bold,
                  color: Colors.white,
                ),
              ),
            ),
          ),

          // 2. GRIDVIEW: menampilkan deretan kotak dalam bentuk grid 2 dimensi secara dinamis.
          sectionTitle('2. GridView (6 item)'),
          demoCard(
            child: SizedBox(
              height: 220,
              child: GridView.builder(
                itemCount: 6,
                gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
                  crossAxisCount: 3, // Diatur menjadi 3 kolom fix
                  crossAxisSpacing: 10,
                  mainAxisSpacing: 10,
                  childAspectRatio: 1,
                ),
                itemBuilder: (context, index) {
                  final itemNumber = index + 1;
                  return Container(
                    decoration: BoxDecoration(
                      color: Colors.blue.shade200,
                      borderRadius: BorderRadius.circular(12),
                    ),
                    child: Center(
                      child: Text(
                        'Item $itemNumber',
                        style: const TextStyle(
                          fontWeight: FontWeight.bold,
                          color: Colors.black87,
                        ),
                      ),
                    ),
                  );
                },
              ),
            ),
          ),

          // 3. LISTVIEW (Statis): Menampilkan daftar secara berurut ke bawah.
          sectionTitle('3. ListView (A, B, C)'),
          demoCard(
            child: SizedBox(
              height: 180,
              child: ListView(
                children: const [
                  ListTile(
                    leading: Icon(Icons.person, color: Colors.blue),
                    title: Text('Item A'),
                    trailing: Icon(Icons.chevron_right, color: Colors.grey),
                  ),
                  ListTile(
                    leading: Icon(Icons.person, color: Colors.blue),
                    title: Text('Item B'),
                    trailing: Icon(Icons.chevron_right, color: Colors.grey),
                  ),
                  ListTile(
                    leading: Icon(Icons.person, color: Colors.blue),
                    title: Text('Item C'),
                    trailing: Icon(Icons.chevron_right, color: Colors.grey),
                  ),
                ],
              ),
            ),
          ),

          // 4. LISTVIEW.BUILDER: Membangun daftar item secara dinamis dari array.
          sectionTitle('4. ListView.builder'),
          demoCard(
            child: SizedBox(
              height: 170,
              child: ListView.builder(
                itemCount: builderItems.length,
                itemBuilder: (context, index) {
                  return ListTile(
                    leading: const Icon(Icons.star, color: Colors.amber),
                    title: Text(builderItems[index]),
                    trailing: const Icon(Icons.chevron_right, color: Colors.grey),
                  );
                },
              ),
            ),
          ),

          // 5. LISTVIEW.SEPARATED: Sama seperti builder, namun dilengkapi dengan garis pembatas.
          sectionTitle('5. ListView.separated'),
          demoCard(
            child: SizedBox(
              height: 220,
              child: ListView.separated(
                itemCount: separatedItems.length,
                itemBuilder: (context, index) {
                  return ListTile(
                    leading: const Icon(Icons.label, color: Colors.teal),
                    title: Text(separatedItems[index]),
                    trailing: const Icon(Icons.chevron_right, color: Colors.grey),
                  );
                },
                separatorBuilder: (context, index) {
                  return const Divider(height: 1, color: Colors.black12); // Garis pembatas
                },
              ),
            ),
          ),

          // 6. STACK: menempatkan beberapa widget secara bertumpuk dalam satu koordinat yang sama.
          sectionTitle('6. Stack'),
          demoCard(
            child: SizedBox(
              height: 200,
              child: Stack(
                alignment: Alignment.center, // Semua kotak diratakan di tengah
                children: [
                  Container(width: 150, height: 150, color: Colors.blueGrey), // Paling bawah
                  Container(width: 100, height: 100, color: Colors.amber),    // Tengah
                  Container(width: 50, height: 50, color: Colors.redAccent), // Paling atas
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}