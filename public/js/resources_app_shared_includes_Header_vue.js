(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_app_shared_includes_Header_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/components/LanguageSwitcher.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/components/LanguageSwitcher.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue_clickaway__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-clickaway */ "./node_modules/vue-clickaway/dist/vue-clickaway.common.js");
/* harmony import */ var _utils_i18n_supported_locales__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../utils/i18n/supported-locales */ "./resources/app/utils/i18n/supported-locales.js");
/* harmony import */ var _i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../i18n */ "./resources/app/i18n.js");
/* harmony import */ var _utils_i18n_document__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils/i18n/document */ "./resources/app/utils/i18n/document.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "language_switcher",
  mixins: [vue_clickaway__WEBPACK_IMPORTED_MODULE_0__.mixin],
  data: function data() {
    return {
      isVisible: false,
      focusedIndex: 0,
      locales: (0,_utils_i18n_supported_locales__WEBPACK_IMPORTED_MODULE_1__.getSupportedLocales)()
    };
  },
  methods: {
    toggleVisibility: function toggleVisibility() {
      this.isVisible = !this.isVisible;
    },
    hideDropdown: function hideDropdown() {
      this.isVisible = false;
      this.focusedIndex = 0;
    },
    startArrowKeys: function startArrowKeys() {
      if (this.isVisible) {
        // this.$refs.account.focus()
        this.$refs.dropdown.children[0].children[0].focus();
      }
    },
    focusPrevious: function focusPrevious(isArrowKey) {
      this.focusedIndex = this.focusedIndex - 1;

      if (isArrowKey) {
        this.focusItem();
      }
    },
    focusNext: function focusNext(isArrowKey) {
      this.focusedIndex = this.focusedIndex + 1;

      if (isArrowKey) {
        this.focusItem();
      }
    },
    focusItem: function focusItem() {
      this.$refs.dropdown.children[this.focusedIndex].children[0].focus();
    },
    setLocale: function setLocale(locale) {
      this.$inertia.visit(this.route('locale.set', locale));
      (0,_i18n__WEBPACK_IMPORTED_MODULE_2__.loadLocaleMessagesAsync)(locale).then(function () {
        (0,_utils_i18n_document__WEBPACK_IMPORTED_MODULE_3__.setDocumentLang)(locale);
        (0,_utils_i18n_document__WEBPACK_IMPORTED_MODULE_3__.setDocumentDirectionPerLocale)(locale);
      });
      this.hideDropdown();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/shared/includes/Header.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/shared/includes/Header.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_LanguageSwitcher__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../components/LanguageSwitcher */ "./resources/app/components/LanguageSwitcher.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "Header",
  data: function data() {
    return {
      open: false
    };
  },
  components: {
    LanguageSwitcher: _components_LanguageSwitcher__WEBPACK_IMPORTED_MODULE_0__.default
  },
  methods: {
    url: function url() {
      return location.pathname.substr(1);
    },
    isUrl: function isUrl() {
      var _this = this;

      for (var _len = arguments.length, urls = new Array(_len), _key = 0; _key < _len; _key++) {
        urls[_key] = arguments[_key];
      }

      if (urls[0] === '') {
        return this.url() === '';
      }

      return urls.filter(function (url) {
        return _this.url().startsWith(url);
      }).length;
    },
    isActiveClass: function isActiveClass(url) {
      return this.isUrl(url) ? 'mr-1 ml-1 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white ' + 'inline-flex items-center bg-theme-1 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-theme-1' + 'transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100 cursor-pointer' : 'mr-1 ml-1 px-2 py-2 rounded-md text-xs font-small text-gray-300 hover:text-white ' + 'inline-flex items-center bg-gray-800 hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 ' + 'transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100 cursor-pointer';
    },
    isSubMenuActive: function isSubMenuActive(url) {
      return this.isUrl(url) ? 'block px-4 py-2 text-sm text-gray-700 bg-gray-100 hover:bg-gray-100' : 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100';
    }
  }
});

/***/ }),

/***/ "./resources/app/utils/i18n/document.js":
/*!**********************************************!*\
  !*** ./resources/app/utils/i18n/document.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "setDocumentDirectionPerLocale": () => (/* binding */ setDocumentDirectionPerLocale),
/* harmony export */   "setDocumentLang": () => (/* binding */ setDocumentLang),
/* harmony export */   "setDocumentTitle": () => (/* binding */ setDocumentTitle)
/* harmony export */ });
function setDocumentDirectionPerLocale(locale) {
  var RTLs = ["ae", "he", "arc", "ha", "ur", "dv", "fa", "yi", "khw", "ks", "ku", "ps"];
  document.dir = RTLs.includes(locale) ? "rtl" : "ltr";
}
function setDocumentLang(lang) {
  document.documentElement.lang = lang;
}
function setDocumentTitle(newTitle) {
  document.title = newTitle;
}

