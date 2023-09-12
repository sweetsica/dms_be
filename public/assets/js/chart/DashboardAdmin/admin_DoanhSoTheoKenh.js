const admin_DoanhSoTheoKenh = document.getElementById('admin_DoanhSoTheoKenh');

function dynamicColors() {
  var r = Math.floor(Math.random() * 255);
  var g = Math.floor(Math.random() * 255);
  var b = Math.floor(Math.random() * 255);
  return 'rgba(' + r + ',' + g + ',' + b + ', 0.5)';
}


new Chart(admin_DoanhSoTheoKenh, {
  type: 'bar',
  data: {
    labels: [ 
      "OTC",
      "ETC",
      "MT",
      "Đại lý",
      "Bán lẻ",
      "TMDT",      
  ],
    datasets: [
      {
        label: 'Doanh số',
        data: [45, 35, 25, 50, 30, 40],
        backgroundColor: 'rgb(196, 37, 23)',
        datalabels: {
          color: 'white',
        },
      },
      {
        label: 'Chỉ tiêu',
        data: [55, 45, 15, 35, 22, 20],
        backgroundColor: 'rgb(248, 101, 101)',
        datalabels: {
          color: 'white',
        },
      },      
    ]
  },
  options: {
    barPercentage:0.5,
    plugins: {
      title: {
        display: false,
        text: ''
      },
      legend: {
        labels:{
          font: {
            size:8
          },
          boxWidth:15,
          position:'top',
        },
        maxWidth:4,        
      },
    },
    responsive: true,
      maintainAspectRatio: false,
      interaction: {
        mode: 'index',
        intersect: false,
      },
      stacked: false,
    scales: {
      x: {
        stacked: true,
        font: {
          size: 6,
        }
      },
      y: {
        stacked: true
      }
    }
  },
  plugins: [ChartDataLabels],
});
