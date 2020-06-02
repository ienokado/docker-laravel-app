
window.PlayDebayashis = {};

// (試聴用)イベントリスナー生成
window.PlayDebayashis.createPreviewArea = createPreviewArea;
function createPreviewArea() {
    const previewAreas = document.querySelectorAll('.card-preview-area');
    previewAreas.forEach(previewArea=> {
        previewArea.firstElementChild.addEventListener('click', previewClick);
    });
}

// プレビューボタンクリック
window.PlayDebayashis.previewClick = previewClick;
function previewClick() {
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
            previewControlSetting(controls, mediaSrcs);
        });
        mediaSrc.classList.add('played-even-once');
    }
    previewControlSetting(controls, mediaSrcs);
}

// ボタン変更
window.PlayDebayashis.previewControlSetting = previewControlSetting;
function previewControlSetting(controls, mediaSrcs) {
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