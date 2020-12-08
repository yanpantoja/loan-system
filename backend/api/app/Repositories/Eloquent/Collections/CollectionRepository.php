<?php

namespace App\Repositories\Eloquent\Collections;

use App\Models\Collection;
use App\Repositories\Contracts\CollectionRepositoryInterface;
use App\Services\UserService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class CollectionRepository implements CollectionRepositoryInterface
{

    protected  $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function findAll(): ?LengthAwarePaginator
    {
        return Collection::with('collection')
            ->leftJoin('users AS u', 'collections.user_id', '=','u.id')
            ->select('collections.*', 'u.name AS user_name', 'u.email')
            ->paginate(3);
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

        if(!empty($input['email'])) {
            $input['user_id'] = $this->userService->defineUserWhoLoaned($input);
        }

        return $model->create([
            'name' => $input['name']
        ])->collections()->create($input);
    }

    public function update(object $collection, array $input): object
    {
        if(!empty($input['email'])) {
            $input['user_id'] = $this->userService->defineUserWhoLoaned($input);
        }

        if($input['loaned'] == "Não") {
            $input['user_id'] = null;
        }

        if(!empty($input['user_name'])) {
            $input['user_name'] = $this->userService->defineUserWhoLoaned($input);
        }

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
