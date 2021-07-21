
<?=$this->extend('layout/template')?>

<?=$this->section('content')?>

<h2 class="pl-2 mb-2 pt-2">Kategori Cuti</h2>


 <?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil di edit
                </div>';
}

$attributes = ['method' => 'post', 'id' => 'myform'];
echo form_open('category-edit-' . $data['id'], $attributes);

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Kategori Cuti</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="label">Kategori Name</label>
            <input type="text" name="name"value="<?=$data['name'];?>" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Ref Days</label>
            <input type="number" name="ref_days" value="<?=$data['ref_days'];?>" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Type</label>
            <input type="text" name="type" value="<?=$data['type'];?>" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">User ID</label>
            <input type="text" name="users_id" value="<?=$data['users_id'];?>" class="form-control"  >
        </div>
    </div>

    <div class="card-footer">
       <a href="<?=site_url('category');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<?=form_close();?>
<!-- /.card -->

<?=$this->endSection()?>
