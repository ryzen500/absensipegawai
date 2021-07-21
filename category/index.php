<?=$this->extend('layout/template')?>

<?=$this->section('content')?>



<h2 class="pl-2 mb-2 pt-2">Kategori</h2>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kategori</h3>
    </div>
    <div class="card-body">
    <a href="<?=site_url('category-create');?>" class="btn btn-success mb-2" >Tambah Data </a>
<?php

$template = array(
	'table_open' => '<table id="tableku" class="table table-striped table-bordered">',
);

$table = new \CodeIgniter\View\Table($template);

$table->setHeading('User ID', 'Name','ref Days','type', 'Aksi');

foreach ($data as $d) {
	$aksi = '<button class="btn btn-danger btn-sm btn-delete"
			data-remote="' . site_url('category-hapus-' . $d['id']) . '" >Hapus</button> ';

	$aksi .= '<a href="' . site_url('category-edit-' . $d['id']) . '" class="btn btn-primary btn-sm">Edit</a> ';

	$table->addRow($d['users_id'], $d['name'],$d['ref_days'], $d['type'], $aksi);
}

echo $table->generate();

?>


    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->




<?=$this->endSection()?>
