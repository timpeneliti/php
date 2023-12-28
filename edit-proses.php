<?php
// Debugging: Log POST data
error_log("Received POST data in edit-proses.php: " . print_r($_POST, true));

include('koneksi.php');

if (isset($_POST['id'], $_POST['_a'], $_POST['_b'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $_a = mysqli_real_escape_string($koneksi, $_POST['_a']);
    $_b = mysqli_real_escape_string($koneksi, $_POST['_b']);

    $update = mysqli_query($koneksi, "UPDATE a SET a1='$_a', a2='$_b' WHERE a0='$id'");

    if ($update) {
        echo 'Data berhasil di simpan! Auto-save aktif.';
        echo '<a href="edit.php?id=' . $id . '">Kembali</a>';
    } else {
        echo 'Gagal menyimpan data! Auto-save aktif.';
        echo '<a href="edit.php?id=' . $id . '">Kembali</a>';
    }
} else {
    echo 'Invalid data received!';
}
?>
