<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-duotone fa-id-card"></i> Form Update Data Guru
    </div>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php foreach ($DataGuru as $dg) { ?>
        <form method="post" action="<?php echo base_url('admin/update_aksiguru') ?>">
            <div class="form-group">
                <label>NIP:</label>
                <input type="hidden" name="id_guru" value="<?php echo $dg->id_guru ?>">
                <input type="text" name="nip" class="form-control" value="<?php echo $dg->nip ?>">
            </div>
            <div class="form-group">
                <label>Nama Guru:</label>
                <input type="text" class="form-control" name="nama_guru" value="<?php echo $dg->nama_guru ?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <select class="form-control" name="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Pria" <?php if ($dg->jenis_kelamin == 'Pria') echo 'selected'; ?>>Pria</option>
                    <option value="Wanita" <?php if ($dg->jenis_kelamin == 'Wanita') echo 'selected'; ?>>Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tempat Lahir:</label>
                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $dg->tempat_lahir ?>">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $dg->tanggal_lahir ?>">
            </div>

            <div class="form-group">
                <label>Alamat:</label>
                <textarea class="form-control" name="alamat"><?php echo $dg->alamat ?></textarea>
            </div>
            <div class="form-group">
                <label>Jabatan:</label>
                <textarea class="form-control" name="jabatan"><?php echo $dg->jabatan ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary updateBtn">Simpan</button>
        </form>
    <?php } ?>

</div>