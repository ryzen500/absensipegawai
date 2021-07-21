<?=$this->extend('layout/template')?>

<?=$this->section('content')?>

<?php $session=session(); 

echo "<h1>Welcome ".$session->get('name')."</h1>";
?>


<?=$this->endSection()?>

