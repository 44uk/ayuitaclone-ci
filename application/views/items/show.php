<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<div id="container">
  <?php echo $this->view( 'shared/nav' ) ?>

  <div id="provider">
    <h3><?php echo h($item->name) ?></h3>
    <h4><?php echo h($item->provider_name) ?></h4>
    <p><?php echo h($item->provider_comment) ?></p>
    <p><?php echo date( 'Y/m/d H:i:s', strtotime( $item->created_at ) ) ?></p>

  <?php if( commented( $item->id, $this->session->userdata( 'gots' ) ) ): ?>
    <pre><?php echo h($item->uri) ?></pre>
  <?php elseif( $item->force_post ): ?>
    <pre>[ 要お礼書き込み ]</pre>
  <?php elseif( $is_closed ): ?>
    <pre>[ 提供終了 ]</pre>
  <?php else: ?>
    <?php echo form_open( "items/get/{$item->id}" ) ?>
      <?php echo form_submit( 'get', '取得' ) ?>
    <?php echo form_close() ?>
  <?php endif ?>

    <p>
    <?php echo form_open( "items/edit" ) ?>
      <?php echo form_hidden( 'id', $item->id ) ?>
      <?php echo form_input( 'confirm_pw_edit', set_value( 'confirm_pw_edit' ) ) ?>
      <?php echo form_submit( 'edit', '編集' ) ?>
      <?php echo form_label( '削除', 'destroy' ) ?>
      <?php echo form_checkbox( 'destroy', 1, set_value('destroy') ) ?>
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

      <p>
      <?php echo form_label( 'お名前', 'name' ) ?>
      <?php echo form_input( 'name', set_value('name') ) ?>
      </p>

      <p>
      <?php echo form_label( 'メールアドレス', 'email' ) ?>
      <?php echo form_input( 'email', set_value('email') ) ?>
      </p>

      <p>
      <?php echo form_label( '発言', 'comment' ) ?>
      </p>
      <p>
      <?php echo form_textarea( 'comment', set_value('comment') ) ?>
      </p>

      <p>
      <?php echo form_submit( 'post', '送信' ) ?>
      </p>
    <?php echo form_close() ?>
  </div>
</div>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>