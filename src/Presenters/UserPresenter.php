<?php
namespace App\Presenters;

use App\Interfaces\UserPresenterInterface;

class UserPresenter implements UserPresenterInterface {
    public function present(array $data): array  {
        return [
            'id' => $data['id'],
            'nome' => $data['nome']
        ];
    }
}