/***/ }),

/***/ "./node_modules/vue-clickaway/dist/vue-clickaway.common.js":
/*!*****************************************************************!*\
  !*** ./node_modules/vue-clickaway/dist/vue-clickaway.common.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";


var Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.runtime.esm.js");
Vue = 'default' in Vue ? Vue['default'] : Vue;

var version = '2.2.2';

var compatible = (/^2\./).test(Vue.version);
if (!compatible) {
  Vue.util.warn('VueClickaway ' + version + ' only supports Vue 2.x, and does not support Vue ' + Vue.version);
}



// @SECTION: implementation

var HANDLER = '_vue_clickaway_handler';

function bind(el, binding, vnode) {
  unbind(el);

  var vm = vnode.context;

  var callback = binding.value;
  if (typeof callback !== 'function') {
    if (true) {
      Vue.util.warn(
        'v-' + binding.name + '="' +
        binding.expression + '" expects a function value, ' +
        'got ' + callback
      );
    }
    return;
  }

  // @NOTE: Vue binds directives in microtasks, while UI events are dispatched
  //        in macrotasks. This causes the listener to be set up before
  //        the "origin" click event (the event that lead to the binding of
  //        the directive) arrives at the document root. To work around that,
  //        we ignore events until the end of the "initial" macrotask.
  // @REFERENCE: https://jakearchibald.com/2015/tasks-microtasks-queues-and-schedules/
  // @REFERENCE: https://github.com/simplesmiler/vue-clickaway/issues/8
  var initialMacrotaskEnded = false;
  setTimeout(function() {
    initialMacrotaskEnded = true;
  }, 0);

  el[HANDLER] = function(ev) {
    // @NOTE: this test used to be just `el.containts`, but working with path is better,
    //        because it tests whether the element was there at the time of
    //        the click, not whether it is there now, that the event has arrived
    //        to the top.
    // @NOTE: `.path` is non-standard, the standard way is `.composedPath()`
    var path = ev.path || (ev.composedPath ? ev.composedPath() : undefined);
    if (initialMacrotaskEnded && (path ? path.indexOf(el) < 0 : !el.contains(ev.target))) {
      return callback.call(vm, ev);
    }
  };

  document.documentElement.addEventListener('click', el[HANDLER], false);
}

function unbind(el) {
  document.documentElement.removeEventListener('click', el[HANDLER], false);
  delete el[HANDLER];
}

var directive = {
  bind: bind,
  update: function(el, binding) {
    if (binding.value === binding.oldValue) return;
    bind(el, binding);
  },
  unbind: unbind,
};

var mixin = {
  directives: { onClickaway: directive },
};

exports.version = version;
exports.directive = directive;
exports.mixin = mixin;

/***/ }),

/***/ "./resources/app/components/LanguageSwitcher.vue":
/*!*******************************************************!*\
  !*** ./resources/app/components/LanguageSwitcher.vue ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _LanguageSwitcher_vue_vue_type_template_id_25c0f6dc___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./LanguageSwitcher.vue?vue&type=template&id=25c0f6dc& */ "./resources/app/components/LanguageSwitcher.vue?vue&type=template&id=25c0f6dc&");
/* harmony import */ var _LanguageSwitcher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./LanguageSwitcher.vue?vue&type=script&lang=js& */ "./resources/app/components/LanguageSwitcher.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _LanguageSwitcher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _LanguageSwitcher_vue_vue_type_template_id_25c0f6dc___WEBPACK_IMPORTED_MODULE_0__.render,
  _LanguageSwitcher_vue_vue_type_template_id_25c0f6dc___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/app/components/LanguageSwitcher.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/app/shared/includes/Header.vue":
/*!**************************************************!*\
  !*** ./resources/app/shared/includes/Header.vue ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Header_vue_vue_type_template_id_5c67a5ad___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Header.vue?vue&type=template&id=5c67a5ad& */ "./resources/app/shared/includes/Header.vue?vue&type=template&id=5c67a5ad&");
/* harmony import */ var _Header_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Header.vue?vue&type=script&lang=js& */ "./resources/app/shared/includes/Header.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Header_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Header_vue_vue_type_template_id_5c67a5ad___WEBPACK_IMPORTED_MODULE_0__.render,
  _Header_vue_vue_type_template_id_5c67a5ad___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/app/shared/includes/Header.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/app/components/LanguageSwitcher.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/app/components/LanguageSwitcher.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_LanguageSwitcher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./LanguageSwitcher.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/components/LanguageSwitcher.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_LanguageSwitcher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/app/shared/includes/Header.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/app/shared/includes/Header.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Header.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/shared/includes/Header.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/app/components/LanguageSwitcher.vue?vue&type=template&id=25c0f6dc&":
