/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/helpers/createTextFile.js":
/*!*********************************************!*\
  !*** ./resources/helpers/createTextFile.js ***!
  \*********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Create a text file from the text of the appended element.
 *
 * @since 1.0.0
 *
 * @param {string} filename Contains the filename that will used as name of .txt file.
 * @param {string} content  Contains the content of the .txt file.
 */
var createTextFile = function createTextFile(filename, content) {
  if (filename && content) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(content));
    element.setAttribute('download', filename);
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
  }
};
/* harmony default export */ __webpack_exports__["default"] = (createTextFile);

/***/ }),

/***/ "./resources/helpers/eventListener.js":
/*!********************************************!*\
  !*** ./resources/helpers/eventListener.js ***!
  \********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator.return && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, catch: function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
/**
 * Global event listener delegation.
 *
 * @since 1.0.0
 *
 * @param {string}   type     Contains the event type can be multiple seperate with space.
 * @param {string}   selector Contains the target element selector.
 * @param {Function} callback Contains the callback function.
 */
var eventListener = /*#__PURE__*/function () {
  var _ref = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee(type, selector, callback) {
    var events;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) switch (_context.prev = _context.next) {
        case 0:
          events = type.split(' ');
          events.forEach(function (event) {
            document.addEventListener(event, function (e) {
              if (e.target.matches(selector)) {
                callback(e);
              }
            });
          });
        case 2:
        case "end":
          return _context.stop();
      }
    }, _callee);
  }));
  return function eventListener(_x, _x2, _x3) {
    return _ref.apply(this, arguments);
  };
}();
/* harmony default export */ __webpack_exports__["default"] = (eventListener);

/***/ }),

/***/ "./resources/helpers/getCheckboxValue.js":
/*!***********************************************!*\
  !*** ./resources/helpers/getCheckboxValue.js ***!
  \***********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Return the checkbox value.
 *
 * @since 1.0.0
 *
 * @param {string} selector Contains the target element selector.
 * @return {array} The value of each checked checkbox.
 */
var getCheckboxValue = function getCheckboxValue(selector) {
  var values = [];
  var checkedCheckboxElems = document.querySelectorAll("".concat(selector, ":checked"));
  if (0 < checkedCheckboxElems.length) {
    checkedCheckboxElems.forEach(function (checkedCheckboxElem) {
      var value = checkedCheckboxElem.value;
      if (0 !== value.length) {
        values.push(value);
      }
    });
  }
  return values;
};
/* harmony default export */ __webpack_exports__["default"] = (getCheckboxValue);

/***/ }),

/***/ "./resources/helpers/getExtractedNumbers.js":
/*!**************************************************!*\
  !*** ./resources/helpers/getExtractedNumbers.js ***!
  \**************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Return the entire extracted numerical character from a string.
 *
 * @since 1.0.0
 *
 * @param {string} string Contains the string source to be filtered.
 * @return {numeric} The extracted numbers from string.
 */
var getExtractedNumbers = function getExtractedNumbers(string) {
  if (!string) {
    return 0;
  }
  var number = parseInt(string.replace(/[^0-9]/g, ''));
  return isNaN(number) ? 0 : number;
};
/* harmony default export */ __webpack_exports__["default"] = (getExtractedNumbers);

/***/ }),

/***/ "./resources/helpers/getFetch.js":
/*!***************************************!*\
  !*** ./resources/helpers/getFetch.js ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _isObject__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./isObject */ "./resources/helpers/isObject.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator.return && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, catch: function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
/**
 * Internal dependencies
 */


/**
 * A global fetch handler for making HTTP requests and processing responses.
 *
 * @since 1.0.0
 *
 * @param {Object} payloads Contains the data payload of the request, to be specific, the URL query string.
 * @return {Promise} The `Promise` from a fullfilled HTTP request's response.
 */
var getFetch = /*#__PURE__*/function () {
  var _ref = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee(payloads) {
    var result, response;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) switch (_context.prev = _context.next) {
        case 0:
          result = {
            success: false,
            data: {
              error: 'NETWORK_ERROR'
            }
          };
          if (!_isObject__WEBPACK_IMPORTED_MODULE_0__["default"].empty(payloads)) {
            _context.next = 4;
            break;
          }
          result.data.error = 'MISSING_DATA_ERROR';
          return _context.abrupt("return", result);
        case 4:
          _context.prev = 4;
          _context.next = 7;
          return fetch(hqfwLocal.url, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(payloads)
          });
        case 7:
          response = _context.sent;
          if (!response.ok) {
            _context.next = 12;
            break;
          }
          _context.next = 11;
          return response.json();
        case 11:
          result = _context.sent;
        case 12:
          _context.next = 17;
          break;
        case 14:
          _context.prev = 14;
          _context.t0 = _context["catch"](4);
          console.log('error', _context.t0); // eslint-disable-line no-console
        case 17:
          return _context.abrupt("return", result);
        case 18:
        case "end":
          return _context.stop();
      }
    }, _callee, null, [[4, 14]]);
  }));
  return function getFetch(_x) {
    return _ref.apply(this, arguments);
  };
}();
/* harmony default export */ __webpack_exports__["default"] = (getFetch);

/***/ }),

/***/ "./resources/helpers/getImageName.js":
/*!*******************************************!*\
  !*** ./resources/helpers/getImageName.js ***!
  \*******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Return the image name from an image source path.
 *
 * @since 1.0.0
 *
 * @param  {string} imagePath Contains the full path of the image.
 * @return {string} The name of the image.
 */
var getImageName = function getImageName(imagePath) {
  if (!imagePath) {
    return;
  }
  return imagePath.split('/').pop();
};
/* harmony default export */ __webpack_exports__["default"] = (getImageName);

/***/ }),

/***/ "./resources/helpers/getPascalString.js":
/*!**********************************************!*\
  !*** ./resources/helpers/getPascalString.js ***!
  \**********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Return the converted Pascal case format string from a provided string.
 *
 * @since 1.0.0
 *
 * @param {string} separator Contains the regular expression to use for splitting.
 * @param {string} joiner    Contains the regular expression to use for joining.
 * @param {string} string    Contains the string to be formated to pascal case.
 * @return {string} The converted Pascal case format string.
 */
var getPascalString = function getPascalString(separator, joiner, string) {
  if (0 === separator.length || 0 === joiner.length || 0 === string.length) {
    return '';
  }
  var cleanStr = string.replace(/#/g, '');
  var splittedStr = cleanStr.toLowerCase().split(separator);
  for (var i = 0; i < splittedStr.length; i++) {
    splittedStr[i] = splittedStr[i].charAt(0).toUpperCase() + splittedStr[i].substring(1);
  }
  return splittedStr.join(joiner);
};
/* harmony default export */ __webpack_exports__["default"] = (getPascalString);

/***/ }),

/***/ "./resources/helpers/index.js":
/*!************************************!*\
  !*** ./resources/helpers/index.js ***!
  \************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   createTextFile: function() { return /* reexport safe */ _createTextFile__WEBPACK_IMPORTED_MODULE_0__["default"]; },
