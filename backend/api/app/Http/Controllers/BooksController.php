<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCreateRequest;
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
}
