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
            google.charts.load('current', {'packages':['bar']});
            
            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {
                // Create the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Meses', 'Professores', 'Alunos', 'Avaliações'],
                    ['Jan',  <?php print $professorMes[1]; ?>,  <?php print $alunoMes[1]; ?>,  <?php print $provaMes[1]; ?>],
                    ['Fev',  <?php print $professorMes[2]; ?>,  <?php print $alunoMes[2]; ?>,  <?php print $provaMes[2]; ?>],
                    ['Mar',  <?php print $professorMes[3]; ?>,  <?php print $alunoMes[3]; ?>,  <?php print $provaMes[3]; ?>],
                    ['Abr',  <?php print $professorMes[4]; ?>,  <?php print $alunoMes[4]; ?>,  <?php print $provaMes[4]; ?>],
                    ['Mai',  <?php print $professorMes[5]; ?>,  <?php print $alunoMes[5]; ?>,  <?php print $provaMes[5]; ?>],
                    ['Jun',  <?php print $professorMes[6]; ?>,  <?php print $alunoMes[6]; ?>,  <?php print $provaMes[6]; ?>],
                    ['Jul',  <?php print $professorMes[7]; ?>,  <?php print $alunoMes[7]; ?>,  <?php print $provaMes[7]; ?>],
                    ['Ago',  <?php print $professorMes[8]; ?>,  <?php print $alunoMes[8]; ?>,  <?php print $provaMes[8]; ?>],
                    ['Set',  <?php print $professorMes[9]; ?>,  <?php print $alunoMes[9]; ?>,  <?php print $provaMes[9]; ?>],
                    ['Out', <?php print $professorMes[10]; ?>, <?php print $alunoMes[10]; ?>, <?php print $provaMes[10]; ?>],
                    ['Nov', <?php print $professorMes[11]; ?>, <?php print $alunoMes[11]; ?>, <?php print $provaMes[11]; ?>],
                    ['Dez', <?php print $professorMes[12]; ?>, <?php print $alunoMes[12]; ?>, <?php print $provaMes[12]; ?>]
                ]);

                // Set chart options
                var options = {
                    chart: {
                        title: 'Cadastros (Mês)',
                        subtitle: 'Professores, Alunos e Avaliações: Jan-Dez',
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.charts.Bar(document.getElementById('cadastros_div'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        
        <div id="cadastros_div" style="height: 400px;"></div>

    </div>
</div>
@endsection
