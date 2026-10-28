<?php
// ============================================
// DATA TOKO (sementara disimpan di array)
// Pada Pertemuan 7, data ini akan dipindah ke database MySQL.
// ============================================

$namaToko = "Toko Senjata Traveler";

// Array multidimensi: kode produk => data produk (array asosiatif)
$produk = [
    "P001" => [
        "nama"     => "Conqueror's Sword",
        "kategori" => "Pedang",
        "harga"    => 15750000,
        "diskon"   => 10,          // dalam persen
        "stok"     => 2,
        "ikon"     => "⚔️",
    ],
    "P002" => [
        "nama"     => "Dancer's Blade",
        "kategori" => "Dagger",
        "harga"    => 7850000,
        "diskon"   => 0,
        "stok"     => 4,
        "ikon"     => "🗡️",
    ],
    "P003" => [
        "nama"     => "Hunter's Bow",
        "kategori" => "Busur",
        "harga"    => 9765000,
        "diskon"   => 15,
        "stok"     => 10,
        "ikon"     => "🏹",
    ],
    "P004" => [
        "nama"     => "Butcher Knife",
        "kategori" => "Pisau",
        "harga"    => 475000,
        "diskon"   => 5,
        "stok"     => 20,
        "ikon"     => "🔪",
    ],
    "P005" => [
        "nama"     => "Battle-Tested Shield",
        "kategori" => "Perisai",
        "harga"    => 12425000,
        "diskon"   => 0,
        "stok"     => 5,
        "ikon"     => "🛡️",
    ],
    "P006" => [
        "nama"     => "Blooded saw",
        "kategori" => "Gergaji",
        "harga"    => 975000,
        "diskon"   => 10,
        "stok"     => 11,
        "ikon"     => "🪚",
    ],
];

// Contoh pesanan pelanggan: kode produk => jumlah yang dibeli
$pesanan = [
    "P001" => 1,
    "P002" => 2,
    "P003" => 5,
    "P005" => 2,
    "P006" => 7,
];