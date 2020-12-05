<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\{CollectionCreateRequest, CollectionUpdateRequest};
use App\Repositories\Contracts\CollectionRepositoryInterface;

class CollectionsController extends Controller
{
    protected $collectionRepository;

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

    public function store(CollectionCreateRequest $request)
    {
        $input = $request->all();
        return $this->collectionRepository->create($input);
    }

    public function update(int $id, CollectionUpdateRequest $request)
    {
        $book = $this->collectionRepository->findById($id);

        if(is_null($book)){
            return response()->json([
                'status' => 'error',
                'message' => 'Coleção não encontrada.'
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
                'message' => 'Coleção não encontrada.'
            ], 404);
        }

        $this->collectionRepository->delete($id);

        return response()->json('', 204);
    }
}
