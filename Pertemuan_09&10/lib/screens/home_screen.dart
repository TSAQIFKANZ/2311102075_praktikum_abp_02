import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:firebase_messaging/firebase_messaging.dart';
import '../providers/todo_provider.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  final TextEditingController _taskController = TextEditingController();

  @override
  void initState() {
    super.initState();
    _setupFCM();
  }

  void _setupFCM() async {
    FirebaseMessaging messaging = FirebaseMessaging.instance;

    // Meminta izin notifikasi (penting untuk iOS / Android 13+)
    await messaging.requestPermission();

    // Dapatkan token untuk testing pengiriman spesifik di Firebase Console
    String? token = await messaging.getToken();
    print("FCM Token Anda: $token"); // Cek terminal untuk copy token ini

    // Listener untuk notifikasi saat aplikasi dibuka (foreground)
    FirebaseMessaging.onMessage.listen((RemoteMessage message) {
      if (message.notification != null) {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
            content: Text('Notifikasi Masuk: ${message.notification?.title} - ${message.notification?.body}'),
            backgroundColor: Colors.green,
            duration: const Duration(seconds: 4),
          ),
        );
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    final todoProvider = Provider.of<TodoProvider>(context);

    return Scaffold(
      appBar: AppBar(
        title: const Text('To-Do List'),
        actions: [
          IconButton(
            icon: const Icon(Icons.delete_sweep, color: Colors.red),
            onPressed: () => todoProvider.clearAllTasks(),
            tooltip: 'Hapus Semua Tugas',
          ),
        ],
      ),
      body: todoProvider.tasks.isEmpty
          ? const Center(child: Text('Belum ada tugas. Tambahkan sekarang!'))
          : ListView.builder(
        itemCount: todoProvider.tasks.length,
        itemBuilder: (context, index) {
          return Card(
            margin: const EdgeInsets.symmetric(horizontal: 10, vertical: 5),
            child: ListTile(
              leading: const Icon(Icons.task_alt, color: Colors.blue),
              title: Text(todoProvider.tasks[index]),
            ),
          );
        },
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () => _showAddTaskDialog(context, todoProvider),
        child: const Icon(Icons.add),
      ),
    );
  }

  void _showAddTaskDialog(BuildContext context, TodoProvider provider) {
    showDialog(
      context: context,
      builder: (context) {
        return AlertDialog(
          title: const Text('Tambah Tugas Baru'),
          content: TextField(
            controller: _taskController,
            decoration: const InputDecoration(hintText: 'Contoh: Mengerjakan Modul 12'),
            autofocus: true,
          ),
          actions: [
            TextButton(
              onPressed: () {
                _taskController.clear();
                Navigator.pop(context);
              },
              child: const Text('Batal'),
            ),
            ElevatedButton(
              onPressed: () {
                provider.addTask(_taskController.text);
                _taskController.clear();
                Navigator.pop(context);
              },
              child: const Text('Simpan'),
            ),
          ],
        );
      },
    );
  }
}