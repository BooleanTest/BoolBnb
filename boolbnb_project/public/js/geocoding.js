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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/geocoding.js":
/*!***********************************!*\
  !*** ./resources/js/geocoding.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
<<<<<<< Updated upstream
=======
  var streetName = $(".streetName").val();
  var streetNumber = $(".streetNumber").val();
  var municipality = $(".municipality").val();
  $.ajax({
    url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB&countryCode=it&streetNumber=<streetNumber>&streetName=<streetName>&municipality=<municipality>',
    data: {
      streetNumber: streetNumber,
      streetName: streetName,
      municipality: municipality
    },
    method: 'get',
    success: function success(data) {
      console.log('sono la latitudine = ' + data.results[0].position.lat + 'sono la longitudine = ' + data.results[0].position.lon);
<<<<<<< Updated upstream
      var longitude = data.results[0].position.lon;
      var latitude = data.results[0].position.lat;
      var position = [longitude, latitude]; // document.getElementById("latitude").innerHTML =  latitude ;

      $('#latitude').val(latitude);
      $('#longitude').val(longitude);
=======
      console.log('funziono!');
      var longitude = data.results[0].position.lon;
      var latitude = data.results[0].position.lat;
      var position = [longitude, latitude];
      document.getElementById("lon").innerHTML = longitude;
      document.getElementById("lat").innerHTML = latitude;
>>>>>>> Stashed changes
    },
    error: function error(_error) {
      console.log('Ciao sono un errore');
    }
<<<<<<< Updated upstream
  });
>>>>>>> Stashed changes
  $('#form').submit(function (e) {
    var streetName = $(".streetName").val();
    var streetNumber = $(".streetNumber").val();
    var municipality = $(".municipality").val();
    $.ajax({
      url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB&countryCode=it&streetNumber=<streetNumber>&streetName=<streetName>&municipality=<municipality>',
      data: {
        streetNumber: streetName,
        streetName: streetNumber,
        municipality: municipality
      },
      method: 'get',
      success: function success(data) {
        console.log('sono la latitudine = ' + data.results[0].position.lat + 'sono la longitudine = ' + data.results[0].position.lon);
        var longitude = data.results[0].position.lon;
        var latitude = data.results[0].position.lat;
        var position = [longitude, latitude]; // document.getElementById("latitude").innerHTML =  latitude ;

        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
      },
      error: function error(_error) {
        console.log('errore dati');
      }
    }); // console.log('ecco i dati');

    var route = $('#form').data('route');
    var form_data = $(this);
    setTimeout($.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: route,
      data: form_data.serialize(),
      method: "post",
      success: function success(Response) {},
      error: function error(_error2) {
        console.log('errore controller');
      }
    }), 3000); // $.ajax({
    //   headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //   } ,
    //   url: route,
    //   data: form_data.serialize(),
    //   method: "post",
    //   success: function (Response){
    //
    //     console.log(Response);
    //
    //   },
    //   error: function(error){
    //     console.log('errore controller');
    //   }
    // })

    e.preventDefault();
  });
=======
  }); //   $.ajax({
  //     // headers: {
  //     //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     // } ,
  //     url: "http://127.0.0.1:8000/store-apartment",
  //     method: "post",
  //     success: function (data){
  //       console.log("funzioniamo entrambi");
  //       console.log("longitude");
  //     },
  //     error: function(error){
  //       console.log('cè un errore');
  //     }
  //   })
  //
>>>>>>> Stashed changes
});

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/geocoding.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\alessandro\Desktop\ALESSAND\BOOLEAN\progettone\BoolBnb\boolbnb_project\resources\js\geocoding.js */"./resources/js/geocoding.js");


/***/ })

/******/ });