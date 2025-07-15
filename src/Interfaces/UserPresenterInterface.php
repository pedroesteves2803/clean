<?php
namespace App\Interfaces;

interface UserPresenterInterface {
    public function present(array $data): array;
}
