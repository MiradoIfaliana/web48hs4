var ctx = document.getElementById('myChart').getContext('2d');
// Données de performance (exemple)
function sendData(dates){
  var xhr = new XMLHttpRequest();
  var labs = [];
  xhr.onreadystatechange = function()
  {
    if(xhr.readyState === 4 && xhr.status === 200){
      var response = JSON.parse(xhr.responseText)
      labs = response;
      console.log(response)
      performanceData.labels = labs
      performanceChart.update()
    }
  }
  xhr.open('GET',`stat_money_month?id=${dates}`,true)
  xhr.send(null)
}
function senddata_money(date){
  var xhr = new XMLHttpRequest();
  var labs = [];
  xhr.onreadystatechange = function()
  {
    if(xhr.readyState === 4 && xhr.status === 200){
      var response = JSON.parse(xhr.responseText)
      labs = response;
      console.log(response)
      performanceData.datasets[0].data = response
      performanceChart.update()
    }
  }
  xhr.open('GET',`stat_money_encours?id=${date}`,true)
  xhr.send(null)
}
var tds = 0 ;
sendData(tds)
senddata_money(tds)
var pub = document.getElementById("poster");
pub.addEventListener("submit", function (event) {
event.preventDefault(); 
const td = document.querySelector('input[type="date"]');
dates = td.value
console.log(dates);
sendData(dates)
senddata_money(dates)
});

// alert(labs)
var performanceData = {
  labels: ['jav' , 'fev' , 'mars'],
  datasets: [
    {
      label: 'Commande',
      data: [],
      borderColor: 'rgba(75, 192, 192, 1)',
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      tension: 0.4,
      pointRadius: 4,
      pointBackgroundColor: 'rgba(75, 192, 192, 1)',
      pointBorderColor: 'rgba(255, 255, 255, 1)',
      pointHoverRadius: 6
    }
  ]
};

var performanceChart = new Chart(ctx, {
  type: 'line',
  data: performanceData,
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
        suggestedMax: 100
      }
    }
  }
});