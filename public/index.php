<?php
use KanbanBoard\Authentication;
use KanbanBoard\GithubActual;
use KanbanBoard\Utilities;

require '../classes/KanbanBoard/Github.php';
require '../classes/Utilities.php';
require '../classes/KanbanBoard/Authentication.php';

Utilities::putenv('GH_CLIENT_ID', 'marcin.stanik@gmail.com');
Utilities::putenv('GH_CLIENT_SECRET', 'BobM@rley1945');
Utilities::putenv('GH_ACCOUNT', 'staniol007');
Utilities::putenv('GH_REPOSITORIES', 'test01');

$repositories = explode('|', Utilities::env('GH_REPOSITORIES'));

$authentication = new \KanbanBoard\Login();
die('aaa');
$token = $authentication->login();

$github = new GithubClient($token, Utilities::env('GH_ACCOUNT'));
$board = new \KanbanBoard\Application($github, $repositories, array('waiting-for-feedback'));

$data = $board->board();
$m = new Mustache_Engine(array(
	'loader' => new Mustache_Loader_FilesystemLoader('../views'),
));

echo $m->render('index', array('milestones' => $data));
