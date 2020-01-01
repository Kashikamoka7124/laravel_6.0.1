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

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
  /* row height vertical dynamic height*/
  var header_height = $('.header').outerHeight();
  var footer_height = $('.footer').outerHeight();

  if (header_height !== null && header_height != undefined) {
    $('.row-height').css('height', $(window).height() - header_height - footer_height);
  } else {
    $('.row-height').css('height', $(window).height() - footer_height);
  }
  /* background image inline to background set */


  $('.background').each(function () {
    $(this).css('background-image', 'url(' + $(this).children('img').attr('src') + ')');
    $(this).children('img').hide();
  });
  /* sidebar navigation dropdown */

  $('.sidebar .nav .nav-link').on('click', function () {
    if ($(this).hasClass('dropdown-nav') === true) {
      if ($(this).hasClass('active') === true) {
        $(this).removeClass('active');
        $(this).next('.nav').slideUp();
      } else {
        $('.sidebar .nav .dropdown-nav.active').next('.nav').slideUp();
        $('.sidebar .nav .nav-link.dropdown-nav').removeClass('active');
        $(this).addClass('active').next('.nav').slideDown().mCustomScrollbar({
          axis: "y"
        });
        ;
      }
    } else {
      $('.sidebar .nav .dropdown-nav.active').next('.nav').slideUp();
      $('.sidebar .nav .nav-link.dropdown-nav').removeClass('active');
    }
  });
  /* Hide dropdown menu on out side click left sidebar */

  $(document).click(function (e) {
    e.stopPropagation();
    var container = $(".sidebar");

    if (container.has(e.target).length === 0) {
      $('.sidebar .nav .dropdown-nav.active').next('.nav').slideUp();
      $('.sidebar .nav .nav-link.dropdown-nav').removeClass('active');
    }
  });
  /* menu sidebar toggle */

  $('.menu-btn').on('click', function (e) {
    e.stopPropagation();
    $('body').toggleClass('menu-close');
  });
  /* menu sidebar toggle */

  $('.scroll-y').mCustomScrollbar({
    axis: "y"
  });
  /* chat user preview close */

  $('.button-preview-close').on('click', function () {
    $(this).closest('.preview-profile').addClass('active');
  });
  $('.view-profile').on('click', function () {
    $('.preview-profile').removeClass('active');
  });
  /* right sidebar open close */

  $('.sidebar-right-btn').on('click', function () {
    $('.sidebar-right').addClass('open-sidebar-right');
  });
  $('.sidebar-right .btn-close').on('click', function () {
    $('.sidebar-right').removeClass('open-sidebar-right');
  });
  /* close menu if small device */

  if ($(window).width() <= 1023) {
    $('body').addClass('menu-close');
    $(document).on('click', function (e) {
      if ($('body').hasClass('menu-close') !== true) {
        var container = $(".sidebar");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
          $('body').addClass('menu-close');
        }
      }
    });
  } else {
    $('body').removeClass('menu-close');
  }
});
$(window).on('load', function () {
  /*loader hide */
  setTimeout(function () {
    $('.loader').fadeOut();
  }, 500);
  /* fixed header specific style */

  if ($('.header').hasClass('fixed-top') === true) {
    $('main').css('padding-top', $('.fixed-top').outerHeight());
    $(window).on('scroll', function () {
      if ($(this).scrollTop() >= 100) {
        $('.header').addClass('fill-header shadow-sm');
      } else {
        $('.header').removeClass('fill-header shadow-sm');
      }
    });
  }
});
$(window).on('resize', function () {
  /* close menu if small device */
  if ($(window).width() <= 1023) {
    $('body').addClass('menu-close');
    $(document).on('click', function (e) {
      if ($('body').hasClass('menu-close') !== true) {
        var container = $(".sidebar");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
          $('body').addClass('menu-close');
        }
      }
    });
  } else {
    $('body').removeClass('menu-close');
  }
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\Projects\laravel_6.0.1\resources\js\main.js */"./resources/js/main.js");


/***/ })

/******/ });