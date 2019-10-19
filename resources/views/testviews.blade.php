<!-- resources/views/testviews.blade.php -->

@extends('layouts.app')

@section('content')
<html>
 <head>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
var a02_1;
var a02_2;
var a02_3;
var a02_4;
var a02_5;
var a90;
var c01;
var c02;
var c03;
var c04;
var c05;
var d01;
var d02;
var d03;
var d05;
var e01_1;
var e01_2;
var e01_3;
var e01_4;
var e02_1;
var e02_2;
var e02_3;
var e03_1;
var e03_2;
var e03_3;
var e03_4;
var e03_5;
var e04_1;
var e04_2;
var e04_3;
var e04_4;
var h01;
var h02;
var h03_1;
var h03_2;
var h03_3;
var zz1;
var zz2;
/* パスワード変更問い合わせ(入力画面) */
function A02_1_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/require/inquiry";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* パスワード変更問い合わせ(検索中) */
function A02_2_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/require/search";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* パスワード変更問い合わせ(検索成功：メール送信) */
function A02_3_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/require/searchComplete";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* パスワード変更問い合わせ(未登録) */
function A02_4_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/require/notfound";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* パスワード変更メール(送信) */
function A02_5_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/replaymail/send/drgk2017@gmail.com";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* パスワード変更メール(チェック) */
function A02_6_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/replaymail/compare/testpassword";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* パスワードリセット(登録画面) */
function A02_7_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/reset/register";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* パスワードリセット(確認画面) */
function A02_8_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/reset/confirm";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* パスワードリセット(処理中) */
function A02_9_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/reset/process";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* パスワードリセット(完了) */
function A02_10_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "passwordchange/reset/complete";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}

