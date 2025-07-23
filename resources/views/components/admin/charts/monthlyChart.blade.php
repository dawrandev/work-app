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
        <h5 class="mb-0">{{ $title ?? __('Monthly Dynamics') }}</h5>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                {{__('6 months')}}
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{route('admin.dashboard.chart-data', ['data' => 3])}}" data-period="3">{{__('Last 3 months')}}</a>
                <a class="dropdown-item" href="{{route('admin.dashboard.chart-data', ['data' => 6])}}" data-period="6">{{__('Last 6 months')}}</a>
                <a class="dropdown-item" href="{{route('admin.dashboard.chart-data', ['data' => 12])}}" data-period="12">{{__('Last 12 months')}}</a>
            </div>
        </div>
    </div>
    <div class="card-body apex-chart p-3">
        <div id="area-spaline" style="width: 100%; min-height: 400px;"></div>
    </div>
</div>

<script>
    // Get data from controller
    const chartData = @json($monthlyData ?? [
        'months' => $months ?? [],
        'jobs' => $jobs ?? [],
        'offers' => $offers ?? []
    ]);

    // Declare ApexCharts function first
    let chart1;

    function initChart(data) {
        var options1 = {
            chart: {
                height: 400, // Increased height
                width: '100%', // Full width
                type: "area",
                toolbar: {
                    show: false,
                },
                parentHeightOffset: 0, // Remove extra margin
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
                width: 2,
            },
            series: [{
                    name: "{{ __('Jobs') }}",
                    data: data.jobs,
                },
                {
                    name: "{{ __('Offers') }}",
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

    // Initialize chart
    document.addEventListener("DOMContentLoaded", function() {
        // Wait for container readiness
        setTimeout(() => {
            initChart(chartData);
        }, 100);
    });

    window.addEventListener('resize', function() {
        if (chart1) {
            chart1.resize();
        }
    });
</script>