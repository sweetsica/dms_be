const admin_D_DoanhSoTheoDiaBan = document.getElementById("admin_D_DoanhSoTheoDiaBan");

new Chart(admin_D_DoanhSoTheoDiaBan, {
    type: "doughnut",
    data: {
        labels: ["Địa bàn A", "Địa bàn B", "Địa bàn C", "Địa bàn D"],
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
