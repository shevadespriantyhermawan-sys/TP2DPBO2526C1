<?php
// =========================================================================
// 1. INCLUDE CLASS & INISIALISASI SESSION
// =========================================================================
// Wajib memuat definisi class terlebih dahulu sebelum session_start()
// agar objek di dalam session ter-deserialize dengan benar (tidak corrupt)
require_once 'Orang.php';
require_once 'Dokter.php';
require_once 'DokterSpesialis.php';

session_start();

// =========================================================================
// 2. CLEANUP SESSION JIKA ADA OBJECT CORRUPT
// =========================================================================
// Memeriksa apakah terdapat objek __PHP_Incomplete_Class
// (Terjadi jika session dimuat sebelum file class di-require)
if (isset($_SESSION['daftar_dokter'])) {
    foreach ($_SESSION['daftar_dokter'] as $item) {
        if ($item instanceof __PHP_Incomplete_Class) {
            unset($_SESSION['daftar_dokter']); // Hapus session jika ada data yang rusak
            break;
        }
    }
}

// =========================================================================
// 3. INISIALISASI DATA AWAL (DEFAULT 6 DOKTER)
// =========================================================================
// Membuat data awal jika session 'daftar_dokter' belum dibuat
if (!isset($_SESSION['daftar_dokter'])) {
    $_SESSION['daftar_dokter'] = [
        new DokterSpesialis("D001", "Dr. Gunil Shin", "Laki-Laki", "Bedah", "STR-101", 10, "Onkologi", 500000, "RS Harapan Kita", "gunil.jpg"),
        new DokterSpesialis("D002", "Dr. Jungsu Kim", "Laki-Laki", "Anak", "STR-102", 8, "Pediatri Sosial", 400000, "RS Cipto Mangunkusumo", "jungsu.jpg"),
        new DokterSpesialis("D003", "Dr. Gaon Kwak", "Laki-Laki", "Jantung", "STR-103", 12, "Kardiologi", 750000, "RS Harapan Jantung", "gaon.jpg"),
        new DokterSpesialis("D004", "Dr. O.de Oh", "Laki-Laki", "Mata", "STR-104", 6, "Vitreoretina", 450000, "RS Mata Cicendo", "ode.jpg"),
        new DokterSpesialis("D005", "Dr. Jun Han", "Laki-Laki", "Saraf", "STR-105", 15, "Neurointervensi", 600000, "RS Hasan Sadikin", "junhan.jpg"),
        new DokterSpesialis("D006", "Dr. Jooyeon Lee", "Laki-Laki", "Radiologi", "STR-106", 5, "Neuroradiologi", 550000, "RS Flat 20", "jooyeon.jpg")
    ];
}

// =========================================================================
// 4. LOGIKA RESET DATA SESSION
// =========================================================================
// Menghapus data di session dan mengembalikan ke kondisi 6 dokter awal
if (isset($_POST['reset'])) {
    unset($_SESSION['daftar_dokter']);
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh halaman
    exit();
}

