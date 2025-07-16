<div class="card">
    <div class="card-header">
        <h5>Tumanlar bo'yicha (Top 10)</h5>
    </div>
    <div class="card-body">
        <div id="basic-apex"></div>
    </div>
</div>

<script>
    // basic area chart
    var options = {
        chart: {
            height: 350,
            type: "area",
            zoom: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "straight",
        },
        series: [{
            name: "STOCK ABC",
            data: series.monthDataSeries1.prices,
        }, ],
        title: {
            text: "Fundamental Analysis of Stocks",
            align: "left",
        },
        subtitle: {
            text: "Price Movements",
            align: "left",
        },
        labels: series.monthDataSeries1.dates,
        xaxis: {
            type: "datetime",
        },
        yaxis: {
            opposite: true,
        },
        legend: {
            horizontalAlign: "left",
        },
        colors: [CubaAdminConfig.primary],
    };

    var chart = new ApexCharts(document.querySelector("#basic-apex"), options);

    chart.render();
</script>