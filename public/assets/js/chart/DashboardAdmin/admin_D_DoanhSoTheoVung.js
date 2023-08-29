const admin_D_DoanhSoTheoVung = document.getElementById("admin_D_DoanhSoTheoVung");

new Chart(admin_D_DoanhSoTheoVung, {
    type: "doughnut",
    data: {
        labels: ["Vùng A", "Vùng B", "Vùng C"],
        datasets: [
            {
                label: "Chỉ số",
                data: [12, 19, 3, 5],
                borderWidth: 1,
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
