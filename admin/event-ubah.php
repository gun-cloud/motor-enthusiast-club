<?php
session_start();
include '../actions/koneksi.php';
include 'layouts/_header.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM event WHERE id_event = $id");
?>

<body>
    <div class="content">
        <?php include 'layouts/_sidebar.php'; ?>

        <div class="main-content">
            <div class="container-xxl flex-grow-1 container mt-2">
                <h4 class="fw-bold py-3 mb-4">Ubah event</h4>
                <?php foreach ($query as $row) : ?>
                    <form action="../actions/event-ubah.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <input type="hidden" name="id_anggota" value="<?= $_SESSION['admin'] ?>">
                                <input type="hidden" name="id_event" value="<?= $_GET['id'] ?>">
                                <label for="nama" class="form-label">Nama Event</label>
                                <input class="form-control" type="text" name="nama" id="nama" value="<?= $row['nama']; ?>" required />

                                <label for="gambar" class="form-label mt-2">Gambar</label>
                                <div class="mb-2" style="display: flex; align-items: center;">
                                    <img src="../assets/img/<?= $row['gambar'] ?>" alt="" srcset="" width="100" style="margin-left: 10px;">
                                </div>
                                <input class="form-control" type="file" name="gambar" id="gambar" />

                                <label for="deskripsi" class="form-label mt-2">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="5"><?= $row['deskripsi'] ?></textarea>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Simpan">
                                <a href="event.php" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</body>

<?php include 'layouts/_footer.php'; ?>