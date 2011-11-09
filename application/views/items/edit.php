<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<?php echo $this->view( 'shared/nav' ) ?>

<?php echo validation_errors() ?>

<?php echo form_open( 'items/update' ) ?>
  <?php echo form_hidden( 'id', set_value('id', $item->id) ) ?>
  <?php echo form_hidden( 'confirm_pw_edit', $confirm_pw_edit) ?>

  <p>
  <?php echo form_label( 'お名前', 'provider_name' ) ?>
  <?php echo form_input( 'provider_name', set_value('provider_name', $item->provider_name) ) ?>
  </p>

  <p>
  <?php echo form_label( 'メールアドレス' , 'provider_email' ) ?>
  <?php echo form_input( 'provider_email', set_value('provider_email', $item->provider_email) ) ?>
  </p>

  <p>
  <?php echo form_label( '編集用パスワード', 'pw_edit' ) ?>
  <?php echo form_input( 'pw_edit', set_value('pw_edit', $confirm_pw_edit) ) ?>
  </p>

  <p>
  <?php echo form_label( '提供品名', 'name' ) ?>
  <?php echo form_input( 'name', set_value('name', $item->name) ) ?>
  </p>

  <p>
  <?php echo form_label( '提供品種別', 'type' ) ?>
  <?php echo form_dropdown( 'type', $types ) ?>
  </p>

  <p>
  <?php echo form_label( '提供品URL', 'uri' ) ?>
  </p>
  <p>
  <?php echo form_textarea( 'uri', set_value('uri', $item->uri) ) ?>
  </p>

  <p>
  <?php echo form_label( '強制書き込み要求', 'force_post' ) ?>
  <?php echo form_checkbox( 'force_post', 1, set_value('force_post', $item->force_post) ) ?>全員に書き込みをさせる
  </p>

  <p>
  <?php echo form_label( 'ダウンロード制限数', 'dl_limit' ) ?>
  <?php echo form_input( 'dl_limit', set_value('dl_limit', $item->dl_limit) ) ?>(制限なしの場合は「0」)
  </p>

  <p>
  <?php echo form_submit( 'add', '送信' ) ?>
  </p>
<?php echo form_close() ?>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>