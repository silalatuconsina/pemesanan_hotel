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
          <a href="admin_pesan.php" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">Data Transaksi</a>
          <a href="logout.php" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Selamat Datang</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      <!-- Card 1 -->
      <div class="bg-white p-6 rounded-lg shadow-md">
      <?php
            include('database/koneksi.php');
            $sql = "SELECT COUNT(*) as total_kamar FROM kamar";
            $result = $koneksi->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalKamar = $row['total_kamar'];
            } else {
                $totalKamar = "Tidak ada data kamar.";
            }

            $koneksi->close();
            ?>
        <h2 class="text-xl font-semibold mb-2">Jumlah Kamar</h2>
        <p><?php echo $totalKamar; ?></p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white p-6 rounded-lg shadow-md">
      <?php
            include('database/koneksi.php');
            $sql = "SELECT COUNT(*) as total_pesanan FROM reservasi";
            $result = $koneksi->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalpesanan = $row['total_pesanan'];
            } else {
                $totalpesanan = "Tidak ada data pesanan.";
            }

            $koneksi->close();
            ?>
        <h2 class="text-xl font-semibold mb-2">Kamar yang di pesan</h2>
        <p><?php echo $totalpesanan; ?></p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white p-6 rounded-lg shadow-md">
      <?php
            include('database/koneksi.php');
            $sql = "SELECT COUNT(*) as total_pending FROM reservasi where status = 'pending' " ;
            $result = $koneksi->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalpending = $row['total_pending'];
            } else {
                $totalpending = "Tidak ada data.";
            }

            $koneksi->close();
            ?>
        <h2 class="text-xl font-semibold mb-2">Pesanan Belum dikonfirmasi</h2>
        <p><?php echo $totalpending; ?></p>
      </div>
    </div>
  </div>
</body>
</html>