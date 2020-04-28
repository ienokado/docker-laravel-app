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

/***/ "./resources/js/functionsLib.js":
/*!**************************************!*\
  !*** ./resources/js/functionsLib.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.FunctionsLib = {}; // フッターの表示

window.FunctionsLib.displayFooter = displayFooter;

function displayFooter(pangeName, lastAnimatedItem) {
  var footer = document.getElementById('footer-id-for-animation');

  if (lastAnimatedItem !== undefined) {
    // アニメーションある場合 : アニメーション後に表示
    document.getElementById(lastAnimatedItem).addEventListener('animationend', function () {
      footer.classList.remove('disappear');
      footer.classList.add('footer-appear');
    });
  } else {
    // アニメーションない場合 : 即表示
    footer.classList.remove('disappear');
  } // 選択中のスタイリング


  if (pangeName !== undefined && pangeName !== '') {
    var footerItem = document.getElementById('footer-menu-list-item-' + pangeName);

    for (var i = 0; i < footerItem.children.length; i++) {
      footerItem.children[i].classList.add('selected');
    }

    var selectedDiv = document.createElement("div");
    selectedDiv.className = 'footer-menu-item-selected';
    footerItem.appendChild(selectedDiv);
  }
} // アートワークリサイズ


window.FunctionsLib.resizeArtwork = resizeArtwork;

function resizeArtwork() {
  var artworks = document.querySelectorAll('img.card-artwork-img');
  artworks.forEach(function (artwork) {
    var imgW = artwork.width;
    var imgH = artwork.height; //card-artwork-img-

    artwork.classList.remove('card-artwork-img-resize-default');

    if (imgH <= imgW) {
      artwork.classList.add('size-based-on-width');
    } else if (imgW < imgH) {
      artwork.classList.add('size-based-on-height');
    }
  });
} // 検索結果の高さ調整


window.FunctionsLib.adjustHeightSearchResultCard = adjustHeightSearchResultCard;

function adjustHeightSearchResultCard() {
  var searchKeyword_h = document.getElementById('search-keyword-area').clientHeight;
  var card_h = document.getElementById('search-result-card').clientHeight;

  if (searchKeyword_h + card_h < document.documentElement.clientHeight) {
    document.getElementById('search-result-card').classList.add('ground-on-bottom');
  }
} // 検索結果のプレビューエリア生成


window.FunctionsLib.createPreviewAreaForSearchResultCard = createPreviewAreaForSearchResultCard;

function createPreviewAreaForSearchResultCard() {
  document.getElementById('preview-control').addEventListener('click', previewClickForSearchResultCard);
  var preview = document.getElementById('preview-area');
  preview.parentNode.classList.add('preview-area-base');
} // プレビューボタンクリック


window.FunctionsLib.previewClickForSearchResultCard = previewClickForSearchResultCard;

function previewClickForSearchResultCard() {
  var audio = SearchResult.audio;
  var controlIcon = SearchResult.controlIcon;

  if (controlIcon.classList.contains('fa-play')) {
    // 再生
    if (audio.readyState === 4) {
      // 再生可能
      audio.play();
    } else {
      //再生可能でない場合、メディアをロード
      audio.load();

      if (audio.classList.contains('available') !== true) {
        audio.addEventListener('canplaythrough', function () {
          audio.play();
        });
        audio.classList.add('available');
      }
    }
  } else if (controlIcon.classList.contains('fa-pause')) {
    // 停止
    audio.pause();
  } // 初回再生時,自動終了時の処理を設定


  if (audio.classList.contains('played-even-once') !== true) {
    audio.addEventListener('ended', function () {
      previewControlSettingForSearchResultCard(controlIcon);
    });
    audio.classList.add('played-even-once');
  }

  previewControlSettingForSearchResultCard(controlIcon);
} // ボタン変更


window.FunctionsLib.previewControlSettingForSearchResultCard = previewControlSettingForSearchResultCard;

function previewControlSettingForSearchResultCard(controlIcon) {
  if (controlIcon.classList.contains('fa-play')) {
    // 再生→停止ボタン
    controlIcon.classList.remove('fa-play');
    controlIcon.classList.add('fa-pause');
  } else {
    // 停止→再生ボタン
    controlIcon.classList.add('fa-play');
    controlIcon.classList.remove('fa-pause');
  }
} // (試聴用)プレビューエリア生成, イベントリスナー生成


window.FunctionsLib.createPreviewAreaForCardItem = createPreviewAreaForCardItem;

function createPreviewAreaForCardItem(cardName) {
  var previewAreas = document.querySelectorAll('.' + cardName + '-card-preview-area');
  previewAreas.forEach(function (previewArea) {
    previewArea.firstElementChild.addEventListener('click', previewClickForCardItem);
    previewArea.parentNode.classList.add(cardName + '-card-preview-area-base');
  });
} // プレビューボタンクリック


window.FunctionsLib.previewClickForCardItem = previewClickForCardItem;

function previewClickForCardItem() {
  // クリックされた情報
  var dataId = this.getAttribute('data-id');
  var audios = CardItem.audios;
  var icons = CardItem.icons; // 再生対象のメディアソース

  var mediaSrcs = [];
  audios.forEach(function (audio) {
    if (audio.getAttribute('data-id') === dataId) {
      mediaSrcs.push(audio);
    }
  });
  var mediaSrc = mediaSrcs[0]; // 再生対象のコントロール

  var controls = [];
  icons.forEach(function (icon) {
    if (icon.getAttribute('data-id') === dataId) {
      controls.push(icon);
    }
  }); // 再生中のアイコンとメディア

  var playingIcons = document.querySelectorAll('i.playing');
  var playingSrcs = document.querySelectorAll('audio.playing'); // クリックしたアイコン以外の音楽が再生中の場合, その再生を停止する

  if (playingSrcs.length !== 0) {
    playingSrcs.forEach(function (playingSrc) {
      if (dataId !== playingSrc.getAttribute('data-id')) {
        playingSrc.pause();
        playingSrc.classList.remove('playing');
      }
    });
    playingIcons.forEach(function (playingIcon) {
      if (dataId !== playingIcon.getAttribute('data-id')) {
        playingIcon.classList.add('fa-play');
        playingIcon.classList.remove('fa-pause', 'playing');
      }
    });
  } // 再生/停止処理


  if (controls[0].classList.contains('fa-play')) {
    // 再生
    if (mediaSrc.readyState === 4) {
      // 再生可能
      mediaSrc.play();
    } else {
      //再生可能でない場合、メディアをロード
      mediaSrc.load();

      if (mediaSrc.classList.contains('available') !== true) {
        mediaSrc.addEventListener('canplaythrough', function () {
          mediaSrc.play();
        });
        mediaSrc.classList.add('available');
      }
    }
  } else if (controls[0].classList.contains('fa-pause')) {
    // 停止
    mediaSrc.pause();
  } // 初回再生時,自動終了時の処理を設定


  if (mediaSrc.classList.contains('played-even-once') !== true) {
    mediaSrc.addEventListener('ended', function () {
      previewControlSettingForCardItem(controls, mediaSrcs);
    });
    mediaSrc.classList.add('played-even-once');
  }

  previewControlSettingForCardItem(controls, mediaSrcs);
} // ボタン変更


window.FunctionsLib.previewControlSettingForCardItem = previewControlSettingForCardItem;

function previewControlSettingForCardItem(controls, mediaSrcs) {
  if (controls[0].classList.contains('fa-play')) {
    // 再生開始(再生→停止ボタンに変更)
    controls.forEach(function (control) {
      control.classList.remove('fa-play');
      control.classList.add('fa-pause', 'playing');
    });
    mediaSrcs.forEach(function (mediaSrc) {
      mediaSrc.classList.add('playing');
    });
  } else {
    // 再生終了(停止→再生ボタンに変更)
    controls.forEach(function (control) {
      control.classList.add('fa-play');
      control.classList.remove('fa-pause', 'playing');
    });
    mediaSrcs.forEach(function (mediaSrc) {
      mediaSrc.classList.remove('playing');
    });
  }
}

/***/ }),

/***/ 2:
/*!********************************************!*\
  !*** multi ./resources/js/functionsLib.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /work/resources/js/functionsLib.js */"./resources/js/functionsLib.js");


/***/ })

/******/ });