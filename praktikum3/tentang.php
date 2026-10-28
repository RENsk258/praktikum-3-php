<?php
// ============================================
// HALAMAN TENTANG TOKO
// ============================================
require_once __DIR__ . '/include/data.php';
require_once __DIR__ . '/include/fungsi.php';

$judulHalaman = "Tentang Toko";
$halamanAktif = "tentang.php";

$profilToko = [
    "alamat"   => "Void Realm",
    "jam_buka" => "Buka kapanpun anda punya uang",
    "layanan"  => [
        "Pengiriman dari semesta manapun",
        "Tidak ada pengembalian barang",
        "Hanya orang yang pantas yang bisa membeli",
        "Untuk apa senjata yang dibeli di gunakan bukan kebijakan penjual"
    ]
];

require __DIR__ . '/include/header.php';
?>

<h1 class="text-3xl font-bold mb-6">Tentang <?= $namaToko ?></h1>

<div class="bg-white rounded-xl shadow p-6 max-w-2xl space-y-6">
    <div>
        <h2 class="text-xl font-semibold mb-2 text-blue-700">📍 Alamat Toko</h2>
        <p class="text-slate-600"><?= $profilToko["alamat"] ?></p>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-2 text-blue-700">⏰ Jam Operasional</h2>
        <p class="text-slate-600"><?= $profilToko["jam_buka"] ?></p>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-2 text-blue-700">🛠️ Daftar Layanan</h2>
        <ul class="list-disc list-inside text-slate-600 space-y-1">
            <?php foreach ($profilToko["layanan"] as $layanan): ?>
                <li><?= $layanan ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php require __DIR__ . '/include/footer.php'; ?>