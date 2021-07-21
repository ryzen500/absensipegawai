<?=$this->extend('layout/template')?>

<?=$this->section('content')?>



<h2 class="pl-2 mb-2 pt-2">Data Kantor</h2>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Log Pekerjaan</h3>
    </div>
    <div class="card-body">
    <a href="<?=site_url('log-pekerjaan-create');?>" class="btn btn-success mb-2" >Tambah Data </a>
<?php

$template = array(
	'table_open' => '<table id="tableku" class="table table-striped table-bordered">',
);

$table = new \CodeIgniter\View\Table($template);

$table->setHeading( 'User id', 'Log aktivitas', 'Notes', 'Foto', 'Approval', 'Status', 'Aksi');

foreach ($data as $d) {
	$aksi = '<button class="btn btn-danger btn-sm btn-delete"
			data-remote="' . site_url('log-pekerjaan-hapus-' . $d['id']) . '" >Hapus</button> ';

	$aksi .= '<a href="' . site_url('log-pekerjaan-edit-' . $d['id']) . '" class="btn btn-primary btn-sm">Edit</a> ';

    $gambar= '<img height="95px" width="90px" src="'.base_url('img/'.$d['attachment']).'">';

	$table->addRow( $d['users_id'], $d['log_aktivitas'], $d['notes'], $gambar, $d['approval'], $d['status'],  $aksi);
}

echo $table->generate();

?>


    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->




<?=$this->endSection()?>
