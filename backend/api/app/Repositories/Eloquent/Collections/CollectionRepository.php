<?php

namespace App\Repositories\Eloquent\Collections;

use App\Models\Collection;
use App\Repositories\Contracts\CollectionRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;


class CollectionRepository implements CollectionRepositoryInterface
{

    public function findAll(int $items): Paginator
    {
        return Collection::with('collection')->simplePaginate($items);
    }

    public function findById(int $id): ?object
    {
        return Collection::where('id', $id)
            ->with('collection')
            ->first();
    }

    public function store(array $input): Collection
    {
        $model = app($input['collection_type']);

        return $model->create($input)->collections()->create($input);
    }

    public function update(object $collection, array $input): object
    {
        $collection->fill($input);
        $collection->save();
        $collectionType = $collection->collection()->first();
        $collectionType->name = $input['name'];
        $collectionType->save();
        return $collection;
    }

    public function delete(int $id): void
    {
        $collection = Collection::where('id', $id)->first();
        $collectionType = $collection->collection()->first();
        $collection->delete();
        $collectionType->delete();
    }

}
