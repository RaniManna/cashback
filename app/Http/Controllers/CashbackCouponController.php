<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCashbackCouponRequest;
use App\Http\Requests\UpdateCashbackCouponRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CashbackCouponRepository;
use Illuminate\Http\Request;
use Flash;

class CashbackCouponController extends AppBaseController
{
    /** @var CashbackCouponRepository $cashbackCouponRepository*/
    private $cashbackCouponRepository;

    public function __construct(CashbackCouponRepository $cashbackCouponRepo)
    {
        $this->cashbackCouponRepository = $cashbackCouponRepo;
    }

    /**
     * Display a listing of the CashbackCoupon.
     */
    public function index(Request $request)
    {
        $cashbackCoupons = $this->cashbackCouponRepository->paginate(10);

        return view('cashback_coupons.index')
            ->with('cashbackCoupons', $cashbackCoupons);
    }

    /**
     * Show the form for creating a new CashbackCoupon.
     */
    public function create()
    {
        return view('cashback_coupons.create');
    }

    /**
     * Store a newly created CashbackCoupon in storage.
     */
    public function store(CreateCashbackCouponRequest $request)
    {
        $input = $request->all();

        $cashbackCoupon = $this->cashbackCouponRepository->create($input);

        Flash::success('Cashback Coupon saved successfully.');

        return redirect(route('cashbackCoupons.index'));
    }

    /**
     * Display the specified CashbackCoupon.
     */
    public function show($id)
    {
        $cashbackCoupon = $this->cashbackCouponRepository->find($id);

        if (empty($cashbackCoupon)) {
            Flash::error('Cashback Coupon not found');

            return redirect(route('cashbackCoupons.index'));
        }

        return view('cashback_coupons.show')->with('cashbackCoupon', $cashbackCoupon);
    }

    /**
     * Show the form for editing the specified CashbackCoupon.
     */
    public function edit($id)
    {
        $cashbackCoupon = $this->cashbackCouponRepository->find($id);

        if (empty($cashbackCoupon)) {
            Flash::error('Cashback Coupon not found');

            return redirect(route('cashbackCoupons.index'));
        }

        return view('cashback_coupons.edit')->with('cashbackCoupon', $cashbackCoupon);
    }

    /**
     * Update the specified CashbackCoupon in storage.
     */
    public function update($id, UpdateCashbackCouponRequest $request)
    {
        $cashbackCoupon = $this->cashbackCouponRepository->find($id);

        if (empty($cashbackCoupon)) {
            Flash::error('Cashback Coupon not found');

            return redirect(route('cashbackCoupons.index'));
        }

        $cashbackCoupon = $this->cashbackCouponRepository->update($request->all(), $id);

        Flash::success('Cashback Coupon updated successfully.');

        return redirect(route('cashbackCoupons.index'));
    }

    /**
     * Remove the specified CashbackCoupon from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cashbackCoupon = $this->cashbackCouponRepository->find($id);

        if (empty($cashbackCoupon)) {
            Flash::error('Cashback Coupon not found');

            return redirect(route('cashbackCoupons.index'));
        }

        $this->cashbackCouponRepository->delete($id);

        Flash::success('Cashback Coupon deleted successfully.');

        return redirect(route('cashbackCoupons.index'));
    }
}