/* 自己紹介画面表示 */
function A90_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "mastermentenance/login_user_manager";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 自己紹介画面表示 */
function C01_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_disp";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 自己紹介登録画面 */
function C02_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_register";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 自己紹介登録確認画面 */
function C03_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_register_confirm";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 自己紹介登録処理 */
function C04_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_register_process";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 自己紹介登録完了画面 */
function C05_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_register_complete";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* いいね処理 */
function D01_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "posts/good";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* シェア処理 */
function D02_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "posts/share";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* タグ処理 */
function D03_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "posts/tag";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* フォロー処理 */
function D05_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "posts/follow";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* Vision売却画面 */
function E01_1_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* Vision売却確認画面 */
function E01_2_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_confirm";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* Vision売却処理 */
function E01_3_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_process";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* Vision売却完了画面 */
function E01_4_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_complete";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* Vision購入画面 */
function E02_1_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/buy";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* Vision購入確認画面 */
function E02_2_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/buy_confirm";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* Vision購入完了画面 */
function E02_3_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/buy_complete";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* E03_1.VISION売却詳細画面 */
function E03_1_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_detail";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* E03_2.VISION売却詳細OPEN画面 */
function E03_2_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_detail_open";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* E03_3.VISION売却詳細CLOSE画面 */
function E03_3_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_detail_close";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* E03_4.VISION売却詳細抽選画面 */
function E03_4_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_detail_lottery";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* E03_5.VISION売却詳細抽選結果画面 */
function E03_5_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_detail_lottery_result";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* E04_1.新規おみくじ登録画面 */
function E04_1_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_detail_regist";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* E04_2.新規おみくじ登録確認画面 */
function E04_2_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_detail_confirm";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* E04_3.新規おみくじ登録処理 */
function E04_3_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_detail_process";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* E04_4.新規おみくじ登録完了画面 */
function E04_4_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "connect/sell_detail_complete";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* ホーム画面自分のタイムライン */
function H01_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_own_timeline";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* ホーム画面投資家や選手のタイムライン */
function H02_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_outer_timeline";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 検索画面 */
function H03_1_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_search_outer_member";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 検索実行処理 */
function H03_2_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_search_outer_member_process";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 検索結果一覧表示 */
function H03_3_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "home/home_search_outer_member_result";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 画像アップロード */
function ZZ1_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "other/image_upload_index";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
/* 画像アップロード */
function ZZ2_run() {
    window.open("", "STUB");
    window.document.show_stub.action = "other/image_delete";
    window.document.show_stub.target = "STUB";
    window.document.show_stub.method = "POST";
    window.document.show_stub.submit();
}
function clear() {
    a02_1=0;
    $('#A02_1').empty();
    a02_2=0;
    $('#A02_2').empty();
    a02_3=0;
    $('#A02_3').empty();
    a02_4=0;
    $('#A02_4').empty();
    a02_5=0;
    $('#A02_5').empty();
    a02_6=0;
    $('#A02_6').empty();
    a02_7=0;
    $('#A02_7').empty();
    a02_8=0;
    $('#A02_8').empty();
    a02_9=0;
    $('#A02_9').empty();
    a02_10=0;
    $('#A02_10').empty();
	a90=0;
    $('#A90').empty();
    c01=0;
    $('#C01').empty();
    c02=0;
    $('#C02').empty();
    c03=0;
    $('#C03').empty();
    c04=0;
    $('#C04').empty();
    c05=0;
    $('#C05').empty();
    d01=0;
    $('#D01').empty();
    d02=0;
    $('#D02').empty();
    d03=0;
    $('#D03').empty();
    d05=0;
    $('#D05').empty();
    e01_1=0;
    $('#E01_1').empty();
    e01_2=0;
    $('#E01_2').empty();
    e01_3=0;
    $('#E01_3').empty();
    e01_4=0;
    $('#E01_4').empty();
    e02_1=0;
    $('#E02_1').empty();
    e02_2=0;
    $('#E02_2').empty();
    e02_3=0;
    $('#E02_3').empty();
    e03_1=0;
    $('#E03_1').empty();
    e03_2=0;
    $('#E03_2').empty();
    e03_3=0;
    $('#E03_3').empty();
    e03_4=0;
    $('#E03_4').empty();
    e03_5=0;
    $('#E03_5').empty();
    e04_1=0;
    $('#E04_1').empty();
    e04_2=0;
    $('#E04_2').empty();
    e04_3=0;
    $('#E04_3').empty();
    e04_4=0;
    $('#E04_4').empty();
    h01=0;
    $('#H01').empty();
    h02=0;
    $('#H02').empty();
    h03_1=0;
    $('#H03_1').empty();
    h03_2=0;
    $('#H03_2').empty();
    h03_3=0;
    $('#H03_3').empty();
    zz1=0;
    $('#ZZ1').empty();
    zz2=0;
    $('#ZZ2').empty();
}
$(document).ready(function() {
	clear();
/* A02_1.パスワード変更問い合わせ(入力画面) */
    $('#A02_1_front').click(function() {
        if(a02_1 == '0') {
            clear();
            $('#A02_1').append("<input type=\"button\" value=\"起動\" onClick=\"A02_1_run()\"><BR>");
            a02_1='1';
        } else {
            $('#A02_1').empty();
            a02_1='0';
        }
    });
/* A02_2.パスワード変更問い合わせ(検索中) */
    $('#A02_2_front').click(function() {
        if(a02_2 == '0') {
            clear();
            $('#A02_2').append("<input type=\"button\" value=\"起動\" onClick=\"A02_2_run()\"><BR>");
            a02_2='1';
        } else {
            $('#A02_2').empty();
            a02_2='0';
        }
    });
/* A02_3.パスワード変更問い合わせ(検索成功：メール送信) */
    $('#A02_3_front').click(function() {
        if(a02_3 == '0') {
            clear();
            $('#A02_3').append("<input type=\"button\" value=\"起動\" onClick=\"A02_3_run()\"><BR>");
            a02_3='1';
        } else {
            $('#A02_3').empty();
            a02_3='0';
        }
    });
/* A02_4.パスワード変更問い合わせ(未登録) */
    $('#A02_4_front').click(function() {
        if(a02_4 == '0') {
            clear();
            $('#A02_4').append("<input type=\"button\" value=\"起動\" onClick=\"A02_4_run()\"><BR>");
            a02_4='1';
        } else {
            $('#A02_4').empty();
            a02_4='0';
        }
    });
/* A02_5.パスワード変更メール(送信) */
    $('#A02_5_front').click(function() {
        if(a02_5 == '0') {
            clear();
            $('#A02_5').append("<input type=\"button\" value=\"起動\" onClick=\"A02_5_run()\"><BR>");
            a02_5='1';
        } else {
            $('#A02_5').empty();
            a02_5='0';
        }
    });
/* A02_6.パスワード変更メール(送信) */
    $('#A02_6_front').click(function() {
        if(a02_6 == '0') {
            clear();
            $('#A02_6').append("<input type=\"button\" value=\"起動\" onClick=\"A02_6_run()\"><BR>");
            a02_6='1';
        } else {
            $('#A02_6').empty();
            a02_6='0';
        }
    });
/* A02_7.パスワードリセット(登録画面) */
    $('#A02_7_front').click(function() {
        if(a02_7 == '0') {
            clear();
            $('#A02_7').append("<input type=\"button\" value=\"起動\" onClick=\"A02_7_run()\"><BR>");
            a02_7='1';
        } else {
            $('#A02_7').empty();
            a02_7='0';
        }
    });
/* A02_8.パスワードリセット(確認画面) */
    $('#A02_8_front').click(function() {
        if(a02_8 == '0') {
            clear();
            $('#A02_8').append("<input type=\"button\" value=\"起動\" onClick=\"A02_8_run()\"><BR>");
            a02_8='1';
        } else {
            $('#A02_8').empty();
            a02_8='0';
        }
    });
/* A02_9.パスワードリセット(処理中) */
    $('#A02_9_front').click(function() {
        if(a02_9 == '0') {
            clear();
            $('#A02_9').append("<input type=\"button\" value=\"起動\" onClick=\"A02_9_run()\"><BR>");
            a02_9='1';
        } else {
            $('#A02_9').empty();
            a02_9='0';
        }
    });
/* A02_10.パスワードリセット(処理中) */
    $('#A02_10_front').click(function() {
        if(a02_10 == '0') {
            clear();
            $('#A02_10').append("<input type=\"button\" value=\"起動\" onClick=\"A02_10_run()\"><BR>");
            a02_10='1';
        } else {
            $('#A02_10').empty();
            a02_10='0';
        }
    });
/* A90.[管理機能]ログイン管理機能 */
    $('#A90_front').click(function() {
        if(a90 == '0') {
            clear();
            $('#A90').append("<input type=\"button\" value=\"起動\" onClick=\"A90_run()\"><BR>");
            a90='1';
        } else {
            $('#A90').empty();
            a90='0';
        }
    });
/* C01.自己紹介表示画面 */
    $('#C01_front').click(function() {
        if(c01 == '0') {
            clear();
            $('#C01').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#C01').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#C01').append("<input type=\"button\" value=\"run\" onClick=\"C01_run()\"><BR>");
            c01='1';
        } else {
            $('#C01').empty();
            c01='0';
        }
    });
/* C02.自己紹介登録入力画面 */
    $('#C02_front').click(function() {
        if(c02 == '0') {
            clear();
            $('#C02').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#C02').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#C02').append("<input type=\"button\" value=\"run\" onClick=\"C02_run()\"><BR>");
            c02='1';
        } else {
            $('#C02').empty();
            c02='0';
        }
    });
/* C03.自己紹介登録確認画面 */
    $('#C03_front').click(function() {
        if(c03 == '0') {
            clear();
            $('#C03').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#C03').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#C03').append("<input type=\"button\" value=\"run\" onClick=\"C03_run()\"><BR>");
            c03='1';
        } else {
            $('#C03').empty();
            c03='0';
        }
    });
/* C04.自己紹介登録処理 */
    $('#C04_front').click(function() {
        if(c04 == '0') {
            clear();
            $('#C04').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#C04').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#C04').append("my_profeal_description：<input id=\"my_profeal_description\" type=\"text\" name=\"my_profeal_description\"><BR>");
            $('#C04').append("goal_setting：<input id=\"goal_setting\" type=\"text\" name=\"goal_setting\"><BR>");
            $('#C04').append("activity_information：<input id=\"activity_information\"type=\"text\" name=\"activity_information\"><BR>");
            $('#C04').append("facebook_url：<input id=\"facebook_url\" type=\"text\" name=\"facebook_url\"><BR>");
            $('#C04').append("instagram_url：<input id=\"instagram_url\" type=\"text\" name=\"instagram_url\"><BR>");
            $('#C04').append("twitter_url：<input id=\"twitter_url\" type=\"text\" name=\"twitter_url\"><BR>");
            $('#C04').append("<input type=\"button\" value=\"run\" onClick=\"C04_run()\"><BR>");
            c04='1';
        } else {
            $('#C04').empty();
            c04='0';
        }
    });
/* C05.自己紹介登録完了画面 */
    $('#C05_front').click(function() {
        if(c05 == '0') {
            clear();
            $('#C05').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#C05').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#C05').append("<input type=\"button\" value=\"run\" onClick=\"C05_run()\"><BR>");
            c05='1';
        } else {
            $('#C05').empty();
            c05='0';
        }
    });

/* D01.いいね処理 */
    $('#D01_front').click(function() {
        if(d01 == '0') {
            clear();
            $('#D01').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#D01').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#D01').append("document_id：<input type=\"text\" name=\"document_id\"><BR>");
            $('#D01').append("good_status：<input type=\"text\" name=\"good_status\"><BR>"); // 1-->いいね 0-->いいね解除
            $('#D01').append("<input type=\"button\" value=\"run\" onClick=\"D01_run()\"><BR>");
            d01='1';
        } else {
            $('#D01').empty();
            d01='0';
        }
    });
/* D02.シェア処理 */
    $('#D02_front').click(function() {
        if(d02 == '0') {
            clear();
            $('#D02').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#D02').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#D02').append("document_id：<input type=\"text\" name=\"document_id\"><BR>");
            $('#D02').append("recource_id：<input type=\"text\" name=\"recource_id\"><BR>");
            $('#D02').append("<input type=\"button\" value=\"run\" onClick=\"D02_run()\"><BR>");
            d02='1';
        } else {
            $('#D02').empty();
            d02='0';
        }
    });
/* D03.タグ処理 */
    $('#D03_front').click(function() {
        if(d03 == '0') {
            clear();
            $('#D03').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#D03').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#D03').append("document_id：<input type=\"text\" name=\"document_id\"><BR>");
            $('#D03').append("recource_id：<input type=\"text\" name=\"recource_id\"><BR>");
            $('#D03').append("recource_id：<input type=\"text\" name=\"tag_id\"><BR>");
            $('#D03').append("<input type=\"button\" value=\"run\" onClick=\"D03_run()\"><BR>");
            d03='1';
        } else {
            $('#D03').empty();
            d03='0';
        }
    });
/* D05.フォロー作成処理 */
    $('#D05_front').click(function() {
        if(d05 == '0') {
            clear();
            $('#D05').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#D05').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#D05').append("document_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#D05').append("recource_id：<input type=\"text\" name=\"recource_id\"><BR>");
            $('#D05').append("<input type=\"button\" value=\"run\" onClick=\"D05_run()\"><BR>");
            d05='1';
        } else {
            $('#D05').empty();
            d05='0';
        }
    });
/* E01_1.VISION売却画面 */
    $('#E01_1_front').click(function() {
        if(e01_1 == '0') {
            clear();
            $('#E01_1').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E01_1').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E01_1').append("<input type=\"button\" value=\"run\" onClick=\"E01_1_run()\"><BR>");
            e01_1='1';
        } else {
            $('#E01_1').empty();
            e01_1='0';
        }
    });
/* E01_2.VISION売却確認画面 */
    $('#E01_2_front').click(function() {
        if(e01_2 == '0') {
            clear();
            $('#E01_2').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E01_2').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E01_2').append("resource_id：<input type=\"text\" name=\"resource_id\"><BR>");
            $('#E01_2').append("sell_amt：<input type=\"text\" name=\"sell_amt\"><BR>");
            $('#E01_2').append("<input type=\"button\" value=\"run\" onClick=\"E01_2_run()\"><BR>");
            e01_2='1';
        } else {
            $('#E01_2').empty();
            e01_2='0';
        }
    });
    /* E01_3.VISION売却処理 */
    $('#E01_3_front').click(function() {
        if(e01_3 == '0') {
            clear();
            $('#E01_3').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E01_3').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E01_3').append("resource_id：<input type=\"text\" name=\"resource_id\"><BR>");
            $('#E01_3').append("sell_amt：<input type=\"text\" name=\"sell_amt\"><BR>");
            $('#E01_3').append("<input type=\"button\" value=\"run\" onClick=\"E01_3_run()\"><BR>");
            e01_3='1';
        } else {
            $('#E01_3').empty();
            e01_3='0';
        }
    });
    /* E01_4.VISION売却完了画面 */
    $('#E01_4_front').click(function() {
        if(e01_4 == '0') {
            clear();
            $('#E01_4').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E01_4').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E01_4').append("resource_id：<input type=\"text\" name=\"resource_id\"><BR>");
            $('#E01_4').append("sell_amt：<input type=\"text\" name=\"sell_amt\"><BR>");
            $('#E01_4').append("<input type=\"button\" value=\"run\" onClick=\"E01_4_run()\"><BR>");
            e01_4='1';
        } else {
            $('#E01_4').empty();
            e01_4='0';
        }
    });
