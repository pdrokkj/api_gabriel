<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Geometria;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware();

require __DIR__ . '/../src/Geometria.php';

// Rota para área do retângulo
$app->post('/area/retangulo', function (Request $request, Response $response) {
    $dados = $request->getParsedBody();
    $base = $dados['base'] ?? 0;
    $altura = $dados['altura'] ?? 0;

    $geo = new Geometria();
    $area = $geo->calcularAreaRetangulo($base, $altura);

    $response->getBody()->write(json_encode(['area' => $area]));
    return $response->withHeader('Content-Type', 'application/json');
});

// Rota para área do triângulo
$app->post('/area/triangulo', function (Request $request, Response $response) {
    $dados = $request->getParsedBody();
    $base = $dados['base'] ?? 0;
    $altura = $dados['altura'] ?? 0;

    $geo = new Geometria();
    $area = $geo->calcularAreaTriangulo($base, $altura);

    $response->getBody()->write(json_encode(['area' => $area]));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
