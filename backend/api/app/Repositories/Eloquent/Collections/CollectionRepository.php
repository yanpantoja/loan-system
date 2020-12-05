<?php

namespace App\Repositories\Eloquent\Collections;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CollectionRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public function findAll(): Collection
    {
        return  $this->model->all();
    }

    public function findById(int $id): Model
    {
        return  $this->model->where('id', $id)->first();
    }

    public function create(array $input): Book
    {
        return  $this->model->create($input);
    }

    public function update(Model $book, array $input): Model
    {
        $book->user_id = $input['user_id'];
        $book->name = $input['name'];
        $book->loaned = $input['loaned'];
        $book->save();
        return $book;
    }

    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }

    protected function resolveModel()
    {
        return app($this->model);
    }
}
