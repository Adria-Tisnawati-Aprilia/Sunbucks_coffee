<a href="?page=tambah-kategori"> Tambah Data</a>
<hr>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>no</th>
            <th>nama_kategori</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $nomor = 0;
        $sql = "SELECT *FROM kategori ORDER BY nama_kategori ASC";
        $result = $mysql_object->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo ++$nomor; ?> .</td>
                    <td><?php echo $row['nama_kategori']; ?></td>
                    <td>
                        <a href="?halaman=edit-kategori&id_kategori=<?php echo $row['id_kategori']; ?>">Edit</a> &bull;
                        <form method="POST" style="display : inline;" method="POST">
                            <input type="hidden" name="id_kategori" value="<?php echo $row['id_kategori']; ?>">
                            <button onclick="return confirm(Apakah anda ingin menghapus data ini?)" name="btn-hapus">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                <?php 
            }
        }else {
            echo "<tr><td colspan='4' align='center'><b><i>Data Tidak Ada</i></b></td></tr>";
        }
    ?>
    </tbody>
</table>

<?php
    if (isset($_POST['btn-hsapus'])) {
        $id_kategori = $_POST['id_kategori'];

        $sql = "DELETE FROM kategori WHERE id_kategori = $id_kategori ";

        if ($subject->query($sql) === TRUE) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>window.location.replace('?halaman=kategori');</script>";
            exit;
        } else {
            echo "<script>alert('Gagal')</script>";
            echo "<script>window.location.replace('?halaman=kategori');</script>";
            exit;
        }
    }
?>