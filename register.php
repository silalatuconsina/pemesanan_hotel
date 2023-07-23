<?php
session_start();
include('database/koneksi.php');
// Cek apakah pengguna sudah login, jika iya, redirect ke halaman lain
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
  header('Location: index.php');
  exit;
}



// Proses registrasi
if (isset($_POST['register'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Periksa apakah email sudah terdaftar sebelumnya
  $checkEmail = "SELECT * FROM usser WHERE email = '$email'";
  $resultEmail = $koneksi->query($checkEmail);

  if ($resultEmail->num_rows > 0) {
    $error = "Email sudah terdaftar.";
  } else {
    // Tambahkan pengguna baru ke database
    $sql = "INSERT INTO usser (nama, email, password) VALUES ('$nama', '$email', '$password')";
    if ($koneksi->query($sql) === true) {
      // Registrasi berhasil, set session dan redirect ke halaman dashboard
      header('Location: login.php');
      exit;
    } else {
      $error = "Terjadi kesalahan. Silakan coba lagi.";
    }
  }
}

// Tutup koneksi database
$koneksi->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="flex items-center justify-center h-screen">
    <div class="w-1/4 p-6 bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6">Register</h2>

      <?php if (isset($error)) { ?>
        <p class="text-red-500 mb-4"><?php echo $error; ?></p>
      <?php } ?>

      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="mb-4">
          <label for="nama" class="block mb-2">Nama</label>
          <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded py-2 px-3" required>
        </div>

        <div class="mb-4">
          <label for="email" class="block mb-2">Email</label>
          <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded py-2 px-3" required>
        </div>

        <div class="mb-4">
          <label for="password" class="block mb-2">Password</label>
          <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded py-2 px-3" required>
        </div>

        <button type="submit" name="register" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Register</button>
      </form>
    </div>
  </div>
</body>
</html>
