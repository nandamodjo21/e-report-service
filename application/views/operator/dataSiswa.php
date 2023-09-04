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
                        <th scope="col">Kelas</th>
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
                            <td><?= $ds->kelas; ?></td>
                            <td width="20px">
                                <?php echo anchor('operator/UpdateSiswa/' . $ds->nis, '<div class="btn btn-sm btn-primary">Edit<i class="fa fa-edit"></i></div>') ?>
                                <?php echo anchor('operator/deletedataSiswa/' . $ds->nis, '<div class="btn btn-sm btn-danger">Delete<i class="fa fa-delete"></i></div>') ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="adddatasiswaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo base_url('operator/add_Siswa'); ?> ">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nis">Nis:</label>
                            <input type="text" class="form-control" id="nis" name="nis">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat lahir:</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal lahir:</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis kelamin:</label>
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                <option value="">Masukkan Jenis kelamin</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas:</label>
                            <select name="kelas" class="form-control" id="kelas">
                                <option value="">Masukkan Kelas</option>
                                <option value="10MM_1">10MM_1</option>
                                <option value="10MM_2">10MM_2</option>
                                <option value="11MM_1">11MM_1</option>
                                <option value="11MM_2">11MM_2</option>

                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary updateBtn">Save</button>
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