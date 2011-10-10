<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<?php echo $this->view( 'shared/nav' ) ?>

<div id="provider">
  <h3><?php echo $item->name ?></h3>
  <h4><?php echo $item->provider_name ?></h4>
  <p><?php echo $item->provider_comment ?></p>
  <p><?php echo $item->created_at ?></p>
  <pre><?php echo $item->uri ?><pre>
</div>

<div id="thanks">
  <?php foreach( $thanks as $t ): ?>
  <div class="post">
    <p><?php echo $t->name ?></p>
    <p><?php echo $t->created_at ?></p>
    <pre><?php echo $t->comment ?></pre>
  </div>
  <?php endforeach ?>
</div>

<div id="post">
  <?php echo form_open( 'items/thank' ) ?>

  <?php echo form_label( 'お名前', 'name' ) ?>
  <?php echo form_input( 'name', set_value('name') ) ?>

  <?php echo form_label( 'メールアドレス', 'email' ) ?>
  <?php echo form_input( 'email' ) ?>

  <?php echo form_label( '発言', 'email' ) ?>
  <?php echo form_textarea( 'post' ) ?>

  <?php echo form_submit( 'post', '送信' ) ?>

  <?php echo form_close() ?>
</div>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>