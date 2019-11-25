function deviceParser() {
    //ルート直下で振り分ける場合
    let $root = '';

    //任意のディレクトリ内で振り分ける場合
    //let $root = '/hoge';

    const $pathName = location.pathname;
    let $pathNameSpDelete = $pathName.replace('/sp', '');
    let $pathNameRootDelete = $pathName.replace($root, '');

    //URLに/sp/を検知した場合
    if ($pathName.indexOf('/sp/') != -1) {

        //ユーザーエージェントがSP時は何も処理しない
        if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') == -1) || navigator.userAgent.indexOf('iPod') > 0 || (navigator.userAgent.indexOf('Android') > 0 && navigator.userAgent.indexOf('Mobile') > 0)) {
        }

        //ユーザーエージェントがPC時はPCページへリダイレクト
        else {
            location.href = $pathNameSpDelete;
        }
    } else {//URLに/sp/を検知しなかった場合

        //ユーザーエージェントがSP時はSPページへリダイレクト
        if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') == -1) || navigator.userAgent.indexOf('iPod') > 0 || (navigator.userAgent.indexOf('Android') > 0 && navigator.userAgent.indexOf('Mobile') > 0)) {
            location.href = $root + '/sp' + $pathNameRootDelete;
        }

        //ユーザーエージェントがPC時は何も処理しない
        else {
        }
    }
}
