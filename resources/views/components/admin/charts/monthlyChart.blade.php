<style>
    .apex-chart {
        width: 100% !important;
        height: 100% !important;
    }

    #area-spaline {
        width: 100% !important;
        height: 450px !important;
        min-height: 450px !important;
    }

    .card-body.apex-chart {
        padding: 20px !important;
        min-height: 500px !important;
    }
</style>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $title ?? 'Oylik dinamika' }}</h5>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Oxirgi 6 oy
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{route('admin.dashboard.chart-data', ['data' => 3])}}" data-period="3">Oxirgi 3 oy</a>
                <a class="dropdown-item" href="{{route('admin.dashboard.chart-data', ['data' => 6])}}" data-period="6">Oxirgi 6 oy</a>
                <a class="dropdown-item" href="{{route('admin.dashboard.chart-data', ['data' => 12])}}" data-period="12">Oxirgi 12 oy</a>
            </div>
        </div>
    </div>
    <div class="card-body apex-chart p-3">
        <div id="area-spaline" style="width: 100%; min-height: 400px;"></div>
    </div>
</div>

<script>
    // Controllerdan kelgan ma'lumotlarni olish
    const chartData = @json($monthlyData ?? [
        'months' => $months ?? [],
        'jobs' => $jobs ?? [],
        'offers' => $offers ?? []
    ]);

    // ApexCharts grafiki uchun funksiyani oldin e'lon qilish zarur
    let chart1;

    function initChart(data) {
        var options1 = {
            chart: {
                height: 400, // Balandlikni oshirdik
                width: '100%', // Kengligi to'liq
                type: "area",
                toolbar: {
                    show: false,
                },
                parentHeightOffset: 0, // Qo'shimcha margin ni olib tashlash
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
                width: 2,
            },
            series: [{
                    name: "Ishlar",
                    data: data.jobs,
                },
                {
                    name: "Takliflar",
                    data: data.offers,
                },
            ],
            xaxis: {
                type: "category",
                categories: data.months,
                labels: {
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            tooltip: {
                x: {
                    format: "dd/MM/yy",
                },
            },
            colors: [CubaAdminConfig.primary, CubaAdminConfig.secondary],
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'right'
            },
            grid: {
                show: true,
                strokeDashArray: 3,
                padding: {
                    left: 20,
                    right: 20,
                    top: 0,
                    bottom: 0
                }
            }
        };

        chart1 = new ApexCharts(document.querySelector("#area-spaline"), options1);
        chart1.render();
    }

    // Grafikni initialize qilish
    document.addEventListener("DOMContentLoaded", function() {
        // Container tayyorligini kutish
        setTimeout(() => {
            initChart(chartData);
        }, 100);
    });

    // Window resize da chart ni yangilash
    window.addEventListener('resize', function() {
        if (chart1) {
            chart1.resize();
        }
    });
</script>