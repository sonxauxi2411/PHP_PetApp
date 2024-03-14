<?php
$routes['default_controller'] = 'home';

/** Đường dẫn ảo => đường đãn thật
 * 
 */
// $routes['san-pham'] = 'products/index';
// $routes[''] = 'home';
$routes['trang-chu'] = 'home';
$routes['tao-pet'] = 'home/create_pet';
$routes['sua-pet/(.+)'] = 'home/edit_pet/$1';
$routes['sua-pet/post_update_pet/(.+)'] = 'home/post_update_pet/$1';
$routes['xoa-pet/(.+)'] = 'home/delete_pet/$1';
