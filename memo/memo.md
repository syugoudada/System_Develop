* ユーザの削除
* パスワードハッシュ保存

- 存在
  - select count(*) from account where name = user名
    - 返却値 boolean
  - select name,password from account where name = user名
    - 返却値 array [name] [password]
  - array[password] $user[password] hash_verityで比較
