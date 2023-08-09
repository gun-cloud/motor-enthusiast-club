<?php
session_start();
include '../actions/koneksi.php';
include 'layouts/_header.php';
?>

<body>
    <div class="content">
        <?php include 'layouts/_sidebar.php'; ?>

        <div class="main-content">
            <div class="container-xxl flex-grow-1 container mt-2">
                <h4 class="fw-bold py-3 mb-4">Tambah Artikel</h4>

                <form action="../actions/artikel-tambah.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <input type="hidden" name="id_anggota" value="<?= $_SESSION['admin'] ?>">
                            <label for="judul" class="form-label">Judul</label>
                            <input class="form-control" type="text" name="judul" id="judul" value="" required />

                            <label for="gambar" class="form-label mt-2">Gambar</label>
                            <input class="form-control" type="file" name="gambar" id="gambar" value="" />

                            <label for="konten" class="form-label mt-2">Konten</label>
                            <textarea class="form-control" name="konten" rows="5"></textarea>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Tambah">
                            <a href="artikel.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php include 'layouts/_footer.php'; ?>