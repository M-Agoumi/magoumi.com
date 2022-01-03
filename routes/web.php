<?php

/**
 * all the routes of Your application go here
 */

use Simfa\Framework\Router;
 /**
  * Simfa\Framework\Router::get('/', function(){
  * 	return '<h1>Welcome to Simfa</h1>';
  * });
  *
  */
Router::request('/', [Controller\DefaultController::class, 'index']);