/*!**************************************************************************************!*\
  !*** ./resources/app/components/LanguageSwitcher.vue?vue&type=template&id=25c0f6dc& ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LanguageSwitcher_vue_vue_type_template_id_25c0f6dc___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LanguageSwitcher_vue_vue_type_template_id_25c0f6dc___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LanguageSwitcher_vue_vue_type_template_id_25c0f6dc___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./LanguageSwitcher.vue?vue&type=template&id=25c0f6dc& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/components/LanguageSwitcher.vue?vue&type=template&id=25c0f6dc&");


/***/ }),

/***/ "./resources/app/shared/includes/Header.vue?vue&type=template&id=5c67a5ad&":
/*!*********************************************************************************!*\
  !*** ./resources/app/shared/includes/Header.vue?vue&type=template&id=5c67a5ad& ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_template_id_5c67a5ad___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_template_id_5c67a5ad___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Header_vue_vue_type_template_id_5c67a5ad___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Header.vue?vue&type=template&id=5c67a5ad& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/shared/includes/Header.vue?vue&type=template&id=5c67a5ad&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/components/LanguageSwitcher.vue?vue&type=template&id=25c0f6dc&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/components/LanguageSwitcher.vue?vue&type=template&id=25c0f6dc& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "relative" },
    [
      _c(
        "button",
        {
          staticClass: "flex items-center",
          on: {
            click: _vm.toggleVisibility,
            keydown: [
              function($event) {
                if (
                  !$event.type.indexOf("key") &&
                  _vm._k($event.keyCode, "space", 32, $event.key, [
                    " ",
                    "Spacebar"
                  ])
                ) {
                  return null
                }
                if (
                  $event.ctrlKey ||
                  $event.shiftKey ||
                  $event.altKey ||
                  $event.metaKey
                ) {
                  return null
                }
                $event.preventDefault()
                return _vm.toggleVisibility.apply(null, arguments)
              },
              function($event) {
                if (
                  !$event.type.indexOf("key") &&
                  _vm._k($event.keyCode, "esc", 27, $event.key, [
                    "Esc",
                    "Escape"
                  ])
                ) {
                  return null
                }
                if (
                  $event.ctrlKey ||
                  $event.shiftKey ||
                  $event.altKey ||
                  $event.metaKey
                ) {
                  return null
                }
                return _vm.hideDropdown.apply(null, arguments)
              },
              function($event) {
                if (
                  !$event.type.indexOf("key") &&
                  _vm._k($event.keyCode, "tab", 9, $event.key, "Tab")
                ) {
                  return null
                }
                if (!$event.shiftKey) {
                  return null
                }
                return _vm.hideDropdown.apply(null, arguments)
              },
              function($event) {
                if (
                  !$event.type.indexOf("key") &&
                  _vm._k($event.keyCode, "up", 38, $event.key, [
                    "Up",
                    "ArrowUp"
                  ])
                ) {
                  return null
                }
                if (
                  $event.ctrlKey ||
                  $event.shiftKey ||
                  $event.altKey ||
                  $event.metaKey
                ) {
                  return null
                }
                $event.preventDefault()
                return _vm.startArrowKeys.apply(null, arguments)
              },
              function($event) {
                if (
                  !$event.type.indexOf("key") &&
                  _vm._k($event.keyCode, "down", 40, $event.key, [
                    "Down",
                    "ArrowDown"
                  ])
                ) {
                  return null
                }
                if (
                  $event.ctrlKey ||
                  $event.shiftKey ||
                  $event.altKey ||
                  $event.metaKey
                ) {
                  return null
                }
                $event.preventDefault()
                return _vm.startArrowKeys.apply(null, arguments)
              }
            ]
          }
        },
        [
          _c("img", {
            staticClass: "fill-current h-4 w-4",
            attrs: { src: "/flags/" + _vm.$i18n.locale + ".svg", alt: "flag" }
          }),
          _vm._v(" "),
          _c(
            "span",
            { staticClass: "ltr:ml-2 rtl:mr-2 text-sm whitespace-no-wrap" },
            [_vm._v(_vm._s(_vm.$i18n.locale.toUpperCase()))]
          ),
          _vm._v(" "),
          _c("icon", {
            staticClass: "w-4 h-4",
            attrs: { name: "chevron-down" }
          })
        ],
        1
      ),
      _vm._v(" "),
      _c("transition", { attrs: { name: "dropdown-fade" } }, [
        _vm.isVisible
          ? _c(
              "ul",
              {
                directives: [
                  {
                    name: "on-clickaway",
                    rawName: "v-on-clickaway",
                    value: _vm.hideDropdown,
                    expression: "hideDropdown"
                  }
                ],
                ref: "dropdown",
                staticClass:
                  "absolute normal-case z-30 font-normal xs:left-0 lg:right-0 bg-white shadow overflow-hidden rounded w-48 border mt-2 py-1 lg:z-20"
              },
              _vm._l(_vm.locales, function(locale) {
                return _c("li", { key: locale.code }, [
                  _c(
                    "a",
                    {
                      ref: "account",
                      refInFor: true,
                      staticClass:
                        "flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-no-wrap",
                      attrs: { href: "#" },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.setLocale(locale.code)
                        },
                        keydown: [
                          function($event) {
                            if (
                              !$event.type.indexOf("key") &&
                              _vm._k($event.keyCode, "up", 38, $event.key, [
                                "Up",
                                "ArrowUp"
                              ])
                            ) {
                              return null
                            }
                            if (
                              $event.ctrlKey ||
                              $event.shiftKey ||
                              $event.altKey ||
                              $event.metaKey
                            ) {
                              return null
                            }
                            $event.preventDefault()
                          },
                          function($event) {
                            if (
                              !$event.type.indexOf("key") &&
                              _vm._k(
                                $event.keyCode,
                                "tab",
                                9,
                                $event.key,
                                "Tab"
                              )
                            ) {
                              return null
                            }
                            if (
                              $event.ctrlKey ||
                              $event.shiftKey ||
                              $event.altKey ||
                              $event.metaKey
                            ) {
                              return null
                            }
                            return _vm.focusNext(false)
                          },
                          function($event) {
                            if (
                              !$event.type.indexOf("key") &&
                              _vm._k($event.keyCode, "down", 40, $event.key, [
                                "Down",
                                "ArrowDown"
                              ])
                            ) {
                              return null
                            }
                            if (
                              $event.ctrlKey ||
                              $event.shiftKey ||
                              $event.altKey ||
                              $event.metaKey
                            ) {
                              return null
                            }
                            $event.preventDefault()
                            return _vm.focusNext(true)
                          },
                          function($event) {
                            if (
                              !$event.type.indexOf("key") &&
                              _vm._k($event.keyCode, "esc", 27, $event.key, [
                                "Esc",
                                "Escape"
                              ])
                            ) {
                              return null
                            }
                            if (
                              $event.ctrlKey ||
                              $event.shiftKey ||
                              $event.altKey ||
                              $event.metaKey
                            ) {
                              return null
                            }
                            return _vm.hideDropdown.apply(null, arguments)
                          }
                        ]
                      }
                    },
                    [
                      _c("img", {
                        staticClass: "h-4 w-4",
                        attrs: {
                          alt: locale.code,
                          src: "/flags/" + locale.code + ".svg"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "ltr:ml-2 rtl:mr-2" }, [
                        _vm._v(_vm._s(locale.name))
                      ])
                    ]
                  )
                ])
              }),
              0
            )
          : _vm._e()
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/shared/includes/Header.vue?vue&type=template&id=5c67a5ad&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/app/shared/includes/Header.vue?vue&type=template&id=5c67a5ad& ***!
  \************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "header",
    {
      staticClass:
        "h-24 text-gray-100 bg-gray-900 border-t border-t-2 border-theme-2 body-font shadow w-full fixed pin-t z-50"
    },
    [
      _c("div", { staticClass: "w-full items-center" }, [
        _c(
          "div",
          { staticClass: "transition duration-500 ease-in-out transform" },
          [
            _c(
              "div",
              {
                staticClass:
                  "flex flex-col flex-wrap p-2 md:items-center md:flex-row"
              },
              [
                _c(
                  "inertia-link",
                  {
                    staticClass:
                      "p-1 border-transparent text-gray-400 rounded-full hover:text-white bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700",
                    attrs: { href: _vm.route("dashboard") }
                  },
                  [
                    _c(
                      "svg",
                      {
                        staticClass: "h-5 w-5",
                        attrs: {
                          stroke: "currentColor",
                          xmlns: "http://www.w3.org/2000/svg",
                          fill: "none",
                          viewBox: "0 0 24 24"
                        }
                      },
                      [
                        _c("path", {
                          attrs: {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            "stroke-width": "2",
                            d:
                              "M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                          }
                        })
                      ]
                    )
                  ]
                ),
                _vm._v(" "),
                _c(
                  "nav",
                  {
                    staticClass: "flex flex-wrap items-center text-base md:ml-0"
                  },
                  [
                    _c(
                      "inertia-link",
                      {
                        class: _vm.isActiveClass("dashboard.calendar"),
                        attrs: { href: _vm.route("dashboard.calendar") }
                      },
                      [_vm._v(_vm._s(_vm.$t("menu.calendar")))]
                    ),
                    _vm._v(" "),
                    _c(
                      "inertia-link",
                      {
                        class: _vm.isActiveClass("dashboard.flow_board"),
                        attrs: { href: _vm.route("dashboard.flow_board") }
                      },
                      [_vm._v(_vm._s(_vm.$t("menu.flow_board")))]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "dropdown inline-block relative" },
                      [
                        _c(
                          "div",
                          { class: _vm.isActiveClass("dashboard.calendar") },
                          [
                            _c("span", { staticClass: "mr-0.5" }, [
                              _vm._v(_vm._s(_vm.$t("menu.patient_client")))
                            ]),
                            _vm._v(" "),
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "relative bg-white" },
                              [
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.index"
                                    ),
                                    attrs: { href: _vm.route("patients.index") }
                                  },
                                  [
                                    _vm._v(
                                      "Finder\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.create"
                                    ),
                                    attrs: {
                                      href: _vm.route("patients.create")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Add New/Search\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Recycle Bin\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _vm.$page.props.ehr_patient.patient != null
                                  ? _c(
                                      "inertia-link",
                                      {
                                        class: _vm.isSubMenuActive(
                                          "dashboard.settings"
                                        ),
                                        attrs: {
                                          href: _vm.route(
                                            "patients.select",
                                            _vm.$page.props.ehr_patient.patient
                                              .id
                                          )
                                        }
                                      },
                                      [
                                        _vm._v(
                                          "Summary\n                                "
                                        )
                                      ]
                                    )
                                  : _vm._e(),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Track Appointments\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Visits\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Records\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Visit Forms\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Imports\n                                "
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "dropdown inline-block relative" },
                      [
                        _c(
                          "div",
                          { class: _vm.isActiveClass("dashboard.calendar") },
                          [
                            _c("span", { staticClass: "mr-0.5" }, [
                              _vm._v(_vm._s(_vm.$t("menu.fees")))
                            ]),
                            _vm._v(" "),
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "relative bg-white" },
                              [
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.index"
                                    ),
                                    attrs: { href: _vm.route("patients.index") }
                                  },
                                  [
                                    _vm._v(
                                      "Fee Sheet\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.create"
                                    ),
                                    attrs: {
                                      href: _vm.route("patients.create")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Payment\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Checkout\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Billing\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Posting\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Batch Payments\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Verify Patient Data\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "EDI History\n                                "
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "dropdown inline-block relative" },
                      [
                        _c(
                          "div",
                          { class: _vm.isActiveClass("dashboard.calendar") },
                          [
                            _c("span", { staticClass: "mr-0.5" }, [
                              _vm._v(_vm._s(_vm.$t("menu.inventory")))
                            ]),
                            _vm._v(" "),
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "relative bg-white" },
                              [
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.index"
                                    ),
                                    attrs: { href: _vm.route("patients.index") }
                                  },
                                  [
                                    _vm._v(
                                      "Management\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.create"
                                    ),
                                    attrs: {
                                      href: _vm.route("patients.create")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Destroyed\n                                "
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "dropdown inline-block relative" },
                      [
                        _c(
                          "div",
                          { class: _vm.isActiveClass("dashboard.calendar") },
                          [
                            _c("span", { staticClass: "mr-0.5" }, [
                              _vm._v(_vm._s(_vm.$t("menu.procedures")))
                            ]),
                            _vm._v(" "),
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "relative bg-white" },
                              [
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.index"
                                    ),
                                    attrs: { href: _vm.route("patients.index") }
                                  },
                                  [
                                    _vm._v(
                                      "Providers\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.create"
                                    ),
                                    attrs: {
                                      href: _vm.route("patients.create")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Configuration\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Load Compendium\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Pending Review\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Patient Results\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Lab Results\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Electronic Reports\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Lab Documents\n                                "
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "dropdown inline-block relative" },
                      [
                        _c(
                          "div",
                          { class: _vm.isActiveClass("dashboard.calendar") },
                          [
                            _c("span", { staticClass: "mr-0.5" }, [
                              _vm._v(_vm._s(_vm.$t("menu.reports")))
                            ]),
                            _vm._v(" "),
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "relative bg-white" },
                              [
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.index"
                                    ),
                                    attrs: { href: _vm.route("patients.index") }
                                  },
                                  [
                                    _vm._v(
                                      "Clients\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.create"
                                    ),
                                    attrs: {
                                      href: _vm.route("patients.create")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Visits\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Financial\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Inventory\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Procedures\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Insurance\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Blank Forms\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Services\n                                "
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "dropdown inline-block relative" },
                      [
                        _c(
                          "div",
                          { class: _vm.isActiveClass("dashboard.calendar") },
                          [
                            _c("span", { staticClass: "mr-0.5" }, [
                              _vm._v(_vm._s(_vm.$t("menu.miscellaneous")))
                            ]),
                            _vm._v(" "),
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "relative bg-white" },
                              [
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.index"
                                    ),
                                    attrs: { href: _vm.route("patients.index") }
                                  },
                                  [
                                    _vm._v(
                                      "Patient Education\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.create"
                                    ),
                                    attrs: {
                                      href: _vm.route("patients.create")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Patient Portal\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Authorizations\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Address Book\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Order Catalog\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "BatchCom\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Preferences\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "New Documents\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Utilities\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Document Templates\n                                "
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "dropdown inline-block relative" },
                      [
                        _c(
                          "div",
                          { class: _vm.isActiveClass("dashboard.calendar") },
                          [
                            _c("span", { staticClass: "mr-0.5" }, [
                              _vm._v(_vm._s(_vm.$t("menu.popups")))
                            ]),
                            _vm._v(" "),
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "relative bg-white" },
                              [
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.index"
                                    ),
                                    attrs: { href: _vm.route("patients.index") }
                                  },
                                  [
                                    _vm._v(
                                      "Issues\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.create"
                                    ),
                                    attrs: {
                                      href: _vm.route("patients.create")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Appts\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Superbill\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Payment\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Letter\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Chart Label\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Barcode Label\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Address Label\n                                "
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "dropdown inline-block relative" },
                      [
                        _c(
                          "div",
                          { class: _vm.isActiveClass("dashboard.calendar") },
                          [
                            _c("span", { staticClass: "mr-0.5" }, [
                              _vm._v(_vm._s(_vm.$t("menu.qa_measures")))
                            ]),
                            _vm._v(" "),
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "relative bg-white" },
                              [
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.index"
                                    ),
                                    attrs: { href: _vm.route("patients.index") }
                                  },
                                  [
                                    _vm._v(
                                      "View Reports\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.create"
                                    ),
                                    attrs: {
                                      href: _vm.route("patients.create")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Create MIPS Report\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Select Measures\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Upload Claim Files\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Instance Counts\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Remove Provider Assignments\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Provider Encounter Counts\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Database Imports\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Database Inserts\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "MIPS Module Installer\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Alert Logs\n                                "
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "dropdown inline-block relative" },
                      [
                        _c(
                          "div",
                          { class: _vm.isActiveClass("dashboard.calendar") },
                          [
                            _c("span", { staticClass: "mr-0.5" }, [
                              _vm._v(_vm._s(_vm.$t("menu.help")))
                            ]),
                            _vm._v(" "),
                            _c(
                              "svg",
                              {
                                staticClass: "fill-current h-4 w-4",
                                attrs: {
                                  xmlns: "http://www.w3.org/2000/svg",
                                  viewBox: "0 0 20 20"
                                }
                              },
                              [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                  }
                                })
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "dropdown-menu absolute hidden py-1 w-48 bg-white rounded-md shadow-lg z-50"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "relative bg-white" },
                              [
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive("about"),
                                    attrs: { href: _vm.route("about") }
                                  },
                                  [
                                    _vm._v(
                                      "About\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "patients.create"
                                    ),
                                    attrs: {
                                      href: _vm.route("patients.create")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Forums\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive(
                                      "dashboard.settings"
                                    ),
                                    attrs: {
                                      href: _vm.route("dashboard.settings")
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "Chat\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "inertia-link",
                                  {
                                    class: _vm.isSubMenuActive("contact"),
                                    attrs: { href: _vm.route("contact") }
                                  },
                                  [
                                    _vm._v(
                                      "Contact\n                                "
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]
                        )
                      ]
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass:
                      "flex flex-wrap ltr:justify-end rtl:justify-end ml-auto xl:flex-nowrap md:flex-nowrap lg:flex-wrap"
                  },
                  [
                    _c("div", { staticClass: "md:block ml-2" }, [
                      _c(
                        "div",
                        { staticClass: "flex items-center md:ml-4" },
                        [
                          _c("LanguageSwitcher"),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "p-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700"
                            },
                            [
                              _c(
                                "svg",
                                {
                                  staticClass: "h-6 w-6",
                                  attrs: {
                                    xmlns: "http://www.w3.org/2000/svg",
                                    fill: "none",
                                    viewBox: "0 0 24 24",
                                    stroke: "currentColor"
                                  }
                                },
                                [
                                  _c("path", {
                                    attrs: {
                                      strokeLinecap: "round",
                                      strokeLinejoin: "round",
                                      strokeWidth: "{2}",
                                      d:
                                        "M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                    }
                                  })
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "ml-1 relative" },
                            [
                              _c("div", [
                                _vm.open
                                  ? _c("div", {
                                      staticClass: "fixed inset-0",
                                      on: {
                                        click: function($event) {
                                          _vm.open = false
                                        }
                                      }
                                    })
                                  : _vm._e(),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  {
                                    staticClass:
                                      "max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid",
                                    on: {
                                      click: function($event) {
                                        _vm.open = !_vm.open
                                      }
                                    }
                                  },
                                  [_vm._m(0)]
                                )
                              ]),
                              _vm._v(" "),
                              _c(
                                "transition",
                                {
                                  attrs: {
                                    "enter-active-class":
                                      "transition-all transition-fastest ease-out-quad",
                                    "leave-active-class":
                                      "transition-all transition-faster ease-in-quad",
                                    "enter-class": "opacity-0 scale-70",
                                    "enter-to-class": "opacity-100 scale-100",
                                    "leave-class": "opacity-100 scale-100",
                                    "leave-to-class": "opacity-0 scale-70"
                                  }
                                },
                                [
                                  _vm.open
                                    ? _c(
                                        "div",
                                        {
                                          staticClass:
                                            "origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-50"
                                        },
                                        [
                                          _c(
                                            "div",
                                            {
                                              staticClass:
                                                "py-1 rounded-md bg-white shadow-xs"
                                            },
                                            [
                                              _c(
                                                "inertia-link",
                                                {
                                                  class: _vm.isSubMenuActive(
                                                    "dashboard.profile"
                                                  ),
                                                  attrs: {
                                                    href: _vm.route(
                                                      "dashboard.profile"
                                                    )
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                                " +
                                                      _vm._s(
                                                        _vm.$page.props.auth
                                                          .user.first_name +
                                                          " " +
                                                          _vm.$page.props.auth
                                                            .user.last_name
                                                      ) +
                                                      "\n                                            "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "inertia-link",
                                                {
                                                  class: _vm.isSubMenuActive(
                                                    "dashboard.profile"
                                                  ),
                                                  attrs: {
                                                    href: _vm.route(
                                                      "dashboard.profile"
                                                    )
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    " Your Profile\n                                            "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "inertia-link",
                                                {
                                                  class: _vm.isSubMenuActive(
                                                    "dashboard.settings"
                                                  ),
                                                  attrs: {
                                                    href: _vm.route(
                                                      "dashboard.settings"
                                                    )
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    " Settings\n                                            "
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "inertia-link",
                                                {
                                                  class: _vm.isSubMenuActive(
                                                    "logout"
                                                  ),
                                                  attrs: {
                                                    href: _vm.route("logout"),
                                                    method: "post"
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    " Sign out\n                                            "
                                                  )
                                                ]
                                              )
                                            ],
                                            1
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ])
                  ]
                )
              ],
              1
            )
          ]
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "p-2 flex-col items-center" }, [
        _c(
          "div",
          {
            staticClass:
              "flex flex-wrap items-center text-base -mt-1 md:ml-2 mb-2"
          },
          [
            _c(
              "div",
              {
                staticClass: "text-sm uppercase",
                staticStyle: { "font-size": "11px" }
              },
              [
                _vm.$page.props.ehr_patient.patient === null
                  ? _c("div", [
                      _c("span", [
                        _vm._v(_vm._s(_vm.$t("menu.patient_client")) + ":")
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "font-bold" }, [_vm._v("None")])
                    ])
                  : _c(
                      "div",
                      [
                        _c("span", [
                          _vm._v(_vm._s(_vm.$t("menu.patient_client")) + ":")
                        ]),
                        _vm._v(" "),
                        _c(
                          "inertia-link",
                          {
                            staticClass: "hover:text-teal-500 hover:underline",
                            attrs: {
                              href: _vm.route(
                                "patients.select",
                                _vm.$page.props.ehr_patient.patient.id
                              )
                            }
                          },
                          [
                            _c("span", { staticClass: "font-bold" }, [
                              _vm._v(
                                "\n                            " +
                                  _vm._s(
                                    _vm.$page.props.ehr_patient.patient
                                      .first_name
                                  ) +
                                  "\n                            " +
                                  _vm._s(
                                    _vm.$page.props.ehr_patient.patient
                                      .last_name
                                  ) +
                                  "\n                            (" +
                                  _vm._s(
                                    _vm.$page.props.ehr_patient.patient.id
                                  ) +
                                  ")\n                        "
                              )
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "inertia-link",
                          {
                            staticClass:
                              "mr-1.5 mb-1 ml-1.5 px-2 py-1 rounded-md text-xs\n                    font-small text-gray-300 hover:text-white inline-flex items-center bg-gray-700 font-bold\n                    hover:bg-gray-800 focus:outline-none focus:text-white focus:bg-gray-700 uppercase pointer",
                            attrs: {
                              href: _vm.route(
                                "patients.clear",
                                _vm.$page.props.ehr_patient.patient.id
                              )
                            }
                          },
                          [
                            _vm._v(
                              "\n                        Clear\n                    "
                            )
                          ]
                        ),
                        _c("br"),
                        _vm._v(" "),
                        _c("span", [
                          _vm._v(_vm._s(_vm.$t("forms.date_of_birth")) + ":")
                        ]),
                        _vm._v(" "),
                        _c("span", { staticClass: "font-bold" }, [
                          _vm._v(
                            _vm._s(
                              _vm.$page.props.ehr_patient.patient.date_of_birth
                            )
                          )
                        ]),
                        _vm._v("  \n                    "),
                        _c("span", [_vm._v(_vm._s(_vm.$t("forms.age")) + ":")]),
                        _vm._v(" "),
                        _c("span", { staticClass: "font-bold" }, [
                          _vm._v(
                            _vm._s(_vm.$page.props.ehr_patient.patient.age)
                          )
                        ])
                      ],
                      1
                    )
              ]
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "flex flex-grow lg:flex-row mr-40 justify-end" },
              [
                _c(
                  "div",
                  {
                    staticClass: "relative mt-1 text-sm uppercase w-64",
                    staticStyle: { "font-size": "11px" }
                  },
                  [
                    _vm.$page.props.ehr_patient.patient === null
                      ? _c("div", { staticClass: "mb-1" }, [
                          _c("span", [
                            _vm._v(
                              _vm._s(_vm.$t("general.selected_encounter")) + ":"
                            )
                          ]),
                          _vm._v(" "),
                          _c("span", { staticClass: "font-bold" }, [
                            _vm._v("None")
                          ])
                        ])
                      : _c("div", { staticClass: "mb-1" }, [
                          _c("span", [
                            _vm._v(
                              _vm._s(_vm.$t("general.selected_encounter")) + ":"
                            )
                          ]),
                          _vm._v(" "),
                          _c(
                            "span",
                            { staticClass: "font-bold text-teal-300" },
                            [_vm._v("2020-11-18")]
                          ),
                          _vm._v(" "),
                          _vm._m(1),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                            },
                            [
                              _c(
                                "svg",
                                {
                                  staticClass: "fill-current h-4 w-4",
                                  attrs: {
                                    xmlns: "http://www.w3.org/2000/svg",
                                    viewBox: "0 0 20 20"
                                  }
                                },
                                [
                                  _c("path", {
                                    attrs: {
                                      d:
                                        "M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                    }
                                  })
                                ]
                              )
                            ]
                          )
                        ])
                  ]
                )
              ]
            )
          ]
        )
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "relative w-8 h-8" }, [
      _c("img", {
        staticClass: "rounded-full border border-1 border-gray-100 shadow-sm",
        attrs: { src: "/images/avatars/admin.png", alt: "user image" }
      }),
      _vm._v(" "),
      _c("div", {
        staticClass:
          "absolute top-0 right-0 h-2 w-2 border-2 border-white rounded-full bg-green-400 z-1"
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "select",
      {
        staticClass:
          "appearance-none block w-full bg-transparent text-gray-400 border border-gray-500\n                    rounded mt-1.5 py-1 px-4 mb-3 leading-tight text-xs focus:outline-none focus:bg-transparent focus:border-gray-500"
      },
      [
        _c("option", [_vm._v("Choose Encounter")]),
        _vm._v(" "),
        _c("option", [_vm._v("New Encounter")]),
        _vm._v(" "),
        _c("option", [_vm._v("Past Encounter List (3)")]),
        _vm._v(" "),
        _c("option", [_vm._v("2020-11-02 / New Patient ----> Review")]),
        _vm._v(" "),
        _c("option", [
          _vm._v("2020-11-04 / Preventive Care Services ----> Review")
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ })

}]);