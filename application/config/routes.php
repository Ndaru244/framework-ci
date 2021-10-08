<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Auth */
$route['login'] = 'Auth/login';
$route['register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';

/* Pegawai */
$route['pegawai'] = 'pegawai/pegawai';

/* Dashboard */
$route['dashboard'] = 'admin/dashboard';

/* Barang */
$route['barang'] = 'admin/dashboard/data_barang';
$route['barang/tambah'] = 'admin/dashboard/barang_tambah';
$route['barang/tambah_stok'] = 'admin/dashboard/tambah_stok';
$route['barang/edit/(:any)'] = 'admin/dashboard/edit_barang/$1';
$route['barang/hapus/(:any)'] = 'admin/dashboard/hapus_barang/$1';

/* Kategori */
$route['kategori'] = 'admin/dashboard/kategori';
$route['kategori/edit/(:any)'] = 'admin/dashboard/edit_kategori/$1';
$route['kategori/hapus/(:any)'] = 'admin/dashboard/hapus_kategori/$1';

/* Rekap barang */
$route['barang_masuk'] = 'admin/dashboard/barang_masuk';
$route['barang_keluar'] = 'admin/dashboard/barang_keluar';

/* Cart */
$route['lihat_keranjang'] = 'main/keranjang';
$route['lihat_keranjang/update/(:any)'] = 'main/update/$1';
$route['lihat_keranjang/delete/(:any)'] = 'main/delete/$1';
$route['lihat_keranjang/delete_all'] = 'main/delete_all';
$route['checkout'] = 'main/checkout';
$route['user/lihat_pesanan'] = 'main/lihat_pesanan';

/* Pesanan */
$route['pesanan'] = 'admin/dashboard/pesanan';