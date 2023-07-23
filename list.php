<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
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

<body class="bg-white">
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
    
    <?php 
          include('database/koneksi.php');
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
              ?>
 <!-- component -->
 <div class="flex pt-20 h-screen bg-white">
  <div class="flex-1 flex flex-col overflow-hidden mt-6">
     <!-- #region -->
    <div class="flex h-full">
      <nav class="flex w-72 h-full">
        <div class="w-full flex mx-auto px-6 py-8">
          <div class="w-full h-full "></div>
        </div>
      </nav>
      
      <main class="flex flex-col w-full bg-white overflow-x-hidden overflow-y-auto mb-14  border-4 border-gray-300">
        <div class="flex w-full mx-auto px-6 py-8">
          <div class="flex flex-col w-full h-full text-gray-900 text-xl justify-start ">
          <h1 class="mb-10 text-center text-2xl font-bold">Detail Pesan</h1>
          <?php
        include('database/koneksi.php');
         $iduser = $_SESSION['id_usser'];
        // Tampilkan data kamar
        $sql = "SELECT reservasi.id_reservasi, reservasi.id_kamar, reservasi.id_usser, reservasi.tanggal, 
        reservasi.tanggal_checkout, reservasi.harga, reservasi.status, usser.nama, usser.email, 
        kamar.foto_kamar, kamar.jenis_kamar, kamar.deskripsi_kamar
        FROM reservasi
        JOIN usser ON reservasi.id_usser = usser.id_usser
        JOIN kamar ON reservasi.id_kamar = kamar.id_kamar
        WHERE reservasi.id_usser =  $iduser;";

        $result = $koneksi->query($sql);
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>                
         <div class="box-border h-auto w-full p-4 border-4 mt-5">
            <div class="flex">
                <div class="w-1/3 pr-4">
                <img src="img-db/<?php echo $row['foto_kamar']; ?>" class="object-cover w-full h-56 mb-2 overflow-hidden rounded-lg shadow-sm mb-4" />
                </div>
                <div class="w-2/3">
                <h2 class="text-5xl font-bold mt-2 mb-2"><?php echo $row['jenis_kamar']; ?></h2>
                <p class="text-2xl ext-gray-500 mb-8"><?php echo $row['deskripsi_kamar']; ?></p>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-xl font-bold text-gray-500">Reservasi ID: <?php echo $row['id_reservasi']; ?></p>
                <p class="text-xl font-bold text-gray-500">Tanggal Checkin: <?php echo $row['tanggal']; ?></p>
                <p class="text-xl font-bold text-gray-500">Tanggal Checkout: <?php echo $row['tanggal_checkout']; ?></p>
                <p class="text-xl font-bold text-gray-500">Status: <?php echo $row['status']; ?></p>
            </div>
                <div class="mt-4 flex justify-end">
                    <form action="database/hapus_reservasi.php" method="post">
                    <input type="hidden" name="reservasi_id" value="<?php echo $row['id_reservasi']; ?>">
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Batalkan</button>
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
      </main>

      <nav class="flex w-1/2 h-full ">
        <div class="w-full flex mx-auto px-6 py-8">
        </div>
      </nav>

    </div>
  </div>
</div>

<?php
        } 
        else 
        {?>
              
              <!-- component -->
<div class="w-screen h-screen flex justify-center items-center">
  <div class="container mx-auto max-w-sm w-full p-4 sm:w-1/2">
    <div class="card flex flex-col justify-center p-10 bg-white rounded-lg shadow-2xl">
      <div class="prod-title">
        <p class="text-2xl uppercase text-gray-900 font-bold">Anda Belum Login</p>
        <p class="uppercase text-sm text-gray-400">
          Login untuk melihat pesanan
        </p>
      </div>
    </div>
  </div>
</div>


        <?php
        }
        ?>

<style>
::-webkit-scrollbar {
  width: 5px;
  height: 5px;
}
::-webkit-scrollbar-thumb {
  background: linear-gradient(13deg, #7bcfeb 14%, #e685d3 64%);
  border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(13deg, #c7ceff 14%, #f9d4ff 64%);
}
::-webkit-scrollbar-track {
  background: #ffffff;
  border-radius: 10px;
  box-shadow: inset 7px 10px 12px #f0f0f0;
}
</style>

</body>
</html>