/* harmony export */   eventListener: function() { return /* reexport safe */ _eventListener__WEBPACK_IMPORTED_MODULE_1__["default"]; },
/* harmony export */   getCheckboxValue: function() { return /* reexport safe */ _getCheckboxValue__WEBPACK_IMPORTED_MODULE_2__["default"]; },
/* harmony export */   getExtractedNumbers: function() { return /* reexport safe */ _getExtractedNumbers__WEBPACK_IMPORTED_MODULE_3__["default"]; },
/* harmony export */   getFetch: function() { return /* reexport safe */ _getFetch__WEBPACK_IMPORTED_MODULE_4__["default"]; },
/* harmony export */   getImageName: function() { return /* reexport safe */ _getImageName__WEBPACK_IMPORTED_MODULE_5__["default"]; },
/* harmony export */   getPascalString: function() { return /* reexport safe */ _getPascalString__WEBPACK_IMPORTED_MODULE_6__["default"]; },
/* harmony export */   isAnimationDone: function() { return /* reexport safe */ _isAnimationDone__WEBPACK_IMPORTED_MODULE_7__["default"]; },
/* harmony export */   isObject: function() { return /* reexport safe */ _isObject__WEBPACK_IMPORTED_MODULE_8__["default"]; },
/* harmony export */   removeElement: function() { return /* reexport safe */ _removeElement__WEBPACK_IMPORTED_MODULE_9__["default"]; },
/* harmony export */   setAttribute: function() { return /* reexport safe */ _setAttribute__WEBPACK_IMPORTED_MODULE_10__["default"]; },
/* harmony export */   setFullScreen: function() { return /* reexport safe */ _setFullScreen__WEBPACK_IMPORTED_MODULE_11__["default"]; },
/* harmony export */   setText: function() { return /* reexport safe */ _setText__WEBPACK_IMPORTED_MODULE_12__["default"]; }
/* harmony export */ });
/* harmony import */ var _createTextFile__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./createTextFile */ "./resources/helpers/createTextFile.js");
/* harmony import */ var _eventListener__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./eventListener */ "./resources/helpers/eventListener.js");
/* harmony import */ var _getCheckboxValue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getCheckboxValue */ "./resources/helpers/getCheckboxValue.js");
/* harmony import */ var _getExtractedNumbers__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./getExtractedNumbers */ "./resources/helpers/getExtractedNumbers.js");
/* harmony import */ var _getFetch__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./getFetch */ "./resources/helpers/getFetch.js");
/* harmony import */ var _getImageName__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./getImageName */ "./resources/helpers/getImageName.js");
/* harmony import */ var _getPascalString__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./getPascalString */ "./resources/helpers/getPascalString.js");
/* harmony import */ var _isAnimationDone__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./isAnimationDone */ "./resources/helpers/isAnimationDone.js");
/* harmony import */ var _isObject__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./isObject */ "./resources/helpers/isObject.js");
/* harmony import */ var _removeElement__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./removeElement */ "./resources/helpers/removeElement.js");
/* harmony import */ var _setAttribute__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./setAttribute */ "./resources/helpers/setAttribute.js");
/* harmony import */ var _setFullScreen__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./setFullScreen */ "./resources/helpers/setFullScreen.js");
/* harmony import */ var _setText__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./setText */ "./resources/helpers/setText.js");
/**
 * Index Exporter.
 *
 * @since 1.0.0
 */















/***/ }),

/***/ "./resources/helpers/isAnimationDone.js":
/*!**********************************************!*\
  !*** ./resources/helpers/isAnimationDone.js ***!
  \**********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Determines whether a certain animation that is executing on a certain element is done.
 *
 * @since 1.0.0
 *
 * @param {Object} element Contains the target element where animation is executing.
 * @type  {boolean} The flag whether the animation is done.
 */
var isAnimationDone = function isAnimationDone(element) {
  return new Promise(function (resolve) {
    if (!element) {
      resolve(false);
    }
    element.addEventListener('animationend', function () {
      resolve(true);
    });
  });
};
/* harmony default export */ __webpack_exports__["default"] = (isAnimationDone);

/***/ }),

/***/ "./resources/helpers/isObject.js":
/*!***************************************!*\
  !*** ./resources/helpers/isObject.js ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Provides a useful `Object` data type checker utilities.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
var isObject = {
  /**
   * Checks if the object is empty.
   *
   * @since 1.0.0
   *
   * @param {Object} object Contains the object object to be checked.
   * @return {boolean} The flag whether a certain key is empty.
   */
  empty: function empty(object) {
    return 0 === Object.keys(object).length;
  },
  /**
   * Checks if the object has a missing key, if has found
   * a missing key return true.
   *
   * @since 1.0.0
   *
   * @param {Array}  keys   Contains the list of keys use as referrence.
   * @param {Object} object Contains the object to be checked.
   * @return {boolean|void} The flag whether a certain key is missing.
   */
  hasMissingKey: function hasMissingKey(keys, object) {
    if (0 === keys.length || this.empty(object)) {
      return;
    }
    var hasMissing = false;
    keys.forEach(function (key) {
      if (!object.hasOwnProperty(key)) {
        hasMissing = true;
      }
    });
    return hasMissing;
  }
};
/* harmony default export */ __webpack_exports__["default"] = (isObject);

/***/ }),

/***/ "./resources/helpers/removeElement.js":
/*!********************************************!*\
  !*** ./resources/helpers/removeElement.js ***!
  \********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Removing an element(s) based on the provided selector.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
var removeElement = {
  /**
   * Remove the target element(s).
   *
   * @since 1.0.0
   *
   * @param {string} selector Contains the target element selector.
   */
  elem: function elem(selector) {
    if (selector) {
      var elems = document.querySelectorAll(selector);
      if (0 < elems.length) {
        elems.forEach(function (elem) {
          elem.remove();
        });
      }
    }
  },
  /**
   * Remove a child element from a parent element.
   *
   * @since 1.0.0
   *
   * @param {Object} parent   Contains the target parent element.
   * @param {string} selector Contains the selector of the target child element(s).
   */
  child: function child(parent, selector) {
    if (parent && selector) {
      var elems = parent.querySelectorAll(selector);
      if (0 < elems.length) {
        elems.forEach(function (elem) {
          elem.remove();
        });
      }
    }
  }
};
/* harmony default export */ __webpack_exports__["default"] = (removeElement);

/***/ }),

/***/ "./resources/helpers/setAttribute.js":
/*!*******************************************!*\
  !*** ./resources/helpers/setAttribute.js ***!
  \*******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Set up element's attribute.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
var setAttribute = {
  /**
   * Set the attribute of target element(s).
   *
   * @since 1.0.0
   *
   * @param {string} selector  Contains the selector of the target element(s).
   * @param {string} attribute Contains the attribute to be set.
   * @param {string} value     Contains the value of the attribute.
   */
  elem: function elem(selector, attribute, value) {
    if (selector && attribute) {
      var elems = document.querySelectorAll(selector);
      if (0 < elems.length) {
        elems.forEach(function (elem) {
          elem.setAttribute(attribute, value);
        });
      }
    }
  },
  /**
   * Set the attribute of the target children element(s).
   *
   * @since 1.0.0
   *
   * @param {Object} parent    Contains the target parent element.
   * @param {string} selector  Contains the selector of the target child element(s).
   * @param {string} attribute Contains the attribute to be set.
   * @param {string} value     Contains the value of the attribute.
   */
  child: function child(parent, selector, attribute, value) {
    if (parent && selector && attribute) {
      var elems = parent.querySelectorAll(selector);
      if (0 < elems.length) {
        elems.forEach(function (elem) {
          elem.setAttribute(attribute, value);
        });
      }
    }
  }
};
/* harmony default export */ __webpack_exports__["default"] = (setAttribute);

