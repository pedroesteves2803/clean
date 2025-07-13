<?php
namespace App\Presenters;

use App\Interfaces\UserPresenterInterface;

class JsonUserPresenter implements UserPresenterInterface {
    public function present(array $data): void {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    }

    public function presentError(string $message): void {
        http_response_code(400);
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'error' => $message
        ]);
    }
}
