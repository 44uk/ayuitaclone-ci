<?php

function display_limit( $count ){
  return 0 === $count ? '無制限' : "残り{$count}人" ;
}
