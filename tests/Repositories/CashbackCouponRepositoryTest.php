<?php

namespace Tests\Repositories;

use App\Models\CashbackCoupon;
use App\Repositories\CashbackCouponRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CashbackCouponRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected CashbackCouponRepository $cashbackCouponRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cashbackCouponRepo = app(CashbackCouponRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cashback_coupon()
    {
        $cashbackCoupon = CashbackCoupon::factory()->make()->toArray();

        $createdCashbackCoupon = $this->cashbackCouponRepo->create($cashbackCoupon);

        $createdCashbackCoupon = $createdCashbackCoupon->toArray();
        $this->assertArrayHasKey('id', $createdCashbackCoupon);
        $this->assertNotNull($createdCashbackCoupon['id'], 'Created CashbackCoupon must have id specified');
        $this->assertNotNull(CashbackCoupon::find($createdCashbackCoupon['id']), 'CashbackCoupon with given id must be in DB');
        $this->assertModelData($cashbackCoupon, $createdCashbackCoupon);
    }

    /**
     * @test read
     */
    public function test_read_cashback_coupon()
    {
        $cashbackCoupon = CashbackCoupon::factory()->create();

        $dbCashbackCoupon = $this->cashbackCouponRepo->find($cashbackCoupon->id);

        $dbCashbackCoupon = $dbCashbackCoupon->toArray();
        $this->assertModelData($cashbackCoupon->toArray(), $dbCashbackCoupon);
    }

    /**
     * @test update
     */
    public function test_update_cashback_coupon()
    {
        $cashbackCoupon = CashbackCoupon::factory()->create();
        $fakeCashbackCoupon = CashbackCoupon::factory()->make()->toArray();

        $updatedCashbackCoupon = $this->cashbackCouponRepo->update($fakeCashbackCoupon, $cashbackCoupon->id);

        $this->assertModelData($fakeCashbackCoupon, $updatedCashbackCoupon->toArray());
        $dbCashbackCoupon = $this->cashbackCouponRepo->find($cashbackCoupon->id);
        $this->assertModelData($fakeCashbackCoupon, $dbCashbackCoupon->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cashback_coupon()
    {
        $cashbackCoupon = CashbackCoupon::factory()->create();

        $resp = $this->cashbackCouponRepo->delete($cashbackCoupon->id);

        $this->assertTrue($resp);
        $this->assertNull(CashbackCoupon::find($cashbackCoupon->id), 'CashbackCoupon should not exist in DB');
    }
}
