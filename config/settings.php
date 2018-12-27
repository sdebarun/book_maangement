<?php
use Illuminate\Routing\UrlGenerator;
/*
It is a file to handle all my custom settings.
*/
return [
	"path"=>[
		"ABSPATH" => public_path('images'),
		"URIPATH" => ('public/images/'),
		"ROOTPATH" => $_SERVER['DOCUMENT_ROOT']
	],
	"type" => [
		"product" => "/product/",
	]
	
	
];
