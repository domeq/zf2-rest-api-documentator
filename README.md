# REST API Documentator for Zend Framework 2
## Introduction

This module allow to create quick documentation of your REST API

## Installation

## Usage

```php
<?php
return array(
	'zf2-api-documentator' => array(
		'api.saturnanalitic.com' => array(
			'name' => 'api.saturnanalitic.com',
			'version' => '1.1',
			'baseUrl' => 'http://127.0.0.1:8080/api',
			'resources' => array(
				array(
					// if result is [], then i know that this is collection, but I can tell this explicit
					'path' => '/keywords',
					'type' => 'list',
					'params' => array(
						'limit' => 'Limit output result',
						'offset' => array(
							'require' => true,
							'description' => 'Set offset',
						),
					),
					'resources' => array(
						array(
							// if result is [], then i know that this is collection, but I can tell this explicit
							'path' => '/{parent::keywordId}',
							'type' => 'item',
							'resources' => array(
								array(
									'path' => '/search_engines',
									'type' => 'item',
								),
								array(
									'path' => '/domains_positions_in_search_engine',
									'type' => 'list',
									// This mean that this not a independent endpoint
									// You can't call it directly
									'endpoint' => false,
									'resources' => array(
										'/{parent::keywordId}' => array(
											
										),
									),
								),
							),
						),
					),
				),
			),
		),
	),
)
```