/***/ }),

/***/ "./resources/helpers/setFullScreen.js":
/*!********************************************!*\
  !*** ./resources/helpers/setFullScreen.js ***!
  \********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Set the document to full screen state.
 * 
 * @since 1.0.0
 */
var setFullScreen = {
  /**
   * Set document fullscreen to enable.
   * 
   * @since 1.0.0
   */
  enable: function enable() {
    var documentElem = document.documentElement;
    if (documentElem.requestFullscreen) {
      documentElem.requestFullscreen();
    } else if (documentElem.mozRequestFullScreen) {
      documentElem.mozRequestFullScreen();
    } else if (documentElem.webkitRequestFullscreen) {
      documentElem.webkitRequestFullscreen();
    } else if (documentElem.msRequestFullscreen) {
      documentElem.msRequestFullscreen();
    }
  },
  /**
   * Set document fullscreen to disable.
   * 
   * @since 1.0.0
   */
  disable: function disable() {
    if (document.fullscreenElement) {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      }
    }
  }
};
/* harmony default export */ __webpack_exports__["default"] = (setFullScreen);

/***/ }),

/***/ "./resources/helpers/setText.js":
/*!**************************************!*\
  !*** ./resources/helpers/setText.js ***!
  \**************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/**
 * Set up the text of an element.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
var setText = {
  /**
   * Set the text of the target element(s).
   *
   * @since 1.0.0
   *
   * @param {string} selector Contains the selector of the target element(s).
   * @param {string} text     Contains the text to be inserted in the element.
   */
  elem: function elem(selector, text) {
    if (selector && text) {
      var elems = document.querySelectorAll(selector);
      if (0 < elems.length) {
        elems.forEach(function (elem) {
          elem.textContent = text;
        });
      }
    }
  },
  /**
   * Set the text of the target children element(s).
   *
   * @since 1.0.0
   *
   * @param {Object} parent   Contains the target parent element.
   * @param {string} selector Contains the selector of the target child element(s).
   * @param {string} text     Contains the text to be inserted in the element.
   */
  child: function child(parent, selector, text) {
    if (parent && selector && text) {
      var elems = parent.querySelectorAll(selector);
      if (0 < elems.length) {
        elems.forEach(function (elem) {
          elem.textContent = text;
        });
      }
    }
  }
};
/* harmony default export */ __webpack_exports__["default"] = (setText);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
!function() {
/*!*************************************************!*\
  !*** ./resources/client/scripts/hqfw-client.js ***!
  \*************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helpers */ "./resources/helpers/index.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator.return && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, catch: function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
/**
 * Internal Dependencies.
 */


/**
 * Strict mode.
 *
 * @since 1.0.0
 *
 * @author Mafel John Cahucom
 */
'use strict'; // eslint-disable-line no-unused-expressions

/**
 * Namespace.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
var hqfw = hqfw || {};

/**
 * Holds all the prompt compnents.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
hqfw.prompt = {
  /**
   * Prompts the toaster aler type - error.
   *
   * @since 1.0.0
   *
   * @param {string} error The error name.
   */
  errorMessage: function errorMessage(error) {
    var errors = [{
      error: 'NETWORK_ERROR',
      title: 'Network Error',
      content: 'The network connection is lost, there might be a problem with your network.'
    }, {
      error: 'SECURITY_ERROR',
      title: 'Security Error',
      content: 'A security error occur. Please try again later or contact the website administrator for help.'
    }, {
      error: 'MISSING_DATA_ERROR',
      title: 'Missing Data',
      content: 'There is a missing data that are required. Please check and try again.'
    }];
    var errorDetail = errors.find(function (value) {
      return value.error === error;
    });

    /* eslint-disable no-undef, no-alert */
    if (hqfwLocal.plugin.isHATFWActive || hqfwLocal.plugin.isHAPFWActive) {
      if (hqfwLocal.plugin.isHATFWActive) {
        handyToasterNotifier.show({
          type: 'alert',
          color: 'danger',
          title: errorDetail.title,
          content: errorDetail.content
        });
      }
      if (hqfwLocal.plugin.isHAPFWActive) {
        handyPopupNotifier.showAlert({
          status: 'error',
          title: errorDetail.title,
          message: errorDetail.content
        });
      }
    } else {
      alert(errorDetail.content);
    }
    /* eslint-enable */
  }
};

/**
 * Holds photo slider component.
 *
 * @since 1.0.0
 */
