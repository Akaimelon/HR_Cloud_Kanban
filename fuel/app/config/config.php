<?php
/**
 * FuelPHP の既定値（fuel/core/config/config.php）から変える設定だけを書く。
 * 既定値のままの項目は書かない。変えた設定が既定値のコメントに埋もれないようにするため。
 */
return array(

	'security' => array(
		// URL の文字列を htmlentities にかけてから使う。URL に入れられたタグが、そのまま HTML として出ないようにするため
		'uri_filter' => array('htmlentities'),

		// View に渡した値を自動でエスケープする。書かないと FuelPHP が起動時に例外を投げる
		'output_filter' => array('Security::htmlentities'),

		// 自動エスケープで、View の中に入れ子にした View などを文字列に変えずにそのまま渡すため
		'whitelisted_classes' => array(
			'Fuel\\Core\\Presenter',
			'Fuel\\Core\\Response',
			'Fuel\\Core\\View',
			'Fuel\\Core\\ViewModel',
			'Closure',
		),
	),
);
