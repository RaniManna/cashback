<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCashbackOfferRequest;
use App\Http\Requests\UpdateCashbackOfferRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CashbackOfferRepository;
use Illuminate\Http\Request;
use Flash;

class CashbackOfferController extends AppBaseController
{
    /** @var CashbackOfferRepository $cashbackOfferRepository*/
    private $cashbackOfferRepository;

    public function __construct(CashbackOfferRepository $cashbackOfferRepo)
    {
        $this->cashbackOfferRepository = $cashbackOfferRepo;
    }

    /**
     * Display a listing of the CashbackOffer.
     */
    public function index(Request $request)
    {
        $cashbackOffers = $this->cashbackOfferRepository->paginate(10);

        return view('cashback_offers.index')
            ->with('cashbackOffers', $cashbackOffers);
    }

    /**
     * Show the form for creating a new CashbackOffer.
     */
    public function create()
    {
        return view('cashback_offers.create');
    }

    /**
     * Store a newly created CashbackOffer in storage.
     */
    public function store(CreateCashbackOfferRequest $request)
    {
        $input = $request->all();

        $cashbackOffer = $this->cashbackOfferRepository->create($input);

        Flash::success('Cashback Offer saved successfully.');

        return redirect(route('cashbackOffers.index'));
    }

    /**
     * Display the specified CashbackOffer.
     */
    public function show($id)
    {
        $cashbackOffer = $this->cashbackOfferRepository->find($id);

        if (empty($cashbackOffer)) {
            Flash::error('Cashback Offer not found');

            return redirect(route('cashbackOffers.index'));
        }

        return view('cashback_offers.show')->with('cashbackOffer', $cashbackOffer);
    }

    /**
     * Show the form for editing the specified CashbackOffer.
     */
    public function edit($id)
    {
        $cashbackOffer = $this->cashbackOfferRepository->find($id);

        if (empty($cashbackOffer)) {
            Flash::error('Cashback Offer not found');

            return redirect(route('cashbackOffers.index'));
        }

        return view('cashback_offers.edit')->with('cashbackOffer', $cashbackOffer);
    }

    /**
     * Update the specified CashbackOffer in storage.
     */
    public function update($id, UpdateCashbackOfferRequest $request)
    {
        $cashbackOffer = $this->cashbackOfferRepository->find($id);

        if (empty($cashbackOffer)) {
            Flash::error('Cashback Offer not found');

            return redirect(route('cashbackOffers.index'));
        }

        $cashbackOffer = $this->cashbackOfferRepository->update($request->all(), $id);

        Flash::success('Cashback Offer updated successfully.');

        return redirect(route('cashbackOffers.index'));
    }

    /**
     * Remove the specified CashbackOffer from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cashbackOffer = $this->cashbackOfferRepository->find($id);

        if (empty($cashbackOffer)) {
            Flash::error('Cashback Offer not found');

            return redirect(route('cashbackOffers.index'));
        }

        $this->cashbackOfferRepository->delete($id);

        Flash::success('Cashback Offer deleted successfully.');

        return redirect(route('cashbackOffers.index'));
    }
}
