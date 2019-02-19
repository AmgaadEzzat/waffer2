@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-9">
        <button class="btn btn-info"id="chart1">Percent Of Products Inserted For Every Category</button>
        <button class="btn btn-info"id="chart2">Percent Search Every Day</button><br><br>
    <div id="piechart" ></div>
    <div id="piechart2"></div>
    </div>
    <div class="col-sm-1"></div>
</div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            // Load google charts
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart)
            // Draw the chart and set the chart values
            function drawChart() {
            $.ajax({
                url: "/fetchchartdate",
                method: "get",
                dataType:"json",
                success: function (data) {
                    console.log(data);

                    var data = google.visualization.arrayToDataTable(data);


                        // Optional; add a title and set the width and height of the chart
                        var options = {'title': 'Search In Each Category', 'width': 550, 'height': 400};

                        // Display the chart inside the <div> element with id="piechart"
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                    }

            }); }









            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart2)
            // Draw the chart and set the chart values
            function drawChart2() {
                $.ajax({
                    url: "/fetchdailyproduct",
                    method: "get",
                    dataType:"json",
                    success: function (data) {
                        console.log(data);

                        var data = google.visualization.arrayToDataTable(data);


                        // Optional; add a title and set the width and height of the chart
                        var options = {'title': 'Percent Of People Search Everyday', 'width': 550, 'height': 400};

                        // Display the chart inside the <div> element with id="piechart"
                        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                        chart.draw(data, options);
                    }

                }); }
                $('#piechart').fadeOut();$('#piechart2').fadeOut();
                $('#chart1').click(function () {
                    $('#piechart2').fadeOut();
                    $("#piechart2").fadeOut("slow");
                    $("#piechart2").fadeOut(6000);
                    $('#piechart').fadeIn();
                    $("#piechart").fadeIn("slow");
                    $("#piechart").fadeIn(3000);
                    }
                );
            $('#chart2').click(function () {
                    $('#piechart').fadeOut();
                $("#piechart").fadeOut("slow");
                $("#piechart").fadeOut(3000);
                    $('#piechart2').fadeIn();
                $("#piechart2").fadeIn("slow");
                $("#piechart2").fadeIn(6000);
                }
            );
        });
    </script>

@endsection