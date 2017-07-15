#!/usr/bin/env php
<?php

if (!$loader = include __DIR__ . '/../../../vendor/autoload.php') {
    die('You must set up the project dependencies.');
}

//legacy app's autoloader (if it has one)
//require_once(__DIR__ . '/../../../legacy_stuff/autoload.php');

//new stuff's autoloader
require_once(__DIR__ . '/../../autoload.php');

$app = new \Cilex\Application('Cilex CLI for this legacy app');
$app->command(new \Cilex\Command\GreetCommand());	//in vendor folder
$app->command(new \Cilex\Command\DemoInfoCommand());	//in vendor folder

//one of ours!
$app->command(new \NewStuff\Console\Commands\SalutationCommand());

$app->command('foo', function ($input, $output) {	//inline command

    $output->writeln('Example output');
});

$app->run();
