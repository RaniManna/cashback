<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCashbackCouponAPIRequest;
use App\Http\Requests\API\UpdateCashbackCouponAPIRequest;
use App\Models\CashbackCoupon;
use App\Repositories\CashbackCouponRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CashbackCouponResource;

/**
 * Class CashbackCouponAPIController
 */
class CashbackCouponAPIController extends AppBaseController
{
    /** @var  CashbackCouponRepository */
    private $cashbackCouponRepository;

    public function __construct(CashbackCouponRepository $cashbackCouponRepo)
    {
        $this->cashbackCouponRepository = $cashbackCouponRepo;
    }

    /**
     * Display a listing of the CashbackCoupons.
     * GET|HEAD /cashback-coupons
     */
    public function index(Request $request): JsonResponse
    {
        $cashbackCoupons = $this->cashbackCouponRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CashbackCouponResource::collection($cashbackCoupons), 'Cashback Coupons retrieved successfully');
    }

    /**
     * Store a newly created CashbackCoupon in storage.
     * POST /cashback-coupons
     */
    public function store(CreateCashbackCouponAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $cashbackCoupon = $this->cashbackCouponRepository->create($input);

        return $this->sendResponse(new CashbackCouponResource($cashbackCoupon), 'Cashback Coupon saved successfully');
    }

    /**
     * Display the specified CashbackCoupon.
     * GET|HEAD /cashback-coupons/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var CashbackCoupon $cashbackCoupon */
        $cashbackCoupon = $this->cashbackCouponRepository->find($id);

        if (empty($cashbackCoupon)) {
            return $this->sendError('Cashback Coupon not found');
        }

        return $this->sendResponse(new CashbackCouponResource($cashbackCoupon), 'Cashback Coupon retrieved successfully');
    }

    /**
     * Update the specified CashbackCoupon in storage.
     * PUT/PATCH /cashback-coupons/{id}
     */
    public function update($id, UpdateCashbackCouponAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var CashbackCoupon $cashbackCoupon */
        $cashbackCoupon = $this->cashbackCouponRepository->find($id);

        if (empty($cashbackCoupon)) {
            return $this->sendError('Cashback Coupon not found');
        }

        $cashbackCoupon = $this->cashbackCouponRepository->update($input, $id);

        return $this->sendResponse(new CashbackCouponResource($cashbackCoupon), 'CashbackCoupon updated successfully');
    }

    /**
     * Remove the specified CashbackCoupon from storage.
     * DELETE /cashback-coupons/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var CashbackCoupon $cashbackCoupon */
        $cashbackCoupon = $this->cashbackCouponRepository->find($id);

        if (empty($cashbackCoupon)) {
            return $this->sendError('Cashback Coupon not found');
        }

        $cashbackCoupon->delete();

        return $this->sendSuccess('Cashback Coupon deleted successfully');
    }
}
