const KeyLineChart_MultiAxisLineChart = document.getElementById('KeyLineChart_MultiAxisLineChart');

function dynamicColors() {
  var r = Math.floor(Math.random() * 255);
  var g = Math.floor(Math.random() * 255);
  var b = Math.floor(Math.random() * 255);
  return 'rgba(' + r + ',' + g + ',' + b + ', 0.5)';
}


new Chart(KeyLineChart_MultiAxisLineChart, {
  type: 'line',
  data: {
    labels: [
        "T1",
        "T2",
        "T3",
        "T4",
        "T5",
        "T6",
        "T7",
        "T8",
        "T9",
        "T10",
        "T11",
        "T12",
    ],
    datasets: [
        {
            label: "Ngày",
            data: [80, 75, 70, 65, 60, 65, 70, 75, 80, 75, 70, 65],
            backgroundColor: "rgb(0,165,255)",
            borderColor: "rgba(0,165,255,0.75)",
            tension: 0,
            fill: false,
        },
        {
            label: "Tháng",
            data: [0, 20, 10, 30, 40, 60, 50, 70, 80, 100, 90, 0],
            backgroundColor: "rgb(255,165,0)",
            borderColor: "rgba(255,165,0,0.75)",
            tension: 0,
            fill: false,
        },
        {
            label: "Năm",
            data: [100, 20, 30, 40, 50, 10, 70, 80, 90, 100, 90, 95],
            backgroundColor: "rgb(71,255,0)",
            borderColor: "rgba(71,255,0,0.75)",
            tension: 0,
            fill: false,
        },
    ],
},
options: {
  responsive: true,
      maintainAspectRatio: false,
  interaction: {
    mode: 'index',
    intersect: false,
  },
  stacked: false,
  plugins: {
    title: {
      display: true,
      text: 'Chart.js Line Chart - Multi Axis'
    }
  },
  scales: {
    y: {
      type: 'linear',
      display: true,
      position: 'left',
    },
    y1: {
      type: 'linear',
      display: true,
      position: 'right',

      // grid line settings
      grid: {
        drawOnChartArea: false, // only want the grid lines for one axis to show up
      },
    },
  }
},
});
