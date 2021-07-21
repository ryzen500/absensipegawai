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


<form action="<?=site_url('log-datang-pulang-create');?>" method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Log Datang Pulang</h3>
    </div>
    <div class="card-body">
    <div class="form-group">
          <label for="label">Category Id</label>
          <select  name="category_id" class="custom-select">
            <option selected>Category Id</option>
            <option value="1">Izin ke dokter</option>
            <option value="2">Pulang Cepat</option>
            <option value="3">Izin terlambat</option>
          </select>
        </div>
        <div class="form-group pmd-textfield pmd-textfield-floating-label pmd-navbar-left">
	        <label class="control-label">Dates</label>
	        <input type="text" class="form-control" name="dates"  id="picker">
        </div>
        <div class="form-group">
            <label for="label">Attachment</label>
            <input type="file" name="attachment" class="form-control"  >
        </div>
        <div class="form-group pmd-textfield pmd-textfield-floating-label pmd-navbar-left">
	        <label class="control-label">Dates From</label>
	        <input type="text" class="form-control" name="dates_from" id="picker2">
        </div>
        <div class="form-group pmd-textfield pmd-textfield-floating-label pmd-navbar-left">
	        <label class="control-label">Dates To</label>
	        <input type="text" class="form-control" name="dates_to" id="picker3">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Notes</label>
            <textarea class="form-control" name="notes"  ></textarea>
       </div>
        <div class="form-group">
            <label for="label">Duration</label>
            <input type="text"  name="duration" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="label">Approval1</label>
          <select  name="approval1" class="custom-select">
            <option selected>Approval1</option>
            <option value="1, Lia Ananta Putri">1, Lia Ananta Putri</option>
            <option value="2, Amelia Dwi Cahyani">2, Amelia Dwi Cahyani</option>
            <option value="3, Siti Nur Aini">3, Siti Nur Aini</option>
            <option value="4, Achmad Tsany Wicaksono">4, Achmad Tsany Wicaksono</option>
          </select>
        </div>
        <div class="form-group">
          <label for="label">Approval2</label>
          <select  name="approval2" class="custom-select">
            <option selected>Approval2</option>
            <option value="1, Lia Ananta Putri">1, Lia Ananta Putri</option>
            <option value="2, Amelia Dwi Cahyani">2, Amelia Dwi Cahyani</option>
            <option value="3, Siti Nur Aini">3, Siti Nur Aini</option>
            <option value="4, Achmad Tsany Wicaksono">4, Achmad Tsany Wicaksono</option>
          </select>
        </div>
        <div class="form-group">
                        <div class="form-check">
                          <input  type="radio" value="Setuju" name="status">Setuju
                          <input  type="radio" value="Tidak" name="status" >Tidak
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
</form>
<!-- /.card -->
<?=$this->endSection()?>
