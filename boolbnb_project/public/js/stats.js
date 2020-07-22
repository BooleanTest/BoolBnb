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
            backgroundColor: ['rgb(0, 0, 254, 0.2)', 'rgb(0, 1, 198, 0.2)', 'rgb(0, 1, 142, 0.2)', 'rgb(0, 1, 89, 0.2)', 'rgb(0, 1, 50, 0.2)', 'rgb(87, 87, 255, 0.2)'],
            borderColor: ['rgb(0, 0, 254, 1)', 'rgb(0, 1, 198, 1)', 'rgb(0, 1, 142, 1)', 'rgb(0, 1, 89, 1)', 'rgb(0, 1, 50, 1)', 'rgb(87, 87, 255, 1)'],
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
            backgroundColor: ['rgb(1, 254, 254, 0.2)', 'rgb(1, 223, 254, 0.2)', 'rgb(1, 167, 254, 0.2)', 'rgb(1, 101, 254, 0.2)', 'rgb(1, 53, 254, 0.2)', 'rgb(88, 53, 254, 0.2)'],
            borderColor: ['rgb(1, 254, 254, 1)', 'rgb(1, 223, 254, 1)', 'rgb(1, 167, 254, 1)', 'rgb(1, 101, 254, 1)', 'rgb(1, 53, 254, 1)', 'rgb(88, 53, 254, 1)'],
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
  var mesiVisual = $('.visual_mesi').text();
  var messaggiVisual = $('.visual_messaggi').text();
  var myLabels = ['gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottobre', 'novembre', 'dicembre'];
  printAChart('line', mesiVisual, myLabels, '#views-line', true, 'Visualizzazioni');
  printAChart('bar', mesiVisual, myLabels, '#views-bar', true, 'Visualizzazioni');
  printAChart('line', messaggiVisual, myLabels, '#mex-line', true, 'Messaggi');
  printAChart('bar', messaggiVisual, myLabels, '#mex-bar', true, 'Messaggi');
  $('.bar').hide();
  $('#barre').click(function () {
    $('.line').hide();
    $('.bar').fadeIn();
  });
  $('#linee').click(function () {
    $('.bar').hide();
    $('.line').fadeIn();
  });
});

/***/ }),

/***/ 3:
/*!*************************************!*\
  !*** multi ./resources/js/stats.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\alessandro\Desktop\ALESSAND\BOOLEAN\progettone\BoolBnb\boolbnb_project\resources\js\stats.js */"./resources/js/stats.js");


/***/ })

/******/ });