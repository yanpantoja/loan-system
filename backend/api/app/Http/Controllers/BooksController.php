<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\{BookCreateRequest, BookUpdateRequest};
use App\Repositories\Contracts\CollectionRepositoryInterface;

class BooksController extends Controller
{

    private $collectionRepository;

    public function __construct(
        CollectionRepositoryInterface $collectionRepository
    )
    {
        $this->collectionRepository = $collectionRepository;
    }

    public function index()
    {
        return $this->collectionRepository->findAll();
    }

    public function store(BookCreateRequest $request)
    {
        $input = $request->all();
        return $this->collectionRepository->create($input);
    }

    public function update(int $id, BookUpdateRequest $request)
    {
        $book = $this->collectionRepository->findById($id);

        if(is_null($book)){
            return response()->json([
                'status' => 'error',
                'message' => 'O livro não foi encontrado.'
            ], 404);
        }

        $input = $request->all();

        return $this->collectionRepository->update($book, $input);
    }

    public function destroy(int $id)
    {
        if(is_null($this->collectionRepository->findById($id))){
            return response()->json([
                'status' => 'error',
                'message' => 'O livro não foi encontrado.'
            ], 404);
        }

        $this->collectionRepository->delete($id);

        return response()->json('', 204);
    }
}
