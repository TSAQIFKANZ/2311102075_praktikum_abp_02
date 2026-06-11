import 'package:flutter/material.dart';

class TodoProvider extends ChangeNotifier {
  final List<String> _tasks = [];

  List<String> get tasks => _tasks;

  void addTask(String task) {
    if (task.trim().isNotEmpty) {
      _tasks.add(task);
      notifyListeners(); // Memperbarui UI
    }
  }

  void clearAllTasks() {
    _tasks.clear();
    notifyListeners(); // Memperbarui UI
  }
}