/* E02_1.VISION購入画面 */
    $('#E02_1_front').click(function() {
        if(e02_1 == '0') {
            clear();
            $('#E02_1').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E02_1').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E02_1').append("<input type=\"button\" value=\"run\" onClick=\"E02_1_run()\"><BR>");
            e02_1='1';
        } else {
            $('#E02_1').empty();
            e02_1='0';
        }
    });
/* E02_2.VISION購入確認画面 */
    $('#E02_2_front').click(function() {
        if(e02_2 == '0') {
            clear();
            $('#E02_2').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E02_2').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E02_2').append("resource_id：<input type=\"text\" name=\"resource_id\"><BR>");
            $('#E02_2').append("sell_amt：<input type=\"text\" name=\"sell_amt\"><BR>");
            $('#E02_2').append("<input type=\"button\" value=\"run\" onClick=\"E02_2_run()\"><BR>");
            e02_2='1';
        } else {
            $('#E02_2').empty();
            e02_2='0';
        }
    });
/* E02_3.VISION購入完了画面 */
    $('#E02_3_front').click(function() {
        if(e02_3 == '0') {
            clear();
            $('#E02_3').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E02_3').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E02_3').append("resource_id：<input type=\"text\" name=\"resource_id\"><BR>");
            $('#E02_3').append("sell_amt：<input type=\"text\" name=\"sell_amt\"><BR>");
            $('#E02_3').append("<input type=\"button\" value=\"run\" onClick=\"E02_3_run()\"><BR>");
            e02_3='1';
        } else {
            $('#E02_3').empty();
            e02_3='0';
        }
    });
