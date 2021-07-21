<?=$this->extend('layout/template')?>

<?=$this->section('content')?>



<h2 class="pl-2 mb-2 pt-2">Laporan Log Pekerjaan</h2>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Laporan Log Pekerjaan</h3>
    </div>
    <div class="card-body">
    
<?php

$template = array(
	'table_open' => '<table id="tableku" class="table table-striped table-bordered">',
);

$table = new \CodeIgniter\View\Table($template);

$table->setHeading('ID', 'Log Aktivitas', 'notes', 'approval','status');

foreach ($data as $d) {

	$table->addRow($d['id'], $d['log_aktivitas'], $d['notes'], $d['approval'], $d['status']);
}
echo $table->generate();

?>


    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>
<!-- /.card -->


<?=$this->endSection()?>

<?=$this->section('scrips')?>
<script type="text/javascript">
$(document).ready(function() {
    $('#tableku').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print','excel'
        ]
    } );
} );
</script>
<?=$this->endSection()?>
