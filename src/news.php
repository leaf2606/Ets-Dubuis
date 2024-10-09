<?php

use Controllers\Router;
use Controllers\RouterApi;

require 'vendor/autoload.php';

$uri = explode('/', $_SERVER['REQUEST_URI']);
if ($uri[1] === 'api') {
      $routerApi = new RouterApi('Controllers');
      $routerApi->post('/api/newsAdd', 'Newsletter@addUser', 'addUser')
                ->run();
}

?>