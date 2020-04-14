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

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: E:\\Fotone\\resources\\js\\app.js: Unexpected token (36:0)\n\n\u001b[0m \u001b[90m 34 | \u001b[39m})\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 35 | \u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 36 | \u001b[39m\u001b[33m<\u001b[39m\u001b[33m!\u001b[39m\u001b[33m--\u001b[39m \u001b[33mGlobal\u001b[39m site tag (gtag\u001b[33m.\u001b[39mjs) \u001b[33m-\u001b[39m \u001b[33mGoogle\u001b[39m \u001b[33mAnalytics\u001b[39m \u001b[33m--\u001b[39m\u001b[33m>\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m\u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 37 | \u001b[39m\u001b[33m<\u001b[39m\u001b[33mscript\u001b[39m async src\u001b[33m=\u001b[39m\u001b[32m\"https://www.googletagmanager.com/gtag/js?id=UA-163588271-1\"\u001b[39m\u001b[33m>\u001b[39m\u001b[33m<\u001b[39m\u001b[33m/\u001b[39m\u001b[33mscript\u001b[39m\u001b[33m>\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 38 | \u001b[39m\u001b[33m<\u001b[39m\u001b[33mscript\u001b[39m\u001b[33m>\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 39 | \u001b[39m  window\u001b[33m.\u001b[39mdataLayer \u001b[33m=\u001b[39m window\u001b[33m.\u001b[39mdataLayer \u001b[33m||\u001b[39m []\u001b[33m;\u001b[39m\u001b[0m\n    at Parser.raise (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:7012:17)\n    at Parser.unexpected (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:8405:16)\n    at Parser.parseExprAtom (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:9661:20)\n    at Parser.parseExprSubscripts (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:9237:23)\n    at Parser.parseMaybeUnary (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:9217:21)\n    at Parser.parseExprOps (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:9083:23)\n    at Parser.parseMaybeConditional (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:9056:23)\n    at Parser.parseMaybeAssign (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:9015:21)\n    at Parser.parseExpression (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:8965:23)\n    at Parser.parseStatementContent (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:10819:23)\n    at Parser.parseStatement (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:10690:17)\n    at Parser.parseBlockOrModuleBlockBody (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:11266:25)\n    at Parser.parseBlockBody (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:11253:10)\n    at Parser.parseTopLevel (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:10621:10)\n    at Parser.parse (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:12131:10)\n    at parse (E:\\Fotone\\node_modules\\@babel\\parser\\lib\\index.js:12182:38)\n    at parser (E:\\Fotone\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:187:34)\n    at normalizeFile (E:\\Fotone\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:113:11)\n    at runSync (E:\\Fotone\\node_modules\\@babel\\core\\lib\\transformation\\index.js:44:43)\n    at runAsync (E:\\Fotone\\node_modules\\@babel\\core\\lib\\transformation\\index.js:35:14)\n    at E:\\Fotone\\node_modules\\@babel\\core\\lib\\transform.js:34:34\n    at processTicksAndRejections (internal/process/task_queues.js:79:11)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! E:\Fotone\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! E:\Fotone\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });