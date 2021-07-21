<?=$this->extend('layout/template')?>

<?=$this->section('content')?>


<h2 class="pl-2 mb-2 pt-2">Log Reimburse</h2>


<?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil ditambahkan
                </div>';
}

?>


<form action="<?=site_url('log-reimburse-create');?>" method="post">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Log Reimburse</h3>
    </div>
    <div class="card-body">
       <div class="form-group">
          <label for="label">Reimburse Category</label>
          <select  name="reimburse_cat" class="custom-select">
            <option selected>Reimburse Cat</option>
            <option value="Makanan">Makanan</option>
            <option value="Wisata">Wisata</option>
          </select>
        </div>
        <div class="form-group">
         <label for="exampleFormControlTextarea1">Notes</label>
           <textarea class="form-control" name="notes" ></textarea>
        </div>
        <div class="form-group">
            <label for="label">Event</label>
            <input type="text"  name="event" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Payment</label>
            <input type="number"  name="payment" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Payment To</label>
            <input type="text"  name="payment_to" class="form-control"  >
        </div>
        <div class="form-group pmd-textfield pmd-textfield-floating-label">
	<label class="control-label" for="regular1">Select Date and Time</label>
	<input type="text" class="form-control" name="payment_date" id="picker">
</div>
        <!-- <div class="form-group">
            <label for="label">Payment Date</label>
            <input type="text"  name="payment_date" id="form_datetime" class="form-control"  >
        </div> -->
    </div>

    <div class="card-footer">
       <a href="<?=site_url('log-reimburse');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
</form>
<!-- /.card -->
<?=$this->endSection()?>