/* E03_1.VISION売却詳細画面 */
    $('#E03_1_front').click(function() {
        if(e03_1 == '0') {
            clear();
            $('#E03_1').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E03_1').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E03_1').append("<input type=\"button\" value=\"run\" onClick=\"E03_1_run()\"><BR>");
            e03_1='1';
        } else {
            $('#E03_1').empty();
            e03_1='0';
        }
    });
/* E03_2.VISION売却詳細OPEN画面 */
    $('#E03_2_front').click(function() {
        if(e03_2 == '0') {
            clear();
            $('#E03_2').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E03_2').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E03_2').append("<input type=\"button\" value=\"run\" onClick=\"E03_2_run()\"><BR>");
            e03_2='1';
        } else {
            $('#E03_2').empty();
            e03_2='0';
        }
    });
/* E03_3.VISION売却詳細CLOSE画面 */
    $('#E03_3_front').click(function() {
        if(e03_3 == '0') {
            clear();
            $('#E03_3').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E03_3').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E03_3').append("<input type=\"button\" value=\"run\" onClick=\"E03_3_run()\"><BR>");
            e03_3='1';
        } else {
            $('#E03_3').empty();
            e03_3='0';
        }
    });
/* E03_4.VISION売却詳細抽選画面 */
    $('#E03_4_front').click(function() {
        if(e03_4 == '0') {
            clear();
            $('#E03_4').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E03_4').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E03_4').append("<input type=\"button\" value=\"run\" onClick=\"E03_4_run()\"><BR>");
            e03_4='1';
        } else {
            $('#E03_4').empty();
            e03_4='0';
        }
    });
