<?php
// ============================================
// HALAMAN KATALOG PRODUK
// ============================================
require_once __DIR__ . '/include/data.php';
require_once __DIR__ . '/include/fungsi.php';

$judulHalaman = "Merchant";
$halamanAktif = "index.php";

$kategoriDipilih = "";

$jumlahProduk  = count($produk);
$jumlahDiskon  = hitungProdukDiskon($produk);
$nilaiStok     = hitungNilaiStok($produk);

$produkTermurah = cariProdukTermurah($produk);
$hargaTermurah  = hargaSetelahDiskon($produkTermurah["harga"], $produkTermurah["diskon"]);

$rataRataHarga = array_sum(array_column($produk, "harga")) / count($produk);

$jumlahPerKategori = [];
foreach ($produk as $item) {
    $jumlahPerKategori[$item["kategori"]] = ($jumlahPerKategori[$item["kategori"]] ?? 0) + 1;
}

require __DIR__ . '/include/header.php';
?>

<h1 class="text-3xl font-bold mb-1">Devine Weapon</h1>
<p class="text-slate-500 mb-1">Senjata Pembunuh Celestial.</p>

<p class="text-sm text-slate-600 mb-3">
    Rata-rata harga produk: <span class="font-semibold text-blue-700"><?= formatRupiah($rataRataHarga) ?></span>
</p>

<div class="text-sm text-slate-600 mb-6 flex flex-wrap items-center gap-2">
    <span class="font-semibold">Kategori:</span>
    <?php 
    $teksKat = [];
    foreach ($jumlahPerKategori as $kat => $jml) {
        $teksKat[] = "$kat ($jml)";
    }
    echo implode(' &middot; ', $teksKat);
    ?>
</div>

<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-sm text-slate-500">Jumlah produk</p>
        <p class="text-2xl font-bold"><?= $jumlahProduk ?></p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-sm text-slate-500">Sedang diskon</p>
        <p class="text-2xl font-bold"><?= $jumlahDiskon ?> produk</p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-sm text-slate-500">Total nilai stok</p>
        <p class="text-2xl font-bold"><?= formatRupiah($nilaiStok) ?></p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-sm text-slate-500">Produk termurah</p>
        <p class="text-base font-bold truncate"><?= $produkTermurah["nama"] ?></p>
        <p class="text-sm font-semibold text-blue-600"><?= formatRupiah($hargaTermurah) ?></p>
    </div>
</div>

<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($produk as $kode => $item): ?>
        <?php 
        if ($kategoriDipilih !== "" && $item["kategori"] !== $kategoriDipilih) {
            continue;
        }
        $hargaAkhir = hargaSetelahDiskon($item["harga"], $item["diskon"]); 
        ?>
        <article class="bg-white rounded-xl shadow overflow-hidden flex flex-col">
            <div class="bg-slate-50 text-6xl text-center py-8 relative">
                <?= $item["ikon"] ?>
                <?php if ($item["diskon"] > 0): ?>
                    <span class="absolute top-3 left-3 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                        -<?= $item["diskon"] ?>%
                    </span>
                <?php endif; ?>
            </div>
            <div class="p-4 flex flex-col flex-1">
                <p class="text-xs text-slate-500"><?= $kode ?> &middot; <?= $item["kategori"] ?></p>
                <h2 class="font-semibold text-lg mb-2"><?= $item["nama"] ?></h2>

                <?php if ($item["diskon"] > 0): ?>
                    <p class="text-sm text-slate-400 line-through"><?= formatRupiah($item["harga"]) ?></p>
                <?php endif; ?>
                <p class="text-xl font-bold text-blue-700 mb-3"><?= formatRupiah($hargaAkhir) ?></p>

                <span class="mt-auto self-start text-xs font-semibold px-2 py-1 rounded-full <?= warnaStok($item["stok"]) ?>">
                    <?= labelStok($item["stok"]) ?>
                </span>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<?php require __DIR__ . '/include/footer.php'; ?>