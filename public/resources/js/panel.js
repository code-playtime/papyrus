/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/css/auth.scss":
/*!*********************************!*\
  !*** ./resources/css/auth.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/panel.scss":
/*!**********************************!*\
  !*** ./resources/css/panel.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/js/panel.js":
/*!*******************************!*\
  !*** ./resources/js/panel.js ***!
  \*******************************/
/***/ (() => {

// Mobile detection
function isMobile() {
  return window.innerWidth <= 768;
}

// DOM Elements
var menuToggle = document.getElementById('menuToggle');
var sidebar = document.getElementById('sidebar');
var mainContent = document.getElementById('mainContent');
var sidebarOverlay = document.getElementById('sidebarOverlay');
var userAvatar = document.getElementById('userAvatar');
var userDropdown = document.getElementById('userDropdown');

// Menu Toggle Functionality
menuToggle.addEventListener('click', function () {
  if (isMobile()) {
    sidebar.classList.toggle('mobile-open');
    sidebarOverlay.classList.toggle('active');
  } else {
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('expanded');
  }
});

// Close sidebar when clicking overlay (mobile)
sidebarOverlay.addEventListener('click', function () {
  sidebar.classList.remove('mobile-open');
  sidebarOverlay.classList.remove('active');
});

// Handle window resize
window.addEventListener('resize', function () {
  if (!isMobile()) {
    sidebar.classList.remove('mobile-open');
    sidebarOverlay.classList.remove('active');
  }
});

// User Dropdown Functionality
userAvatar.addEventListener('click', function (e) {
  e.stopPropagation();
  userDropdown.classList.toggle('active');
});

// Close dropdown when clicking outside
document.addEventListener('click', function () {
  userDropdown.classList.remove('active');
});

// Prevent dropdown from closing when clicking inside
userDropdown.addEventListener('click', function (e) {
  e.stopPropagation();
});

// Submenu Functionality
document.querySelectorAll('[data-submenu]').forEach(function (link) {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    var submenuId = this.getAttribute('data-submenu') + '-submenu';
    var submenu = document.getElementById(submenuId);
    var parentItem = this.closest('.nav-item');

    // Toggle submenu
    submenu.classList.toggle('active');
    parentItem.classList.toggle('expanded');
  });
});

// Navigation Link Active State
document.querySelectorAll('.sidebar-nav .nav-link').forEach(function (link) {
  link.addEventListener('click', function (e) {
    // Don't handle if it's a submenu toggle
    if (this.hasAttribute('data-submenu')) {
      return;
    }

    // Remove active class from all links
    document.querySelectorAll('.sidebar-nav .nav-link').forEach(function (l) {
      l.classList.remove('active');
    });

    // Add active class to clicked link
    this.classList.add('active');

    // Close mobile sidebar
    if (isMobile()) {
      sidebar.classList.remove('mobile-open');
      sidebarOverlay.classList.remove('active');
    }
  });
});

// Smooth scrolling for better UX
document.documentElement.style.scrollBehavior = 'smooth';

// Initialize
document.addEventListener('DOMContentLoaded', function () {
  console.log('Custom Admin Panel Loaded Successfully!');
});

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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/public/resources/js/panel": 0,
/******/ 			"public/resources/css/auth": 0,
/******/ 			"public/resources/css/panel": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkhtml"] = self["webpackChunkhtml"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["public/resources/css/auth","public/resources/css/panel"], () => (__webpack_require__("./resources/js/panel.js")))
/******/ 	__webpack_require__.O(undefined, ["public/resources/css/auth","public/resources/css/panel"], () => (__webpack_require__("./resources/css/panel.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["public/resources/css/auth","public/resources/css/panel"], () => (__webpack_require__("./resources/css/auth.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;