const admin_D_DoanhSoTheoDiaBan = document.getElementById("admin_D_DoanhSoTheoDiaBan");

new Chart(admin_D_DoanhSoTheoDiaBan, {
    type: "doughnut",
    data: {
        labels: ["Địa bàn A", "Địa bàn B", "Địa bàn C", "Địa bàn D"],
        datasets: [
            {
                label: "Doanh số",
                data: [300, 450, 600, 350],
                borderWidth: 1,
                borderColor: ["rgba(196, 37, 23)","rgba(191, 164, 8)","rgba(248, 101, 101)","rgba(179, 223, 246)"],
                backgroundColor: ["rgba(196, 37, 23, 0.5)","rgba(191, 164, 8, 0.5)","rgba(248, 101, 101, 0.5)","rgba(179, 223, 246, 0.5)"],
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
        plugins: 
        {
            ChartDataLabels,
            datalabels: {
                color: '#FFCE56',
            },
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