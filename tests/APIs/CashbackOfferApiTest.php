<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CashbackOffer;

class CashbackOfferApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cashback_offer()
    {
        $cashbackOffer = CashbackOffer::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cashback-offers', $cashbackOffer
        );

        $this->assertApiResponse($cashbackOffer);
    }

    /**
     * @test
     */
    public function test_read_cashback_offer()
    {
        $cashbackOffer = CashbackOffer::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cashback-offers/'.$cashbackOffer->id
        );

        $this->assertApiResponse($cashbackOffer->toArray());
    }

    /**
     * @test
     */
    public function test_update_cashback_offer()
    {
        $cashbackOffer = CashbackOffer::factory()->create();
        $editedCashbackOffer = CashbackOffer::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cashback-offers/'.$cashbackOffer->id,
            $editedCashbackOffer
        );

        $this->assertApiResponse($editedCashbackOffer);
    }

    /**
     * @test
     */
    public function test_delete_cashback_offer()
    {
        $cashbackOffer = CashbackOffer::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cashback-offers/'.$cashbackOffer->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cashback-offers/'.$cashbackOffer->id
        );

        $this->response->assertStatus(404);
    }
}
