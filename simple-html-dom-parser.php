<?php
require_once("simple_html_dom.php");
require_once( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );

// 手作業コーナー
$post_id = 1204; //投稿する記事のID
$prefectures_name = '福島県'; //スラッグ名
$prefectures_id = 'fukushima'; //スラッグID
$table_num = 6; // スクレイピングする対象のテーブルナンバー
$row_num = 7; // カスタムフィールドに追加する行ナンバー


// shoplistフィールドを新しく追加
$parent_row = array(
    // フィールド名：repeat_prefectures フィールドキー：'field_5eec289fce02b'
    'field_5eec289fce02b' => array(
        // フィールド名：prefectures_name フィールドキー：'field_5eec28f5ce02c'
        'field_5eec28f5ce02c' => $prefectures_name,
        // フィールド名：prefectures_name_id フィールドキー：'field_5eec2925ce02d'
        'field_5eec2925ce02d' => $prefectures_id,
    )
);
add_row('field_5eec2845ce029', $parent_row, $post_id);

// simple-html-dom-parserで対象ページスクレイピング
$url = 'http://fujikurashaft.test.com/shoplist/hokkaido_tohoku/';
$html = file_get_html($url);

// shoplistフィールド内の各サブフィールドに値を追加
foreach ($html->find('table', $table_num)->find('tr') as $tr) {
    $shop_name = $tr->find("td", 0)->plaintext;
    $shop_add = $tr->find("td", 1)->plaintext;
    $shop_tel = $tr->find("td", 2)->plaintext;
    $shop_url = $tr->find("a", 1)->href;
    $map_url = $tr->find("a", 0)->href;
    //echo $shop_name."\n";
    //echo $shop_add."\n";
    //echo $shop_tel."\n";
    //echo $shop_url."\n";
    //echo $map_url."\n";

    $children_row = array(
        'field_5eec5f4b8be08' => $shop_name,
        'field_5eec5f608be09' => $shop_add,
        'field_5eec5f708be0a' => $shop_tel,
        'field_5eec5f7f8be0b' => $shop_url,
        'field_5eec5f978be0c' => $map_url
    );

    add_sub_row( array('field_5eec2845ce029', $row_num, 'field_5eec5f228be07'), $children_row, $post_id);

}

?>
