@extends('templates.main')

@section('content')


<div class="row">
    <div class="col text-center" id="barra" style="width: 420px; height: 280px;"></div>
    <div class="col text-center" id="pizza" style="width: 420px; height: 280px;"></div>
</div>

<div class="row mt-2">
    <div class="col text-center" id="pizza2" style="width: 420px; height: 280px;"></div>
    <div class="col text-center" id="coluna" style="width: 420px; height: 280px;"></div>
</div>

    <script type="text/javascript">

    var datacolors_graph = <?php echo $datacolors;?>;



    google.charts.load('current', {'packages':['corechart']})
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    // Dados do Gráfico
    let data = google.visualization.arrayToDataTable(data_graph);


    // GRÁFICO DE BARRAS
    // Opções de Configuração

    let barOptions = {
    title: 'TOTAL DE MODELOS / MARCA',
    colors: ['#198754'],
    legend: 'none',
    hAxis: {
        titleTextStyle: {
            fontSize: 12,
            bold: true,
        }
    },
    vAxis: {
        },
    };

    // DESENHA GRÁFICO DE BARRAS
   Chart = new google.visualization.BarChart(document.getElementById('barra'));
    Chart.draw(data, options);

    // ================================================= //
    // GRÁFICO DE PIZZA
    // Opções de Configuração


     options = {
        title: 'TOTAL DE CARROS/ COR',
        is3D: true
    };

    // DESENHA GRÁFICO DE PIZZA
   Chart = new google.visualization.PieChart(document.getElementById('pizza'));
    Chart.draw(data, options);


     // GRÁFICO DE PIZZA
    // Opções de Configuração
   options = {
        title: 'PERCENTUAL DE CURSOS / EIXO',
        is3D: true
    };

    // DESENHA GRÁFICO DE PIZZA
    chart = new google.visualization.PieChart(document.getElementById('pizza2'));
    chart.draw(data, options);

    // ================================================= //
    // GRÁFICO DE COLUNA
    // Opções de Configuração
    options = {
    title: 'TOTAL DE CURSOS / EIXO',
    colors: ['#198754'],
    legend: 'none',
    hAxis: {
    },
    vAxis: {
        title: 'Horas Validadas',
        titleTextStyle: {
        fontSize: 12,
        bold: true,
        }
    }
    };

    // DESENHA GRÁFICO DE COLUNAS
    chart = new google.visualization.ColumnChart(document.getElementById('coluna'));
    chart.draw(data, options);

    // ================================================= //



   }
</script>

@endsection
