<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<?php echo $this->view( 'shared/nav' ) ?>

<?php echo form_open( 'items/complete' ) ?>
  <?php echo form_label( 'お名前', 'provider_name' ) ?>
  <p><?php echo set_value( 'provider_name' ) ?></p>
  <?php echo form_hidden( 'provider_name', set_value( 'provider_name' ) ) ?>

  <?php echo form_label( 'メールアドレス' , 'provider_email' ) ?>
  <p><?php echo set_value( 'provider_email' ) ?></p>
  <?php echo form_hidden( 'provider_email', set_value( 'provider_email' ) ) ?>

  <?php echo form_label( '削除用パスワード', 'delete_password' ) ?>
  <p><?php echo set_value( 'delete_password' ) ?></p>
  <?php echo form_hidden( 'delete_password', set_value( 'delete_password' ) ) ?>

  <?php echo form_label( '提供品名', 'name' ) ?>
  <p><?php echo set_value( 'name' ) ?></p>
  <?php echo form_hidden( 'delete_password', set_value( 'delete_password' ) ) ?>

  <?php echo form_label( '提供品種別', 'type' ) ?>
  <p><?php echo $types[ set_value( 'type' ) ] ?></p>
  <?php echo form_hidden( 'type', set_value( 'type' ) ) ?>

  <?php echo form_label( '提供品URL', 'uri' ) ?>
  <pre>
  <?php echo set_value( 'uri' ) ?>
  </pre>
  <?php echo form_hidden( 'uri', set_value( 'uri' ) ) ?>

  <?php echo form_label( '強制書き込み要求', 'force_post' ) ?>
  <p>全員に書き込みをさせる</p>
  <?php echo form_hidden( 'force_post', set_value( 'force_post' ) ) ?>

  <?php echo form_label( 'ダウンロード制限数', 'dl_limit' ) ?>
  <p><?php echo set_value( 'dl_limit' ) ?></p>(制限なしの場合は「0」)
  <?php echo form_hidden( 'dl_limit', set_value( 'dl_limit' ) ) ?>

  <?php echo form_submit( '投稿', 'post' ) ?>
<?php echo form_close() ?>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>