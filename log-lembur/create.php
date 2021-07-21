<?=$this->extend('layout/template')?>

<?=$this->section('content')?>


<h2 class="pl-2 mb-2 pt-2">logLembur</h2>


<?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil ditambahkan
                </div>';
}

?>


<form action="<?=site_url('logLembur-create');?>" method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Log Lembur </h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="label">User</label>
            <input type="text" name="user_id" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Dates</label>
            <input type="date" name="dates" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Foto</label>
            <input type="file" name="attachment" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Dates_from</label>
            <input type="date" name="dates_from" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Dates_to</label>
            <input type="date" name="dates_to" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Notes</label>
            <input type="text" name="notes" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Duration</label>
            <input type="time" name="duration" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Approval</label>
            <select class="form-control" name="approval" id="approval">
	        <option value="1">Icha</option>
	        <option value="2">Lia</option>
            <option value="3">Tsany</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Status</label>
            <input type="radio" name="status" value="Yes" >Yes
            <input type="radio" name="status" value="No">No
        </div>
    </div>

    <div class="card-footer">
       <a href="<?=site_url('logLembur');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
</form>
<!-- /.card -->
<?=$this->endSection()?>
