
<?=$this->extend('layout/template')?>

<?=$this->section('content')?>

<h2 class="pl-2 mb-2 pt-2">log reimburse</h2>


 <?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil di edit
                </div>';
}

$attributes = ['method' => 'post', 'id' => 'myform'];
echo form_open('log-reimburse-edit-' . $data['id'], $attributes);

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Log Reimburse</h3>
    </div>
    <div class="card-body">
    <div class="form-group">
          <label for="label">Reimburse Category</label>
          <select  name="reimburse_cat" class="custom-select">
            <option value="<?=$data['reimburse_cat'];?>"  selected>Reimburse Cat</option>
            <option value="Makanan">Makanan</option>
            <option value="Wisata">Wisata</option>
          </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Notes</label>
            <textarea class="form-control" name="notes" ><?=$data['notes'];?> </textarea>
       </div>
        <div class="form-group">
            <label for="label">Event</label>
            <input type="text" value="<?=$data['event'];?>" name="event" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Payment</label>
            <input type="number" value="<?=$data['payment'];?>" name="payment" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Payment To</label>
            <input type="text" value="<?=$data['payment_to'];?>" name="payment_to" class="form-control"  >
        </div>
        <div class="form-group pmd-textfield pmd-textfield-floating-label pmd-navbar-left">
	        <label class="control-label" for="regular1">payment_date</label>
	        <input type="text" class="form-control" name="payment_date" value="<?=$data['payment_date'];?>"  id="picker">
        </div>
        <!-- <div class="form-group">
            <label for="label">Payment Date</label>
            <input type="datetime"  name="payment_date" class="form-control"  >
        </div> -->
    </div>

    <div class="card-footer">
       <a href="<?=site_url('log-reimburse');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<?=form_close();?>
<!-- /.card -->

<?=$this->endSection()?>
