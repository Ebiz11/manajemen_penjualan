
       <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
       <script type="text/javascript">
$(function () {

   $(document).ready(function() {

       Highcharts.visualize = function(table, options) {

           options.xAxis.categories = [];
           $('tbody th', table).each( function(i) {
               options.xAxis.categories.push(this.innerHTML);
           });

           options.series = [];
           $('tr', table).each( function(i) {
               var tr = this;
               $('th, td', tr).each( function(j) {
                   if (j > 0) { // skip first column
                       if (i == 0) { // get the name and init the series
                           options.series[j - 1] = {
                               name: this.innerHTML,
                               data: []
                           };
                       } else { // add values
                           options.series[j - 1].data.push(parseFloat(this.innerHTML));
                       }
                   }
               });
           });

           var chart = new Highcharts.Chart(options);
       }

       var table = document.getElementById('datatable'),
       options = {
           chart: {
               renderTo: 'container',
               type: 'column'
           },
           title: {
               text: 'HARGA BAHAN BAKAR KENDARAAN'
           },
           xAxis: {
           },
           yAxis: {
               title: {
                   text: 'Harga Minyak (Rp)'
               }
           },
           tooltip: {
               formatter: function() {
                   return '<b>'+ this.series.name +'</b><br/>'+
                       this.x +': Rp.'+ this.y ;
               }
           }
       };

       Highcharts.visualize(table, options);
   });

});
       </script>



     <script src="../js/highchart.js"></script>
     <script src="../js/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<table border="1" id="datatable">
   <thead>
<tr>
           <th><div align="center">BULAN</div></th>
           <th><div align="center">PREMIUM</div></th>
           <th><div align="center">PERTAMAX</div></th>
           <th><div align="center">SOLAR</div></th>
           <th><div align="center">PREMIUM</div></th>
           <th><div align="center">PERTAMAX</div></th>
           <th><div align="center">SOLAR</div></th>
       </tr>
   </thead>
   <tbody>
       <tr>
           <th><div align="left">Januari</div></th>
           <td>5500</td>
           <td>9800</td>
           <td>12000</td>
           <td>5500</td>
           <td>9800</td>
           <td>12000</td>
       </tr>
       <tr>
           <th><div align="left">Februari</div></th>
           <td>4500</td>
           <td>9500</td>
           <td>5500</td>
           <td>5500</td>
           <td>9800</td>
           <td>12000</td>
       </tr>
       <tr>
           <th><div align="left">Maret</div></th>
           <td>4500</td>
           <td>8750</td>
           <td>5000</td>
           <td>5500</td>
           <td>9800</td>
           <td>12000</td>
       </tr>
       <tr>
           <th><div align="left">April</div></th>
           <td>4500</td>
           <td>8800</td>
           <td>5000</td>
           <td>5500</td>
           <td>9800</td>
           <td>12000</td>
       </tr>
       <tr>
           <th ><div align="left" ><?php echo date("Y"); ?></div></th>
           <td>4500</td>
           <td>8500</td>
           <td>5000</td>
           <td>5500</td>
           <td>9800</td>
           <td>12000</td>
       </tr>
   </tbody>

</table>
