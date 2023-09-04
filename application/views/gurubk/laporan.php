<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nis</th>
                        <th scope="col">Pelanggaran</th>
                        <th scope="col">Jenis Pelanggaran</th>
                        <th scope="col">Tanggal Pelanggaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($DataLaporan as $l) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $l->nis; ?></td>
                            <td><?= $l->pelanggaran; ?></td>
                            <td><?= $l->jenis_pelanggaran; ?></td>
                            <td><?= $l->tanggal_pelanggaran; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary mb-3">Verifikasi</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->