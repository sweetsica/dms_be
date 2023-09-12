const admin_NhanSuTuyenMoi = document.getElementById("admin_NhanSuTuyenMoi");

new Chart(admin_NhanSuTuyenMoi, {
    type: "doughnut",
    data: {
        labels: ["Tuyển mới", "Cần tuyển"],
        datasets: [
            {
                label: "Nhân sự",
                data: [4, 20],
                borderWidth: 1,
                backgroundColor: ["rgba(179, 223, 246)", "rgba(196, 37, 23)"],
                borderColor: ["rgba(179, 223, 246, 0.5)", "rgba(196, 37, 23, 0.5)"],
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
                display: false,
                labels:{
                    font: {
                      size:8
                    },
                    boxWidth:8,
                  },
                // position:'right',

            },
            tooltip: { enabled: true },
        },
    },
    plugins: [ChartDataLabels],
});
