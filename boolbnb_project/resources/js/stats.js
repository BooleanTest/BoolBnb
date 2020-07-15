$(document).ready(function(){

    function printAChart(typeOfGraph, dataset, labels, selector, optionTrue, mainLabel) {
    if (optionTrue) {
      var ctx = $(selector);
      var chart = new Chart(ctx, {
        type: typeOfGraph,
        data: {
          labels: labels,
          datasets: [{
            label: mainLabel,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            data: dataset,
            borderWidth: 1
          }]
        },
        // Configuration options go here
        options: {
          legend:{
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        } //fine options

      }); //fine charts con opzioni attive

    } else {
      var ctx = $(selector);
      var chart = new Chart(ctx, {
        type: typeOfGraph,
        data: {
          labels: labels,
          datasets: [{
            label: mainLabel,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            data: dataset,
            borderWidth: 1
          }]
        },
        // Configuration options go here
        options: {} //fine options
      }); //fine charts con opzioni disattivate

    }

  };


  var myLabels = ['1','2','3','4','5','6','7','8','9','10','11','12'];
  console.log('Labels: ' + myLabels);
  var myDataset = [2,3,5,10,8,11,11,15,16,33,28,22];
  console.log('dataset: ' + myDataset);


  printAChart('line', myDataset, myLabels, '#views-line', true, 'Visualizzazioni');

  printAChart('bar', myDataset, myLabels, '#views-bar', true, 'Visualizzazioni');

  printAChart('line', myDataset, myLabels, '#mex-line', true, 'Messaggi');

  printAChart('bar', myDataset, myLabels, '#mex-bar', true, 'Messaggi');


  // DATI PER LE Visualizzazioni

  // $.ajax({
  //   url : "server.php",
  //   method : "GET",
  //   success: function (myDataset) {
  //     printAChart('line', myDataset, mylabels, '#views-line', False);
  //     printAChart('bar', myDataset, mylabels, '#views-bar', False);
  //   },
  //   error : function (richiesta, stato, errore) {
  //     alert("E' avvenuto un errore. " + errore);
  //   }
  // });
  //
  // // DATI PER I MESSAGGI
  //
  // $.ajax({
  //   url : "server.php",
  //   method : "GET",
  //   success: function (myDataset) {
  //     printAChart('line', myDataset, mylabels, '#mex-line', False);
  //     printAChart('bar', myDataset, mylabels, '#mex-bar', False);
  //   },
  //   error : function (richiesta, stato, errore) {
  //     alert("E' avvenuto un errore. " + errore);
  //   }
  // });



});
