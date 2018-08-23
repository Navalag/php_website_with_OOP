<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('Europe/Kiev');

// use Monolog\Logger;
// use Monolog\Handler\StreamHandler;

// $log = new Logger('name');
// $log->pushHandler(new StreamHandler('app.log', Logger::WARNING));
// $log->addWarning('Foo');

$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig()
));

$view = $app->view();
$view->parserOptions = array(
    'debug' => true
);

$app->get('/', function () use($app) {
    $app->render('about.twig');
});
$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

$app->get('/contact', function () use($app) {
    $app->render('contact.twig');
});

$app->run();
