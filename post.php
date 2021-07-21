<?=$this->extend('layout/template')?>

<?=$this->section('content')?>
<div class="row">
<div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-head-side-cough"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cuti Sakit</span>
                <span class="info-box-number"><?= $sakit->sakit?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
</div>


            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-ambulance"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cuti Hamil</span>
                <span class="info-box-number"><?= $hamil->hamil?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
</div>

            <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cuti Penting</span>
                <span class="info-box-number"><?= $urgent->urgent?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
</div>


<div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pegawai</span>
                <span class="info-box-number"><?= $total->total?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
</div>
</div>

<div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
                  
<?=$this->endSection()?>

<?=$this->section('scrips')?>
<script type="text/javascript">

 var areaChartData = {

<?php
// function random_color_part() {
//   return str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
// }

// function random_color() {
//   return random_color_part() . random_color_part() . random_color_part();
// }
function randomColor(){
  $rcolor = '#';
  for($i=0;$i<6;$i++){
  $rNumber = rand(0,15);
  switch ($rNumber) {
  case 10:$rNumber='A';
  break;
  case 11:$rNumber='B';
  break;
  case 12:$rNumber='C';
  break;
  case 13:$rNumber='D';
  break;
  case 14:$rNumber='E';
  break;
  case 15:$rNumber='F';
  break;
}
  $rcolor .= $rNumber;
}
  // $rcolor = '#FF0000';
  return $rcolor;
}
    $bln= array();
   

    $namaBulan = array("Januari","February","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

  error_reporting(0);
   
  foreach($grafik as $g)
  {
      $bln[]=$g->bulan;
    
    }


  //Duplicate dari Grafik
  // foreach($penting as $p)
  // {
  //     $bln1[]=$penting->moon;
  // }
  

  $bln = (array_unique($bln));
  $blnString='';
  foreach($bln as $b)
  {
      $blnString .= "'".$namaBulan[$b-1]."',";
  }
    $blnString = rtrim($blnString,',');
?>
      labels  : [<?=$blnString;?>],
      // labels  : ['January'],

      datasets: [
        <?php 
          foreach($grafik as $g){
            $data_grafik= array();
          // foreach($penting as $p)
          foreach($bln as $b)
          {
            
              if($b == $g->bulan){
                $data_grafik[]=$g->jml;
              }
              else{
                $data_grafik[]=0;
              }
          }
        echo"
          {
            label               : '".$g->name."',
            backgroundColor     : '".randomColor()."',
            borderColor         : '".randomColor()."',
            pointRadius          : false,
            pointColor          : '#F0F8FF',
            pointStrokeColor    : '".randomColor()."',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: '".randomColor()."',
            data                : [".join(",",$data_grafik)."]
          }, ";
        }
        ?>
    

        // {
        //   label               : 'Pegawai Cuti Sakit',
        //   backgroundColor     : 'rgba(210, 214, 222, 1)',     
        //   borderColor         : 'rgba(210, 214, 222, 1)',
        //   pointRadius          : false,
        //   pointColor          : 'rgba(210, 214, 222, 1)',
        //   pointStrokeColor    : '#c1c7d1',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(220,220,220,1)',
        //   data                :
        // },
        // {
        //   label               : 'Pegawai Cuti Hamil',
        //   backgroundColor     : 'rgba(60,141,188,0.9)',
        //   borderColor         : 'rgba(60,141,188,0.8)',
        //   pointRadius          : false,
        //   pointColor          : '#3b8bba',
        //   pointStrokeColor    : 'rgba(60,141,188,1)',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(60,141,188,1)',
        // },
        // {
        //   label               : 'Pegawai Cuti Penting',
        //   backgroundColor     : 'rgba(255,0,0,1.0)',
        //   borderColor         : 'rgba(60,141,188,0.8)',
        //   pointRadius          : false,
        //   pointColor          : '#3b8bba',
        //   pointStrokeColor    : 'rgba(60,141,188,1)',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(60,141,188,1)',
        // },
        // {
        //   label               : 'Electronics',
        //   backgroundColor     : 'rgba(210, 214, 222, 1)',
        //   borderColor         : 'rgba(210, 214, 222, 1)',
        //   pointRadius         : false,
        //   pointColor          : 'rgba(210, 214, 222, 1)',
        //   pointStrokeColor    : '#c1c7d1',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(220,220,220,1)',
        //   data                : [65, 59, 80, 81, 56, 55, 40]
        // },
      ]
    
    }
 var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

</script>
<?=$this->endSection()?>

