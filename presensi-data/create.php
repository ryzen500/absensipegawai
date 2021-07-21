<?=$this->extend('layout/template')?>

<?=$this->section('content')?>


<h2 class="pl-2 mb-2 pt-2">Presensi</h2>


<?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil ditambahkan
                </div>';
}

?>


<form action="<?=site_url('presensi-data-create');?>" method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Presensi</h3>
    </div>
    <div class="card-body">
    <div class="form-group">
            <label for="label">User Id</label>
            <select class="form-control" name="users_id">
            <option></option>
            <option value="1">Aini</option>
	        <option value="2">Icha</option>
	        <option value="3">Lia</option>
            <option value="4">Tsany</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Chek In</label>
            <div class="input-group"  >
                <input type="text" id="check-in" name="check_in"  class="form-control"  >
                <!-- <input type="datetime" id="check-in" name="check_in" data-date-format="YYYY-MM-DD hh:mm:ssa" class="form-control"  > -->
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Check Out</label>
            <div class="input-group"  >
                <input type="text" id="check-out" name="check_out"  class="form-control"  >
                <!-- <input type="text" id="check-out" name="check_out" data-date-format="YYYY-MM-DD hh:mm:ssa" class="form-control"  > -->
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Upload Foto</label>
            <input type="file" name="picture" class="form-control"  >
        </div>
    </div>

    <div class="card-footer">
       <a href="<?=site_url('presensi-data');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
</form>
<!-- /.card -->
<?=$this->endSection()?>
