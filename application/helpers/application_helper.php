<?php

function display_limit( $count, $consume ){
  if( 0 == $count ){
    return '無制限';
  }else{
    $left = $count - $consume;
    return 1 > $left ? '提供終了' : "あと{$left}人";
  }
}

function commented( $id, $gots ){
  return is_array( $gots ) ? in_array( $id, $gots ) : FALSE;
}

if ( ! function_exists('h')){
  function h($var){
    if (is_array($var)){
      return array_map('h', $var);
    }else{
      return htmlspecialchars($var, ENT_QUOTES, config_item('charset'));
    }
  }
}