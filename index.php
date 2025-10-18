<?php
require_once '../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\QuizController;
use App\Controllers\CommunityController;
use App\Controllers\ProductController;
use App\Controllers\ProfileController;
use App\Controllers\AdminController;

session_start();

// Initialize application
$app = new \App\App();

// Define routes
$app->get('/', function() {
    // Home page logic
});

$app->get('/login', [AuthController::class, 'showLogin']);
$app->post('/login', [AuthController::class, 'loginUser']);
$app->get('/register', [AuthController::class, 'showRegister']);
$app->post('/register', [AuthController::class, 'registerUser']);

$app->get('/quiz', [QuizController::class, 'startQuiz']);
$app->post('/quiz/submit', [QuizController::class, 'submitQuiz']);

$app->get('/community', [CommunityController::class, 'listThreads']);
$app->post('/community/question', [CommunityController::class, 'postQuestion']);
$app->post('/community/answer', [CommunityController::class, 'answerQuestion']);

$app->get('/products', [ProductController::class, 'listProducts']);
$app->get('/products/{id}', [ProductController::class, 'getProductDetails']);

$app->get('/profile', [ProfileController::class, 'viewProfile']);
$app->post('/profile/update', [ProfileController::class, 'updateProfile']);

$app->get('/admin', [AdminController::class, 'manageUsers']);
$app->post('/admin/moderate', [AdminController::class, 'moderateCommunity']);

// Run the application
$app->run();
?>