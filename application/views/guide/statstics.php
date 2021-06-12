<h4 dir="rtl">חשבנו שיעניין אותך לדעת:</h4>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<script type="text/javascript">
google.charts.load("current", {
    packages: ["corechart"]
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Total Expanse'],
        <?php
					foreach ($monthly_expanses as $row) {
					echo "['" . $row->months_name . "', " . $row->expanse . "],";
					}
				?>
    ]);

    var options = {
        title: 'My Expanses Per Month',
        colors: ['#4D8FAC', '#59ABE3', '#22A7F0'],
        is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data,
        options);
}
</script>

<body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html>