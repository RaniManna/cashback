<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCashbackOfferAPIRequest;
use App\Http\Requests\API\UpdateCashbackOfferAPIRequest;
use App\Models\CashbackOffer;
use App\Repositories\CashbackOfferRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CashbackOfferResource;

/**
 * Class CashbackOfferAPIController
 */
class CashbackOfferAPIController extends AppBaseController
{
    /** @var  CashbackOfferRepository */
    private $cashbackOfferRepository;

    public function __construct(CashbackOfferRepository $cashbackOfferRepo)
    {
        $this->cashbackOfferRepository = $cashbackOfferRepo;
    }

    /**
     * Display a listing of the CashbackOffers.
     * GET|HEAD /cashback-offers
     */
    public function index(Request $request): JsonResponse
    {
        $cashbackOffers = $this->cashbackOfferRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CashbackOfferResource::collection($cashbackOffers), 'Cashback Offers retrieved successfully');
    }

    /**
     * Store a newly created CashbackOffer in storage.
     * POST /cashback-offers
     */
    public function store(CreateCashbackOfferAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $cashbackOffer = $this->cashbackOfferRepository->create($input);

        return $this->sendResponse(new CashbackOfferResource($cashbackOffer), 'Cashback Offer saved successfully');
    }

    /**
     * Display the specified CashbackOffer.
     * GET|HEAD /cashback-offers/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var CashbackOffer $cashbackOffer */
        $cashbackOffer = $this->cashbackOfferRepository->find($id);

        if (empty($cashbackOffer)) {
            return $this->sendError('Cashback Offer not found');
        }

        return $this->sendResponse(new CashbackOfferResource($cashbackOffer), 'Cashback Offer retrieved successfully');
    }

    /**
     * Update the specified CashbackOffer in storage.
     * PUT/PATCH /cashback-offers/{id}
     */
    public function update($id, UpdateCashbackOfferAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var CashbackOffer $cashbackOffer */
        $cashbackOffer = $this->cashbackOfferRepository->find($id);

        if (empty($cashbackOffer)) {
            return $this->sendError('Cashback Offer not found');
        }

        $cashbackOffer = $this->cashbackOfferRepository->update($input, $id);

        return $this->sendResponse(new CashbackOfferResource($cashbackOffer), 'CashbackOffer updated successfully');
    }

    /**
     * Remove the specified CashbackOffer from storage.
     * DELETE /cashback-offers/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var CashbackOffer $cashbackOffer */
        $cashbackOffer = $this->cashbackOfferRepository->find($id);

        if (empty($cashbackOffer)) {
            return $this->sendError('Cashback Offer not found');
        }

        $cashbackOffer->delete();

        return $this->sendSuccess('Cashback Offer deleted successfully');
    }
}
