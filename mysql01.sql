/*
 * 単純なselect
 *
 * 1.usersの一覧を表示してください。
 */

SELECT * FROM users;

/*
 * 2.usersで年齢が20以上の人を表示してください。
*/

SELECT * FROM users WHERE age >= 20;

/*
 * 3.usersの平均年齢を表示してください。
 */

SELECT AVG(age) FROM users;

/*
 * 4.usersでidが1,3,6の人を表示してください。
 */

SELECT *
  FROM users
 WHERE id IN (1, 3, 5);

/*
 * 5.usersで名前に「田」が入っている人を表示してください。
 */

SELECT * 
  FROM users
 WHERE users.name
  LIKE '%田%';

/*
 * 6.usersで年齢が最も高い人を1人表示してください。
 */

SELECT *
  FROM users
 ORDER BY age
  DESC LIMIT 1;

/*
 * 7.usersで年齢が低い順に並べ替えて表示してください。
 */
 
SELECT *
  FROM users
 ORDER BY age;

/*
 * 内部結合(inner join)
 *
 * 1.postsとcategoriesの内容を全て表示してください。
 */

SELECT * 
 FROM posts p
 JOIN categories c
   ON p.category_id = c.id;

/*
 * 2.postsの内容のみ表示してください。
 */

SELECT p.id, user_id, title, content
  FROM posts p
 INNER JOIN categories c
    ON p.category_id = c.id;

/*
 * 3.postsの内容のみ表示し、category_idの部分だけcategoriesのnameを表示してください。
 */

SELECT p.id, user_id, c.name, title, content
  FROM posts p
 INNER JOIN categories c
    ON p.category_id = c.id;

/*
 * 4.postsの件数を表示してください。
 */

SELECT count(*) 
  FROM posts p
 INNER JOIN categories c
    ON p.category_id = c.id;

/*
 * 外部結合(outer join)
 *
 * 1.postsとcategoriesの内容を全て表示してください。
 */

SELECT *
  FROM posts p
  LEFT JOIN categories c
    ON p.category_id = c.id;

/*
 * 2.postsの内容のみ表示してください。
 */

SELECT p.id, user_id, title, content
  FROM posts p
  LEFT JOIN categories c
    ON p.category_id = c.id;

/*
 * 3.postsの内容のみ表示し、category_idの部分だけcategoriesのnameを表示してください。
 */

SELECT p.id, user_id, c.name, title, content
  FROM posts p
  LEFT JOIN categories c
    ON p.category_id = c.id;

/*
 * 4.postsの件数を表示してください。
 */

SELECT count(*)
  FROM posts p 
  LEFT JOIN categories c
    ON p.category_id = c.id;

/*
 * 複数テーブルの結合(inner join)
 *
 * 1.postsとcategoriesとusersの内容を全て表示してください。
 */

SELECT * 
  FROM posts p
 INNER JOIN categories c
    ON p.category_id = c.id
 INNER JOIN users u
    ON p.user_id = u.id;

/*
 * 2.postsの内容のみ表示し、category_idの部分をcategoriesのnameを、user_idの部分をusersのnameを表示してください。
 */

SELECT p.id,
       u.name,
       c.name,
       title,
       content
  FROM posts p
 INNER JOIN categories c
    ON p.category_id = c.id
 INNER JOIN users u
    ON p.user_id = u.id;

/*
 * 3.2のsqlに下記の条件を追加してください。
 *
 * 1.categoriesが「政治」の記事のみ表示
 */

SELECT p.id,
       u.name,
       c.name,
       title,
       content
  FROM posts p
INNER JOIN categories c
    ON p.category_id = c.id
 INNER JOIN users u 
    ON p.user_id = u.id
 WHERE c.name = "政治";

/*
 * 2.categoriesが  「スポーツ」「芸能」の記事のみ表示
 */

SELECT p.id,
       u.name,
       c.name,
       title,
       content
  FROM posts p
 INNER JOIN categories c
    ON p.category_id = c.id
 INNER JOIN users u
    ON p.user_id = u.id
 WHERE c.name IN ("スポーツ", "芸能");

/*
 * 3.usersの名前が「高木」の記事のみ表示
 */

SELECT p.id,
       u.name,
       c.name,
       title,
       content
  FROM posts p
 INNER JOIN categories c
    ON p.category_id = c.id
 INNER JOIN users u
    ON p.user_id = u.id
 WHERE u.name = "高木";

/*
 * 4.usersの年齢が25以上の記事のみ表示
 */

SELECT p.id,
       u.name,
       u.age,
       c.name,
       title,
       content
  FROM posts p
 INNER JOIN categories c
    ON p.category_id = c.id
 INNER JOIN users u
    ON p.user_id = u.id
 WHERE u.age >= 25;

/*
 * 5.存在しないcategoriesのデータが指定されている記事のみ表示
 */

SELECT p.id,
       u.name,
       c.name,
       title,
       content
  FROM posts p
  LEFT JOIN categories c
    ON p.category_id = c.id
 INNER JOIN users u
    ON p.user_id = u.id
 WHERE c.name IS NULL;

/*
 * 6.usersのid順に記事を並べ替えて表示
 */

SELECT p.id,
       u.id,
       u.name,
       c.name,
       title,
       content
  FROM posts p
 INNER JOIN categories c 
    ON p.category_id = c.id
 INNER JOIN users u
    ON p.user_id = u.id
 ORDER BY u.id;

/*
 * 7.usersの年齢が高い順に記事を並べ替えて表示
 */

SELECT p.id,
       u.name,
       u.age,
       c.name,
       title,
       content
  FROM posts p
 INNER JOIN categories c
    ON p.category_id = c.id
 INNER JOIN users u
    ON p.user_id = u.id
 ORDER BY u.age DESC;

/*
 * 集計
 *
 * 1.userごとの記事の投稿数を表示してください。(userの名前と件数)
 */

SELECT u.name, count(*)
  FROM posts p
  LEFT JOIN users u
    ON p.user_id = u.id
 GROUP BY u.id;

/*
 * 2.記事の投稿数が最も多いuserの名前と件数を表示してください。
 */

SELECT u.name, count(*)
    AS count
  FROM posts p 
  LEFT JOIN users u
    ON p.user_id = u.id
 GROUP BY u.id
 ORDER BY count
  DESC LIMIT 1;

/*
 * 3.記事の投稿数が6回以上のuserの名前と件数を表示してください。
 */

SELECT u.name, count(*)
    AS count
  FROM posts p
  LEFT JOIN users u
    ON p.user_id = u.id
 GROUP BY u.id
HAVING count >= 6;

/*
 * 4.記事の投稿数が多い順に並べ替えて表示してください。
 */

SELECT u.name, count(*)
    AS count
  FROM posts p
  LEFT JOIN users u
    ON p.user_id = u.id
 GROUP BY u.id
 ORDER BY count DESC;
 

