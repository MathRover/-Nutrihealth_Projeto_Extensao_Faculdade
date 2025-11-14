<?php
// Front Controller (compatível PHP 7.4+)
declare(strict_types=1);
$basePath = dirname(__DIR__);
spl_autoload_register(function ($class) use ($basePath) {
    $prefix = 'App\\'; $baseDir = $basePath . '/app/';
    if (strpos($class, $prefix) === 0) {
        $relative = str_replace('\\', '/', substr($class, strlen($prefix)));
        $file = $baseDir . $relative . '.php';
        if (file_exists($file)) { require $file; }
    }
});
use App\Controllers\UserController;
use App\Controllers\PatientReportController;
$action = $_GET['action'] ?? 'index';
if (strpos($action, 'reports') === 0) {
    $controller = new PatientReportController();
    switch ($action) {
        case 'reports': $controller->index(); break;
        case 'reports_create': $controller->create(); break;
        case 'reports_edit': $controller->edit(); break;
        case 'reports_delete': $controller->delete(); break;
        default: http_response_code(404); echo "Rota não encontrada.";
    }
} else {
    $controller = new UserController();
    switch ($action) {
        case 'index':  $controller->index(); break;
        case 'create': $controller->create(); break;
        case 'edit':   $controller->edit(); break;
        case 'delete': $controller->delete(); break;
        default: http_response_code(404); echo "Rota não encontrada.";
    }
}
