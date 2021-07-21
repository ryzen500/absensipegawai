
<?=$this->extend('layout/template')?>

<?=$this->section('content')?>

<h2 class="pl-2 mb-2 pt-2">Edit Profile</h2>


 <?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil di edit
                </div>';
}

$attributes = ['method' => 'post', 'id' => 'myform','enctype'=>'multipart/form-data'];
echo form_open('edit-profile-edit-' . $data['id'], $attributes);

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Profile</h3>
    </div>
     <?php if(isset($validation)):?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif;?>
    <div class="card-body">
        <div class="form-group">
            <label for="label">Person ID</label>
            <input type="text" value="<?=$data['person_id'];?>" name="person_id" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Name</label>
            <input type="text" value="<?=$data['name'];?>" name="name" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Photo </label>
            <input type="file" value="" name="picture" class="form-control">
        </div>
        <div class="form-group">
            <label for="label">Password Baru </label>
            <input type="password" value="<?= set_value('password') ?>" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="label">Confirmasi Password Baru</label>
            <input type="password"  name="confpassword" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Email</label>
            <input type="text" value="<?=$data['email'];?>" name="email" class="form-control"  >
        </div>
    </div>

    <div class="card-footer">
       <a href="<?=site_url('user');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<?=form_close();?>
<!-- /.card -->

<?=$this->endSection()?>
