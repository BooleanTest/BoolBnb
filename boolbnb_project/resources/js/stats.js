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
              'rgb(0, 0, 254, 0.2)',
              'rgb(0, 1, 198, 0.2)',
              'rgb(0, 1, 142, 0.2)',
              'rgb(0, 1, 89, 0.2)',
              'rgb(0, 1, 50, 0.2)',
              'rgb(87, 87, 255, 0.2)'
            ],
            borderColor: [
              'rgb(0, 0, 254, 1)',
              'rgb(0, 1, 198, 1)',
              'rgb(0, 1, 142, 1)',
              'rgb(0, 1, 89, 1)',
              'rgb(0, 1, 50, 1)',
              'rgb(87, 87, 255, 1)'
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
              'rgb(1, 254, 254, 0.2)',
              'rgb(1, 223, 254, 0.2)',
              'rgb(1, 167, 254, 0.2)',
              'rgb(1, 101, 254, 0.2)',
              'rgb(1, 53, 254, 0.2)',
              'rgb(88, 53, 254, 0.2)'
            ],
            borderColor: [
              'rgb(1, 254, 254, 1)',
              'rgb(1, 223, 254, 1)',
              'rgb(1, 167, 254, 1)',
              'rgb(1, 101, 254, 1)',
              'rgb(1, 53, 254, 1)',
              'rgb(88, 53, 254, 1)'
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

  var mesiVisual = $('.visual_mesi').text();
  var messaggiVisual = $('.visual_messaggi').text();

  var myLabels = ['gennaio','febbraio','marzo','aprile','maggio','giugno','luglio','agosto','settembre','ottobre','novembre','dicembre'];


  printAChart('line', mesiVisual, myLabels, '#views-line', true, 'Visualizzazioni');

  printAChart('bar', mesiVisual, myLabels, '#views-bar', true, 'Visualizzazioni');

  printAChart('line', messaggiVisual, myLabels, '#mex-line', true, 'Messaggi');

  printAChart('bar', messaggiVisual, myLabels, '#mex-bar', true, 'Messaggi');

  $('.bar').hide();

  $('#barre').click(function(){
    $('.line').hide();
    $('.bar').fadeIn();
  });

  $('#linee').click(function(){
    $('.bar').hide();
    $('.line').fadeIn();
  });




});
