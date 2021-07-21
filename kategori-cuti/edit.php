
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

$attributes = ['method' => 'post', 'id' => 'myform', 'enctype'=>'multipart/form-data'];
echo form_open('kategori-cuti-edit-' . $data['id'], $attributes);

?>

<div class="card-header">
        <h3 class="card-title">Edit Data Cuti</h3>
    </div>
    <div class="card-body">
    <div class="card-body">
        <div class="form-group">
            <label for="label">User Id</label>
            <select class="form-control" <?=$user = $data['users_id'];?>name="users_id" >
            <option value="1" <?=($user  == '1') ?"selected":""?>>Aini</option>
	        <option value="2" <?=($user  == '2') ?"selected":""?>>Icha</option>
	        <option value="3" <?=($user  == '3') ?"selected":""?>>Lia</option>
            <option value="4" <?=($user  == '4') ?"selected":""?>>Tsany</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Category:</label>
            <select name="category_id" class="form-control" <?=$category  = $data['category_id'];?>>
                <option >category</option>
                <option value="1" <?=($category  == '1') ?"selected":""?>>Cuti Sakit</option>
                <option value="2" <?=($category  == '2') ?"selected":""?>>Cuti Hamil</option>
                <option value="3" <?=($category  == '3') ?"selected":""?>>Cuti Penting</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Date:</label>
            <div class="input-group"  >
                <input type="text" id="date" name="dates"  class="form-control" value="<?=$data['dates'];?>" >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Attachment:</label>
            <input type="file" name="attachment" class="form-control" value="<?=$data['attachment'];?>" >
        </div>
        <div class="form-group">
            <label for="label">Dates From:</label>
            <div class="input-group"  >
                <input id="dates-from" type="text" name="dates_from" class="form-control" value="<?=$data['dates_from'];?>" >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Dates To:</label>
            <div class="input-group"  >
                <input id="dates-to" type="text" name="dates_to" class="form-control" value="<?=$data['dates_to'];?>" >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label for="label">Duration:</label>
            <input type="number" name="duration" class="form-control" value="<?=$data['duration'];?>" >
        </div>
        <div class="form-group">
            <label for="label">Approval 1:</label>
            <select name="approval1" class="form-control" <?=$approv1 = $data['approval1'];?>>
                <option >Approval 1</option>
                <option value="1" <?=($approv1 == '1') ?"selected":""?>>Nanang</option>
                <option value="2" <?=($approv1 == '2') ?"selected":""?>>Dino</option>
                <option value="3" <?=($approv1 == '3') ?"selected":""?>>Jeana</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label">Approval 2:</label>
            <select name="approval2" class="form-control" <?=$approv2 = $data['approval2'];?>>
                <option >Approval 2</option>
                <option value="1" <?=($approv2 == '1') ?"selected":""?>>Nanang</option>
                <option value="2" <?=($approv2 == '2') ?"selected":""?>>Dino</option>
                <option value="3" <?=($approv2 == '3') ?"selected":""?>>Jeana</option>
            </select>
        </div>
        <div class="form-group">
        <label for="label" >Status:</label>
            <div class="form-check" <?=$status = $data['status'];?>>
            <input type="radio" name="status" value="Setuju" <?=($status == 'Setuju') ?"checked":""?> >Setuju 
            <input type="radio" name="status" value="Tidak"  <?=($status == 'Tidak') ?"checked":""?> > Tidak
            </div>
        </div>
    <div class="card-footer">
       <a href="<?=site_url('kategori-cuti');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<?=form_close();?>
<!-- /.card -->

<?=$this->endSection()?>
