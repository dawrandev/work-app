<div class="card">
    <div class="card-header">
        <h5>{{ $title ?? 'Kategoriyalar bo\'yicha' }}</h5>
    </div>
    <div class="card-body">
        <div class="loader-box">
            <div class="loader-3"></div>
        </div>
        <div id="donutchart"></div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Controllerdan kelgan category ma'lumotlarini olish
        const categoryDistribution = @json($categoryDistribution ?? []);

        // Faqat total > 0 bo'lgan kategoriyalarni olish
        const filteredData = categoryDistribution.filter(item => item.total > 0);

        // Ma'lumotlarni chart uchun tayyorlash
        const chartLabels = filteredData.length > 0 ?
            filteredData.map(item => item.name) : ['Ma\'lumot yo\'q'];

        const chartSeries = filteredData.length > 0 ? filteredData.map(item => item.total) : [1];

        // Ranglar
        const chartColors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FECA57', '#DDA0DD', '#98D8C8', '#F7DC6F'];

        // donut chart options
        var options9 = {
            chart: {
                width: '100%',
                height: 400,
                type: 'donut',
                events: {
                    dataPointMouseEnter: function(event, chartContext, config) {
                        if (filteredData.length > 0 && config.dataPointIndex >= 0) {
                            const category = filteredData[config.dataPointIndex];
                            // Markazdagi label-ni yangilash
                            chartContext.updateOptions({
                                plotOptions: {
                                    pie: {
                                        donut: {
                                            labels: {
                                                total: {
                                                    label: category.name,
                                                    formatter: function() {
                                                        return 'Ish: ' + category.jobs_count + ' | Taklif: ' + category.offers_count;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }, false, false);
                        }
                    },
                    dataPointMouseLeave: function(event, chartContext, config) {
                        // Mouse ketganda umumiy statistikaga qaytish
                        const totalJobs = filteredData.reduce((sum, item) => sum + item.jobs_count, 0);
                        const totalOffers = filteredData.reduce((sum, item) => sum + item.offers_count, 0);

                        chartContext.updateOptions({
                            plotOptions: {
                                pie: {
                                    donut: {
                                        labels: {
                                            total: {
                                                label: 'Jami',
                                                formatter: function(w) {
                                                    const total = w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                                    return total + '\nIsh: ' + totalJobs + ' | Taklif: ' + totalOffers;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }, false, false);
                    }
                }
            },
            series: chartSeries,
            labels: chartLabels,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300,
                        height: 300
                    }
                }
            }],
            colors: chartColors,
            legend: {
                show: false // Legend-ni o'chirish
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '18px',
                                fontWeight: 600,
                                color: '#333',
                                offsetY: -10
                            },
                            value: {
                                show: true,
                                fontSize: '18px',
                                fontWeight: 700,
                                color: '#333',
                                offsetY: 10,
                                formatter: function(val) {
                                    return val;
                                }
                            },
                            total: {
                                show: true,
                                showAlways: true,
                                label: 'Jami',
                                fontSize: '16px',
                                fontWeight: 600,
                                color: '#666',
                                formatter: function(w) {
                                    const total = w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                    const totalJobs = filteredData.reduce((sum, item) => sum + item.jobs_count, 0);
                                    const totalOffers = filteredData.reduce((sum, item) => sum + item.offers_count, 0);
                                    return total + '\nIsh: ' + totalJobs + ' | Taklif: ' + totalOffers;
                                }
                            }
                        }
                    }
                }
            },
            tooltip: {
                enabled: false // Tooltip-ni o'chirish, chunki markazda ko'rsatamiz
            },
            dataLabels: {
                enabled: true,
                formatter: function(val, opts) {
                    return Math.round(val) + "%";
                },
                style: {
                    fontSize: '14px',
                    fontWeight: 'bold',
                    colors: ['#fff']
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 1,
                    opacity: 0.5
                }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['#fff']
            },
            states: {
                hover: {
                    filter: {
                        type: 'darken',
                        value: 0.15
                    }
                }
            }
        };

        // Loader ni yashirish va Chart render qilish
        setTimeout(() => {
            // Loader ni yashirish
            const loaderBox = document.querySelector('.loader-box');
            if (loaderBox) {
                loaderBox.style.display = 'none';
            }

            // Chart render qilish
            try {
                var chart9 = new ApexCharts(
                    document.querySelector("#donutchart"),
                    options9
                );
                chart9.render();
            } catch (error) {
                console.error('Chart render error:', error);
                document.querySelector("#donutchart").innerHTML = '<p class="text-center text-muted">Chart yuklanishda xatolik yuz berdi</p>';
            }
        }, 500);
    });
</script>

<style>
    /* Markazdagi yozuvlar uchun stil */
    .apexcharts-datalabels-group {
        cursor: pointer;
    }

    /* Hover effekti */
    .apexcharts-pie-slice {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* Markazdagi matn */
    .apexcharts-text {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }
</style>