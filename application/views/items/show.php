<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<?php echo $this->view( 'shared/nav' ) ?>

<ul>
  <li>要書込のものは追加書き込みをすることでアドレスが現れます。</li>
  <li>UP職人はD/Lできる人数を設定できます。設定人数を超えると提供品のアドレスは表示されません。</li>
  <li>優秀UP職人として活動していただいた方にはVIP特典が贈られます。</li>
</ul>

<div id="provider">
  <h3><?php echo $item->name ?></h3>
  <h4><?php echo $item->provider_name ?></h4>
  <p><?php echo $item->provider_comment ?></p>
  <p><?php echo $item->created_at ?></p>
  <pre><?php echo $item->uri ?><pre>
</div>

<div id="thanks">

</div>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>