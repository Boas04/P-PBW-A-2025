<?php
// =================================================================
// PRAKTIKUM 1: APLIKASI PENDAFTARAN EVENT
// =================================================================

// KONSEP: CONSTANT
define('NAMA_EVENT', 'Belajar PHP 2025');
define('FILE_PENDAFTARAN', 'pendaftar.txt');

// KONSEP: GLOBAL VARIABLE
$status_message = '';
$error_messages = [];

// =================================================================
// FUNGSI VALIDASI
// =================================================================

// Validasi email dengan regex
function validateEmail($email) {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email);
}

// Validasi tanggal format DD-MM-YYYY
function validateDate($date) {
    $pattern = '/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-(19[0-9]{2}|20[0-9]{2})$/';
    return preg_match($pattern, $date);
}

// =================================================================
// FORM HANDLING
// =================================================================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim(htmlspecialchars($_POST['nama']));
    $email = trim(htmlspecialchars($_POST['email']));
    $tanggal_lahir = trim(htmlspecialchars($_POST['tanggal_lahir']));

    // Validasi input
    if (empty($nama) || empty($email) || empty($tanggal_lahir)) {
        $error_messages[] = "Semua field wajib diisi.";
    }
    if (!validateEmail($email)) {
        $error_messages[] = "Format email tidak valid.";
    }
    if (!validateDate($tanggal_lahir)) {
        $error_messages[] = "Format tanggal lahir harus DD-MM-YYYY.";
    }

    // Jika lolos validasi, simpan ke file
    if (empty($error_messages)) {
        $data_pendaftar = "{$nama};{$email};{$tanggal_lahir}\n";
        file_put_contents(FILE_PENDAFTARAN, $data_pendaftar, FILE_APPEND);
        $status_message = "✅ Terima kasih, {$nama}! Pendaftaran Anda untuk event <b>" . NAMA_EVENT . "</b> berhasil.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Event Digital</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: auto; padding: 20px; }
        h1 { color: #007bff; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .error { color: red; margin: 5px 0; }
        .success { color: green; font-weight: bold; margin: 10px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    
    <h1>Form Pendaftaran Event "<?php echo NAMA_EVENT; ?>"</h1>
    <p>Silakan isi data diri Anda untuk mendaftar pada event kami.</p>

    <!-- Pesan sukses -->
    <?php if (!empty($status_message)) : ?>
        <div class="success"><?php echo $status_message; ?></div>
    <?php endif; ?>

    <!-- Pesan error -->
    <?php if (!empty($error_messages)) : ?>
        <?php foreach ($error_messages as $err) : ?>
            <div class="error">⚠️ <?php echo $err; ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="email">Alamat Email:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir (DD-MM-YYYY):</label>
            <input type="text" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <button type="submit">Daftar Sekarang</button>
    </form>

    <hr>

    <h2>Daftar Peserta yang Sudah Mendaftar</h2>
    <table>
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (file_exists(FILE_PENDAFTARAN)) {
            $pendaftar = file(FILE_PENDAFTARAN, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($pendaftar as $data) {
                list($nama, $email, $tanggal_lahir) = explode(';', $data);
                echo "<tr>";
                echo "<td>" . htmlspecialchars($nama) . "</td>";
                echo "<td>" . htmlspecialchars($email) . "</td>";
                echo "<td>" . htmlspecialchars($tanggal_lahir) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Belum ada pendaftar.</td></tr>";
        }
        ?>
    </tbody>
    </table>

</body>
</html>
