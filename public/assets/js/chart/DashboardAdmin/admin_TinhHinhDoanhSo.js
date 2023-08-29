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
        label: 'Hiện có',
        data: [6, 5, 4, 5, 6, 3],
        backgroundColor: 'rgb(219, 20, 20)',
      },
      {
        label: 'Tổng định biên',
        data: [12, 10, 8, 10, 12, 6],
        backgroundColor: 'rgb(248, 101, 101)',
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
          size: 6,
        }
      },
      y: {
        stacked: true
      }
    }
  }
});
