@extends('app')

@section('content')

<div class="container">
<div class="panel panel-default">
   <div class="panel-heading">
   Tablero de Control - Centro de formaci&oacute;n Judicial
   </div>

  <div class="panel-body">
  <?php 
 // echo "<pre>";
 // print_r($input);
  ?>
  <div class="row">
   <div class="col-lg-6">
              <div class="panel panel-default">
                  <!--div class="panel-heading">
                  Gr&aacute;fico
                  </div-->
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                  <div id="pieChart"></div>

                      <!--div class="flot-chart">
                          <div class="flot-chart-content" id="flot-pie-chart"></div>
                      </div-->
                  </div>
                  <!-- /.panel-body -->
              </div>
              <!-- /.panel -->
    </div>  


   <div class="col-lg-4">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Cargo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $dat)
              <tr>
              <td> {{$dat->car_nombre}}</td>
              <td> {{$dat->cantidad}}</td>
              </tr>
            @endforeach
            </tbody>
            </table>
    </div></div></div>        
  	<!--div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>3326</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:29 PM</td>
                                                    <td>$321.33</td>
                                                </tr>
                                                <tr>
                                                    <td>3325</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:20 PM</td>
                                                    <td>$234.34</td>
                                                </tr>
                                                <tr>
                                                    <td>3324</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:03 PM</td>
                                                    <td>$724.17</td>
                                                </tr>
                                                <tr>
                                                    <td>3323</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:00 PM</td>
                                                    <td>$23.71</td>
                                                </tr>
                                                <tr>
                                                    <td>3322</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:49 PM</td>
                                                    <td>$8345.23</td>
                                                </tr>
                                                <tr>
                                                    <td>3321</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:23 PM</td>
                                                    <td>$245.12</td>
                                                </tr>
                                                <tr>
                                                    <td>3320</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:15 PM</td>
                                                    <td>$5663.54</td>
                                                </tr>
                                                <tr>
                                                    <td>3319</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:13 PM</td>
                                                    <td>$943.45</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
</div-->

</div>
<!--script src="{!! URL::asset('/js/flot-data.js'); !!}"></script-->
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.4/d3.min.js"></script>
<script src="{!! URL::asset('/js/d3pie.js'); !!}"></script>
<?php $variablephp = " esto es una variable"?>
<script>
/*d3.json("./estadisticas", function(error, json) {
  if (error) return console.warn(error);
  data = json;
  console.debug(data);
});
*/
var datos =  '<?php echo $json_data ; ?>';
var datos_obj = JSON.parse(datos);
//console.debug(datos);


var obj_data = new Object();
obj_data.sortOrder = "value-desc";
obj_data.content = new Array();
//obj_data.content = datos_obj;
for (i = 0; i < datos_obj.length; i++) { 
var hue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
    datos_obj[i].color = hue;
    obj_data.content.push(datos_obj[i]);
}

var d3pie_data = JSON.stringify(obj_data);
console.debug(obj_data);
/*  '{
    "sortOrder": "value-desc"
    ,"content": datos
  }';*/
//console.debug(obj_data);
//'<?php echo "<pre>"; print_r($json_data) ; ?>' ;
//document.write("VariableJS = " + variablejs);
//console.debug(obj_data);


var oo = {
    "sortOrder": "value-desc",
    "content": [
      {
        "label": "JavaScript",
        "value": 264131,
        "color": "#2484c1"
      },
      {
        "label": "Ruby",
        "value": 218812,
        "color": "#0c6197"
      }
      ]
};
console.debug(oo);

var pie = new d3pie("pieChart", {
  "header": {
    "title": {
      "text": "Cargo por Curso",
      "fontSize": 24,
      "font": "open sans"
    },
    "subtitle": {
      "color": "#999999",
      "fontSize": 12,
      "font": "open sans"
    },
    "titleSubtitlePadding": 9
  },
  "footer": {
    "color": "#999999",
    "fontSize": 10,
    "font": "open sans",
    "location": "bottom-left"
  },
  "size": {
    "canvasWidth": 590,
    "pieOuterRadius": "90%"
  },
  "data": obj_data//oo 
  ,"labels": {
    "outer": {
      "pieDistance": 32
    },
    "inner": {
      "hideWhenLessThanPercentage": 3
    },
    "mainLabel": {
      "fontSize": 11
    },
    "percentage": {
      "color": "#ffffff",
      "decimalPlaces": 0
    },
    "value": {
      "color": "#adadad",
      "fontSize": 11
    },
    "lines": {
      "enabled": true
    },
    "truncation": {
      "enabled": true
    }
  },
  "effects": {
    "pullOutSegmentOnClick": {
      "effect": "linear",
      "speed": 400,
      "size": 8
    }
  },
  "misc": {
    "gradient": {
      "enabled": true,
      "percentage": 100
    }
  }
});
</script>
@stop
<!--{ \App\Comarca::find($hobbit->comarca_id)->comarca }-->
<!--{
    "sortOrder": "value-desc",
    "content": [
      {
        "label": "ASESOR",
        "value": 264131,
        "color": "#2484c1"
      },
      {
        "label": "AUXILIAR",
        "value": 218812,
        "color": "#0c6197"
      },
      {
        "label": "AUXILIAR DE SERVICIO\t",
        "value": 157618,
        "color": "#4daa4b"
      },
      {
        "label": "ESCRIBIENTE",
        "value": 114384,
        "color": "#90c469"
      },
      {
        "label": "OFICIAL ",
        "value": 95002,
        "color": "#daca61"
      },
      {
        "label": "OFICIAL MAYOR",
        "value": 78327,
        "color": "#e4a14b"
      },
      {
        "label": "JUEZ",
        "value": 67706,
        "color": "#e98125"
      },
      {
        "label": "FISCAL",
        "value": 36344,
        "color": "#cb2121"
      },
      {
        "label": "JUEZ",
        "value": 28561,
        "color": "#830909"
      }
    ]-->