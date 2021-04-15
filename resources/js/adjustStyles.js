
window.AdjustStyles = {};

// フッターの表示
window.AdjustStyles.displayFooter = displayFooter;
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

// 検索結果の高さ調整
window.AdjustStyles.adjustHeightSearchResultCard = adjustHeightSearchResultCard;
function adjustHeightSearchResultCard() {
    var searchKeyword_h = document.getElementsByClassName('search-keyword-area').clientHeight;
    var card_h = document.getElementsByClassName('search-result-card').clientHeight;
    if ((searchKeyword_h + card_h) < document.documentElement.clientHeight) {
        document.getElementsByClassName('search-result-card').classList.add('ground-on-bottom');
    }
}