/* E03_5.VISION売却詳細抽選結果画面 */
    $('#E03_5_front').click(function() {
        if(e03_5 == '0') {
            clear();
            $('#E03_5').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E03_5').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E03_5').append("<input type=\"button\" value=\"run\" onClick=\"E03_5_run()\"><BR>");
            e03_5='1';
        } else {
            $('#E03_5').empty();
            e03_5='0';
        }
    });
/* E04_1.新規おみくじ登録画面 */
    $('#E04_1_front').click(function() {
        if(e04_1 == '0') {
            clear();
            $('#E04_1').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E04_1').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E04_1').append("<input type=\"button\" value=\"run\" onClick=\"E04_1_run()\"><BR>");
            e04_1='1';
        } else {
            $('#E04_1').empty();
            e04_1='0';
        }
    });
    /* E04_2.新規おみくじ登録確認画面 */
    $('#E04_2_front').click(function() {
        if(e04_2 == '0') {
            clear();
            $('#E04_2').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E04_2').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E04_2').append("<input type=\"button\" value=\"run\" onClick=\"E04_2_run()\"><BR>");
            e04_2='1';
        } else {
            $('#E04_2').empty();
            e04_2='0';
        }
    });
    /* E04_3.新規おみくじ登録処理 */
    $('#E04_3_front').click(function() {
        if(e04_3 == '0') {
            clear();
            $('#E04_3').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E04_3').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E04_3').append("<input type=\"button\" value=\"run\" onClick=\"E04_3_run()\"><BR>");
            e04_3='1';
        } else {
            $('#E04_3').empty();
            e04_3='0';
        }
    });
    /* E04_4.新規おみくじ登録完了 */
    $('#E04_4_front').click(function() {
        if(e04_4 == '0') {
            clear();
            $('#E04_4').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#E04_4').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#E04_4').append("<input type=\"button\" value=\"run\" onClick=\"E04_4_run()\"><BR>");
            e04_4='1';
        } else {
            $('#E04_4').empty();
            e04_4='0';
        }
    });

