<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-duotone fa-id-card"></i> Form Update Data Siswa
    </div>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php foreach ($DataSiswa as $ds) { ?>
        <form method="post" action="<?php echo base_url('admin/update_aksi') ?>">
            <div class="form-group">
                <label>NIS:</label>
                <input type="hidden" name="id_siswa" value="<?php echo $ds->id_siswa ?>">
                <input type="text" name="nis" class="form-control" value="<?php echo $ds->nis ?>">
            </div>
            <div class="form-group">
                <label>Nama Siswa:</label>
                <input type="text" class="form-control" name="nama_siswa" value="<?php echo $ds->nama_siswa ?>">
            </div>
            <div class="form-group">
                <label>Tempat Lahir:</label>
                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $ds->tempat_lahir ?>">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $ds->tanggal_lahir ?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <select class="form-control" name="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Pria" <?php if ($ds->jenis_kelamin == 'Pria') echo 'selected'; ?>>Pria</option>
                    <option value="Wanita" <?php if ($ds->jenis_kelamin == 'Wanita') echo 'selected'; ?>>Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea class="form-control" name="alamat"><?php echo $ds->alamat ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary updateBtn">Simpan</button>
        </form>
    <?php } ?>

</div>