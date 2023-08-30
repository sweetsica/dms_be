const admin_SoKhachDatHang = document.getElementById("admin_SoKhachDatHang");

new Chart(admin_SoKhachDatHang, {
    type: "doughnut",
    data: {
        labels: ["Phổ thông", "Hệ thống"],
        datasets: [
            {
                label: "Số khách",
                data: [15, 35],
                borderWidth: 1,
                backgroundColor: ["rgba(179, 223, 246)", "rgba(196, 37, 23)"],
                borderColor: ["rgba(179, 223, 246, 0.5)", "rgba(196, 37, 23, 0.5)"],
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