hqfw.photoSlider = {
  /**
   * Holds the initialize state of this object.
   *
   * @since 1.0.0
   *
   * @type {boolean}
   */
  isInitialized: false,
  /**
   * Holds the photo slider element.
   *
   * @since 1.0.0
   *
   * @type {Object}
   */
  sliderElem: null,
  /**
   * Holds the primary image source.
   *
   * @since 1.0.0
   *
   * @type {string}
   */
  primaryImageSrc: null,
  /**
   * Initialize.
   *
   * @since 1.0.0
   */
  init: function init() {
    if (this.construct()) {
      this.setSlideSize();
      this.enableImageZoom();
      if (!this.hasInitialized()) {
        this.navigationController();
        this.shortcutController();
        this.screenResize();
      }
    }
  },
  /**
   * Construct.
   *
   * @since 1.0.0
   *
   * @return {boolean} The flag whether the element properties is set.
   */
  construct: function construct() {
    // Set all element property.
    if (!this.setElementProperties()) {
      return false;
    }

    // Set primaryImageSrc property.
    if (!this.setPrimaryImageSrc()) {
      return false;
    }
    return true;
  },
  /**
   * Check if this object has been already initialize, and also
   * it will set the isInitialized property to avoid multiple initialization.
   *
   * @since 1.0.00
   *
   * @return {boolean} Is object component has been initialized.
   */
  hasInitialized: function hasInitialized() {
    var isInitialized = hqfw.photoSlider.isInitialized;
    if (false === isInitialized) {
      hqfw.photoSlider.isInitialized = true;
    }
    return isInitialized;
  },
  /**
   * Set all element property values.
   *
   * @since 1.0.0
   *
   * @return {boolean} Check if all property element has a value.
   */
  setElementProperties: function setElementProperties() {
    var sliderElem = document.getElementById('hqfw-js-photo-slider');
    if (!sliderElem) {
      return false;
    }
    hqfw.photoSlider.sliderElem = sliderElem;
    return true;
  },
  /**
   * Set the value of property primaryImageSrc.
   *
   * @since 1.0.0
   *
   * @return {boolean} Check if the property has a value.
   */
  setPrimaryImageSrc: function setPrimaryImageSrc() {
    var sliderElem = hqfw.photoSlider.sliderElem;
    var primaryImageElem = sliderElem.querySelector('.hqfw-photo-slider__image-primary');
    if (primaryImageElem) {
      hqfw.photoSlider.primaryImageSrc = primaryImageElem.src;
      return true;
    }
    return false;
  },
  /**
   * Set the primary images in slide and collection based on
   * given image source.
   *
   * @since 1.0.0
   *
   * @param {string} source Contains the new image source.
   */
  setPrimaryImage: function setPrimaryImage() {
    var source = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
    if (!source) {
      source = hqfw.photoSlider.primaryImageSrc;
    }
    var sliderElem = hqfw.photoSlider.sliderElem;
    var primarySlideImageElem = sliderElem.querySelector('.hqfw-photo-slider__image-primary');
    if (primarySlideImageElem) {
      primarySlideImageElem.setAttribute('src', source);
      var primarySlideZoomImageElem = primarySlideImageElem.nextElementSibling;
      if (primarySlideZoomImageElem) {
        primarySlideZoomImageElem.setAttribute('src', source);
        primarySlideZoomImageElem.addEventListener('load', function () {
          jQuery(primarySlideZoomImageElem).css('width', primarySlideZoomImageElem.naturalWidth + 'px');
          jQuery(primarySlideZoomImageElem).css('height', primarySlideZoomImageElem.naturalHeight + 'px');
        });
      }
    }
    var primaryCollectionImageElem = document.querySelector('.hqfw-photo-slider__collection__image-primary');
    if (primaryCollectionImageElem) {
      primaryCollectionImageElem.setAttribute('src', source);
    }
  },
  /**
   * Set the all the slider slide div height and width based
   * on the image primary.
   *
   * @since 1.0.0
   */
  setSlideSize: function setSlideSize() {
    var sliderElem = hqfw.photoSlider.sliderElem;
    var slideElems = sliderElem.querySelectorAll('.hqfw-photo-slider__slide');
    if (0 === slideElems.length) {
      return;
    }
    var primarySlideElem = slideElems[0];
    var primaryImage = primarySlideElem.querySelector('.hqfw-photo-slider__image-primary');
    if (!primaryImage) {
      return;
    }
    var width = window.innerWidth;

    // OnResize.
    var height = primaryImage.height;
    if (992 < width) {
      height = 350 > height ? 350 : height;
    }
    slideElems.forEach(function (slideElem) {
      slideElem.style.height = "".concat(height, "px");
    });

    // OnLoad.
    primaryImage.addEventListener('load', function () {
      height = primaryImage.height;
      if (992 < width) {
        height = 350 > height ? 350 : height;
      }
      slideElems.forEach(function (slideElem) {
        slideElem.style.height = "".concat(height, "px");
      });
    });
  },
  /**
   * Get image source url and name of the current active
   * image in the slider.
   *
   * @since 1.0.0
   *
   * @return {Object|void} The image url source and name.
   */
  getCurrentImage: function getCurrentImage() {
    var sliderElem = hqfw.photoSlider.sliderElem;
    var currentSlide = sliderElem.getAttribute('data-current-slide');
    if ('' === currentSlide) {
      return;
    }
    var slideElems = sliderElem.querySelectorAll('.hqfw-photo-slider__slide');
    if (0 === slideElems.length) {
      return;
    }
    var currentSlideElem = slideElems[currentSlide];
    if (!currentSlideElem) {
      return;
    }
    var imageElem = currentSlideElem.querySelector('img');
    if (!imageElem) {
      return;
    }
    return {
      source: imageElem.src,
      title: imageElem.getAttribute('alt')
    };
  },
  /**
   * Zoom in the image on mouse enter event.
   *
   * @since 1.0.0
   */
  enableImageZoom: function enableImageZoom() {
    // eslint-disable-next-line no-undef
    if (hqfwLocal.setting.isZoomEnabled) {
      jQuery('.hqfw-image-zoom').zoom();
    }
  },
  /**
   * Move the slides.
   *
   * @since 1.0.0
   */
  moveSlide: function moveSlide() {
    var sliderElem = hqfw.photoSlider.sliderElem;
    var sliderWidth = sliderElem.offsetWidth;
    var currentSlide = parseInt(sliderElem.getAttribute('data-current-slide'));
    var sliderContainerElem = sliderElem.querySelector('.hqfw-photo-slider__container');
    if (sliderContainerElem) {
      // Move the slide.
      sliderContainerElem.style.transform = "translateX(-".concat(currentSlide * sliderWidth, "px)");

      // Update shortcut state.
      _helpers__WEBPACK_IMPORTED_MODULE_0__.setAttribute.elem('.hqfw-js-photo-slider-shortcut', 'data-state', 'default');
      _helpers__WEBPACK_IMPORTED_MODULE_0__.setAttribute.elem(".hqfw-js-photo-slider-shortcut[data-slide=\"".concat(currentSlide, "\"]"), 'data-state', 'active');
    }
  },
  /**
   * Move the slides to primary image.
   *
   * @since 1.0.0
   */
  moveSlideToPrimary: function moveSlideToPrimary() {
    var sliderElem = hqfw.photoSlider.sliderElem;
    sliderElem.setAttribute('data-current-slide', 0);
    hqfw.photoSlider.setPrimaryImage();
    hqfw.photoSlider.moveSlide();
  },
  /**
   * Move the slides based on the image_id.
   *
   * @since 1.0.0
   *
   * @param {number} imageId     Contains the target image id.
   * @param {string} imageSource Contains the image url.
   */
  moveSlideByImageId: function moveSlideByImageId(imageId, imageSource) {
    if (!imageId || !imageSource) {
      return;
    }
    var sliderElem = hqfw.photoSlider.sliderElem;
    var slideElems = sliderElem.querySelectorAll('.hqfw-photo-slider__slide');
    if (0 === slideElems.length) {
      return;
    }
    var imageIds = Array.from(slideElems).map(function (slideElem) {
      return parseInt(slideElem.getAttribute('data-image_id'));
    });
    if (!imageIds) {
      return;
    }
    var currentSlide = imageIds.indexOf(imageId);
    // Move slide based on the current slide.
    if (-1 !== currentSlide) {
      // If the target slide is primary then set primary
      // image source to the default image source.
      if (imageIds[0] === imageId) {
        hqfw.photoSlider.setPrimaryImage();
      }
    }

    // Move slide to the primary slide and change the
    // primary slide and collection image source.
    if (-1 === currentSlide) {
      hqfw.photoSlider.setPrimaryImage(imageSource);
    }
    sliderElem.setAttribute('data-current-slide', -1 === currentSlide ? 0 : currentSlide);
    hqfw.photoSlider.moveSlide();
  },
  /**
   * Holds the previous and next navigation controller event.
   *
   * @since 1.0.0
   */
  navigationController: function navigationController() {
    (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.eventListener)('click', '.hqfw-js-photo-slider-controller', function (e) {
      var target = e.target;
      var event = target.getAttribute('data-event');
      if (['prev', 'next'].includes(event)) {
        var sliderElem = hqfw.photoSlider.sliderElem;
        var totalSlides = sliderElem.querySelectorAll('.hqfw-photo-slider__slide').length;
        var currentSlide = parseInt(sliderElem.getAttribute('data-current-slide'));
        var updatedSlideValue = currentSlide;
        /* eslint-disable indent */
        switch (event) {
          case 'prev':
            updatedSlideValue = 0 >= currentSlide ? totalSlides - 1 : currentSlide - 1;
            break;
          case 'next':
            updatedSlideValue = currentSlide >= totalSlides - 1 ? 0 : currentSlide + 1;
            break;
        }
        /* eslint-enable */

        sliderElem.setAttribute('data-current-slide', updatedSlideValue);
        hqfw.photoSlider.moveSlide();
      }
    });
  },
  /**
   * Holds the bullet navigation controller event.
   *
   * @since 1.0.0
   */
  shortcutController: function shortcutController() {
    (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.eventListener)('click', '.hqfw-js-photo-slider-shortcut', function (e) {
      var target = e.target;
      var state = target.getAttribute('data-state');
      var slide = parseInt(target.getAttribute('data-slide'));
      if ('default' === state && !isNaN(slide)) {
        var sliderElem = hqfw.photoSlider.sliderElem;
        sliderElem.setAttribute('data-current-slide', slide);
        hqfw.photoSlider.moveSlide();
      }
    });
  },
  /**
   * Window screen resize event.
   *
   * @since 1.0.0
   */
  screenResize: function screenResize() {
    window.addEventListener('resize', function () {
      hqfw.photoSlider.setSlideSize();
    });
  }
};

