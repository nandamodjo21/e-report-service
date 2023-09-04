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

            <button type="button" data-toggle="modal" data-target="#adddatasiswaModal" class="btn btn-primary mb-3">Tambah Data Siswa</button>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nis</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($DataSiswa as $ds) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $ds->nis; ?></td>
                            <td><?= $ds->nama_siswa; ?></td>
                            <td><?= $ds->tempat_lahir; ?></td>
                            <td><?= $ds->tanggal_lahir; ?></td>
                            <td><?= $ds->jenis_kelamin; ?></td>
                            <td><?= $ds->alamat; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#editdatasiswaModal" class="btn btn-primary mb-3">Edit Data Siswa</button>
                                <button type="button" class="btn btn-primary mb-3">Hapus Data Siswa</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>