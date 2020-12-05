<?php

namespace App\Repositories\Eloquent\Collections;

use App\Models\Book;
use App\Repositories\Contracts\CollectionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookRepository implements CollectionRepositoryInterface
{

    public function findAll(): Collection
    {
        return Book::all();
    }

    public function findById(int $id): Model
    {
        return Book::where('id', $id)->first();
    }

    public function create(array $input): Book
    {
        return Book::create($input);
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
        Book::destroy($id);
    }
}
