<?php
header('Content-Type: application/json');

$data = [
    'nama' => 'Tsaqif Kanz Ahmad',
    'pekerjaan' => 'Mahasiswa Informatika',
    'lokasi' => 'Purwokerto'
];

echo json_encode($data);
?>