// =========================================================================
// 5. LOGIKA TAMBAH DATA DOKTER TERMASUK UNGGAH FOTO
// =========================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    // A. Mengambil input data teks dari form
    $id    = $_POST['id'];
    $nama  = $_POST['nama'];
    $jk    = $_POST['jk'];
    $sp    = $_POST['spesialisasi'];
    $str   = $_POST['str'];
    $exp   = (int)$_POST['exp'];
    $sub   = $_POST['subspesialisasi'];
    $biaya = (float)$_POST['biaya'];
    $rs    = $_POST['rs'];
    
    // B. Nilai standar jika pengguna tidak mengunggah gambar
    $foto = "default.jpg";

    // C. Memproses unggahan foto jika ada berkas yang dikirim tanpa error
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name']; // Lokasi berkas sementara di server
        $fileName    = $_FILES['foto']['name'];     // Nama asli berkas dari komputer client
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Mendapatkan ekstensi file

        // Daftar format gambar yang diizinkan
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        // Cek apakah ekstensi berkas valid
        if (in_array($fileExtension, $allowedExtensions)) {
            // Generate nama file unik menggunakan UNIX Timestamp + UniqID agar tidak saling tertimpa
            $newFileName = time() . '_' . uniqid() . '.' . $fileExtension;

            // Direktori tujuan penampung foto
            $uploadFileDir = 'foto/';

            // Otomatis buat folder 'foto/' jika direktori tersebut belum ada
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }

            // Path akhir penempatan berkas
            $dest_path = $uploadFileDir . $newFileName;

            // Memindahkan berkas dari folder sementara PHP ke folder 'foto/'
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $foto = $newFileName; // Simpan nama berkas baru untuk disimpan di objek
            }
        }
    }

    // D. Buat objek DokterSpesialis baru dan masukkan ke dalam array Session
    $_SESSION['daftar_dokter'][] = new DokterSpesialis($id, $nama, $jk, $sp, $str, $exp, $sub, $biaya, $rs, $foto);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XH // ICU MONITOR SYSTEM</title>
    <!-- Google Fonts: Share Tech Mono & Rajdhani -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #0a040d;
            --card-bg: rgba(22, 10, 28, 0.92);
            --neon-pink: #ff007f;
            --alert-red: #ff003c;
            --electric-purple: #a855f7;
            --light-purple: #e9d5ff;
            --text-light: #f3e8ff;
            --grid-line: rgba(255, 0, 127, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            background-color: var(--bg-dark);
            background-image: 
                linear-gradient(var(--grid-line) 1px, transparent 1px),
                linear-gradient(90deg, var(--grid-line) 1px, transparent 1px),
                radial-gradient(circle at 20% 20%, rgba(255, 0, 127, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(168, 85, 247, 0.15) 0%, transparent 50%);
            background-size: 25px 25px, 25px 25px, 100% 100%, 100% 100%;
            color: var(--text-light);
            padding: 30px 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1350px;
            margin: 0 auto;
        }

        /* Header ICU Style */
        .header {
            text-align: center;
            margin-bottom: 35px;
            border-bottom: 2px solid var(--neon-pink);
            padding-bottom: 20px;
        }

        .header h1 {
            font-family: 'Share Tech Mono', monospace;
            font-size: 2.8rem;
            color: #fff;
            text-shadow: 0 0 12px var(--neon-pink), 0 0 25px var(--electric-purple);
            letter-spacing: 4px;
        }

        .header p {
            font-size: 1.2rem;
            color: var(--neon-pink);
            letter-spacing: 3px;
            font-weight: 700;
            margin-top: 5px;
            text-shadow: 0 0 8px rgba(255, 0, 127, 0.6);
        }

        .status-icu {
            display: inline-block;
            margin-top: 12px;
            padding: 6px 18px;
            background: rgba(255, 0, 60, 0.25);
            border: 1px solid var(--alert-red);
            color: #fff;
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.9rem;
            border-radius: 4px;
            animation: pulse-red 1.8s infinite alternate;
        }

        @keyframes pulse-red {
            0% { box-shadow: 0 0 5px var(--alert-red); }
            100% { box-shadow: 0 0 20px var(--neon-pink); }
        }

        /* Tabel Data Dokter */
        .table-container {
            background: var(--card-bg);
            border: 1px solid var(--electric-purple);
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.25);
            overflow-x: auto;
            margin-bottom: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            font-family: 'Share Tech Mono', monospace;
            background: linear-gradient(90deg, rgba(255, 0, 127, 0.25), rgba(168, 85, 247, 0.25));
            color: var(--light-purple);
            padding: 16px 12px;
            font-size: 0.95rem;
            letter-spacing: 1px;
            border-bottom: 2px solid var(--neon-pink);
            text-transform: uppercase;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid rgba(168, 85, 247, 0.2);
            font-size: 1.05rem;
            font-weight: 600;
            vertical-align: middle;
        }

        tr:hover {
            background: rgba(255, 0, 127, 0.1);
        }

        /* Tampilan Gambar Avatar Dokter */
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid var(--neon-pink);
            box-shadow: 0 0 12px rgba(255, 0, 127, 0.5);
            display: block;
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .avatar:hover {
            transform: scale(1.08);
            border-color: var(--electric-purple);
            box-shadow: 0 0 20px var(--electric-purple);
        }

        .badge-id {
            color: var(--neon-pink);
            font-family: 'Share Tech Mono', monospace;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .badge-price {
            color: var(--light-purple);
            font-family: 'Share Tech Mono', monospace;
            font-weight: bold;
        }

        /* Form Card Styling */
        .form-card {
            background: var(--card-bg);
            border: 1px solid var(--neon-pink);
            border-radius: 8px;
            box-shadow: 0 0 25px rgba(255, 0, 127, 0.3);
            padding: 30px;
            max-width: 700px;
            margin: 0 auto;
        }

        .form-card h2 {
            font-family: 'Share Tech Mono', monospace;
            color: var(--neon-pink);
            font-size: 1.6rem;
            margin-bottom: 20px;
            text-shadow: 0 0 10px var(--neon-pink);
            text-align: center;
            border-bottom: 1px dashed rgba(255, 0, 127, 0.4);
            padding-bottom: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        label {
            font-size: 0.85rem;
            color: var(--light-purple);
            margin-bottom: 5px;
            font-family: 'Share Tech Mono', monospace;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        input, select {
            background: rgba(12, 5, 18, 0.95);
            border: 1px solid rgba(168, 85, 247, 0.4);
            border-radius: 4px;
            padding: 10px;
            color: #fff;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.05rem;
            outline: none;
        }

        /* Penyesuaian khusus elemen Input File */
        input[type="file"] {
            padding: 7px;
            cursor: pointer;
        }

        input:focus, select:focus {
            border-color: var(--neon-pink);
            box-shadow: 0 0 12px var(--neon-pink);
        }

        .btn-submit {
            margin-top: 15px;
            grid-column: span 2;
            padding: 14px;
            background: linear-gradient(135deg, var(--alert-red), var(--neon-pink), var(--electric-purple));
            border: none;
            border-radius: 4px;
            color: #fff;
            font-family: 'Share Tech Mono', monospace;
            font-size: 1.1rem;
            font-weight: bold;
            letter-spacing: 2px;
            cursor: pointer;
            text-transform: uppercase;
            box-shadow: 0 0 15px rgba(255, 0, 127, 0.6);
            transition: all 0.2s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 25px rgba(255, 0, 127, 0.9);
        }

        .btn-reset {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: transparent;
            border: 1px dashed rgba(255, 255, 255, 0.3);
            color: #aaa;
            font-family: 'Share Tech Mono', monospace;
            font-size: 0.85rem;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-reset:hover {
            border-color: var(--neon-pink);
            color: #fff;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .btn-submit, .form-group.full-width {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- ICU Header Section -->
        <div class="header">
            <h1>XDINARY HEROES // ICU MONITOR</h1>
            <p>SPECIALIST DOCTOR INTENSIVE CARE DATABASE</p>
            <div class="status-icu">⚠️ EMERGENCY ALERT: HEARTBEAT ACTIVE [I-C-U]</div>
        </div>

        <!-- Tabel Menampilkan Daftar Dokter -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Foto Pasien/Dokter</th>
                        <th>ID</th>
                        <th>Nama Dokter</th>
                        <th>JK</th>
                        <th>Spesialisasi</th>
                        <th>STR</th>
                        <th>Exp</th>
                        <th>Subspesialisasi</th>
                        <th>Biaya Konsultasi</th>
                        <th>Rumah Sakit Utama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['daftar_dokter'] as $d): ?>
                    <tr>
                        <td>
                            <!-- Mengambil gambar dari folder foto/ serta memberikan fallback placeholder jika file tidak ditemukan -->
                            <img src="foto/<?= htmlspecialchars($d->getFoto()); ?>" 
                                 alt="<?= htmlspecialchars($d->getNama()); ?>" 
                                 class="avatar" 
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/100/160a1c/ff007f?text=XH+ICU';">
                        </td>
                        <td class="badge-id"><?= htmlspecialchars($d->getId()); ?></td>
                        <td><?= htmlspecialchars($d->getNama()); ?></td>
                        <td><?= htmlspecialchars($d->getJenisKelamin()); ?></td>
                        <td><?= htmlspecialchars($d->getSpesialisasi()); ?></td>
                        <td><?= htmlspecialchars($d->getNoSTR()); ?></td>
                        <td><?= $d->getPengalamanTahun(); ?> Thn</td>
                        <td><?= htmlspecialchars($d->getSubspesialisasi()); ?></td>
                        <td class="badge-price">Rp <?= number_format($d->getBiayaKonsultasi(), 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($d->getRumahSakitUtama()); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Form Tambah Data Dokter Baru -->
        <div class="form-card">
            <h2>[+] ENROLL NEW ICU SPECIALIST</h2>
            
            <!-- 
                Catatan: 
                enctype="multipart/form-data" WAJIB ditambahkan agar form diizinkan mengirimkan berkas/file ke server 
            -->
            <form method="POST" enctype="multipart/form-data" class="form-grid">
                <div class="form-group">
                    <label>ID Dokter</label>
                    <input type="text" name="id" placeholder="Ex: D007" required>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Ex: Dr. JYP" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Spesialisasi</label>
                    <input type="text" name="spesialisasi" placeholder="Ex: Anestesi ICU" required>
                </div>
                <div class="form-group">
                    <label>No. STR</label>
                    <input type="text" name="str" placeholder="Ex: STR-107" required>
                </div>
                <div class="form-group">
                    <label>Pengalaman (Tahun)</label>
                    <input type="number" name="exp" placeholder="Ex: 8" required>
                </div>
                <div class="form-group">
                    <label>Subspesialisasi</label>
                    <input type="text" name="subspesialisasi" placeholder="Ex: Perawatan Kritis" required>
                </div>
                <div class="form-group">
                    <label>Biaya Konsultasi (Rp)</label>
                    <input type="number" name="biaya" placeholder="Ex: 600000" required>
                </div>
                <div class="form-group full-width">
                    <label>Rumah Sakit Utama</label>
                    <input type="text" name="rs" placeholder="Ex: RS JYP Emergency Unit" required>
                </div>
                
                <!-- Input jenis File untuk mengunggah berkas foto -->
                <div class="form-group full-width">
                    <label>Unggah Foto Dokter (.jpg, .png, .webp)</label>
                    <input type="file" name="foto" accept="image/*">
                </div>
                
                <button type="submit" name="tambah" class="btn-submit">> TRANSMIT DATA TO ICU MONITOR</button>
            </form>

            <!-- Form Tombol Reset Data -->
            <form method="POST">
                <button type="submit" name="reset" class="btn-reset">[RESET SESSION TO INITIAL 6 DOCTORS]</button>
            </form>
        </div>
    </div>

</body>
</html>