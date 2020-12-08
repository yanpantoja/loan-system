<?php

use App\Models\Collection;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CollectionTest extends TestCase
{

    public function test_create_3_random_collections()
    {
        $collections = Collection::factory()
            ->count(3)
            ->make();


        foreach ($collections as $collection) {

            $response = $this->json('POST', '/collections', [
                'name' => $collection->name,
                'collection_type' => $collection->collection_type,
            ]);

            $response->assertResponseStatus(201);
            $response->seeJsonStructure(
                ['status',
                  'message' => [
                      'name',
                      'collection_type',
                      'collection_id',
                      'updated_at',
                      'created_at',
                      'id'
                  ]
                ]
            );
        }
    }

    public function test_update_collection()
    {

        $parameters = [
            'name' => 'Coleção de teste editada',
            'loaned' => 'Sim',
            'user_name' => 'Yan',
            'email' => 'yanpantoja@email.com'
        ];

        $this->put("collections/1", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'status',
                'message' => [
                    'id',
                    'user_id',
                    'collection_id',
                    'collection_type',
                    'name',
                    'loaned',
                    'created_at',
                    'updated_at',
                    'collection' => [
                        'id',
                        'name',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]
        );
    }
}
