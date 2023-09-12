const admin_NhanSuOnOff = document.getElementById("admin_NhanSuOnOff");

new Chart(admin_NhanSuOnOff, {
    type: "pie",
    data: {
        labels: ["Online", "Offline"],
        datasets: [
            {
                label: "Nhân sự",
                data: [22,78],
                borderWidth: 1,
                backgroundColor: ["rgba(196, 37, 23)","rgba(248, 101, 101)"],
                borderColor: ["rgba(196, 37, 23, 0.5)","rgba(248, 101, 101, 0.5)"],
                datalabels: {
                    color: 'white',
                  },
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                display: false,
                scaleLabel: {
                    display: true,
                    labelString: "probability",
                },
                ticks: {
                    beginAtZero: true,
                },
            },
            x: {
                display: false,
            },
        },
        plugins: {
            legend: {
                display: false,
            },
            tooltip: { enabled: true },            
        },
    },
    plugins: [ChartDataLabels],
});
