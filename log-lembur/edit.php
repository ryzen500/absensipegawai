
<?=$this->extend('layout/template')?>

<?=$this->section('content')?>

<h2 class="pl-2 mb-2 pt-2"> Log Lembur</h2>


<?php

if (@$success) {
	echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> info!</h5>
                  Data Berhasil di edit
                </div>';

            
        }else{
            
        }


$attributes = ['method' => 'post', 'id' => 'myform', 'enctype'=>'multipart/form-data'];
echo form_open('logLembur-edit-' . $data['id'], $attributes);

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit logLembur</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="label">User</label>
            <input type="text" value="<?=$data['user_id'];?>" name="user_id" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Dates</label>
            <input type="date" value="<?=$data['dates'];?>" name="dates" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Foto</label>
            <input type="file" value="<?=$data['attachment'];?>" name="attachment" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Dates From</label>
            <input type="date" value="<?=$data['dates_from'];?>" name="dates_from" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Dates To</label>
            <input type="date" value="<?=$data['dates_to'];?>" name="dates_to" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Notes</label>
            <input type="text" value="<?=$data['notes'];?>" name="notes" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Duration</label>
            <input type="time" value="<?=$data['duration'];?>" name="duration" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Approval</label>
            <select class="form-control" value="<?=$data['approval'];?>" name="approval" class="form-control"  >
	        <option value="1">Icha</option>
	        <option value="2">Lia</option>
            <option value="2">Tsany</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label" >Status</label>
        <div class="form-check" <?=$status=$data['status'];?>>
            <input type="radio" name="status" value="Yes" <?=($status == 'Yes' )? "checked" : ""; ?> >Yes
            <input type="radio" name="status" value="No" <?=($status == 'No' )? "checked" : ""; ?> >No
        </div>
        </div>
    </div>

    <div class="card-footer">
       <a href="<?=site_url('logLembur');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<?=form_close();?>
<!-- /.card -->

<?=$this->endSection()?>
