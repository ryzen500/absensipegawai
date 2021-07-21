<?=$this->extend('layout/template')?>

<?=$this->section('content')?>


<h2 class="pl-2 mb-2 pt-2">logPekerjaan</h2>


<?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil ditambahkan
                </div>';
}

?>


<form action="<?=site_url('log-pekerjaan-create');?>" method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Log Pekerjaan </h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="label">User Id</label>
            <select class="form-control" name="users_id" >
            <option value="1">Aini</option>
	        <option value="2">Icha</option>
	        <option value="3">Lia</option>
            <option value="4">Tsany</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Log Aktivitas</label>
            <input type="text" name="log_aktivitas" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Notes</label>
            <textarea class="form-control" name="notes" ></textarea>
        </div>
        <div class="form-group">
            <label for="label">Foto</label>
            <input type="file" name="attachment" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Approval</label>
            <select class="form-control" name="approval" id="approval">
	        <option value="1">icha</option>
	        <option value="2">lia</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Status</label>
            <input type="radio" name="status" value="Setuju" >Setuju
            <input type="radio" name="status" value="Tidak">Tidak
        </div>
    </div>

    <div class="card-footer">
       <a href="<?=site_url('log-pekerjaan');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
</form>
<!-- /.card -->
<?=$this->endSection()?>
