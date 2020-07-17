/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/stats.js":
/*!*******************************!*\
  !*** ./resources/js/stats.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  function printAChart(typeOfGraph, dataset, labels, selector, optionTrue, mainLabel) {
    if (optionTrue) {
      var ctx = $(selector);
      var chart = new Chart(ctx, {
        type: typeOfGraph,
        data: {
          labels: labels,
          datasets: [{
            label: mainLabel,
            backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
            borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
            data: dataset,
            borderWidth: 1
          }]
        },
        // Configuration options go here
        options: {
          legend: {
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
            backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
            borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
            data: dataset,
            borderWidth: 1
          }]
        },
        // Configuration options go here
        options: {} //fine options

      }); //fine charts con opzioni disattivate
    }
  }

  ;
  var myLabels = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
  console.log('Labels: ' + myLabels);
  var myDataset = [2, 3, 5, 10, 8, 11, 11, 15, 16, 33, 28, 22];
  console.log('dataset: ' + myDataset);
  printAChart('line', myDataset, myLabels, '#views-line', true, 'Visualizzazioni');
  printAChart('bar', myDataset, myLabels, '#views-bar', true, 'Visualizzazioni');
  printAChart('line', myDataset, myLabels, '#mex-line', true, 'Messaggi');
  printAChart('bar', myDataset, myLabels, '#mex-bar', true, 'Messaggi'); // DATI PER LE Visualizzazioni
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

/***/ }),

/***/ 3:
/*!*************************************!*\
  !*** multi ./resources/js/stats.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

<<<<<<< Updated upstream
module.exports = __webpack_require__(/*! D:\Progetti\Boolean\BoolBnb\boolbnb_project\resources\js\stats.js */"./resources/js/stats.js");
=======
module.exports = __webpack_require__(/*! C:\Users\utente\Desktop\Esercitazioni\prog_finale\BoolBnb\boolbnb_project\resources\js\stats.js */"./resources/js/stats.js");
>>>>>>> Stashed changes


/***/ })

/******/ });