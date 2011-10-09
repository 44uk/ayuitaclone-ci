<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<?php echo $this->view( 'shared/nav' ) ?>

<?php echo form_open( 'items/confirm' ) ?>

<?php echo form_label( 'お名前', 'provider_name' ) ?>
<?php echo form_input( 'provider_name' ) ?>

<?php echo form_label( 'メールアドレス' , 'provider_email' ) ?>
<?php echo form_input( 'provider_email' ) ?>

<?php echo form_label( 'delete_password', '削除用パスワード' ) ?>
<?php echo form_input( 'delete_password' ) ?>

<?php echo form_label( 'name', '提供品名' ) ?>
<?php echo form_input( 'name' ) ?>

<?php echo form_label( 'type', '提供品種別' ) ?>
<select name="" id="">
  <option value="">写真</option>
  <option value="">映像</option>
  <option value="">詩</option>
  <option value="">その他</option>
</select>

<?php echo form_label( 'name', '提供品URL' ) ?>
<?php echo form_textarea( 'name' ) ?>

<?php echo form_label( 'force_post', '強制書き込み要求' ) ?>
<?php echo form_checkbox( 'force_post' ) ?>全員に書き込みをさせる

<?php echo form_label( 'dl_limit', 'ダウンロード制限数' ) ?>
<?php echo form_input( 'dl_limit' ) ?>(制限なしの場合は「0」)

<?php echo form_submit( 'add', '送信' ) ?>

<?php echo form_close() ?>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>