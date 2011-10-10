<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<?php echo $this->view( 'shared/nav' ) ?>

<?php echo validation_errors() ?>

<?php echo form_open( 'items/confirm' ) ?>
  <?php echo form_label( 'お名前', 'provider_name' ) ?>
  <?php echo form_input( 'provider_name', set_value('provider_name') ) ?>

  <?php echo form_label( 'メールアドレス' , 'provider_email' ) ?>
  <?php echo form_input( 'provider_email', set_value('provider_email') ) ?>

  <?php echo form_label( '削除用パスワード', 'delete_password' ) ?>
  <?php echo form_input( 'delete_password', set_value('delete_password') ) ?>

  <?php echo form_label( '提供品名', 'name' ) ?>
  <?php echo form_input( 'name', set_value('name') ) ?>

  <?php echo form_label( '提供品種別', 'type' ) ?>
  <?php echo form_dropdown( 'type', $types ) ?>

  <?php echo form_label( '提供品URL', 'uri' ) ?>
  <?php echo form_textarea( 'uri', set_value('uri') ) ?>

  <?php echo form_label( '強制書き込み要求', 'force_post' ) ?>
  <?php echo form_checkbox( 'force_post' ) ?>全員に書き込みをさせる

  <?php echo form_label( 'ダウンロード制限数', 'dl_limit' ) ?>
  <?php echo form_input( 'dl_limit', set_value('dl_limit') ) ?>(制限なしの場合は「0」)

  <?php echo form_submit( 'add', '送信' ) ?>
<?php echo form_close() ?>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>