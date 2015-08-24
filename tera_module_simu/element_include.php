<?php
$make_select_list = Array(
  "設定なし",
  "エビ",
  "植物",
  "ポンプ",
  "ソーラー"
);

$block_comfig = Array();
$block_config['設定なし'] = Array();
$block_config['エビ'] = Array();
$block_config['植物'] = Array();
$block_config['ポンプ'] = Array();
$block_config['ソーラー'] = Array();
$block_config['きのこ'] = Array();

$block_config['設定なし'][input] = Array();
$block_config['設定なし'][output] = Array();
$block_config['エビ'][input] = Array(pomp_water);
$block_config['エビ'][output] = Array(water);
$block_config['植物'][input] = Array(pomp_water);
$block_config['植物'][output] = Array(water);
$block_config['ポンプ'][input] = Array(water, electicity);
$block_config['ポンプ'][output] = Array(pomp_water);
$block_config['ソーラー'][input] = Array();
$block_config['ソーラー'][output] = Array(electicity);
$block_config['きのこ'][input] = Array();
$block_config['きのこ'][output] = Array();

$block_connect = Array();

$block_connect[1] = Array(2,'',5);
$block_connect[2] = Array(3,5,6);
$block_connect[3] = Array(4,6,7);
$block_connect[4] = Array('',7,8);
$block_connect[5] = Array(6,9,10);
$block_connect[6] = Array(7,10,11);
$block_connect[7] = Array(8,11,12);
$block_connect[8] = Array('',12,'');
$block_connect[9] = Array(10,'',13);
$block_connect[10] = Array(11,13,14);
$block_connect[11] = Array(12,14,15);
$block_connect[12] = Array('',15,16);
$block_connect[13] = Array(14,17,18);
$block_connect[14] = Array(15,18,19);
$block_connect[15] = Array(16,19,20);
$block_connect[16] = Array('',20,'');
$block_connect[17] = Array(18,'','');
$block_connect[18] = Array(19,'','');
$block_connect[19] = Array(20,'','');
$block_connect[20] = Array('','','');

?>
