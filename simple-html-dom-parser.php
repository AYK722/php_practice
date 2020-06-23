<?php

require_once("simple_html_dom.php");

$url = 'http://fujikurashaft.test.com/shoplist/hokkaido_tohoku/';

$html = file_get_html($url);


// 1.この書き方だとtdタグ内のplaintext（ショップ名、住所、電話番号、"webサイトへ"の文字列）が取得できる
foreach ($html->find('td') as $el) {
    $shop_name = $el->plaintext;
    echo $shop_name."\n";
}


// 2.ショップ名のみを取得したい(trタグ直下の一番目のtdタグのplaintext)場合、この書き方だとうまく行かない…
foreach ($html->find("tr") as $el) {
    foreach($el->find("td", 0) as $e) {
        $shop_name = $e->plaintext;
        echo $shop_name."\n";
    }
}


// 3.aタグのhrefの値(地図のURL)を取得
foreach ($html->find('td') as $el) {
    foreach ($el->find('a') as $e) {
        $map_url = $e->href;
        echo $map_url."\n";
    }
}


// 4.class名がshoplist_tab_telのtdタグの値（電話番号）を取得
foreach ($html->find('td.shoplist_tab_tel') as $el) {   
    $shop_tel = $el->plaintext;
    echo $shop_tel."\n";
}


// 5.class名がshoplist_tab_homeのtdタグ内のaタグのhrefの値（WEBサイトURL）を取得
foreach ($html->find('td.shoplist_tab_home') as $el) {
    foreach ($el->find("a") as $e) {
        $shop_url = $e->href;
        echo $shop_url."\n";
    }
}

?>
