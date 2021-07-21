
<?=$this->extend('layout/template')?>

<?=$this->section('content')?>

<h2 class="pl-2 mb-2 pt-2"> Log Pekerjaaan</h2>


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
echo form_open('log-pekerjaan-edit-' . $data['id'], $attributes);

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit logPekerjaan</h3>
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
            <label for="label">Log-Aktivitas</label>
            <input type="text" value="<?=$data['log_aktivitas'];?>" name="log_aktivitas" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Notes</label>
            <textarea class="form-control" name="notes" ><?=$data['notes'];?></textarea>
        </div>
        <div class="form-group">
            <label for="label">Foto</label>
            <input type="file" value="<?=$data['attachment'];?>" name="attachment" class="form-control"  >
        </div>
        <div class="form-group">
            <label for="label">Approval</label>
            <select class="form-control"<?=$approv = $data['approval'];?> name="approval" class="form-control"  >
	        <option value="1" <?=($approv == '1') ?"selected":""?>>Icha</option>
	        <option value="2" <?=($approv == '2') ?"selected":""?>>Lia</option>
            </select>
        </div>
        <div class="form-group">
            <label for="label" >Status</label>
        <div class="form-check" <?=$status=$data['status'];?>>
            <input type="radio" name="status" value="Setuju" <?=($status == 'Setuju' )? "checked" : ""; ?> >Setuju
            <input type="radio" name="status" value="Tidak" <?=($status == 'Tidak' )? "checked" : ""; ?> >Tidak
        </div>
        </div>
    </div>

    <div class="card-footer">
       <a href="<?=site_url('log-pekerjaan');?>" class="btn btn-default mr-1">Kembali</a>
       <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<?=form_close();?>
<!-- /.card -->

<?=$this->endSection()?>
