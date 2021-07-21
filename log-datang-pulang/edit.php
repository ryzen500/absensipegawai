
<?=$this->extend('layout/template')?>

<?=$this->section('content')?>

<h2 class="pl-2 mb-2 pt-2">Log Datang Pulang</h2>


<?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil ditambahkan
                </div>';
}

?>

 <?php


$attributes = ['method' => 'post', 'id' => 'myform','enctype'=>'multipart/form-data'];
echo form_open('log-datang-pulang-edit-' . $data['id'], $attributes);

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Log Datang Pulang</h3>
    </div>
    <div class="card-body">
    <div class="form-group">
          <label for="label">Category Id</label>
          <select  name="category_id" class="custom-select">
            <option value="<?=$data['category_id'];?>"  selected>Category Id</option>
            <option value="1">Izin ke dokter</option>
            <option value="2">Pulang Cepat</option>
            <option value="3">Izin terlambat</option>
          </select>
        </div>
        <div class="form-group pmd-textfield pmd-textfield-floating-label pmd-navbar-left">
	        <label class="control-label">Dates</label>
	        <input type="text" class="form-control" name="dates" value="<?=$data['dates'];?>"  id="picker">
        </div>
        <div class="form-group">
            <label for="label">Attachment</label>
            <input type="file" value="<?=$data['attachment'];?>" name="attachment" class="form-control"  >
        </div>
        <div class="form-group pmd-textfield pmd-textfield-floating-label pmd-navbar-left">
	        <label class="control-label">Dates From</label>
	        <input type="text" class="form-control" name="dates_from" value="<?=$data['dates_from'];?>"  id="picker2">
        </div>
        <div class="form-group pmd-textfield pmd-textfield-floating-label pmd-navbar-left">
	        <label class="control-label">Dates To</label>
	        <input type="text" class="form-control" name="dates_to" value="<?=$data['dates_to'];?>"  id="picker3">
        </div>
        <div class="form-group">
            <label >Notes</label>
            <textarea class="form-control" name="notes" ><?=$data['notes'];?></textarea>
       </div>
        <div class="form-group">
            <label for="label">Duration</label>
            <input type="text" value="<?=$data['duration'];?>" name="duration" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="label">Approval1</label>
          <select  name="approval1" class="custom-select" <?=$approval1 = $data['approval1'];?>>
            <option value="1" <?=($approval1 == '1') ?"selected":""?>>1, Lia Ananta Putri</option>
            <option value="2" <?=($approval1 == '2') ?"selected":""?>>2, Amelia Dwi Cahyani</option>
            <option value="3" <?=($approval1 == '3') ?"selected":""?>>3, Siti Nur Aini</option>
            <option value="4" <?=($approval1 == '4') ?"selected":""?>>4, Achmad Tsany Wicaksono</option>
        </div>
        <div class="form-group">
          <label for="label">Approval2</label>
          <select  name="approval2" class="custom-select" <?=$approval2 = $data['approval2'];?> >
            <option value="1" <?=($approval2 == '1') ?"selected":""?>>1, Lia Ananta Putri</option>
            <option value="2" <?=($approval2 == '2') ?"selected":""?>>2, Amelia Dwi Cahyani</option>
            <option value="3" <?=($approval2 == '3') ?"selected":""?>>3, Siti Nur Aini</option>
            <option value="4" <?=($approval2 == '4') ?"selected":""?>>4, Achmad Tsany Wicaksono</option>
          </select>
        </div>
        <div class="form-group">
          <div class="form-check" <?=$status = $data['status'];?>>
            <input  type="radio" value="setuju"  <?=($status == 'Setuju') ?"checked":""?> name="status">Setuju
            <input  type="radio" value="tidak"  <?=($status == 'Tidak') ?"checked":""?> name="status" >Tidak
          </div>
        </div>
    </div>


    <div class="card-footer">
       <a href="<?=site_url('log-datang-pulang');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<?=form_close();?>
<!-- /.card -->

<?=$this->endSection()?>
