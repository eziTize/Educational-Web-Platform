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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/password-strength-meter/dist/password.min.js":
/*!*******************************************************************!*\
  !*** ./node_modules/password-strength-meter/dist/password.min.js ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * @author Òscar Casajuana a.k.a. elboletaire <elboletaire at underave dot net>
 * @link https://github.com/elboletaire/password-strength-meter
 * @license GPL-3.0
 */
!function(h){"use strict";function e(i,l){function c(s,e){for(var t="",a=!1,n=0;n<e.length;n++){a=!0;for(var r=0;r<s&&r+n+s<e.length;r++)a=a&&e.charAt(r+n)===e.charAt(r+n+s);r<s&&(a=!1),a?(n+=s-1,a=!1):t+=e.charAt(n)}return t}return l=h.extend({},{shortPass:"The password is too short",badPass:"Weak; try combining letters & numbers",goodPass:"Medium; try using special characters",strongPass:"Strong password",containsField:"The password contains your username",enterPass:"Type your password",showPercent:!1,showText:!0,animate:!0,animateSpeed:"fast",field:!1,fieldPartialMatch:!0,minimumLength:4,closestSelector:"div"},l),function(){var s=!0,n=l.showText,r=l.showPercent,e=h("<div>").addClass("pass-graybar"),o=h("<div>").addClass("pass-colorbar"),t=h("<div>").addClass("pass-wrapper").append(e.append(o));return i.closest(l.closestSelector).addClass("pass-strength-visible"),l.animate&&(t.css("display","none"),s=!1,i.closest(l.closestSelector).removeClass("pass-strength-visible")),l.showPercent&&(r=h("<span>").addClass("pass-percent").text("0%"),t.append(r)),l.showText&&(n=h("<span>").addClass("pass-text").html(l.enterPass),t.append(n)),i.closest(l.closestSelector).append(t),i.keyup(function(){var s=l.field||"";s&&(s=h(s).val());var e=function(s,e){var t=0;if(s.length<l.minimumLength)return-1;if(l.field){if(s.toLowerCase()===e.toLowerCase())return-2;if(l.fieldPartialMatch&&e.length){var a=new RegExp(e.toLowerCase());if(s.toLowerCase().match(a))return-2}}t+=4*s.length,t+=c(1,s).length-s.length,t+=c(2,s).length-s.length,t+=c(3,s).length-s.length,t+=c(4,s).length-s.length,s.match(/(.*[0-9].*[0-9].*[0-9])/)&&(t+=5);var n=".*[!,@,#,$,%,^,&,*,?,_,~]";return n=new RegExp("("+n+n+")"),s.match(n)&&(t+=5),s.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)&&(t+=10),s.match(/([a-zA-Z])/)&&s.match(/([0-9])/)&&(t+=15),s.match(/([!,@,#,$,%,^,&,*,?,_,~])/)&&s.match(/([0-9])/)&&(t+=15),s.match(/([!,@,#,$,%,^,&,*,?,_,~])/)&&s.match(/([a-zA-Z])/)&&(t+=15),(s.match(/^\w+$/)||s.match(/^\d+$/))&&(t-=10),100<t&&(t=100),t<0&&(t=0),t}(i.val(),s);i.trigger("password.score",[e]);var t=e<0?0:e;if(o.css({backgroundPosition:"0px -"+t+"px",width:t+"%"}),l.showPercent&&r.html(t+"%"),l.showText){var a=function(s){return-1===s?l.shortPass:-2===s?l.containsField:(s=s<0?0:s)<34?l.badPass:s<68?l.goodPass:l.strongPass}(e);!i.val().length&&e<=0&&(a=l.enterPass),n.html()!==h("<div>").html(a).html()&&(n.html(a),i.trigger("password.text",[a,e]))}}),l.animate&&(i.focus(function(){s||t.slideDown(l.animateSpeed,function(){s=!0,i.closest(l.closestSelector).addClass("pass-strength-visible")})}),i.blur(function(){!i.val().length&&s&&t.slideUp(l.animateSpeed,function(){s=!1,i.closest(l.closestSelector).removeClass("pass-strength-visible")})})),this}.call(this)}h.fn.password=function(s){return this.each(function(){new e(h(this),s)})}}(jQuery);

/***/ }),

/***/ "./resources/theme-customizations/js/app.js":
/*!**************************************************!*\
  !*** ./resources/theme-customizations/js/app.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

try {
  __webpack_require__(/*! password-strength-meter */ "./node_modules/password-strength-meter/dist/password.min.js");
} catch (e) {}

function preview_image(input, target) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(target).attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$(document).ready(function () {
  $('.toggle-section').on('click', function () {
    var toggler = $(this);
    toggler.closest('.parent-wrapper').find('.readonly-section').toggleClass('d-none');
    toggler.closest('.parent-wrapper').find('.crud-section').toggleClass('d-none');
    toggler.closest('.parent-wrapper').find('.toggle-success').toggleClass('d-none');
  });
  $('.previewable-image').on('change', function () {
    var target = $(this).attr('data-target');
    preview_image(this, target);
  });
});

/***/ }),

/***/ "./resources/theme-customizations/sass/app.scss":
/*!******************************************************!*\
  !*** ./resources/theme-customizations/sass/app.scss ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*******************************************************************************************************!*\
  !*** multi ./resources/theme-customizations/js/app.js ./resources/theme-customizations/sass/app.scss ***!
  \*******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\demo-coachtribe\resources\theme-customizations\js\app.js */"./resources/theme-customizations/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\demo-coachtribe\resources\theme-customizations\sass\app.scss */"./resources/theme-customizations/sass/app.scss");


/***/ })

/******/ });