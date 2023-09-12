const admin_TinhHinhDoanhSo = document.getElementById('admin_TinhHinhDoanhSo');

function dynamicColors() {
  var r = Math.floor(Math.random() * 255);
  var g = Math.floor(Math.random() * 255);
  var b = Math.floor(Math.random() * 255);
  return 'rgba(' + r + ',' + g + ',' + b + ', 0.5)';
}


new Chart(admin_TinhHinhDoanhSo, {
  type: 'bar',
  data: {
    labels: [ 
      "1",
      "2",
      "3",
      "4",
      "5",
      "6", 
      "7", 
      "8", 
      "9", 
      "10", 
      "11", 
      "12", 

  ],
    datasets: [
      {
        label: 'Doanh số',
        data: [450, 350, 250, 500, 300, 400, 250, 150, 180, 200, 450, 500],
        backgroundColor: 'rgb(196, 37, 23)',
        datalabels: {
          color: 'white',
        },
      },
      {
        label: 'Chỉ tiêu',
        data: [550, 450, 150, 350, 225, 200, 170, 250, 300, 165, 375, 400],
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
