<?php
// Ganti dengan URL mentah file JSON GitHub kamu
$github_url = "https://raw.githubusercontent.com/username/repo/main/users.json";

// Ambil data dari GitHub
$json = file_get_contents($github_url);
$users = json_decode($json, true);

// Ambil input login
$username = $_POST['username'];
$password = $_POST['password'];

// Cek kecocokan user
$found = false;
foreach ($users as $user) {
    if ($user['username'] === $username && $user['password'] === $password) {
        $found = true;
        break;
    }
}

if ($found) {
    echo "✅ Login berhasil, selamat datang $username!";
} else {
    echo "❌ Login gagal! Username atau password salah.";
}
?>
