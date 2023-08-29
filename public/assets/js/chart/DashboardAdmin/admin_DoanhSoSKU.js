const admin_DoanhSoSKU = document.getElementById("admin_DoanhSoSKU");

new Chart(admin_DoanhSoSKU, {
    type: "pie",
    data: {
        labels: ["SKU1", "SKU2", "SKU3", "SKU4"],
        datasets: [
            {
                label: "Doanh số",
                data: [178, 322, 271, 172],
                borderWidth: 1,
                backgroundColor: ["rgba(196, 37, 23)","rgba(191, 164, 8)","rgba(248, 101, 101)","rgba(179, 223, 246)"],
                borderColor: ["rgba(196, 37, 23, 0.5)","rgba(191, 164, 8, 0.5)","rgba(248, 101, 101, 0.5)","rgba(179, 223, 246, 0.5)"],
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
});