/* G01.推薦者募集画面 */
    $('#G01_front').click(function() {
        if(g01 == '0') {
            clear();
            $('#G01').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#G01').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#G01').append("resource_id：<input type=\"text\" name=\"resource_id\"><BR>");
            $('#G01').append("sell_amt：<input type=\"text\" name=\"sell_amt\"><BR>");
            g01='1';
        } else {
            $('#G01').empty();
            g01='0';
        }
    });
/* H01.ホーム画面自分のタイムライン */
    $('#H01_front').click(function() {
        if(h01 == '0') {
            clear();
            $('#H01').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#H01').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#H01').append("<input type=\"button\" value=\"run\" onClick=\"H01_run()\"><BR>");
            h01='1';
        } else {
            $('#H01').empty();
            h01='0';
        }
    });
/* H02.ホーム画面投資家や選手のタイムライン */
    $('#H02_front').click(function() {
        if(h02 == '0') {
            clear();
            $('#H02').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#H02').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#H02').append("<input type=\"button\" value=\"run\" onClick=\"H02_run()\"><BR>");
            h02='1';
        } else {
            $('#H02').empty();
            h02='0';
        }
    });
/* H03_1.検索画面 */
    $('#H03_1_front').click(function() {
        if(h03_1 == '0') {
            clear();
            $('#H03_1').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#H03_1').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#H03_1').append("<input type=\"button\" value=\"run\" onClick=\"H03_1_run()\"><BR>");
            h03_1='1';
        } else {
            $('#H03_1').empty();
            h03_1='0';
        }
    });
/* H03_2.検索実行処理 */
    $('#H03_2_front').click(function() {
        if(h03_2 == '0') {
            clear();
            $('#H03_2').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#H03_2').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#H03_2').append("search_name：<input type=\"text\" name=\"search_name\"><BR>");
            $('#H03_2').append("search_age：<input type=\"text\" name=\"search_age\"><BR>");
            $('#H03_2').append("search_dept：<input type=\"text\" name=\"search_dept\"><BR>");
            $('#H03_2').append("search_kind：<input type=\"text\" name=\"search_kind\"><BR>");
            $('#H03_2').append("<input type=\"button\" value=\"検索実行\" onClick=\"H03_2_run()\"><BR>");
            h03_2='1';
        } else {
            $('#H03_2').empty();
            h03_2='0';
        }
    });
/* H03_3.検索結果一覧表示画面 */
    $('#H03_3_front').click(function() {
        if(h03_3 == '0') {
            clear();
            $('#H03_3').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#H03_3').append("user_id：<input type=\"text\" name=\"user_id\"><BR>");
            $('#H03_3').append("target_user_id：<input type=\"text\" name=\"target_user_id\"><BR>");
            $('#H03_3').append("<input type=\"button\" value=\"表示\" onClick=\"H03_3_run()\"><BR>");
            h03_3='1';
        } else {
            $('#H03_3').empty();
            h03_3='0';
        }
    });
