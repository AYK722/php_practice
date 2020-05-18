<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>テストページ</title>
    <?php $now = new DateTime(); ?>
    </head>
    <body>
        <h2>文字列系</h2>
        <p>1.複数の変数に値を入れて、それを連結して表示してください。</p>
        <p><?php
        $str1 = 'パンダ'; 
        $str2 = 'うさぎ';
        $str3 = 'コアラ';
        print $str1 . $str2 . $str3;

        ?></p>

        <p>2.カンマ区切りの文字列を配列にしてください。</p>
        <p><?php
        $data = 'パンダ,うさぎ,コアラ';
        print_r(explode(',', $data));
        ?></p>

        <p>3. 配列をカンマ区切りの文字列にしてください。</p>
        <p><?php
        $data = ['PHP','perl','Ruby','Python','JavaScript'];
        print implode(',', $data);
        ?></p>

        <h2>配列系(作成)</h2>

        <p>1.一次元配列を作成してください。</p>
        <p><?php
        $name = ['山田','鈴木','木下','本田','山本'];
        print_r($data);
        ?></p>

        <p>2.連想配列を作成してください。(１次元)</p>
        <p><?php
        $members = [
            '山田' => '20歳',
            '鈴木' => '25歳',
            '木下' => '18歳',
            '本田' => '30歳',
            '山本' => '29歳',
        ];
        print_r($members);
        ?></p>

        <p>3.連想配列を作成してください。(２次元)</p>
        <p><?php
        $members = [
            '山田' => [
                '年齢' => '20歳',
                '性別' => '男',
            ],
            '鈴木' => [
                '年齢' => '25歳',
                '性別' => '女'
            ],
            '木下' => [
                '年齢' => '18歳',
                '性別' => '女'
            ],
            '本田' => [
                '年齢' => '30歳',
                '性別' => '男'
            ],
            '山本' => [
                '年齢' => '29歳',
                '性別' => '女'
            ],
        ];
        print_r($members);
        ?></p>

        <p>4.数字1-50の配列を作成してください。</p>
        <p><?php
        $ary = range(1,50);
        print_r($ary);
        ?></p>

        <h2>配列系(表示)</h2>
        <p>1.一次元配列をループで回して全ての値を表示してください。</p>
        <p><?php
        $name = ['山田','鈴木','木下','本田','山本'];
        foreach ($name as $value) {
            print "{$value}<br />";
        }
        ?></p>
        
        <p>2.1次元の連想配列をループで回して全ての値を表示してください。(keyのみ)</p>
        <p><?php
        $members = [
             '山田' => '20歳',
             '鈴木' => '25歳',
             '木下' => '18歳',
             '本田' => '30歳',
             '山本' => '29歳',
         ]; 
        foreach ($members as $key => $value) {
            print "{$key}<br />";
        }
        ?></p>
        
        <p>3.1次元の連想配列をループで回して全ての値を表示してください。(valueのみ)</p>
        <p><?php
        $members = [
            '山田' => '20歳',
            '鈴木' => '25歳',
            '木下' => '18歳',
            '本田' => '30歳',
            '山本' => '29歳',
        ];
        foreach ($members as $key => $value){
            print "{$value}<br />";
        }
        ?></p>
        
        <p>4.2次元の連想配列をループで回して全ての値を表示してください。(keyのみ)</p>
        <p><?php
        $members = [
             '山田' => [
                 '年齢' => '20歳',
                 '性別' => '男',
             ],
             '鈴木' => [
                 '年齢' => '25歳',
                 '性別' => '女'
             ],
             '木下' => [
                 '年齢' => '18歳',
                 '性別' => '女'
             ],
             '本田' => [
                 '年齢' => '30歳',
                 '性別' => '男'
             ],
             '山本' => [
                 '年齢' => '29歳',
                 '性別' => '女'
                ],
        ];
        foreach ($members as $member => $values) {
            foreach ($values as $key => $value) {
                print "{$member}：{$key}<br />";
            }
        }
        ?></p>
        
        <p>5.2次元の連想配列をループで回して全ての値を表示してください。(valueのみ)</p>
        <p><?php
        $members = [
             '山田' => [
                 '年齢' => '20歳',
                 '性別' => '男',
             ],
             '鈴木' => [
                 '年齢' => '25歳',
                 '性別' => '女'
             ],
             '木下' => [
                 '年齢' => '18歳',
                 '性別' => '女'
             ],
             '本田' => [
                 '年齢' => '30歳',
                 '性別' => '男'
             ],
             '山本' => [
                 '年齢' => '29歳',
                 '性別' => '女'
                ],
        ];
        foreach ($members as $member => $values) {
            foreach ($values as $key => $value) {
                print "{$value}<br />";
            }
        }
        ?></p>
        
        <p>6.数字1-50の配列をループで回して全ての値を表示してください。</p>
        <p><?php
        foreach (range(1, 50) as $number) {
            print "{$number}<br />";
        }
        ?></p>

    </body>
</html>
