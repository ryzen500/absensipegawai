<?=$this->extend('layout/template')?>

<?=$this->section('content')?>



<h2 class="pl-2 mb-2 pt-2">Presensi</h2>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Presensi</h3>
    </div>
    <div class="card-body">
    <a href="<?=site_url('presensi-data-create');?>" class="btn btn-success mb-2" >Tambah Data </a>
<?php

$template = array(
	'table_open' => '<table id="tableku" class="table table-striped table-bordered">',
);

$table = new \CodeIgniter\View\Table($template);

$table->setHeading('ID Pegawai', 'Check In', 'Check Out', 'Foto', 'Aksi');

foreach ($data as $d) {
	$aksi = '<button class="btn btn-danger btn-sm btn-delete"
			data-remote="' . site_url('presensi-data-hapus-' . $d['id']) . '" >Hapus</button> ';

	$aksi .= '<a href="' . site_url('presensi-data-edit-' . $d['id']) . '" class="btn btn-primary btn-sm">Edit</a> ';

    $picture = '<img height="95px" width="90px" src="'.base_url('assets/'.$d['picture']).'">';

	$table->addRow($d['users_id'], $d['check_in'], $d['check_out'], $picture, $aksi);
}
//datetime-picker-12
// $table->addRow($d['users_id'], date('Y-m-d h:m:sa', strtotime($d['check_in'])), date('Y-m-d h:m:sa', strtotime($d['check_out'])), $picture, $aksi);
// }
echo $table->generate();

?>


    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->




<?=$this->endSection()?>
