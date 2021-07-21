
<?=$this->extend('layout/template')?>

<?=$this->section('content')?>

<h2 class="pl-2 mb-2 pt-2">Data Presensi</h2>


 <?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil di edit
                </div>';
}

$attributes = ['method' => 'post', 'id' => 'myform','enctype'=>'multipart/form-data'];
echo form_open('presensi-data-edit-' . $data['id'], $attributes);

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Presensi</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="label">User Id</label>
            <select class="form-control" <?=$user = $data['users_id'];?> name="users_id">
            <option value="1" <?=($user == '1') ?"selected":""?>>Aini</option>
	        <option value="2" <?=($user == '2') ?"selected":""?>>Icha</option>
	        <option value="3" <?=($user == '3') ?"selected":""?>>Lia</option>
            <option value="4" <?=($user == '4') ?"selected":""?>>Tsany</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Chek In</label>
            <div class="input-group"  >
                <input type="text" id="check-in" name="check_in" class="form-control"  value="<?=$data['check_in'];?>">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Check Out</label>
            <div class="input-group"  >
                <input type="text" id="check-out" name="check_out" class="form-control"  value="<?=$data['check_out'];?>">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Upload Foto</label>
            <input type="file" name="picture" class="form-control" value="<?=$data['picture'];?>" >
        </div>
    </div>

    <div class="card-footer">
       <a href="<?=site_url('presensi-data');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<?=form_close();?>
<!-- /.card -->

<?=$this->endSection()?>
