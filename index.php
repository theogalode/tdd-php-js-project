<?php
require 'src/controllers/MessageController.php';
require 'src/controllers/HomeController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode('/', $uri);

$messageController = new MessageController();
$homeController = new HomeController();

// Assign the first path segment to $resource
$resource = $uri[1];

// Assign the second path segment to $action (if it exists)
$action = $uri[2] ?? '';

// Assign the third path segment to $id (if it exists)
$id = $uri[3] ?? '';

switch ($resource) {
    case '':
        $homeController->index();
        break;
    case 'messages':
        switch ($action) {
            case '':
                $messageController->index();
                break;
            case 'create':
                $messageController->create();
                break;
                /* case 'edit':
                if (is_numeric($id)) {
                    $controller->edit($id);
                } else {
                    header('HTTP/1.1 404 Not Found');
                }
                break;
            case 'delete':
                if (is_numeric($id)) {
                    $controller->delete($id);
                } else {
                    header('HTTP/1.1 404 Not Found');
                }
                break; */
            default:
                if (is_numeric($action)) {
                    $controller->view($action);
                } else {
                    header('HTTP/1.1 404 Not Found');
                }
        }
        break;
    default:
        header('HTTP/1.1 404 Not Found');
}
