<?php

namespace Tests\Repositories;

use App\Models\CashbackOffer;
use App\Repositories\CashbackOfferRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CashbackOfferRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected CashbackOfferRepository $cashbackOfferRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cashbackOfferRepo = app(CashbackOfferRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cashback_offer()
    {
        $cashbackOffer = CashbackOffer::factory()->make()->toArray();

        $createdCashbackOffer = $this->cashbackOfferRepo->create($cashbackOffer);

        $createdCashbackOffer = $createdCashbackOffer->toArray();
        $this->assertArrayHasKey('id', $createdCashbackOffer);
        $this->assertNotNull($createdCashbackOffer['id'], 'Created CashbackOffer must have id specified');
        $this->assertNotNull(CashbackOffer::find($createdCashbackOffer['id']), 'CashbackOffer with given id must be in DB');
        $this->assertModelData($cashbackOffer, $createdCashbackOffer);
    }

    /**
     * @test read
     */
    public function test_read_cashback_offer()
    {
        $cashbackOffer = CashbackOffer::factory()->create();

        $dbCashbackOffer = $this->cashbackOfferRepo->find($cashbackOffer->id);

        $dbCashbackOffer = $dbCashbackOffer->toArray();
        $this->assertModelData($cashbackOffer->toArray(), $dbCashbackOffer);
    }

    /**
     * @test update
     */
    public function test_update_cashback_offer()
    {
        $cashbackOffer = CashbackOffer::factory()->create();
        $fakeCashbackOffer = CashbackOffer::factory()->make()->toArray();

        $updatedCashbackOffer = $this->cashbackOfferRepo->update($fakeCashbackOffer, $cashbackOffer->id);

        $this->assertModelData($fakeCashbackOffer, $updatedCashbackOffer->toArray());
        $dbCashbackOffer = $this->cashbackOfferRepo->find($cashbackOffer->id);
        $this->assertModelData($fakeCashbackOffer, $dbCashbackOffer->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cashback_offer()
    {
        $cashbackOffer = CashbackOffer::factory()->create();

        $resp = $this->cashbackOfferRepo->delete($cashbackOffer->id);

        $this->assertTrue($resp);
        $this->assertNull(CashbackOffer::find($cashbackOffer->id), 'CashbackOffer should not exist in DB');
    }
}
