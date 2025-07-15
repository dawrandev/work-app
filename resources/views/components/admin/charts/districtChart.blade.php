<div class="card">
    <div class="card-header">
        <h5>Tumanlar bo'yicha (Top 10)</h5>
    </div>
    <div class="card-body">
        <div id="basic-bar"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const data = @json($districtDistribution); // Controllerdan kelayotgan barcha tumanlar

    const sorted = data.sort((a, b) => b.total - a.total).slice(0, 10);
    const cats = sorted.map(i => i.name);
    const vals = sorted.map(i => i.total);

    const options = {
        chart: {
            height: 350,
            type: "bar",
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: true
            }
        },
        dataLabels: {
            enabled: false // 👈 Data labels o‘chirildi
        },
        series: [{
            name: 'Umumiy',
            data: vals
        }],
        xaxis: {
            categories: cats,
            labels: {
                style: {
                    fontSize: '13px'
                }
            }
        },
        colors: ["#0d6efd"]
    };

    new ApexCharts(document.querySelector("#basic-bar"), options).render();
</script>