<?php
// Routes
require 'TodoList.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
$TodoList = new Todolist;

$app->get('/api/v1/tasks', function(Request $request, Response $response) use($TodoList) {
    /*$list = [
        ['name' => 'Programming', 'status' => 1],
        ['name' => 'Essay', 'status' => 0],
        ['name' => 'Play', 'status' => 0]
    ];*/
    $list = $TodoList->get_list();
    $response = $response->withJson($list);
    return $response;
});

$app->get('/api/v1/tasks/{id}', function(Request $request, Response $response) use($TodoList) {
    $list = $TodoList->get_list();

    $id = intval($request->getAttribute('id'));
    if ($id > count($list)) {
        $item = ['name' => 'blank', 'status' => -1];
    } else {
        $item = $list[$id];
    }
    $response = $response->withJson($item);
    return $response;
});

$app->post('/api/v1/tasks', function(Request $request, Response $response) use($TodoList) {
    $post = $request->getParsedBody();
    $data = [];
    $data['name'] = filter_var($post['name'], FILTER_SANITIZE_STRING);
    if (!empty($data['name'])) {
        $TodoList->add_item($data['name']);
        $response->getBody()->write("Success");
    } else {
        $response->getBody()->write("Fail");
    }
    return $response;
});

$app->put('/api/v1/tasks/{id}', function(Request $request, Response $response) use($TodoList){
    $put = $request->getParsedBody();
    $data = [];
    $data['name'] = $put['name'];
    $data['state'] = $put['state'];
    
    $id = intval($request->getAttribute('id'));
    
    if (!empty($data['name'])) {
        /**
         * @todo
         * 
         * The class does not have such method.
         */
        $response->getBody()->write("Success");
    } else {
        $response->getBody()->write("Fail");
    }
    return $response;
});

$app->delete('/api/v1/tasks/{id}', function(Request $request, Response $response) {
    $id = intval($request->getAttribute('id'));
    if (!empty($id)) {
        /**
         * @todo
         * 
         * The class does not have such method.
         */
        $response->getBody()->write('Success');
    } else {
        $response->getBody()->write('Fail');
    }
    return $response;
});