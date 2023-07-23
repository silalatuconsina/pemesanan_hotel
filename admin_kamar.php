<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HotelQu</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
  <!-- Navbar -->
  <nav class="bg-gray-800 py-4">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between">
        <a href="#" class="text-xl font-semibold text-white">HotelQu</a>
        <div>
          <a href="admin.php" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">Beranda</a>
          <a href="admin_kamar.php" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">Data Kamar</a>
          <a href="admin_pesan.php" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">Data Trankasi</a>
          <a href="logout.php" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  
<body class="bg-gray-100">

  <div class="container mx-auto p-4 ">
    <h1 class="text-2xl font-bold mb-4">Form Upload Data Kamar</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="max-w-sm">
      <div class="mb-4">
        <label for="jenis_kamar" class="block font-semibold mb-2">Jenis Kamar</label>
        <input type="text" id="jenis_kamar" name="jenis_kamar" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
      </div>
      <div class="mb-4">
        <label for="deskripsi_kamar" class="block font-semibold mb-2">Deskripsi Kamar</label>
        <textarea id="deskripsi_kamar" name="deskripsi_kamar" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500"></textarea>
      </div>
      <div class="mb-4">
        <label for="harga_kamar" class="block font-semibold mb-2">Harga Kamar</label>
        <input type="number" id="harga_kamar" name="harga_kamar" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
      </div>
      <div class="mb-4">
        <label for="tersedia" class="block font-semibold mb-2">Tersedia</label>
        <input type="checkbox" id="tersedia" name="tersedia" class="mr-2">
        <label for="tersedia">Ya</label>
      </div>
      <div class="mb-4">
        <label for="foto_kamar" class="block font-semibold mb-2">Foto Kamar</label>
        <input type="file" id="foto_kamar" name="foto_kamar" class="w-full">
      </div>
      <div>
        <button type="submit" name="submit" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Submit</button>
      </div>
    </form>

    <?php
    include('database/koneksi.php');
 // Ambil nilai form
$jenis_kamar = $_POST['jenis_kamar'];
$deskripsi_kamar = $_POST['deskripsi_kamar'];
$harga_kamar = $_POST['harga_kamar'];
$tersedia = isset($_POST['tersedia']) ? 1 : 0;
error_reporting(0);
// Direktori tempat penyimpanan foto
$targetDir = 'img-db/';

// Nama file foto
$fotoKamar = basename($_FILES['foto_kamar']['name']);
$targetPath = $targetDir . $fotoKamar;

// Pindahkan file foto ke direktori tujuan
if (move_uploaded_file($_FILES['foto_kamar']['tmp_name'], $targetPath)) {
 
  // Query untuk memasukkan data kamar ke dalam tabel
  $sql = "INSERT INTO kamar (jenis_kamar, deskripsi_kamar, harga_kamar, tersedia, foto_kamar) VALUES ('$jenis_kamar', '$deskripsi_kamar', '$harga_kamar', $tersedia, '$fotoKamar')";
  
  if ($koneksi->query($sql) === TRUE) {
    // Tampilkan pesan sukses
    echo '<p class="text-green-600">Data kamar berhasil diupload!</p>';
  } else {
    // Tampilkan pesan error jika gagal menyimpan data ke database
    echo '<p class="text-red-600">Terjadi kesalahan saat menyimpan data kamar.</p>';
  }
  
  // Tutup koneksi database
  $koneksi->close();
} else {
  // Tampilkan pesan error jika gagal upload foto
  echo '<p class="text-red-600">Terjadi kesalahan saat mengupload foto kamar.</p>';
}
    ?>
  </div>

  <div class="container mx-auto p-4 ">
    <h1 class="text-2xl font-bold mb-4">Form Hapus Data Kamar</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="max-w-sm">
      <div class="mb-4">
        <label for="namakamar" class="block font-semibold mb-2">nama Kamar</label>
        <input type="text" id="namakamar" name="namakamar" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
      </div>
      <div>
        <button type="submit" name="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
      </div>
    </form>
    <?php
    include('database/koneksi.php');
 // Ambil nilai form
$namakamar = $_POST['namakamar'];
  // Query untuk memasukkan data kamar ke dalam tabel
  $sql2 = "DELETE FROM kamar WHERE jenis_kamar = '$namakamar'";
 
  if ($koneksi->query($sql2) === TRUE) {
    // Tampilkan pesan sukses
    echo '<p class="text-green-600">Data kamar berhasil dihapus!</p>';
  } else {
    // Tampilkan pesan error jika gagal menyimpan data ke database
    echo '<p class="text-red-600">Terjadi kesalahan saat menghapus data kamar.</p>';
  }
  
  // Tutup koneksi database
  $koneksi->close();

    ?>
  </div>

</body>
</html>