/**
 * Holds the photo box component.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
hqfw.photoBox = {
  /**
   * Holds the state of image zoom.
   *
   * @since 1.0.0
   *
   * @type {boolean}
   */
  isZoomEnabled: false,
  /**
   * Holds modal element.
   *
   * @since 1.0.0
   *
   * @type {HTMLElement}
   */
  modalElem: null,
  /**
   * Holds viewer body element.
   *
   * @since 1.0.0
   *
   * @type {HTMLElement}
   */
  bodyElem: null,
  /**
   * Holds viewer container element.
   *
   * @since 1.0.0
   *
   * @type {HTMLElement}
   */
  containerElem: null,
  /**
   * Holds viewer caption element.
   *
   * @since 1.0.0
   *
   * @type {HTMLElement}
   */
  captionElem: null,
  /**
   * Holds viewer image element.
   *
   * @since 1.0.0
   *
   * @type {HTMLElement}
   */
  imageElem: null,
  /**
   * Initialize.
   *
   * @since 1.0.0
   */
  init: function init() {
    if (this.construct()) {
      this.openModal();
      this.closeModal();
      this.keyPressCloseModal();
      this.toggleFullScreen();
      this.keyPressExitFullScreen();
      this.screenResize();
    }
  },
  /**
   * Constructor.
   *
   * @since 1.0.0
   *
   * @return {boolean} The flag whether the element properties is set.
   */
  construct: function construct() {
    // Set all element properties.
    if (!this.setElementProperties()) {
      return false;
    }
    return true;
  },
  /**
   * Set all element property values.
   *
   * @since 1.0.0
   *
   * @return {boolean} Check if all property element has a value.
   */
  setElementProperties: function setElementProperties() {
    var modalElem = document.getElementById('hqfw-js-photobox-viewer');
    if (!modalElem) {
      return false;
    }
    hqfw.photoBox.modalElem = modalElem;
    var bodyElem = document.querySelector('.hqfw-photobox-viewer__body');
    if (!bodyElem) {
      return false;
    }
    hqfw.photoBox.bodyElem = bodyElem;
    var containerElem = document.querySelector('.hqfw-photobox-viewer__container');
    if (!containerElem) {
      return false;
    }
    hqfw.photoBox.containerElem = containerElem;
    var captionElem = document.getElementById('hqfw-js-photobox-viewer-caption');
    if (!captionElem) {
      return false;
    }
    hqfw.photoBox.captionElem = captionElem;
    var imageElem = document.getElementById('hqfw-js-photobox-viewer-image');
    if (!imageElem) {
      return false;
    }
    hqfw.photoBox.imageElem = imageElem;
    return true;
  },
  /**
   * Get the current state of the modal or component.
   *
   * @since 1.0.0
   *
   * @return {string} The current state.
   */
  getState: function getState() {
    return hqfw.photoBox.modalElem.getAttribute('data-state');
  },
  /**
   * Set the image size.
   *
   * @since 1.0.0
   */
  setImageSize: function setImageSize() {
    if ('show' === hqfw.photoBox.getState()) {
      var bodyElem = hqfw.photoBox.bodyElem;
      var imageElem = hqfw.photoBox.imageElem;
      var bodyHeight = bodyElem.offsetHeight;
      var imageHeight = imageElem.naturalHeight;
      imageHeight = imageHeight > bodyHeight ? bodyHeight : imageHeight;
      imageElem.style.maxHeight = "".concat(imageHeight, "px");
    }
  },
  /**
   * Check if zoom has already implemented or enabled to avoid
   * multitple initialization.
   *
   * @since 1.0.00
   *
   * @return {boolean} Is zoom implemented.
   */
  hasZoomEnabled: function hasZoomEnabled() {
    var isZoomEnabled = hqfw.photoBox.isZoomEnabled;
    if (false === isZoomEnabled) {
      hqfw.photoBox.isZoomEnabled = true;
    }
    return isZoomEnabled;
  },
  /**
   * Zoom in the image on photobox image.
   *
   * @since 1.0.0
   */
  enableImageZoom: function enableImageZoom() {
    var bodyElem = hqfw.photoBox.bodyElem;
    var containerElem = hqfw.photoBox.containerElem;
    var imageElem = hqfw.photoBox.imageElem;
    var bodyHeight = bodyElem.offsetHeight;
    var imageHeight = imageElem.naturalHeight;
    containerElem.classList.remove('hqfw-photobox-zoom');
    if (imageHeight > bodyHeight) {
      // Enable zoom.
      containerElem.classList.add('hqfw-photobox-zoom');

      // Call only this .zoom event once.
      if (!hqfw.photoBox.hasZoomEnabled()) {
        // eslint-disable-next-line no-undef
        if (hqfwLocal.setting.isZoomEnabled) {
          jQuery('.hqfw-photobox-zoom').zoom({
            on: 'grab'
          });
        }
      }
    }
  },
  /**
   * Hide the photo box viewier modal.
   *
   * @since 1.0.0
   */
  hideModal: function hideModal() {
    var modalElem = hqfw.photoBox.modalElem;
    var modalState = modalElem.getAttribute('data-state');
    if ('show' === modalState) {
      _helpers__WEBPACK_IMPORTED_MODULE_0__.setFullScreen.disable();
      modalElem.setAttribute('data-state', 'hide');
    }
  },
  /**
   * Opem the photo box viewer modal
   *
   * @since 1.0.0
   */
  openModal: function openModal() {
    (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.eventListener)('click', '#hqfw-js-photobox-trigger-btn', function () {
      var image = hqfw.photoSlider.getCurrentImage();
      if (!image) {
        return;
      }
      var modalElem = hqfw.photoBox.modalElem;
      var captionElem = hqfw.photoBox.captionElem;
      var imageElems = modalElem.querySelectorAll('img');
      if (0 === imageElems.length) {
        return;
      }
      var fullScreenBtnElem = document.getElementById('hqfw-js-photobox-fullscreen-btn');
      if (fullScreenBtnElem) {
        fullScreenBtnElem.setAttribute('data-event', 'show');
        fullScreenBtnElem.setAttribute('aria-label', 'Fullscreen');
        fullScreenBtnElem.setAttribute('title', 'Fullscreen');
      }
      var imageName = (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.getImageName)(image.source);
      captionElem.textContent = !image.title ? imageName : image.title;
      modalElem.setAttribute('data-state', 'show');
      imageElems.forEach(function (imageElem, index) {
        imageElem.setAttribute('src', image.source);
        imageElem.setAttribute('alt', image.title);
        imageElem.setAttribute('title', image.title);
        if (0 === index) {
          imageElem.addEventListener('load', function () {
            // Set image size.
            hqfw.photoBox.setImageSize();

            // Enable zoom.
            hqfw.photoBox.enableImageZoom();
          });
        }
      });
    });
  },
  /**
   * Close the photo box viewer moda via click event.
   *
   * @since 1.0.0
   */
  closeModal: function closeModal() {
    (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.eventListener)('click', '#hqfw-js-photobox-close-btn', function () {
      hqfw.photoBox.hideModal();
    });
  },
  /**
   * Close photo box viewer by key press (ESC) event.
   *
   * @since 1.0.0
   */
  keyPressCloseModal: function keyPressCloseModal() {
    document.addEventListener('keydown', function (e) {
      if ('Escape' === e.key) {
        setTimeout(function () {
          hqfw.photoBox.hideModal();
        }, 300);
      }
    });
  },
  /**
   * Toggle document full screen depeneds on the current event.
   *
   * @since 1.0.0
   */
  toggleFullScreen: function toggleFullScreen() {
    (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.eventListener)('click', '#hqfw-js-photobox-fullscreen-btn', function (e) {
      var target = e.target;
      var event = target.getAttribute('data-event');
      if (!['show', 'exit'].includes(event)) {
        return;
      }
      if ('show' === event) {
        _helpers__WEBPACK_IMPORTED_MODULE_0__.setFullScreen.enable();
      }
      if ('exit' === event) {
        _helpers__WEBPACK_IMPORTED_MODULE_0__.setFullScreen.disable();
      }
      var latestEvent = 'show' === event ? 'exit' : 'show';
      var latestLabel = 'show' === event ? 'Fullscreen Exit' : 'Fullscreen';
      target.setAttribute('data-event', latestEvent);
      target.setAttribute('aria-label', latestLabel);
      target.setAttribute('title', latestLabel);

      // Set image size.
      hqfw.photoBox.setImageSize();
    });
  },
  /**
   * Fire key event using (Esc) key during leaving fullscreen mode.
   *
   * @since 1.0.0
   */
  keyPressExitFullScreen: function keyPressExitFullScreen() {
    var vendorPrefix = ['', 'webkit', 'moz', 'ms'];
    vendorPrefix.forEach(function (prefix) {
      document.addEventListener("".concat(prefix, "fullscreenchange"), function () {
        if (!document.fullscreenElement && !document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
          var fullScreenBtnElem = document.getElementById('hqfw-js-photobox-fullscreen-btn');
          if (fullScreenBtnElem) {
            fullScreenBtnElem.setAttribute('data-event', 'show');
            fullScreenBtnElem.setAttribute('aria-label', 'Fullscreen');
            fullScreenBtnElem.setAttribute('title', 'Fullscreen');
          }
        }
      });
    });
  },
  /**
   * Screen resize event.
   *
   * @since 1.0.0
   */
  screenResize: function screenResize() {
    window.addEventListener('resize', function () {
      hqfw.photoBox.setImageSize();
    });
  }
};

