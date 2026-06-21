<?php
require_once 'libs/router/router.php';
require_once 'app/controllers/video-api.controller.php';
//require_once 'app/controllers/categoria-api.controller.php';
//require_once  '/libs/jwt/jwt.middleware.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('video', 'GET', 'VideoApiController', 'getVideo');
$router->addRoute('video/:id', 'GET', 'VideoApiController', 'getVideoById');
//$router->addRoute('issues/:id', 'DELETE', 'IssuesApiController', 'removeIssue');
$router->addRoute('video', 'POST', 'VideoApiController', 'insertVideo');
$router->addRoute('video/:id', 'PUT', 'VideoApiController', 'updateVideo');
//$router->addRoute('issues/:id', 'PATCH', 'IssuesApiController', 'patchIssue');

// rutea según recurso y método de la solicitud
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);