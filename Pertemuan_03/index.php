<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penilaian Mahasiswa</title>
    <style>
        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;  
            gap: 20px;                
            margin-bottom: 20px;
        }

        .title-container {
            text-align: center;
        }

        .title-container h2 {
            margin-top: 0;
            margin-bottom: 7px;
        }
        
        .title-container h3 {
            margin: 0;
        }

        .logo {
            width: 80px;
            height: auto;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 7px;
        }
        h3 {
            margin-top: 0;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f70707;
            color: white;
        }

        tfoot td {
            font-weight: bold;
            background: #eeeeee;
        }
        
    </style>
</head>

<body>

<div class="header-container">
        
        <img src="https://lac.telkomuniversity.ac.id/wp-content/uploads/2021/01/cropped-1200px-Telkom_University_Logo.svg.png" alt="Logo" class="logo">
        
        <div class="title-container">
            <h2>Sistem Penilaian Mahasiswa Kelas 2 Informatika</h2> 
            <h3>Telkom University Purwokerto</h3>
        </div>
        
        </div>

    <?php
// Data mahasiswa dalam array asosiatif
$mahasiswa = [
    [
        "nama" => "Tsaqif Kanz Ahmad",
        "nim" => "2311102075",
        "tugas" => 95,
        "uts" => 80,
        "uas" => 90
    ],
    [
        "nama" => "Siti Aisyah",
        "nim" => "2310110121",
        "tugas" => 90,
        "uts" => 78,
        "uas" => 85
    ],
    [
        "nama" => "Budi Santoso",
        "nim" => "2310110352",
        "tugas" => 70,
        "uts" => 75,
        "uas" => 78
    ],
    [
        "nama" => "Aini Zaenab",
        "nim" => "2310110463",
        "tugas" => 50,
        "uts" => 45,
        "uas" => 40
    ],
    [
        "nama" => "Zhaffar Thariq",
        "nim" => "2310110794",
        "tugas" => 60,
        "uts" => 65,
        "uas" => 58
    ],
];

// Function menghitung nilai akhir
function hitungNilaiAkhir($tugas, $uts, $uas) {
    return ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
}

// Function menentukan grade
function tentukanGrade($nilaiAkhir) {
    if ($nilaiAkhir >= 85) {
        return "A";
    } elseif ($nilaiAkhir >= 75) {
        return "B";
    } elseif ($nilaiAkhir >= 65) {
        return "C";
    } elseif ($nilaiAkhir >= 50) {
        return "D";
    } else {
        return "E";
    }
}

// Function menentukan status lulus/tidak
function tentukanStatus($nilaiAkhir) {
    if ($nilaiAkhir >= 60) {
        return "Lulus";
    } else {
        return "Tidak Lulus";
    }
}

$totalNilai = 0;
$nilaiTertinggi = 0;
$namaTertinggi = "";

echo "<table>";
echo "<thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
            <th>Status</th>
        </tr>
      </thead>";
echo "<tbody>";

foreach ($mahasiswa as $index => $mhs) {
    $nilaiAkhir = hitungNilaiAkhir($mhs["tugas"], $mhs["uts"], $mhs["uas"]);
    $grade = tentukanGrade($nilaiAkhir);
    $status = tentukanStatus($nilaiAkhir);

    $totalNilai += $nilaiAkhir;

    if ($nilaiAkhir > $nilaiTertinggi) {
        $nilaiTertinggi = $nilaiAkhir;
        $namaTertinggi = $mhs["nama"];
    }

    echo "<tr>
            <td>" . ($index + 1) . "</td>
            <td>" . $mhs["nama"] . "</td>
            <td>" . $mhs["nim"] . "</td>
            <td>" . number_format($nilaiAkhir, 2) . "</td>
            <td>" . $grade . "</td>
            <td>" . $status . "</td>
          </tr>";
}

//nilai rata-rata
$rataRata = $totalNilai / count($mahasiswa);

echo "</tbody>";
echo "<tfoot>
        <tr>
            <td colspan='3'>Rata-rata Kelas</td>
            <td colspan='3'>" . number_format($rataRata, 2) . "</td>
        </tr>
        <tr>
            <td colspan='3'>Nilai Tertinggi</td>
            <td colspan='3'>" . $namaTertinggi . " (" . number_format($nilaiTertinggi, 2) . ")</td>
        </tr>
      </tfoot>";
echo "</table>";
?>


</body>

</html>