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
                                <li>
                                <a href="team.php" class="block md:px-4 transition hover:text-primary dark:hover:text-primaryLight">
                                        <span>Team</span>
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
  <div class="w-full pt-4 pr-3 pb-6 pl-3 mt-0 mr-auto mb-0 ml-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16
      max-w-7xl">
    <div class="flex flex-col items-center sm:px-3 md:flex-row">
      <div class="flex flex-col items-start justify-center w-full h-full pt-6 pr-0 pb-6 pl-0 mb-6 md:mb-0 md:w-1/2">
        <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:pr-10 lg:pr-16
            md:space-y-3">
            <a class="text-4xl font-bold leading-none ">Kontak Kami</a>
        </div>
      </div>
    </div>
  
<body class="bg-gray-100">
 
  <form action="" method="POST" enctype="multipart/form-data" class="max-w-sm">
    <div class="mb-4">
      <label for="nama_anda" class="block font-semibold mb-2">Nama Anda</label>
      <input type="text" id="nama_anda" name="nama_anda" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-550">
    </div>
    <div class="mb-4">
      <label for="email" class="block font-semibold mb-2">Email*</label>
      <input type="text" id="email" name="email" class="w-full px-4 py-2 border border-gray-30 rounded focus:outline-none focus:border-indigo-500">
    </div>
    <div class="mb-4">
      <label for="pesan" class="block font-semibold mb-2">Pesan*</label>
      <textarea id="pesan" name="pesan" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500"></textarea>
    </div>
    <div>
      <button type="submit" name="submit" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Submit</button>
    </div>
  </form>
</div>

</body>
</html>
