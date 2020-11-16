* ユーザの削除
* パスワードハッシュ保存

- 存在
  - select count(*) from account where name = user名
    - 返却値 boolean
  - select name,password from account where name = user名
    - 返却値 array [name] [password]
  - array[password] $user[password] hash_verityで比較

- 検索欄
  - count(*)が0ならば「0件です」と表示する
  - else Like句でデータベースから取得する
  - input 文字が入力されるごとに
