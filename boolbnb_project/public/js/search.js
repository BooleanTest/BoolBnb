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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/search.js":
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#query').keyup(function () {
    var query = $('#query').val();
    console.log(query);
    $.ajax({
      url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=OHqeU45nG4k4HTXbNlp2TemUwqV3EtAw&countryCode=it&municipality=<municipality>',
      data: {
        municipality: query
      },
      method: 'get',
      success: function success(data) {
        var longitude = data.results[0].position.lon;
        var latitude = data.results[0].position.lat;
        var position = [longitude, latitude];
        console.log(latitude, longitude);
        $('#lat').val(latitude);
        $('#long').val(longitude);
      },
      error: function error(_error) {
        $('#error').text('non esiste alcun campo');
      }
    });
  });
  var position = [9.4, 43.4];
  var map = tt.map({
    key: 'fdEClAfoJx3PxxAZWCgLqh3ApTZlAcuF',
    container: 'map',
    style: 'tomtom://vector/1/basic-main',
    zoom: 5,
    center: position,
    basePath: 'sdk/',
    source: 'vector'
  });
  $('.box-result-apartment').click(function () {
    var marker = ' ';
    var latitude = $(this).find('.latitude').text();
    var longitude = $(this).find('.longitude').text();
    newPosition = [longitude, latitude];
    var marker = new tt.Marker().setLngLat(newPosition).addTo(map);
    map.flyTo({
      center: newPosition,
      zoom: 11
    });
  });
  $('.sponsored').click(function () {
    var marker = ' ';
    var latitude = $(this).find('.latitude').text();
    var longitude = $(this).find('.longitude').text();
    newPosition = [longitude, latitude];
    var marker = new tt.Marker().setLngLat(newPosition).addTo(map);
    map.flyTo({
      center: newPosition,
      zoom: 11
    });
  });
  var width = $(window).width();

  if (width < 901) {
    moveTop(700);
  } else if (width < 1201) {
    moveTop(450);
  } else {
    moveTop(480);
  } // animazione che al search dell'appartamento muove la pagina nel div risultati


  $('.move_up').click(function () {
    $("html, body").animate({
      scrollTop: 0
    }, 1000);
    console.log();
  });
  $(window).scroll(function () {
    if ($('.move_up').offset().top <= 550) {
      $('.move_up').css('opacity', '0');
      console.log('ciao');
    } else {
      $('.move_up').css('opacity', '1');
    }
  });

  function moveTop(where) {
    $("html, body").animate({
      scrollTop: where
    }, 1000);
  }

  $('.km-distance').each(function (i) {
    var kmLong = $(this).text();
    var kmResult = parseFloat(kmLong).toFixed(1);
    console.log(kmResult);
    $(this).text(kmResult);
  });
});

/***/ }),

/***/ 2:
/*!**************************************!*\
  !*** multi ./resources/js/search.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\alessandro\Desktop\ALESSAND\BOOLEAN\progettone\BoolBnb\boolbnb_project\resources\js\search.js */"./resources/js/search.js");


/***/ })

/******/ });