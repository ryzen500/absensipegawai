<?=$this->extend('layout/template')?>

<?=$this->section('content')?>


<h2 class="pl-2 mb-2 pt-2">Data Cuti</h2>


<?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil ditambahkan
                </div>';
}

?>


<form action="<?=site_url('kategori-cuti-create');?>" method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Cuti</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="label">User Id</label>
            <select class="form-control" name="users_id" >
            <option ></option>
            <option value="1">Aini</option>
	        <option value="2">Icha</option>
	        <option value="3">Lia</option>
            <option value="4">Tsany</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Category:</label>
            <select name="category_id" class="form-control" >
                <option >category</option>
                <option value="1">Cuti Sakit</option>
                <option value="2">Cuti Hamil</option>
                <option value="3">Cuti Penting</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Date:</label>
            <div class="input-group"  >
                <input type="text" id="date" name="dates"  class="form-control"  >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Attachment:</label>
            <input type="file" name="attachment" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Dates From:</label>
            <div class="input-group"  >
                <input id="dates-from" type="text" name="dates_from" class="form-control"  >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Dates To:</label>
            <div class="input-group"  >
                <input id="dates-to" type="text" name="dates_to" class="form-control"  >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Duration:</label>
            <input type="number" name="duration" class="form-control" placeholder="hari" >
        </div>
        <div class="form-group">
            <label for="label">Approval 1:</label>
            <select name="approval1" class="form-control"  >
                <option >Approval 1</option>
                <option value="1">Nanang</option>
                <option value="2">Dino</option>
                <option value="3">Jeana</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Approval 2:</label>
            <select name="approval2" class="form-control"  >
                <option >Approval 2</option>
                <option value="1">Nanang</option>
                <option value="2">Dino</option>
                <option value="3">Jeana</option>
            </select>
        </div>
        <div class="form-group">
        <label for="label">Status:</label>
            <div class="form-check">
            <input type="radio" name="status" value="Setuju">Setuju 
            <input type="radio" name="status" value="Tidak">Tidak
            </div>
        </div>
    <div class="card-footer">
       <a href="<?=site_url('kategori-cuti');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
</form>
<!-- /.card -->
<?=$this->endSection()?>
