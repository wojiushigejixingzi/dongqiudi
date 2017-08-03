<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL' => 0,
	'URL_CASE_INSENSITIVE' =>true,
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_PORT'=>'3306',
	'DB_NAME'=>'dongqiudi',
	'DB_USER'=>'root',
	'DB_PWD'=>'root',
	'DB_PREFIX'=>'fc_',
	/* success error跳转页面配置 */
	'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
	'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',

);
?>