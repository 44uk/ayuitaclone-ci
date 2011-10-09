<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<?php echo $this->view( 'shared/nav' ) ?>

<label>お名前</label>
<p>名無し職人</p>

<label>メールアドレス</label>
<p>774@example.com</p>

<label>コメント</label>
<pre>
いただきました。
ありがとう
ございます。
</pre>

<label>削除用パスワード</label>
<p>******</p>

<label>提供品名</label>
<p>青春ポエム3</p>

<label>提供品種別</label>
<p>詩</p>

<label>提供品URL</label>
<pre>
http://www.example.com/poem/youth3.txt
</pre>

<label>強制書き込み要求</label>
全員に書き込みをさせる

<label>ダウンロード制限数</label>
<p>9999</p>(制限なしの場合は「0」)

<form action="">
<input type="submit" value="投稿" />
</form>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>