/**
 * Holds variation component.
 *
 * @since 1.0.0
 *
 * @type {Object}
 */
hqfw.variation = {
  /**
   * Holds variation form element.
   *
   * @since 1.0.0
   *
   * @type {Object}
   */
  variationFormElem: null,
  /**
   * Call to initialize.
   *
   * @since 1.0.0
   */
  __init: function __init() {
    if (this.construct()) {
      this.variationForm();
      this.variationIdInputListener();
      this.variatioWrapListener();
    }
  },
  /**
   * Construct.
   *
   * @since 1.0.0
   *
   * @return {boolean} The flag whether the variation form is set.
   */
  construct: function construct() {
    // Set variation form.
    if (!this.setVariationForm()) {
      return false;
    }
    return true;
  },
  /**
   * Set the variation form element property.
   *
   * @since 1.0.0
   *
   * @return {boolean} Check if the .variations_form has found.
   */
  setVariationForm: function setVariationForm() {
    var viewerElem = document.getElementById('hqfw-js-viewer-content');
    if (!viewerElem) {
      return false;
    }
    var variationFormElem = viewerElem.querySelector('.variations_form');
    if (!variationFormElem) {
      return false;
    }
    hqfw.variation.variationFormElem = variationFormElem;
    return true;
  },
  /**
   * Holds the variation form event.
   *
   * @since 1.0.0
   */
  variationForm: function variationForm() {
    jQuery(hqfw.variation.variationFormElem).wc_variation_form();
  },
  /**
   * Watch the variation id input dropdown change value.
   *
   * @since 1.0.0
   */
  variationIdInputListener: function variationIdInputListener() {
    var variationFormElem = hqfw.variation.variationFormElem;
    var variationIdFormElem = variationFormElem.querySelector('input[name="variation_id"]');
    if (variationIdFormElem) {
      jQuery(variationFormElem).on('woocommerce_variation_select_change', function () {
        setTimeout(function () {
          var variationId = variationIdFormElem.value;
          if (!variationId) {
            // Move the photo slider to primary image.
            hqfw.photoSlider.moveSlideToPrimary();

            // Update the product summary height.
            hqfw.quickView.setProductSummaryBodyHeight();
          }
        }, 200);
      });
    }
  },
  /**
   * Watch the variation form if there's a new selected variation.
   *
   * @since 1.0.0
   */
  variatioWrapListener: function variatioWrapListener() {
    var variationFormElem = hqfw.variation.variationFormElem;
    var variationWrapElem = variationFormElem.querySelector('.single_variation_wrap');
    if (variationWrapElem) {
      jQuery(variationWrapElem).on('show_variation', function (event, variation) {
        // Move photo slider based on the image id and source.
        hqfw.photoSlider.moveSlideByImageId(variation.image_id, variation.image.full_src);

        // Update the product summary height.
        hqfw.quickView.setProductSummaryBodyHeight();
      });
    }
  }
};

/**
 * Holds quick view component.
 *
 * @since 1.0.0
 */