/* ZZ1.画像イメージアップロード */
    $('#ZZ1_front').click(function() {
        if(zz1 == '0') {
            clear();
            $('#ZZ1').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#ZZ1').append("<input type=\"button\" value=\"表示\" onClick=\"ZZ1_run()\"><BR>");
            zz1='1';
        } else {
            $('#ZZ1').empty();
            zz1='0';
        }
    });
/* ZZ2.画像イメージ削除 */
    $('#ZZ2_front').click(function() {
        if(zz2 == '0') {
            clear();
            $('#ZZ2').append("id：<input type=\"text\" name=\"id\"><BR>");
            $('#ZZ2').append("<input type=\"button\" value=\"表示\" onClick=\"ZZ2_run()\"><BR>");
            zz2='1';
        } else {
            $('#ZZ2').empty();
            zz2='0';
        }
    });
});
</script>
 </head>
 <body>
<form name="show_stub">
<table border="1" style="width:100%"><tr><td>
<div id="A00">A-0.ログイン機能</div>
<div id="A01">ログイン機能　※Laravel</div>
<div id="A02">パスワード変更画面　※Laravel</div>
<div id="A02_1_front"><li><a href="#">パスワード変更問い合わせ(入力画面)</a></li></div><div id="A02_1"></div>
<div id="A02_2_front"><li><a href="#">パスワード変更問い合わせ(検索中)</a></li></div><div id="A02_2"></div>
<div id="A02_3_front"><li><a href="#">パスワード変更問い合わせ(検索成功：メール送信)</a></li></div><div id="A02_3"></div>
<div id="A02_4_front"><li><a href="#">パスワード変更問い合わせ(未登録)</a></li></div><div id="A02_4"></div>
<div id="A02_5_front"><li><a href="#">パスワード変更メール(送信)</a></li></div><div id="A02_5"></div>
<div id="A02_6_front"><li><a href="#">パスワード変更メール(チェック)</a></li></div><div id="A02_6"></div>
<div id="A02_7_front"><li><a href="#">パスワードリセット(登録画面)</a></li></div><div id="A02_7"></div>
<div id="A02_8_front"><li><a href="#">パスワードリセット(確認画面)</a></li></div><div id="A02_8"></div>
<div id="A02_9_front"><li><a href="#">パスワードリセット(処理中)</a></li></div><div id="A02_9"></div>
<div id="A02_10_front"><li><a href="#">パスワードリセット(完了)</a></li></div><div id="A02_10"></div>
<div id="A03">  ログインエラー画面　※Laravel</div>
<div id="A04">  ログアウト画面　※Laravel</div>
<div id="A90_front"><li><a href="#">[管理機能]ログイン管理機能</a></li></div><div id="A90"></div>
<div id="B00">B-0.登録退会機能</div>
<div id="B01">　会員登録機能　※Laravel</div>
<div id="B02">　会員退会機能　※Laravel</div>
<div id="B90">　[管理機能]会員検索機能</div>
<div id="C00">C-0.自己紹介機能</div>
[自己紹介表示画面]-->[自己紹介登録入力画面]-->[自己紹介登録確認画面]-->[自己紹介登録処理]-->[自己紹介登録完了画面](NPO側)
<div id="C01_front"><li><a href="#">自己紹介表示画面</a></li></div><div id="C01"></div>
<div id="C02_front"><li><a href="#">自己紹介登録入力画面</a></li></div><div id="C02"></div>
<div id="C03_front"><li><a href="#">自己紹介登録確認画面</a></li></div><div id="C03"></div>
<div id="C04_front"><li><a href="#">自己紹介登録処理</a></li></div><div id="C04"></div>
<div id="C05_front"><li><a href="#">自己紹介登録完了画面</a></li></div><div id="C05"></div>
<div id="D00">D-0.コミュニティ機能</div>
[画面でいいねボタン押下]-->[いいね処理]
<div id="D01_front"><li><a href="#">いいね処理</a></li></div><div id="D01"></div>
[画面でシェアボタン押下]-->[シェア処理]
<div id="D02_front"><li><a href="#">シェア処理</a></li></div><div id="D02"></div>
[画面でタグボタン押下]-->[タグ処理]
<div id="D03_front"><li><a href="#">タグ処理</a></li></div><div id="D03"></div>
<div id="D04">　イベント作成処理</div>
[画面でフォローボタン押下]-->[フォロー処理]
<div id="D05_front"><li><a href="#">フォロー機能</a></li></div><div id="D05"></div>
<div id="E00">E-0.VISION売買機能</div>
<div id="E01_1_front"><li><a href="#">VISION売却画面</a></li></div><div id="E01_1"></div>
<div id="E01_2_front"><li><a href="#">VISION売却確認画面</a></li></div><div id="E01_2"></div>
<div id="E01_3_front"><li><a href="#">VISION売却完了画面</a></li></div><div id="E01_3"></div>
<div id="E02_1_front"><li><a href="#">VISION購入画面</a></li></div><div id="E02_1"></div>
<div id="E02_2_front"><li><a href="#">VISION購入確認画面</a></li></div><div id="E02_2"></div>
<div id="E02_3_front"><li><a href="#">VISION購入完了画面</a></li></div><div id="E02_3"></div>
<div id="E03_1_front"><li><a href="#">VISION売却詳細画面</a></li></div><div id="E03_1"></div>
<div id="E03_2_front"><li><a href="#">VISION売却詳細OPEN画面</a></li></div><div id="E03_2"></div>
<div id="E03_3_front"><li><a href="#">VISION売却詳細CLOSE画面</a></li></div><div id="E03_3"></div>
<div id="E03_4_front"><li><a href="#">VISION売却詳細抽選画面</a></li></div><div id="E03_4"></div>
<div id="E03_5_front"><li><a href="#">VISION売却詳細抽選結果画面</a></li></div><div id="E03_5"></div>
<div id="E04_1_front"><li><a href="#">新規おみくじ登録画面</a></li></div><div id="E04_1"></div>
<div id="E04_2_front"><li><a href="#">新規おみくじ登録確認画面</a></li></div><div id="E04_2"></div>
<div id="E04_3_front"><li><a href="#">新規おみくじ登録処理</a></li></div><div id="E04_3"></div>
<div id="E04_4_front"><li><a href="#">新規おみくじ登録完了画面</a></li></div><div id="E04_4"></div>
<div id="E90">　[管理機能]VISION売買検索　※Laravel</div>
<div id="F00">F-0.チャージ機能</div>
<div id="F01">　BTCチャージ指定画面(Pending)</div>
<div id="F02">　クレジットカード指定画面(Pending)</div>
<div id="G00">G-0.推薦者募集機能</div>
<div id="G01">推薦者募集画面</div>
<div id="H00">H-0.ホーム画面</div>
<div id="H01_front"><li><a href="#">ホーム画面自分のタイムライン</a></li></div><div id="H01"></div>
<div id="H02_front"><li><a href="#">ホーム画面投資家や選手のタイムライン</a></li></div><div id="H02"></div>
<div id="H03_1_front"><li><a href="#">検索画面</a></li></div><div id="H03_1"></div>
<div id="H03_2_front"><li><a href="#">検索実行処理</a></li></div><div id="H03_2"></div>
<div id="H03_3_front"><li><a href="#">検索結果一覧表示画面</a></li></div><div id="H03_3"></div>
<div id="H04">ブログ参照画面</div>
<div id="I00">I-0.設定画面</div>
<div id="I01">　各種設定画面</div>
<div id="I02">　BTC入出金履歴画面</div>
<div id="Z00">Z-0.外部連携機能</div>
<div id="Z01">　Youtube連携</div>
<div id="Z02">　ブログ連携</div>
<div id="Z03">　Instagram連携</div>
<div id="ZZ0">ZZ-0.その他</div>
<BR><BR>
<div id="ZZ1_front"><li><a href="#">画像イメージアップロード</a></li></div><div id="ZZ1"></div>
<BR><BR>
<div id="ZZ2_front"><li><a href="#">画像イメージ削除</a></li></div><div id="ZZ2"></div>
<BR><BR>
<div id="ZZ9">　システムエラー</div>
</td>
<td><div id="description"></div></td>
</tr></table>
 <div>
 </div>
</form>
</body>
</html>
@endsection




