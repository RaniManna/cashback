<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLanguageAPIRequest;
use App\Http\Requests\API\UpdateLanguageAPIRequest;
use App\Models\Language;
use App\Repositories\LanguageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\LanguageResource;

/**
 * Class LanguageAPIController
 */
class LanguageAPIController extends AppBaseController
{
    /** @var  LanguageRepository */
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Display a listing of the Languages.
     * GET|HEAD /languages
     */
    public function index(Request $request): JsonResponse
    {
        $languages = $this->languageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(LanguageResource::collection($languages), 'Languages retrieved successfully');
    }

    /**
     * Store a newly created Language in storage.
     * POST /languages
     */
    public function store(CreateLanguageAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $language = $this->languageRepository->create($input);

        return $this->sendResponse(new LanguageResource($language), 'Language saved successfully');
    }

    /**
     * Display the specified Language.
     * GET|HEAD /languages/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Language $language */
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            return $this->sendError('Language not found');
        }

        return $this->sendResponse(new LanguageResource($language), 'Language retrieved successfully');
    }

    /**
     * Update the specified Language in storage.
     * PUT/PATCH /languages/{id}
     */
    public function update($id, UpdateLanguageAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Language $language */
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            return $this->sendError('Language not found');
        }

        $language = $this->languageRepository->update($input, $id);

        return $this->sendResponse(new LanguageResource($language), 'Language updated successfully');
    }

    /**
     * Remove the specified Language from storage.
     * DELETE /languages/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Language $language */
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            return $this->sendError('Language not found');
        }

        $language->delete();

        return $this->sendSuccess('Language deleted successfully');
    }
}
