<?php

    if (isset($_GET["page"])) {
        $page = &$_GET["page"];
    } else {
        $page = "dashboard";
    }
?>

<?php

    switch ($page) {
        case 'dashboard':
            include 'page/dashboard.php';
            break;

            //produk
            case 'produk':
                include 'page/produk/data_produk.php';
                break;

            //kategori
            case 'kategori':
                include 'page/kategori/data_kategori.php';
                break;

            case 'tambah-kategori':
                include 'page/kategori/tambah-kategori.php';
                break;

            case 'edit-kategori':
                include 'page/kategori/edit-kategori.php';
                break;

            //pembelian
            case 'pembelian':
                include 'page/pembelian/data_pembelian.php';
                break;

            default:
                echo "404 Not Found";
                break;
    }
?>