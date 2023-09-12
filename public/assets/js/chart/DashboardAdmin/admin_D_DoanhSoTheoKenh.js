const admin_D_DoanhSoTheoKenh = document.getElementById("admin_D_DoanhSoTheoKenh");

new Chart(admin_D_DoanhSoTheoKenh, {
    type: "doughnut",
    data: {
        labels: ["Kênh A", "Kênh B", "Kênh C", "Kênh D"],
        datasets: [
            {
                label: "Doanh số",
                data: [164, 279, 147, 255],
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
        barPercentage:0.5,    
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
                labels:{
                    font: {
                      size:8
                    },
                    boxWidth:8,
                  },
                position:'right',

            },
            tooltip: { enabled: true },
        },
    },
    plugins: [ChartDataLabels],

});
