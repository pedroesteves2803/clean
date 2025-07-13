<?php
namespace App\Interfaces;

interface UserPresenterInterface {
    public function present(array $data): void;
    public function presentError(string $message): void;
}
