<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'login'      => \Myth\Auth\Filters\LoginFilter::class,
		'role'       => \Myth\Auth\Filters\RoleFilter::class,
		'permission' => \Myth\Auth\Filters\PermissionFilter::class,
		'filter_adm' => \App\Filters\Filter_adm::class,
		'filter_alu' => \App\Filters\Filter_alu::class,
		'filter_prshn' => \App\Filters\Filter_prshn::class,
		'no_filter_adm' => \App\Filters\No_filter_adm::class,
		'no_filter_alu' => \App\Filters\No_filter_alu::class,
		'no_filter_prshn' => \App\Filters\No_filter_prshn::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'honeypot',
			// 'login'
			// 'csrf',
		],
		'after'  => [
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [
		// 'login' => ['before' => ['admin/home']],
	];
}
