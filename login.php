<?php
session_start(); // Memulai session

// URL file JSON di GitHub
$github_url = "https://raw.githubusercontent.com/username/repo/main/users.json";

// Ambil data dari GitHub
$json = file_get_contents($github_url);
$users = json_decode($json, true);

// Ambil input login
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah user ada dan password sesuai
$found = false;
foreach ($users as $user) {
    if ($user['username'] === $username && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username; // Set session login
        $found = true;
        break;
    }
}

if ($found) {
    echo "✅ Login berhasil, selamat datang $username!";
    // Redirect ke halaman dashboard atau home
    header("Location: dashboard.php");
} else {
    echo "❌ Login gagal! Username atau password salah.";
}
?>
