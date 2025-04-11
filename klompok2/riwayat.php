<?php
// KONEKSI
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sampahberkah";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) die("Koneksi gagal: " . mysqli_connect_error());

// VARIABEL UNTUK EDIT
$editMode = false;
$editData = [
    'id' => '',
    'warga' => '',
    'mitra' => '',
    'jenis_sampah' => '',
    'poin' => '',
    'tanggal' => ''
];

// HANDLE EDIT MODE (ISI FORM)
if (isset($_GET['edit'])) {
    $editMode = true;
    $id = (int) $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM riwayat WHERE id = $id");
    $editData = mysqli_fetch_assoc($result);
}

// HANDLE SUBMIT FORM (TAMBAH ATAU UPDATE)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warga = mysqli_real_escape_string($conn, $_POST['warga']);
    $mitra = mysqli_real_escape_string($conn, $_POST['mitra']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $poin = (int) $_POST['poin'];
    $tanggal = $_POST['tanggal'];

    if (isset($_POST['id']) && $_POST['id'] !== '') {
        // UPDATE
        $id = (int) $_POST['id'];
        $query = "UPDATE riwayat SET 
                    warga = '$warga',
                    mitra = '$mitra',
                    jenis_sampah = '$jenis',
                    poin = $poin,
                    tanggal = '$tanggal'
                  WHERE id = $id";
    } else {
        // TAMBAH
        $query = "INSERT INTO riwayat (warga, mitra, jenis_sampah, poin, tanggal) 
                  VALUES ('$warga', '$mitra', '$jenis', $poin, '$tanggal')";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: riwayat.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}

// HANDLE HAPUS
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    $query = "DELETE FROM riwayat WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: riwayat.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat - Sampah Berkah</title>
    <link rel="stylesheet" href="riwayat.css">
</head>
<body>
    <header>
        <div class="navbar">
            <a href="landing.php" class="logo">Sampah <span>Berkah</span></a>
            <nav>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="riwayat.php" class="active">Riwayat</a></li>
                    <li><a href="layanan.html">Layanan</a></li>
                    <li><a href="#">Keuntungan</a></li>
                    <li><a href="#">Panduan</a></li>
                    <li><a href="#">Lokasi</a></li>
                    <li><a href="#">Kontak Kami</a></li>
                </ul>
            </nav>
            <a href="#" class="btn-masuk">Masuk</a>
        </div>
    </header>

    <section class="riwayat">
        <h2>Riwayat Penukaran Sampah</h2>
        <div class="form-tambah">
            <h3><?= $editMode ? 'Edit Data' : 'Tambah Data' ?></h3>
            <form method="POST" action="riwayat.php">
                <?php if ($editMode): ?>
                    <input type="hidden" name="id" value="<?= $editData['id'] ?>">
                <?php endif; ?>
                <input type="text" name="warga" placeholder="Nama Warga" required value="<?= $editData['warga'] ?>">
                <input type="text" name="mitra" placeholder="Nama Mitra" required value="<?= $editData['mitra'] ?>">
                <input type="text" name="jenis" placeholder="Jenis Sampah" required value="<?= $editData['jenis_sampah'] ?>">
                <input type="number" name="poin" placeholder="Poin" required value="<?= $editData['poin'] ?>">
                <input type="date" name="tanggal" required value="<?= $editData['tanggal'] ?>">
                <button type="submit"><?= $editMode ? 'Update' : 'Tambah' ?></button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Warga</th>
                    <th>Mitra</th>
                    <th>Jenis Sampah</th>
                    <th>Poin</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM riwayat ORDER BY id DESC");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $tanggal = date("d M", strtotime($row['tanggal']));
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['warga']}</td>
                            <td>{$row['mitra']}</td>
                            <td>{$row['jenis_sampah']}</td>
                            <td>{$row['poin']}</td>
                            <td>{$tanggal}</td>
                            <td>
                                <a href='riwayat.php?edit={$row['id']}' class='edit-btn'>Edit</a>
                                <a href='riwayat.php?hapus={$row['id']}' class='hapus-btn' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>