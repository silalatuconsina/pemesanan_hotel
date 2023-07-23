<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/tailus.css">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">
  
    <style>
        body {
            font-family : Urbanist, sans-serif;
            @apply bg-white dark:bg-gray-900
        }

        .navbar-active .hamburger div:first-child {
            @apply rotate-45 translate-y-1.5;
        }
        .navbar-active .hamburger div:last-child {
            @apply -rotate-45 -translate-y-1;
        }
        .navbar-active div:first-child div:first-child div:last-child{
            @apply block lg:flex
        }
    </style>
</head>

<body class="bg-gray-300">
<header>
        <input type="checkbox" name="hbr" id="hbr" class="hbr peer" hidden aria-hidden="true">
        <nav class="fixed z-20 w-full bg-white  backdrop-blur navbar border-b border-gray-100 dark:border-gray-800 peer-checked:navbar-active dark:shadow-none">
            <div class="xl:container m-auto px-6 md:px-12 lg:px-6">
                <div class="flex flex-wrap items-center justify-between gap-6 md:py-3 md:gap-0 lg:py-5">
                    <div class="w-full items-center flex justify-between lg:w-auto">
                        <a class="relative z-10" href="#" aria-label="logo">
                        <h2 class="font-black text-blue-900 text-4xl text-center">HotelQu</h2>
                        </a>
                        <label for="hbr" class="peer-checked:hamburger block relative z-20 p-6 -mr-6 cursor-pointer lg:hidden">
                            <div aria-hidden="true" class="m-auto h-0.5 w-5 rounded bg-gray-900 dark:bg-gray-300 transition duration-300"></div>
                            <div aria-hidden="true" class="m-auto mt-2 h-0.5 w-5 rounded bg-gray-900 dark:bg-gray-300 transition duration-300"></div>
                        </label>
                    </div>
                    <div class="navmenu hidden w-full flex-wrap justify-end items-center mb-16 space-y-8 p-6 border border-gray-100 rounded-3xl shadow-2xl shadow-gray-300/20 bg-white dark:bg-gray-800 lg:space-y-0 lg:p-0 lg:m-0 lg:flex md:flex-nowrap lg:bg-transparent lg:w-7/12 lg:shadow-none dark:shadow-none dark:border-gray-700 lg:border-0">
                        <div class="text-gray-600 dark:text-gray-300 lg:pr-4">
                            <ul class="space-y-6 tracking-wide font-medium text-base lg:text-sm lg:flex lg:space-y-0">
                                <li>
                                    <a href="index.php" class="block md:px-4 transition hover:text-primary dark:hover:text-primaryLight">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                   <a href="kamar.php" class="block md:px-4 transition hover:text-primary dark:hover:text-primaryLight">
                                        <span>Kamar</span>
                                    </a>
                                </li>
                                <li>
                                <a href="list.php" class="block md:px-4 transition hover:text-primary dark:hover:text-primaryLight">
                                        <span>Pesan</span>
                                    </a>
                                </li>
                                <li>
                                <a href="contact.php" class="block md:px-4 transition hover:text-primary dark:hover:text-primaryLight">
                                        <span>Kontak Kami</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="w-full space-y-2 border-primary/10 dark:border-gray-700 flex flex-col -ml-1 sm:flex-row lg:space-y-0 md:w-max lg:border-l">
                        <?php 
                        include('database/koneksi.php');
                            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                            ?>
                            <a href="logout.php" class="relative flex h-9 ml-auto items-center justify-center sm:px-6 before:absolute before:inset-0 before:rounded-full focus:before:bg-sky-600/10 dark:focus:before:bg-sky-400/10 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                                <span class="relative text-sm font-semibold text-primary dark:text-primaryLight">Logout</span>
                            </a>
                            <?php
                            } else {
                            ?>
                            <a href="login.php" class="relative flex h-9 ml-auto items-center justify-center sm:px-6 before:absolute before:inset-0 before:rounded-full focus:before:bg-sky-600/10 dark:focus:before:bg-sky-400/10 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                                <span class="relative text-sm font-semibold text-primary dark:text-primaryLight">Login</span>
                            </a>
                            <?php
                            }
                            ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
  
    <div class="text-gray-900 pt-12 pr-0 pb-14 pl-0 bg-white">
  <div class="w-full pt-4 pr-5 pb-6 pl-5 mt-0 mr-auto mb-0 ml-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16
      max-w-7xl">
    <div class="flex flex-col items-center sm:px-5 md:flex-row">
      <div class="flex flex-col items-start justify-center w-full h-full pt-6 pr-0 pb-6 pl-0 mb-6 md:mb-0 md:w-1/2">
        <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:pr-10 lg:pr-16
            md:space-y-5">
          <a class="text-4xl font-bold leading-none ">Kamar Tersedia.</a>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-12 sm:px-5 gap-x-8 gap-y-16">
        <?php
        include('database/koneksi.php');
        // Tampilkan data kamar
        $sql = "SELECT * FROM Kamar";
        $result = $koneksi->query($sql);
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idkmar = $row['id_kamar'];
            ?>
        <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
        <div class="border border-gray-300 rounded-lg p-4 h-full relative">
            <img src="img-db/<?php echo $row['foto_kamar']; ?>" class="object-cover w-full h-56 mb-2 overflow-hidden rounded-lg shadow-sm mb-4" />
            <p class="bg-green-500 flex items-center justify-center leading-none text-sm font-medium text-gray-50 w-24 h-8 rounded-full uppercase inline-block mb-2">
            Rp. <?= number_format($row['harga_kamar'], 0, "", ".") ?>
            </p>    
            <a class="text-lg font-bold sm:text-xl md:text-2xl mt-2 mb-2"><?php echo $row['jenis_kamar']; ?> </a>
            <p class="text-sm text-black mb-8"><?php echo $row['deskripsi_kamar']; ?></p>
            <?php include('database/koneksi.php');
                            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                            ?>
            <div class="absolute bottom-0 right-0 m-2">
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"onclick="openModal('modal-reservasi-<?php echo $idkmar; ?>')">Reservasi</button>
            </div>
            <?php
            } 
            ?>
        </div>
        </div>

            <!-- Modal Reservasi -->
        <div id="modal-reservasi-<?php echo $idkmar; ?>" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-1/2 mx-auto p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Form Reservasi</h2>
            <form action="database/proses_reservasi.php" method="POST">
            <div class="mb-4">
                <label for="x" class="block mb-2">Nama</label>
                <input type="text" id="x" name="x" value=" <?php $nama = $_SESSION['nama']; echo $nama; ?>"class="w-full border border-gray-300 rounded py-2 px-3" readonly required>
            </div>
            <div class="mb-4">
                <label for="tanggal_checkin" class="block mb-2">Tanggal Checkin  </label>
                <input type="date" id="tanggal_checkin" name="tanggal_checkin" class="w-full border border-gray-300 rounded py-2 px-3" required>
            </div>
            <div class="mb-4">
                <label for="tanggal_checkout" class="block mb-2">Tanggal Checkout</label>
                <input type="date" id="tanggal_checkout" name="tanggal_checkout" class="w-full border border-gray-300 rounded py-2 px-3" required>
            </div>
            <input type="hidden" name="id_kamar1" value="<?php echo  $idkmar; ?>">
            <input type="hidden" name="harga" value="<?php echo $row['harga_kamar']; ?>">
            <input type="hidden" name="id_usser1" value="<?php $iduser = $_SESSION['id_usser']; echo $iduser; ?>">
            <!-- Tambahkan input lainnya sesuai kebutuhan -->
            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2" onclick="closeModal('modal-reservasi-<?php echo $idkmar; ?>')">Cancel</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded ml-2">Submit</button>
            </div>
            </form>
        </div>
        </div>
      

            <?php
        }
        } else {
        echo "Data kamar tidak ditemukan.";
        }

        // Tutup koneksi database
        $koneksi->close();
        ?>

        </div>
    </div>
  </div>
</div>

<script>
  function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('flex');
    modal.classList.remove('hidden');
  }

  function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }
</script>


</body>
</html>