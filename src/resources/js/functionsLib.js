
window.FunctionsLib = {};

    // フッターの表示
    window.FunctionsLib.displayFooter = displayFooter;
    function displayFooter(pangeName, lastAnimatedItem) {

        const footer = document.getElementById('footer-id-for-animation');
        if (lastAnimatedItem !== undefined) {
            // アニメーションある場合 : アニメーション後に表示
            document.getElementById(lastAnimatedItem).addEventListener('animationend', () => {
                footer.classList.remove('disappear');
                footer.classList.add('footer-appear');
            });
        } else {
             // アニメーションない場合 : 即表示
             footer.classList.remove('disappear');
        }

        // 選択中のスタイリング
        if (pangeName !== undefined && pangeName !== '') {
            const footerItem = document.getElementById('footer-menu-list-item-' + pangeName);
            for (let i = 0; i < footerItem.children.length; i++) {
                footerItem.children[i].classList.add('selected');
            }
            const selectedDiv = document.createElement("div");
            selectedDiv.className = 'footer-menu-item-selected';
            footerItem.appendChild(selectedDiv);
        }
    }

    // アートワークリサイズ
    window.FunctionsLib.resizeArtwork = resizeArtwork;
    function resizeArtwork() {
        var artworks = document.querySelectorAll('img.card-artwork-img');
        artworks.forEach(artwork=> {
            var imgW = artwork.width;
            var imgH = artwork.height;
            //card-artwork-img-
            artwork.classList.remove('card-artwork-img-resize-default')
            if (imgH <= imgW) {
                artwork.classList.add('size-based-on-width');
            } else if (imgW < imgH) {
                artwork.classList.add('size-based-on-height');
            }
        });
    }

    // 検索結果の高さ調整
    window.FunctionsLib.adjustHeightSearchResultCard = adjustHeightSearchResultCard;
    function adjustHeightSearchResultCard() {
        var searchKeyword_h = document.getElementById('search-keyword-area').clientHeight;
        var card_h = document.getElementById('search-result-card').clientHeight;
        if ((searchKeyword_h + card_h) < document.documentElement.clientHeight) {
            document.getElementById('search-result-card').classList.add('ground-on-bottom');
        }
    }

    // 検索結果のプレビューエリア生成
    window.FunctionsLib.createPreviewAreaForSearchResultCard = createPreviewAreaForSearchResultCard;
    function createPreviewAreaForSearchResultCard() {
        document.getElementById('preview-control').addEventListener('click', previewClickForSearchResultCard);
        var preview = document.getElementById('preview-area');
        preview.parentNode.classList.add('preview-area-base');
    }

    // プレビューボタンクリック
    window.FunctionsLib.previewClickForSearchResultCard = previewClickForSearchResultCard;
    function previewClickForSearchResultCard() {
        let audio = SearchResult.audio;
        let controlIcon = SearchResult.controlIcon;
        if (controlIcon.classList.contains('fa-play')) {
            // 再生
            if (audio.readyState === 4) {
                // 再生可能
                audio.play();
            } else {
                //再生可能でない場合、メディアをロード
                audio.load();
                if (audio.classList.contains('available') !== true) {
                    audio.addEventListener('canplaythrough', () => {
                        audio.play();
                    });
                    audio.classList.add('available');
                }
            }
        } else if (controlIcon.classList.contains('fa-pause')) {
            // 停止
            audio.pause();
        }

        // 初回再生時,自動終了時の処理を設定
        if (audio.classList.contains('played-even-once') !== true) {
            audio.addEventListener('ended', () => {
                previewControlSettingForSearchResultCard(controlIcon);
            });
            audio.classList.add('played-even-once');
        }
        previewControlSettingForSearchResultCard(controlIcon);
    }

    // ボタン変更
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
    }

    // (試聴用)プレビューエリア生成, イベントリスナー生成
    window.FunctionsLib.createPreviewAreaForCardItem = createPreviewAreaForCardItem;
    function createPreviewAreaForCardItem(cardName) {
        const previewAreas = document.querySelectorAll('.' + cardName + '-card-preview-area');
        previewAreas.forEach(previewArea=> {
            previewArea.firstElementChild.addEventListener('click', previewClickForCardItem);
            previewArea.parentNode.classList.add(cardName + '-card-preview-area-base');
        });
    }

    // プレビューボタンクリック
    window.FunctionsLib.previewClickForCardItem = previewClickForCardItem;
    function previewClickForCardItem() {
        // クリックされた情報
        const dataId = this.getAttribute('data-id');
        const audios = CardItem.audios;
        const icons = CardItem.icons;
        // 再生対象のメディアソース
        var mediaSrcs = [];
        audios.forEach(audio=> {
            if (audio.getAttribute('data-id') === dataId) {
                mediaSrcs.push(audio);
            }
        });
        var mediaSrc = mediaSrcs[0];
        // 再生対象のコントロール
        var controls = [];
        icons.forEach(icon=> {
            if (icon.getAttribute('data-id') === dataId) {
                controls.push(icon);
            }
        });

        // 再生中のアイコンとメディア
        const playingIcons = document.querySelectorAll('i.playing');
        const playingSrcs = document.querySelectorAll('audio.playing');
        // クリックしたアイコン以外の音楽が再生中の場合, その再生を停止する
        if (playingSrcs.length !== 0) {
            playingSrcs.forEach(playingSrc=> {
                if (dataId !== playingSrc.getAttribute('data-id')) {
                    playingSrc.pause();
                    playingSrc.classList.remove('playing');
                }
            });
            playingIcons.forEach(playingIcon=> {
                if (dataId !== playingIcon.getAttribute('data-id')) {
                    playingIcon.classList.add('fa-play');
                    playingIcon.classList.remove('fa-pause', 'playing');
                }
            });
        }

        // 再生/停止処理
        if (controls[0].classList.contains('fa-play')) {
            // 再生
            if (mediaSrc.readyState === 4) {
                // 再生可能
                mediaSrc.play();
            } else {
                //再生可能でない場合、メディアをロード
                mediaSrc.load();
                if (mediaSrc.classList.contains('available') !== true) {
                    mediaSrc.addEventListener('canplaythrough', () => {
                        mediaSrc.play();
                    });
                    mediaSrc.classList.add('available');
                }
            }
        } else if (controls[0].classList.contains('fa-pause')) {
            // 停止
            mediaSrc.pause();
        }

        // 初回再生時,自動終了時の処理を設定
        if (mediaSrc.classList.contains('played-even-once') !== true) {
            mediaSrc.addEventListener('ended', () => {
                previewControlSettingForCardItem(controls, mediaSrcs);
            });
            mediaSrc.classList.add('played-even-once');
        }
        previewControlSettingForCardItem(controls, mediaSrcs);
    }

    // ボタン変更
    window.FunctionsLib.previewControlSettingForCardItem = previewControlSettingForCardItem;
    function previewControlSettingForCardItem(controls, mediaSrcs) {
        if (controls[0].classList.contains('fa-play')) {
            // 再生開始(再生→停止ボタンに変更)
            controls.forEach(control=> {
                control.classList.remove('fa-play');
                control.classList.add('fa-pause', 'playing');
            });
            mediaSrcs.forEach(mediaSrc=> {
                mediaSrc.classList.add('playing');
            });
        } else {
            // 再生終了(停止→再生ボタンに変更)
            controls.forEach(control=> {
                control.classList.add('fa-play');
                control.classList.remove('fa-pause', 'playing');
            });
            mediaSrcs.forEach(mediaSrc=> {
                mediaSrc.classList.remove('playing');
            });
        }
    }