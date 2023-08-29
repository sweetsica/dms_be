const admin_D_DoanhSoTheoVung = document.getElementById("admin_D_DoanhSoTheoVung");

new Chart(admin_D_DoanhSoTheoVung, {
    type: "doughnut",
    data: {
        labels: ["Vùng A", "Vùng B", "Vùng C"],
        datasets: [
            {
                label: "Doanh số",
                data: [161, 223, 114],
                borderWidth: 1,
                backgroundColor: ["rgba(196, 37, 23)","rgba(191, 164, 8)","rgba(179, 223, 246)"],
                borderColor: ["rgba(196, 37, 23, 0.5)","rgba(191, 164, 8, 0.5)","rgba(179, 223, 246, 0.5)"],
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
});
