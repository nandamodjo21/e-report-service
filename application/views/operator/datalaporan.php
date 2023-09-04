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

            <button type="button" data-toggle="modal" data-target="#adddatalaporanModal" class="btn btn-primary mb-3">Tambah Data Laporan</button>

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
                                <button type="button" data-toggle="modal" data-target="#editdatasiswaModal" class="btn btn-primary mb-3">Edit Data Siswa</button>
                                <button type="button" class="btn btn-primary mb-3">Hapus Data Siswa</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>
    <div class="modal fade" id="adddatalaporanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo base_url('admin/addLaporan'); ?> ">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nis">Nis:</label>
                            <input type="text" class="form-control" id="nis" name="nis">
                        </div>
                        <div class="form-group">
                            <label for="pelanggaran">Pelanggaran :</label>
                            <input type="text" class="form-control" id="pelanggaran" name="pelanggaran">
                        </div>
                        <div class="form-group">
                            <label for="jenis_pelanggaran">Jenis pelanggaran :</label>
                            <select name="jenis_pelanggaran" class="form-control" id="jenis_pelanggaran">
                                <option value="">Masukkan Jenis Pelanggaran</option>
                                <option value="ringan">Ringan</option>
                                <option value="rerat">Berat</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="tanggal_pelanggaran">Tanggal Pelanggaran :</label>
                            <input type="date" class="form-control" id="tanggal_pelanggaran" name="tanggal_pelanggaran">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->