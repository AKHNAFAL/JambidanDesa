var totalPendapatan = [];
var totalBelanja = [];

for (var year in data) {
    if (data.hasOwnProperty(year)) {
        totalPendapatan.push(data[year].totalPendapatan);
        totalBelanja.push(data[year].totalBelanja);
    }
}

// Fungsi untuk memformat angka menjadi format Rupiah yang dipersingkat
function formatRupiahSingkat(angka) {
    if (angka >= 1000000000) {
        return (angka / 1000000000).toFixed(2) + ' Miliar';
    } else if (angka >= 1000000) {
        return (angka / 1000000).toFixed(2) + ' Juta';
    } else if (angka >= 1000) {
        return (angka / 1000).toFixed(0) + ' Ribu';
    }
    return angka;
}

// Variable to store the chart instances
var chartPendapatan, chartBelanja;
// Function to render charts
function renderChartsAnggaran() {
    // Destroy existing charts if they exist
    if (chartPendapatan) {
        chartPendapatan.destroy();
    }
    if (chartBelanja) {
        chartBelanja.destroy();
    }

    // Chart options for Total Pendapatan
    var optionsPendapatan = {
        series: [{
            name: "Total Pendapatan",
            data: totalPendapatan
        }],
        chart: {
            id: 'pendapatan',
            group: 'anggaran',
            type: 'area',
            height: 160
        },
        colors: ['#33B85F'],
        xaxis: {
            categories: years,
            labels: {
                style: {
                    colors: '#E0E0E0'
                }
            },
            axisBorder: {
                show: true,
                color: '#777'
            },
            axisTicks: {
                show: true,
                color: '#777'
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: "#33B85F"
                },
                formatter: function (value) {
                    return formatRupiahSingkat(value);
                }
            },
            title: {
                text: "Total Pendapatan",
                style: {
                    color: "#fff",
                    fontWeight: "normal"
                }
            }
        },
        markers: {
            size: 5,
            colors: ['#33B85F'],
            strokeColors: '#fff',
            strokeWidth: 2,
            hover: {
                size: 7,
            }
        },
        dataLabels: {
            enabled: false,
        },
        grid: {
            borderColor: '#555'
        },
        legend: {
            horizontalAlign: "left",
            offsetX: 40,
            labels: {
                colors: '#E0E0E0'
            }
        }
    };

    chartPendapatan = new ApexCharts(document.querySelector("#chart-total-pendapatan"), optionsPendapatan);
    chartPendapatan.render();

    // Chart options for Total Belanja
    var optionsBelanja = {
        series: [{
            name: "Total Belanja",
            data: totalBelanja
        }],
        chart: {
            id: 'belanja',
            group: 'anggaran',
            type: 'area',
            height: 160
        },
        colors: ['#F9CB33'],
        xaxis: {
            categories: years,
            labels: {
                style: {
                    colors: '#E0E0E0'
                }
            },
            axisBorder: {
                show: true,
                color: '#777'
            },
            axisTicks: {
                show: true,
                color: '#777'
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: "#F9CB33"
                },
                formatter: function (value) {
                    return formatRupiahSingkat(value);
                }
            },
            title: {
                text: "Total Belanja",
                style: {
                    color: "#fff",
                    fontWeight: "normal"
                }
            }
        },
        markers: {
            size: 5,
            colors: ['#F9CB33'],
            strokeColors: '#fff',
            strokeWidth: 2,
            hover: {
                size: 7,
            }
        },
        dataLabels: {
            enabled: false
        },
        grid: {
            borderColor: '#555'
        },
        legend: {
            horizontalAlign: "left",
            offsetX: 40,
            labels: {
                colors: '#E0E0E0'
            }
        }
    };

    chartBelanja = new ApexCharts(document.querySelector("#chart-total-belanja"), optionsBelanja);
    chartBelanja.render();
}

renderChartsAnggaran()

