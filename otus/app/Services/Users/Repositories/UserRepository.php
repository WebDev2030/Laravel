<?php

namespace App\Services\Users\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository {

    public function find(int $id) {
        return User::query()->find($id);
    }

    public function search(): LengthAwarePaginator {
        return User::query()->orderByDesc('created_at')->paginate();
    }

    public function destroy(array $ids) {
        return User::destroy($ids);
    }

    public function createFromArray(array $data) {
        $author = new User();
        $author->fill($data);
        $author->save();

        return $author;
    }

    public function updateFromArray(User $author, array $data) {
        $author->update($data);
        return $author;
    }
}
