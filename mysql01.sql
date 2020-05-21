/*
 * 単純なselect
 *
 * 1.usersの一覧を表示してください。
 */

select * from users;

/*
 * 2.usersで年齢が20以上の人を表示してください。
 */

select * from users where age >= 20;

/*
 * 3.usersの平均年齢を表示してください。
 */

select AVG(age) from users;

/*
 * 4.usersでidが1,3,6の人を表示してください。
 */

select * from users where id in (1, 3, 5);

/*
 * 5.usersで名前に「田」が入っている人を表示してください。
 */

select * from users where name like '%田%';

/*
 * 6.usersで年齢が最も高い人を1人表示してください。
 */

select * from users order by age desc limit 1;

/*
 * 7.usersで年齢が低い順に並べ替えて表示してください。
 */
 
select * from users order by age;

/*
 * 内部結合(inner join)
 *
 * 1.postsとcategoriesの内容を全て表示してください。
 */

select * from posts join categories on posts.category_id = categories.id;

/*
 * 2.postsの内容のみ表示してください。
 */

select posts.id, user_id, title, content from posts join categories on posts.category_id = categories.id;

/*
 * 3.postsの内容のみ表示し、category_idの部分だけcategoriesのnameを表示してください。
 */

select posts.id, user_id, categories.name, title, content from posts join categories on posts.category_id = categories.id;

/*
 * 4.postsの件数を表示してください。
 */

select count(*) from posts join categories on posts.category_id = categories.id;

/*
 * 外部結合(outer join)
 *
 * 1.postsとcategoriesの内容を全て表示してください。
 */

select * from posts left join categories on posts.category_id = categories.id;

/*
 * 2.postsの内容のみ表示してください。
 */

select posts.id, user_id, title, content from posts left join categories on posts.category_id = categories.id;

/*
 * 3.postsの内容のみ表示し、category_idの部分だけcategoriesのnameを表示してください。
 */

select posts.id, user_id, categories.name, title, content from posts left join categories on posts.category_id = categories.id;

/*
 * 4.postsの件数を表示してください。
 */

select count(*) from posts left join categories on posts.category_id = categories.id;

/*
 * 複数テーブルの結合(inner join)
 *
 * 1.postsとcategoriesとusersの内容を全て表示してください。
 */

select * from posts join categories on posts.category_id = categories.id join users on posts.user_id = users.id;

/*
 * 2.postsの内容のみ表示し、category_idの部分をcategoriesのnameを、user_idの部分をusersのnameを表示してください。
 */

select posts.id, users.name, categories.name, title, content from posts join categories on posts.category_id = categories.id join users on posts.user_id = users.id;

/*
 * 3.2のsqlに下記の条件を追加してください。
 *
 * 1.categoriesが「政治」の記事のみ表示
 */

select posts.id, users.name, categories.name, title, content from posts join categories on posts.category_id = categories.id join users on posts.user_id = users.id where categories.name = "政治";

/*
 * 2.categoriesが  「スポーツ」「芸能」の記事のみ表示
 */

select posts.id, users.name, categories.name, title, content from posts join categories on posts.category_id = categories.id join users on posts.user_id = users.id where categories.name in ("スポーツ", "芸能");

/*
 * 3.usersの名前が「高木」の記事のみ表示
 */

select posts.id, users.name, categories.name, title, content from posts join categories on posts.category_id = categories.id join users on posts.user_id = users.id where users.name = "高木";

/*
 * 4.usersの年齢が25以上の記事のみ表示
 */

select posts.id, users.name, categories.name, title, content from posts join categories on posts.category_id = categories.id join users on posts.user_id = users.id where users.age >= 25;

/*
 * 5.存在しないcategoriesのデータが指定されている記事のみ表示
 */

select posts.id, users.name, categories.name, title, content from posts left join categories on posts.category_id = categories.id join users on posts.user_id = users.id where categories.name is null;

/*
 * 6.usersのid順に記事を並べ替えて表示
 */

select posts.id, users.name, categories.name, title, content from posts join categories on posts.category_id = categories.id join users on posts.user_id = users.id order by users.id;

/*
 * 7.usersの年齢が高い順に記事を並べ替えて表示
 */

select posts.id, users.name, categories.name, title, content from posts join categories on posts.category_id = categories.id join users on posts.user_id = users.id order by users.age desc;

/*
 * 集計
 *
 * 1.userごとの記事の投稿数を表示してください。(userの名前と件数)
 */

select users.name, count(*) from posts left join users on posts.user_id = users.id group by users.id;

/*
 * 2.記事の投稿数が最も多いuserの名前と件数を表示してください。
 */

select users.name, count(*) as count from posts left join users on posts.user_id = users.id group by users.id order by count desc limit 1;

/*
 * 3.記事の投稿数が6回以上のuserの名前と件数を表示してください。
 */

select users.name, count(*) as count from posts left join users on posts.user_id = users.id group by users.id having count >= 6;

/*
 * 4.記事の投稿数が多い順に並べ替えて表示してください。
 */

select users.name, count(*) as count from posts left join users on posts.user_id = users.id group by users.id order by count desc;
