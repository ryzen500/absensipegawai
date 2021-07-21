<?=$this->extend('layout/template')?>

<?=$this->section('content')?>


<h2 class="pl-2 mb-2 pt-2">Tambah Data USer</h2>



<?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil ditambahkan
                </div>';
}

?>

    <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>
<form action="<?=site_url('user-create');?>" method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Data User</h3>
    </div>
    <div class="card-body">
    <div class="form-group">
            <label for="label">Person ID</label>
            <input type="text" name="person_id" class="form-control" value="<?= set_value('person_id') ?>" >
        </div>
        <div class="form-group">
            <label for="label">Nama :</label>
            <input type="text" name="name" class="form-control" value="<?= set_value('name') ?>" >
        </div>
        <div class="form-group">
            <label for="label">Password</label>
            <input type="password" name="password" class="form-control" value="<?= set_value('password') ?>" >
        </div>
        <div class="form-group">
            <label for="label">Picture</label>
            <input type="file" name="picture" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Email</label>
            <input type="text" name="email" class="form-control" value="<?= set_value('email') ?>" >
        </div>
    </div>

    <div class="card-footer">
       <a href="<?=site_url('user');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
</form>
<!-- /.card -->
<?=$this->endSection()?>
