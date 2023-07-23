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

<!-- component -->
<section class="container px-4 mx-auto pt-20">
    <div class="flex flex-col">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    ID Resevasi
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Checkin
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                   Checkout
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Customer
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Kamar
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Price
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Status
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                         <?php
                          include('database/koneksi.php');
                          // Tampilkan data kamar
                          $sql = "SELECT reservasi.id_reservasi, reservasi.id_kamar, reservasi.id_usser, reservasi.tanggal, 
                          reservasi.tanggal_checkout, reservasi.harga, reservasi.status, usser.nama, usser.email, 
                          kamar.foto_kamar, kamar.jenis_kamar, kamar.deskripsi_kamar
                          FROM reservasi
                          JOIN usser ON reservasi.id_usser = usser.id_usser
                          JOIN kamar ON reservasi.id_kamar = kamar.id_kamar";

                          $result = $koneksi->query($sql);
                          if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              ?>                

                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['id_reservasi']; ?></td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['tanggal']; ?></td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['tanggal_checkout']; ?></td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                    <div class="flex items-center gap-x-2">
                                        <div>
                                            <h2 class="text-sm font-medium text-gray-800 dark:text-white "><?php echo $row['nama']; ?></h2>
                                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400"><?php echo $row['email']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['jenis_kamar']; ?></td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">Rp. <?= number_format($row['harga'], 0, "", ".") ?></td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['status']; ?></td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-x-6">
                                            <form action="database/status.php" method="post">
                                            <input type="hidden" name="reservasi_id" value="<?php echo $row['id_reservasi']; ?>">
                                            <button  type="submit" class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                                Konfirmasi
                                            </button>
                                            </form>
                                           <form action="database/status_2.php" method="post">
                                          <input type="hidden" name="reservasi_id" value="<?php echo $row['id_reservasi']; ?>">
                                          <button  type="submit" class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                              Batalkan
                                            </button>
                                            </form>   
                                            <form action="database/hapus_reservasi_admin.php" method="post">
                                            <input type="hidden" name="reservasi_id" value="<?php echo $row['id_reservasi']; ?>">
                                            <button  type="submit" class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                                Hapus
                                            </button>
                                            </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                              }
                              } else {
                              echo "Data kamar tidak ditemukan.";
                              }

                              // Tutup koneksi database
                              $koneksi->close();
                              ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

  
</section>






</body>

</html>