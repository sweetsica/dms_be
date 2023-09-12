const admin_KDTheoDiaBan = document.getElementById('admin_KDTheoDiaBan');

function dynamicColors() {
  var r = Math.floor(Math.random() * 255);
  var g = Math.floor(Math.random() * 255);
  var b = Math.floor(Math.random() * 255);
  return 'rgba(' + r + ',' + g + ',' + b + ', 0.5)';
}


new Chart(admin_KDTheoDiaBan, {
  type: 'bar',
  data: {
    labels: [ 
      "Địa bàn A",
      "Địa bàn B",
      "Địa bàn C",
      "Địa bàn D",
      "Địa bàn E",
      "Địa bàn F",     
  ],
    datasets: [
      {
        label: 'Hiện có',
        data: [6, 5, 4, 5, 6, 3],
        backgroundColor: 'rgb(196, 37, 23)',
        datalabels: {
          color: 'white',
        },
      },
      {
        label: 'Tổng định biên',
        data: [12, 10, 8, 10, 12, 6],
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
        text: 'Lượng khách hàng'
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
          size: 8,
        },
      },
      y: {
        stacked: true
      }
    }
  },
  plugins: [ChartDataLabels],
});
