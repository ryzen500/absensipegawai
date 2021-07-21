<?=$this->extend('layout/template')?>

<?=$this->section('content')?>



<h2 class="pl-2 mb-2 pt-2">Data User</h2>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
    </div>
    <div class="card-body">
    <a href="<?=site_url('user-create');?>" class="btn btn-success mb-2" >Tambah Data </a>
<?php

$template = array(
	'table_open' => '<table id="tableku" class="table table-striped table-bordered">',
);

$table = new \CodeIgniter\View\Table($template);

$table->setHeading('Nama','Pegawai ID','foto','Email', 'Aksi');

foreach ($data as $d) {
	$aksi = '<button class="btn btn-danger btn-sm btn-delete"
			data-remote="' . site_url('user-hapus-' . $d['id']) . '" >Hapus</button> ';

	$aksi .= '<a href="' . site_url('user-edit-' . $d['id']) . '" class="btn btn-primary btn-sm">Edit</a> ';

    $img = '<img height="95px" width="90px" src="'.base_url('assets/'.$d['picture']).'">';

	$table->addRow( $d['name'],$d['person_id'],$img,$d['email'], $aksi);
}

echo $table->generate();

?>


    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->




<?=$this->endSection()?>
