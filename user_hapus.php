<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user =$id");
        if($query){
            echo '<script>alert("Hapus data berhasil"); window.location.href="index.php?page=home"</script>';
                } else {
                    echo '<script>alert("Hapus data gagal"); location.href="?page=""</script>';
                }
?>