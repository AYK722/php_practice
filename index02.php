<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>php_practice02</title>
    </head>
    <body>
        <?php

        # 1.配列をオブジェクト型に変換してください。
        # 2.オブジェクト型の値を表示してください。
        $array1 = ['パンダ', 'うさぎ', 'コアラ'];
        var_dump((object)$array1);
        
        print "<br />";

        # 3.1次元配列は配列で2次元配列がオブジェクト型の配列を作成してください。
        $object[] = (object)['name' => 'りんご'];
        $object[] = (object)['name' => 'オレンジ'];
        $object[] = (object)['name' => 'ぶどう'];

        var_dump($object);

        print "<br />";

        # 4.3で作成したものをループで値を表示してください。
        foreach ($object as $obj) {
            print $obj->name;
        }

        print "<br />";

        # ループ処理
        # 1.forのループを使って1から50までの数字を表示してください。
        for ($i = 1; $i <= 50; $i++) {
            if($i % 3 === 0) {
                print "{$i}：3の倍数<br />";
            } elseif($i % 2 === 0) {
                print "{$i}：偶数<br />";
            } else {
                print "{$i}：奇数<br />";
            }
        }

        # 2.whileのループを使って1から50までの数字を表示してください。
        $i = 0;
        while ($i++ <= 50) {
            if ($i % 2 === 0) {
                continue;
            } elseif ($i == 45) {
                print "{$i}<br />";
                break;
            }
            print "{$i}<br />";
        }

        # 3.foreachを使って多次元配列のループを表示してください。
        $members = [
            [
                'name' => 'yamada',
                'age' => 20,
                'gender' => 'male',
            ],
            [
                'name' => 'suzuki',
                'age' => 21,
                'gender' => 'female',
            ],
            [
                'name' => 'kinoshita',
                'age' => 14,
                'gender' => 'female',
            ],
            [
                'name' => 'honda',
                'age' => 15,
                'gender' => 'male',
            ],
            [
                'name' => 'yamamoto',
                'age' => 18,
                'gender' => 'female',
            ],
        ];

        print "<br />";

        # 性別が男性の生徒のみ表示してください。
        foreach ($members as $member) {
            if ($member['gender'] === 'male') {
                print ("{$member['name']}：{$member['gender']}<br />");
            }
        }

        print "<br />";

        # 年齢が16歳以上の生徒のみ表示してください。 
        foreach ($members as $member) {
            if ($member['age'] >= 16) {
                print ("{$member['name']}：{$member['age']}<br />");
            }
        }

        print "<br />";
        
        # ある条件が来たら処理を終了してください。(なんでも大丈夫です)
        # 3人カウントしたら終了
        $cnt = 0;
        foreach ($members as $member) {
            if ($cnt == 3) {
                break;
            }
            $cnt++;
            print ("{$member['name']}/{$member['gender']}/{$member['age']}<br />");
        }
        
        print "<br />";
        
        # ある条件が来たら処理をSKIPしてください。(なんでも大丈夫です)
        # kinoshitaさんをskipする
        foreach ($members as $member) {
            if ($member['name'] === 'kinoshita') {
                continue;
            }
                print ("{$member['name']}/{$member['gender']}/{$member['age']}<br />");
        }
    ?>
    </body>
</html>
