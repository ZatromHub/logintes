<?php
// Ambil input dari form registrasi
$username = $_POST['username'];
$password = $_POST['password'];

// Hash password menggunakan password_hash()
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Baca file users.json
$json_file = 'https://raw.githubusercontent.com/username/repo/main/users.json';
$json = file_get_contents($json_file);
$users = json_decode($json, true);

// Periksa apakah username sudah ada
foreach ($users as $user) {
    if ($user['username'] === $username) {
        echo "❌ Username sudah terdaftar.";
        exit;
    }
}

// Tambahkan user baru
$users[] = ['username' => $username, 'password' => $hashed_password];

// Simpan kembali data ke file JSON
file_put_contents($json_file, json_encode($users, JSON_PRETTY_PRINT));

echo "✅ Pengguna berhasil didaftarkan!";
?>
