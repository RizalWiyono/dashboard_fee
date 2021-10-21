<?php
$host = 'localhost'; // Nama hostnya
$username = 'zzruqnfajp'; // Username
$password = '3bXXD6Hn7M'; // Password (Isi jika menggunakan password)
$database = 'zzruqnfajp'; // Nama databasenya
// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
