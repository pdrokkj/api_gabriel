<?php

require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Geometria;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->post('/area/retangulo', function (Request $request, Response $response) {
    $dados = $request->getParsedBody();
    $geo = new Geometria();
    $area = $geo->calcularAreaRetangulo($dados['base'], $dados['altura']);
    $response->getBody()->write(json_encode(['area' => $area]));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
