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

            <button type="button" data-toggle="modal" data-target="#dataguruModal" class="btn btn-primary mb-3">Tambah Data Guru</button>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nip</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($DataGuru as $dg) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $dg->nip; ?></td>
                            <td><?= $dg->nama_guru; ?></td>
                            <td><?= $dg->jenis_kelamin; ?></td>
                            <td><?= $dg->tempat_lahir; ?></td>
                            <td><?= $dg->tanggal_lahir; ?></td>
                            <td><?= $dg->alamat; ?></td>
                            <td><?= $dg->jabatan; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#editdatasiswaModal" class="btn btn-primary mb-3">Edit Data</button>
                                <button type="button" class="btn btn-primary mb-3">Hapus Data</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>
    </div>

    <div class="modal fade" id="dataguruModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo base_url('admin/add_Guru'); ?> ">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nip">Nip:</label>
                            <input type="text" class="form-control" id="nip" name="nip">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Guru:</label>
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru">
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
                            <label for="tempat_lahir">Tempat lahir:</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal lahir:</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan">
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