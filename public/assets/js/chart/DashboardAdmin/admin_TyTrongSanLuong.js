const admin_TyTrongSanLuong = document.getElementById("admin_TyTrongSanLuong");

new Chart(admin_TyTrongSanLuong, {
    type: "pie",
    data: {
        labels: ["SKU1", "SKU2", "SKU3", "SKU4"],
        datasets: [
            {
                label: "Tỷ Trọng",
                data: [254, 400, 175, 277],
                borderWidth: 1,
                backgroundColor: ["rgba(196, 37, 23)","rgba(191, 164, 8)","rgba(248, 101, 101)","rgba(179, 223, 246)"],
                borderColor: ["rgba(196, 37, 23, 0.5)","rgba(191, 164, 8, 0.5)","rgba(248, 101, 101, 0.5)","rgba(179, 223, 246, 0.5)"],
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
