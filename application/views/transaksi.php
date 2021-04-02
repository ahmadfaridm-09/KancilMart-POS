<header class="navbar bg-primary">
    <a class="navbar-brand" href="#">
        <img src="<?php echo base_url('assets/logokancil.svg')?>" width="50" height="50" class="d-inline-block align-top" alt="">
    </a>
</header>
<nav class="navbar navbar-expand-lg navbar-light py-0 bg-secondary">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="<?php echo base_url('')?>">Beranda</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="<?php echo base_url('index.php/barang/index')?>">Produk</a>
                    </li>
                    <li class="nav-item mx-5 active">
                        <a class="nav-link" href="<?php echo base_url('index.php/transaksi/daftar_transaksi')?>">Laporan</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="<?php echo base_url('index.php/kasir')?>">Kasir</a>
                    </li>
                </ul>
            </div>
</nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 bg-light pt-2 sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo base_url('index.php/barang/index')?>">Daftar Transaksi</a>
                        </li>
                        </li>
                    </ul>
                </div>