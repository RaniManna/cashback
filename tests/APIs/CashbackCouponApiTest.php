<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CashbackCoupon;

class CashbackCouponApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cashback_coupon()
    {
        $cashbackCoupon = CashbackCoupon::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cashback-coupons', $cashbackCoupon
        );

        $this->assertApiResponse($cashbackCoupon);
    }

    /**
     * @test
     */
    public function test_read_cashback_coupon()
    {
        $cashbackCoupon = CashbackCoupon::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cashback-coupons/'.$cashbackCoupon->id
        );

        $this->assertApiResponse($cashbackCoupon->toArray());
    }

    /**
     * @test
     */
    public function test_update_cashback_coupon()
    {
        $cashbackCoupon = CashbackCoupon::factory()->create();
        $editedCashbackCoupon = CashbackCoupon::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cashback-coupons/'.$cashbackCoupon->id,
            $editedCashbackCoupon
        );

        $this->assertApiResponse($editedCashbackCoupon);
    }

    /**
     * @test
     */
    public function test_delete_cashback_coupon()
    {
        $cashbackCoupon = CashbackCoupon::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cashback-coupons/'.$cashbackCoupon->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cashback-coupons/'.$cashbackCoupon->id
        );

        $this->response->assertStatus(404);
    }
}
