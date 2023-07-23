<?php
session_start();



// Koneksi ke database
include('database/koneksi.php');
// Verifikasi login
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM usser WHERE email = '$email' AND password = '$password'";
  $result = $koneksi->query($sql);

  if ($result->num_rows === 1) {
    // Login berhasil, set session dan redirect ke halaman dashboard
    $row = $result->fetch_assoc();
    $_SESSION['logged_in'] = true;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['id_usser'] = $row['id_usser'];
   // Periksa apakah pengguna adalah admin
   if ($row['peran'] === 'admin') {
    header('Location: admin.php');
  } else {
    header('Location: index.php');
  }
    exit;
  } else {
    // Login gagal, tampilkan pesan error
    $error = "Email atau password tidak valid.";
  }
}

// Tutup koneksi database
$koneksi->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="flex items-center justify-center h-screen">
    <div class="w-1/4 p-6 bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6">Login</h2>

      <?php if (isset($error)) { ?>
        <p class="text-red-500 mb-4"><?php echo $error; ?></p>
      <?php } ?>

      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="mb-4">
          <label for="email" class="block mb-2">Email</label>
          <input type="text" id="email" name="email" class="w-full border border-gray-300 rounded py-2 px-3" required>
        </div>

        <div class="mb-4">
          <label for="password" class="block mb-2">Password</label>
          <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded py-2 px-3" required>
        </div>
            <a href="register.php">
            <p class="text-blue-500 mb-4">Belum punya akun?</p>
            </a>

        <button type="submit" name="login" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
