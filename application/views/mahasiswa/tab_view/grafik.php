<script src="<?php echo base_url()?>grafik/js/highcharts.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>grafik/js/modules/exporting.js" charset="utf-8"></script>
<script type="text/javascript">
  $(function (){
    var chart;
    $(document).ready(function() {
      chart =new Highcharts.Chart({
      chart:{
        renderTo:'container',
        type:'line',
        marginRight:130,
        marginLeft:25
      },
      title:{
        text:'Grafik Riwayat Indeks Prestasi (IP) Mahasiswa',
        x:-20
      },
      xAxis:{
        categories:[<?php echo $kategori;?>]
      },
      yAxis:{
        title:{
          text:'Indeks Prestasi'
        },
        plotlines:[{
          value:0,
          width:1,
          color:'#808080'
        }]
      },
      tooltip:{
        formatter:function(){
          return '<b>'+ this.series.name +'</b><br/>'+
          this.x +' : '+ this.y ;
        }
      },
      legend :{
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -10,
        y: 100,
        borderWidth:0
      },
      series : [{
        name :'Indeks Prestasi',
        data : <?php echo $data_chart;?>
      }]
      });
    });
  });
</script>

<div class="container" id="container" style="width:80%;height:400px;"></div>
