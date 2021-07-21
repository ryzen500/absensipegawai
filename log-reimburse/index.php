<?=$this->extend('layout/template')?>

<?=$this->section('content')?>



<h2 class="pl-2 mb-2 pt-2">log reimburse</h2>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">log reimburse</h3>
    </div>
    <div class="card-body">
    <a href="<?=site_url('log-reimburse-create');?>" class="btn btn-success mb-2" >Tambah Data </a>
<?php

$template = array(
	'table_open' => '<table id="tableku" class="table table-striped table-bordered">',
);

$table = new \CodeIgniter\View\Table($template);

$table->setHeading('ID', 'Reimburse Cat','Notes','Event','Payment','Payment To','Payment Date', 'Aksi');

foreach ($data as $d) {
	$aksi = '<button class="btn btn-danger btn-sm btn-delete"
			data-remote="' . site_url('log-reimburse-hapus-' . $d['id']) . '" >Hapus</button> ';

	$aksi .= '<a href="' . site_url('log-reimburse-edit-' . $d['id']) . '" class="btn btn-primary btn-sm">Edit</a> ';

	$table->addRow($d['id'], $d['reimburse_cat'],$d['notes'],$d['event'],$d['payment'],$d['payment_to'],$d['payment_date'], $aksi);
}

echo $table->generate();

?>


    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->




<?=$this->endSection()?>
