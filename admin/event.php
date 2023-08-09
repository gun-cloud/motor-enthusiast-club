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
                <h4 class="fw-bold py-3 mb-4">Daftar Event</h4>
                <div class="card">
                    <div class="card-header">
                        <a href="event-tambah.php" class="btn btn-primary py-2">
                            <span class="tf-icons bx bx-list-plus"></span>&nbsp; Tambah
                        </a>
                    </div>

                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Event</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "Select * From event");
                                foreach ($data as $row) :
                                ?>
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $no++ ?></strong></td>
                                        <td><img src="../assets/img/<?= $row['gambar'] ?>" width="100px"></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td>
                                            <a href="event-ubah.php?id=<?= $row['id_event'] ?>" style="border-radius:10px;" class="btn btn-warning"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a href="../actions/event-hapus.php?id=<?= $row['id_event']; ?>" onclick="return confirm('Apakah Yakin ingin menghapus event ini')" style="border-radius:10px;" class="btn btn-danger"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<?php include 'layouts/_footer.php'; ?>