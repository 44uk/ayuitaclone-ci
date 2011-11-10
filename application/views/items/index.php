<html>
<?php echo $this->view( 'shared/head' ) ?>
<body>

<?php echo $this->view( 'shared/header' ) ?>

<div id="container">
  <?php echo $this->view( 'shared/nav' ) ?>

  <ul>
    <li>要書込のものは追加書き込みをすることでアドレスが現れます。</li>
    <li>UP職人はD/Lできる人数を設定できます。設定人数を超えると提供品のアドレスは表示されません。</li>
    <li>優秀UP職人として活動していただいた方にはVIP特典が贈られます。</li>
  </ul>

  <table>
    <tr>
      <th>提供日</th>
      <th>UP職人</th>
      <th>提供品</th>
      <th>種別</th>
      <th>DL数</th>
      <th>トピック状況</th>
    </tr>
    <?php foreach( $items as $i ): ?>
    <tr>
      <td><?php echo date( 'Y/m/d', strtotime( $i->created_at ) ) ?></td>
      <td><?php echo h($i->provider_name) ?></td>
      <td><?php echo anchor( "items/show/{$i->id}", h($i->name) ) ?></td>
      <td><?php echo $i->type_name ?></td>
      <td><?php echo $i->dl_count ?></td>
      <td><?php echo display_limit( $i->dl_limit, $i->dl_count ) ?></td>
    </tr>
    <?php endforeach ?>
  </table>
</div>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>