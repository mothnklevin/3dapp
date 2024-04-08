<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/ObModel.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->setBasePath("/api.php");

//http://localhost/api.php/getall
$app->get('/getall', function (Request $request, Response $response, array $args) {
    $rs = ObModel::getAll();
    $content_list = json_encode($rs);
    $response->getBody()->write($content_list);
    return $response->withHeader('Content-Type', 'application/json');
});
$app->run();
?>

