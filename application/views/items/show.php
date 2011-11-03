<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<?php echo $this->view( 'shared/nav' ) ?>


<div id="provider">
  <h3><?php echo h($item->name) ?></h3>
  <h4><?php echo h($item->provider_name) ?></h4>
  <p><?php echo h($item->provider_comment) ?></p>
  <p><?php echo date( 'Y/m/d H:i:s', strtotime( $item->created_at ) ) ?></p>

  <?php if( commented( $item->id, $this->session->userdata( 'gots' ) ) ): ?>
  <pre><?php echo h($item->uri) ?></pre>
  <?php elseif( empty( $item->force_post ) ): ?>
  <?php echo form_open( "items/get/{$item->id}" ) ?>
    <?php echo form_submit( 'get', '取得' ) ?>
  <?php echo form_close() ?>
  <?php else: ?>
  <pre>[ 要お礼書き込み ]</pre>
  <?php endif ?>

  <p>
  <?php echo form_open( "items/edit" ) ?>
    <?php echo form_hidden( 'id', $item->id ) ?>
    <?php echo form_input( 'confirm_pw_edit', set_value( 'confirm_pw_edit' ) ) ?>
    <?php echo form_submit( 'edit', '編集' ) ?>
    <?php echo form_button( 'destroy', '削除' ) ?>
  <?php echo form_close() ?>
  </p>
</div>

<?php echo validation_errors() ?>

<div id="thanks">
  <?php foreach( $thanks as $t ): ?>
  <div class="post">
    <p><?php echo h($t->name) ?></p>
    <p><?php echo date( 'Y/m/d H:i:s', strtotime( $t->created_at ) ) ?></p>
    <pre><?php echo h($t->comment) ?></pre>
  </div>
  <?php endforeach ?>
</div>

<div id="post">
  <?php echo form_open( 'items/comment' ) ?>
    <?php echo form_hidden( 'id', $item->id ) ?>

    <?php echo form_label( 'お名前', 'name' ) ?>
    <?php echo form_input( 'name', set_value('name') ) ?>

    <?php echo form_label( 'メールアドレス', 'email' ) ?>
    <?php echo form_input( 'email', set_value('email') ) ?>

    <?php echo form_label( '発言', 'comment' ) ?>
    <?php echo form_textarea( 'comment', set_value('comment') ) ?>

    <?php echo form_submit( 'post', '送信' ) ?>

  <?php echo form_close() ?>
</div>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>