hqfw.quickView = {
  /**
   * Holds all product id.
   *
   * @since 1.0.0
   *
   * @type {Array}
   */
  productIds: [],
  /**
   * Holds the modal element.
   *
   * @since 1.0.0
   *
   * @type {HTMLElement}
   */
  modalElem: null,
  /**
   * Holds the content viewer element.
   *
   * @since 1.0.0
   *
   * @type {HTMLElement}
   */
  viewerElem: null,
  /**
   * Holds the product viewer element.
   *
   * @since 1.0.0
   *
   * @type {HTMLElement}
   */
  viewerProductElem: null,
  /**
   * Initialize.
   *
   * @since 1.0.0
   */
  init: function init() {
    if (this.construct()) {
      this.openModal();
      this.closeModal();
      this.autoCloseModal();
      this.keyPressCloseModal();
      this.slideNavigation();
      this.screenResize();
      this.setSlideNavigationVisibility();
      this.setProductGalleryTriggerIcon();
    }
  },
  /**
   * Construct.
   *
   * @since 1.0.0
   *
   * @return {boolean} The flag whether properties as set.
   */
  construct: function construct() {
    // Set all elements property.
    if (!this.setElementProperties()) {
      return false;
    }

    // Set productIds property.
    this.setProductIds();
    return true;
  },
  /**
   * Set all element property values.
   *
   * @since 1.0.0
   *
   * @return {boolean} Check if all property element has a value.
   */
  setElementProperties: function setElementProperties() {
    var modalElem = document.getElementById('hqfw-js-modal');
    if (!modalElem) {
      return false;
    }
    hqfw.quickView.modalElem = modalElem;
    var viewerElem = document.getElementById('hqfw-js-viewer-content');
    if (!viewerElem) {
      return false;
    }
    hqfw.quickView.viewerElem = viewerElem;
    var viewerProductElem = document.getElementById('hqfw-js-viewer-product');
    if (!viewerProductElem) {
      return false;
    }
    hqfw.quickView.viewerProductElem = viewerProductElem;
    return true;
  },
  /**
   * Set and gather all product ids from the front-end
   * quick view button.
   *
   * @since 1.0.0
   */
  setProductIds: function setProductIds() {
    var quickViewBtnElems = document.querySelectorAll('.hqfw-js-quick-view-btn');
    if (0 < quickViewBtnElems.length) {
      quickViewBtnElems.forEach(function (quickViewBtnElem) {
        var productId = parseInt(quickViewBtnElem.getAttribute('data-product_id'));
        if (!isNaN(productId) && 0 < productId) {
          var productIds = hqfw.quickView.productIds;
          if (!productIds.includes(productId)) {
            hqfw.quickView.productIds.push(productId);
          }
        }
      });
    }
  },
  /**
   * Set the height of product summary section.
   *
   * @since 1.0.0
   */
  setProductSummaryBodyHeight: function setProductSummaryBodyHeight() {
    if (992 >= window.innerWidth) {
      return;
    }
    var viewerProductElem = hqfw.quickView.viewerProductElem;
    var galleryElem = viewerProductElem.querySelector('.hqfw-product__gallery');
    if (!galleryElem) {
      return;
    }
    var summaryBodyElem = viewerProductElem.querySelector('.hqfw-product__summary__body');
    if (!summaryBodyElem) {
      return;
    }
    var headHeight = 0;
    var summaryHeadElem = viewerProductElem.querySelector('.hqfw-product__summary__head');
    if (summaryHeadElem) {
      headHeight = summaryHeadElem.offsetHeight;
    }
    setTimeout(function () {
      var galleryHeight = galleryElem.clientHeight;
      summaryBodyElem.style.maxHeight = "".concat(galleryHeight - headHeight, "px");
    }, 300);
  },
  /**
   * Set the product viewer height in mobile state.
   *
   * @since 1.0.0
   */
  setProductViewerMobileHeight: function setProductViewerMobileHeight() {
    var modalElem = hqfw.quickView.modalElem;
    var modalState = modalElem.getAttribute('data-state');
    if ('show' !== modalState) {
      return;
    }
    var productViewerElem = modalElem.querySelector('.hqfw-product');
    if (productViewerElem) {
      var width = window.innerWidth;
      var height = window.innerHeight;
      if (992 >= width && 850 >= height) {
        productViewerElem.style.height = "".concat(height - 40, "px");
      } else {
        productViewerElem.style.height = 'auto';
      }
    }
  },
  /**
   * Set or override the maginify icon in woocommerce-product-gallery__trigger.
   *
   * @since 1.0.0
   */
  setProductGalleryTriggerIcon: function setProductGalleryTriggerIcon() {
    setTimeout(function () {
      var galleryTriggerElems = document.querySelectorAll('a.woocommerce-product-gallery__trigger');
      if (0 === galleryTriggerElems.length) {
        return;
      }
      Array.from(galleryTriggerElems).forEach(function (galleryTriggerElem) {
        // eslint-disable-next-line no-undef
        galleryTriggerElem.innerHTML = hqfwLocal.icon.searchPlus;
      });
    }, 300);
  },
  /**
   * Return the previous and next product id based on
   * the current id viewed.
   *
   * @since 1.0.0
   *
   * @param {number} productId Contains the current product id viewed.
   * @return {Object} The previous and next product id.
   */
  getProductIdAdjacent: function getProductIdAdjacent(productId) {
    var ids = hqfw.quickView.productIds;
    var idsCount = ids.length;
    var data = {
      prevId: 0,
      nextId: 0
    };
    if (!productId || 1 >= idsCount) {
      return data;
    }
    var idIndex = ids.indexOf(productId);
    if (-1 === idIndex) {
      return data;
    }
    data.prevId = 0 < idIndex ? ids[idIndex - 1] : ids[idsCount - 1];
    data.nextId = idIndex < idsCount - 1 ? ids[idIndex + 1] : ids[0];
    return data;
  },
  /**
   * Set the viewer slide controller navigation attributes
   * state and product id.
   *
   * @since 1.0.0
   *
   * @param {number} productId Contains the current product id viewed.
   */
  setSlideNavigationProperties: function setSlideNavigationProperties(productId) {
    if (!productId) {
      return;
    }
    var data = hqfw.quickView.getProductIdAdjacent(productId);
    var prevSelector = '.hqfw-js-navigation-btn[data-event="prev"]';
    _helpers__WEBPACK_IMPORTED_MODULE_0__.setAttribute.elem(prevSelector, 'data-state', 0 < data.prevId ? 'default' : 'hidden');
    _helpers__WEBPACK_IMPORTED_MODULE_0__.setAttribute.elem(prevSelector, 'data-product_id', data.prevId);
    var nextSelector = '.hqfw-js-navigation-btn[data-event="next"]';
    _helpers__WEBPACK_IMPORTED_MODULE_0__.setAttribute.elem(nextSelector, 'data-state', 0 < data.nextId ? 'default' : 'hidden');
    _helpers__WEBPACK_IMPORTED_MODULE_0__.setAttribute.elem(nextSelector, 'data-product_id', data.nextId);
  },
  /**
   * Set the viewer slide controller navigation visibility
   * based on the number of productIds property.
   *
   * @since 1.0.0
   */
  setSlideNavigationVisibility: function setSlideNavigationVisibility() {
    var totalIds = hqfw.quickView.productIds.length;
    var state = 1 < totalIds ? 'default' : 'hidden';
    _helpers__WEBPACK_IMPORTED_MODULE_0__.setAttribute.elem('.hqfw-js-navigation-btn', 'data-state', state);
  },
  /**
   * Hide quick view modal.
   *
   * @since 1.0.0
   */
  hideModal: function hideModal() {
    return _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
      var modalElem, viewerElem, modalState, isDone;
      return _regeneratorRuntime().wrap(function _callee$(_context) {
        while (1) switch (_context.prev = _context.next) {
          case 0:
            modalElem = hqfw.quickView.modalElem;
            viewerElem = hqfw.quickView.viewerElem;
            modalState = modalElem.getAttribute('data-state');
            if (!('show' === modalState)) {
              _context.next = 9;
              break;
            }
            viewerElem.setAttribute('data-state', 'hidden');
            _context.next = 7;
            return (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.isAnimationDone)(viewerElem);
          case 7:
            isDone = _context.sent;
            if (isDone) {
              modalElem.setAttribute('data-state', 'hide');
            }
          case 9:
          case "end":
            return _context.stop();
        }
      }, _callee);
    }))();
  },
  /**
   * Directly opened using the quick view button.
   *
   * @since 1.0.0
   */
  openModal: function openModal() {
    (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.eventListener)('click', '.hqfw-js-quick-view-btn', /*#__PURE__*/function () {
      var _ref = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee2(e) {
        var target, modalElem, viewerElem, viewerProductElem, productId, res;
        return _regeneratorRuntime().wrap(function _callee2$(_context2) {
          while (1) switch (_context2.prev = _context2.next) {
            case 0:
              target = e.target;
              modalElem = hqfw.quickView.modalElem;
              viewerElem = hqfw.quickView.viewerElem;
              viewerProductElem = hqfw.quickView.viewerProductElem;
              productId = parseInt(target.getAttribute('data-product_id'));
              if (!(!productId || isNaN(productId))) {
                _context2.next = 7;
                break;
              }
              return _context2.abrupt("return");
            case 7:
              // Set navigation properties.
              hqfw.quickView.setSlideNavigationProperties(productId);

              // Show quick view modal.
              modalElem.setAttribute('data-state', 'show');
              viewerElem.setAttribute('data-state', 'loading');

              // Get the product content.
              _context2.next = 12;
              return (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.getFetch)({
                // eslint-disable-next-line no-undef
                nonce: hqfwLocal.nonce.getProductContent,
                action: 'hqfw_get_product_content',
                productId: productId
              });
            case 12:
              res = _context2.sent;
              if (!(true === res.success)) {
                _context2.next = 26;
                break;
              }
              if (!('SUCCESSFULLY_RETRIEVED' === res.data.response)) {
                _context2.next = 24;
                break;
              }
              // Inject product content.
              viewerProductElem.innerHTML = res.data.content;
              viewerElem.setAttribute('data-state', 'prepare');
              hqfw.photoSlider.init();

              // Initialize variation form.
              hqfw.variation.__init();

              // Update the product summary height.
              hqfw.quickView.setProductSummaryBodyHeight();

              // Show product viewer.
              setTimeout(function () {
                viewerElem.setAttribute('data-state', 'default');
              }, 500);

              // Resize at mobile state.
              hqfw.quickView.setProductViewerMobileHeight();

              // eslint-disable-next-line no-undef
              if (hqfwLocal.plugin.isHVTFWActive) {
                window.handyVariationTable.setContainerSize();
              }
              return _context2.abrupt("return");
            case 24:
              _context2.next = 27;
              break;
            case 26:
              hqfw.prompt.errorMessage(res.data.error);
            case 27:
              // Hide modal.
              modalElem.setAttribute('data-state', 'hide');
            case 28:
            case "end":
              return _context2.stop();
          }
        }, _callee2);
      }));
      return function (_x) {
        return _ref.apply(this, arguments);
      };
    }());
  },
  /**
   * Close quick view modal via click event.
   *
   * @since 1.0.0
   */
  closeModal: function closeModal() {
    (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.eventListener)('click', '.hqfw-js-close-modal', /*#__PURE__*/_asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee3() {
      return _regeneratorRuntime().wrap(function _callee3$(_context3) {
        while (1) switch (_context3.prev = _context3.next) {
          case 0:
            hqfw.quickView.hideModal();
          case 1:
          case "end":
            return _context3.stop();
        }
      }, _callee3);
    })));
  },
  /**
   * Close quick view modal after adding to cart event.
   *
   * @since 1.0.0
   */
  autoCloseModal: function autoCloseModal() {
    jQuery('body').on('added_to_cart', function () {
      hqfw.quickView.hideModal();
    });
  },
  /**
   * Close quick view modal by key press (ESC) event.
   *
   * @since 1.0.0
   */
  keyPressCloseModal: function keyPressCloseModal() {
    document.addEventListener('keydown', function (e) {
      if ('Escape' === e.key) {
        // Close first if photobox state is hide.
        if ('hide' === hqfw.photoBox.getState()) {
          hqfw.quickView.hideModal();
        }
      }
    });
  },
  /**
   * Update the product content based on previous and next product.
   *
   * @since 1.0.0
   */
  slideNavigation: function slideNavigation() {
    (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.eventListener)('click', '.hqfw-js-navigation-btn', /*#__PURE__*/function () {
      var _ref3 = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee4(e) {
        var target, modalElem, viewerElem, viewerProductElem, event, productId, res;
        return _regeneratorRuntime().wrap(function _callee4$(_context4) {
          while (1) switch (_context4.prev = _context4.next) {
            case 0:
              target = e.target;
              modalElem = hqfw.quickView.modalElem;
              viewerElem = hqfw.quickView.viewerElem;
              viewerProductElem = hqfw.quickView.viewerProductElem;
              event = target.getAttribute('data-event');
              productId = parseInt(target.getAttribute('data-product_id'));
              if (!(!['prev', 'next'].includes(event) || !productId || isNaN(productId))) {
                _context4.next = 8;
                break;
              }
              return _context4.abrupt("return");
            case 8:
              // Set navigation properties.
              hqfw.quickView.setSlideNavigationProperties(productId);

              // Set product viewer to loading.
              viewerElem.setAttribute('data-state', 'loading');

              // Disable navigation button.
              _helpers__WEBPACK_IMPORTED_MODULE_0__.setAttribute.elem('.hqfw-js-navigation-btn', 'data-state', 'disabled');

              // Get the product content.
              _context4.next = 13;
              return (0,_helpers__WEBPACK_IMPORTED_MODULE_0__.getFetch)({
                // eslint-disable-next-line no-undef
                nonce: hqfwLocal.nonce.getProductContent,
                action: 'hqfw_get_product_content',
                productId: productId
              });
            case 13:
              res = _context4.sent;
              if (!(true === res.success)) {
                _context4.next = 27;
                break;
              }
              if (!('SUCCESSFULLY_RETRIEVED' === res.data.response)) {
                _context4.next = 25;
                break;
              }
              // Inject product content.
              viewerProductElem.innerHTML = res.data.content;
              viewerElem.setAttribute('data-state', 'prepare');

              // Initialize photo slider.
              hqfw.photoSlider.init();

              // Initialize variation form.
              hqfw.variation.__init();

              // Update the product summary height.
              hqfw.quickView.setProductSummaryBodyHeight();

              // Display product viewer.
              setTimeout(function () {
                viewerElem.setAttribute('data-state', 'display');
              }, 500);

              // Enable navigation button.
              _helpers__WEBPACK_IMPORTED_MODULE_0__.setAttribute.elem('.hqfw-js-navigation-btn', 'data-state', 'default');

              // Resize at mobile state.
              hqfw.quickView.setProductViewerMobileHeight();
              return _context4.abrupt("return");
            case 25:
              _context4.next = 28;
              break;
            case 27:
              hqfw.prompt.errorMessage(res.data.error);
            case 28:
              // Hide modal.
              modalElem.setAttribute('data-state', 'hide');
            case 29:
            case "end":
              return _context4.stop();
          }
        }, _callee4);
      }));
      return function (_x2) {
        return _ref3.apply(this, arguments);
      };
    }());
  },
  /**
   * Update the width and height of the product viewer.
   *
   * @since 1.0.0
   */
  screenResize: function screenResize() {
    window.addEventListener('resize', function () {
      hqfw.quickView.setProductViewerMobileHeight();
    });
  }
};

/**
 * Is Dom Ready.
 *
 * @since 1.0.0
 */
hqfw.domReady = {
  /**
   * Execute the code when dom is ready.
   *
   * @param {Function} func Contains the callback function.
   * @return {Function|void} The callback function.
   */
  execute: function execute(func) {
    if ('function' !== typeof func) {
      return;
    }
    if ('interactive' === document.readyState || 'complete' === document.readyState) {
      return func();
    }
    document.addEventListener('DOMContentLoaded', func, false);
  }
};

/**
 * Initialize App.
 *
 * @since 1.0.0
 */
hqfw.domReady.execute(function () {
  Object.entries(hqfw).forEach(function (fragment) {
    if ('init' in fragment[1]) {
      fragment[1].init();
    }
  });
});
}();
/******/ })()
;
//# sourceMappingURL=hqfw-client.js.map