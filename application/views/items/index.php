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

<table>
  <tr>
    <th>提供日</th>
    <th>UP職人</th>
    <th>提供品</th>
    <th>種別</th>
    <th>DL数</th>
    <th>トピック状況</th>
    <th>削除</th>
  </tr>
  <?php foreach( $items as $i ): ?>
  <tr>
    <td><?php echo date( 'Y/m/d', strtotime( $i->created_at ) ) ?></td>
    <td><?php echo $i->provider_name ?></td>
    <td><?php echo anchor( "items/{$i->id}", $i->name ) ?></td>
    <td><?php echo $i->type_name ?></td>
    <td><?php echo $i->dl_count ?></td>
    <td><?php echo display_limit( $i->dl_limit ) ?></td>
    <td><input type="button" value="削除" /></td>
  </tr>
  <?php endforeach ?>
</table>

<h3>過去ログ一覧</h3>
<ul>
  <li>2011-4</li>
  <li>2011-3</li>
  <li>2011-2</li>
  <li>2011-1</li>
</ul>

<?php echo $this->view( 'shared/footer' ) ?>

</body>
</html>