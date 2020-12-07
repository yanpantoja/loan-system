<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CollectionRepositoryInterface;
use App\Http\Requests\Collection\{CollectionCreateRequest, CollectionUpdateRequest};
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    protected $collectionRepository;

    public function __construct(CollectionRepositoryInterface $collectionRepository)
    {
        $this->collectionRepository = $collectionRepository;
    }

    public function index()
    {
        $collections = $this->collectionRepository->findAll();

        if(is_null($collections)) {
            return response()->json('', 204);
        }

        return response()->json($collections, 201);
    }

    public function store(CollectionCreateRequest $request)
    {
        $input = $request->all();
        $collection = $this->collectionRepository->store($input);

        return response()->json([
            'status' => 'success',
            'message' => $collection
        ], 201);
    }

    public function update(int $id, CollectionUpdateRequest $request)
    {
        $collection = $this->collectionRepository->findById($id);

        if(is_null($collection)){
            return response()->json([
                'status' => 'error',
                'message' => 'Coleção não encontrada.'
            ], 404);
        }

        $input = $request->all();

        $collectionUpdated = $this->collectionRepository->update($collection, $input);

        return response()->json([
            'status' => 'success',
            'message' => $collectionUpdated
        ]);
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
