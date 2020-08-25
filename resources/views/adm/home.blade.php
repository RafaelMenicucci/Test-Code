@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@if (session('status'))
    <div class="alert alert-success fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('info'))
    <div class="alert alert-warning fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card">
    <div class="card-header">Administrador</div>

    <div class="card-body">

    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
        
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Cadastros');
        data.addRows([
            ['Jan', <?php print $professorMes[1]; ?>],
            ['Fev', <?php print $professorMes[2]; ?>],
            ['Mar', <?php print $professorMes[3]; ?>],
            ['Abr', <?php print $professorMes[4]; ?>],
            ['Mai', <?php print $professorMes[5]; ?>],
            ['Jun', <?php print $professorMes[6]; ?>],
            ['Jul', <?php print $professorMes[7]; ?>],
            ['Ago', <?php print $professorMes[8]; ?>],
            ['Set', <?php print $professorMes[9]; ?>],
            ['Out', <?php print $professorMes[10]; ?>],
            ['Nov', <?php print $professorMes[11]; ?>],
            ['Dez', <?php print $professorMes[12]; ?>]
        ]);

        // Set chart options
        var options = {'title':'Professores cadastrados(Mês)',
                        'width':600,
                        'height':600};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('professor_div'));
        chart.draw(data, options);
        }
    </script>
    
    <div id="professor_div"></div>

    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
        
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Cadastros');
        data.addRows([
            ['Jan', <?php print $alunoMes[1]; ?>],
            ['Fev', <?php print $alunoMes[2]; ?>],
            ['Mar', <?php print $alunoMes[3]; ?>],
            ['Abr', <?php print $alunoMes[4]; ?>],
            ['Mai', <?php print $alunoMes[5]; ?>],
            ['Jun', <?php print $alunoMes[6]; ?>],
            ['Jul', <?php print $alunoMes[7]; ?>],
            ['Ago', <?php print $alunoMes[8]; ?>],
            ['Set', <?php print $alunoMes[9]; ?>],
            ['Out', <?php print $alunoMes[10]; ?>],
            ['Nov', <?php print $alunoMes[11]; ?>],
            ['Dez', <?php print $alunoMes[12]; ?>]
        ]);

        // Set chart options
        var options = {'title':'Alunos cadastrados(Mês)',
                        'width':600,
                        'height':600};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('aluno_div'));
        chart.draw(data, options);
        }
    </script>
    
    <div id="aluno_div"></div>

    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
        
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Criações');
        data.addRows([
            ['Jan', <?php print $provaMes[1]; ?>],
            ['Fev', <?php print $provaMes[2]; ?>],
            ['Mar', <?php print $provaMes[3]; ?>],
            ['Abr', <?php print $provaMes[4]; ?>],
            ['Mai', <?php print $provaMes[5]; ?>],
            ['Jun', <?php print $provaMes[6]; ?>],
            ['Jul', <?php print $provaMes[7]; ?>],
            ['Ago', <?php print $provaMes[8]; ?>],
            ['Set', <?php print $provaMes[9]; ?>],
            ['Out', <?php print $provaMes[10]; ?>],
            ['Nov', <?php print $provaMes[11]; ?>],
            ['Dez', <?php print $provaMes[12]; ?>]
        ]);

        // Set chart options
        var options = {'title':'Provas criadas(Mês)',
                        'width':600,
                        'height':600};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('provas_div'));
        chart.draw(data, options);
        }
    </script>
    
    <div id="provas_div"></div>

    </div>
</div>
@endsection
