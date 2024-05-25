<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAdminAPIRequest;
use App\Http\Requests\API\UpdateAdminAPIRequest;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AdminResource;

/**
 * Class AdminAPIController
 */
class AdminAPIController extends AppBaseController
{
    /** @var  AdminRepository */
    private $adminRepository;

    public function __construct(AdminRepository $adminRepo)
    {
        $this->adminRepository = $adminRepo;
    }

    /**
     * Display a listing of the Admins.
     * GET|HEAD /admins
     */
    public function index(Request $request): JsonResponse
    {
        $admins = $this->adminRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AdminResource::collection($admins), 'Admins retrieved successfully');
    }

    /**
     * Store a newly created Admin in storage.
     * POST /admins
     */
    public function store(CreateAdminAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $admin = $this->adminRepository->create($input);

        return $this->sendResponse(new AdminResource($admin), 'Admin saved successfully');
    }

    /**
     * Display the specified Admin.
     * GET|HEAD /admins/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Admin $admin */
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            return $this->sendError('Admin not found');
        }

        return $this->sendResponse(new AdminResource($admin), 'Admin retrieved successfully');
    }

    /**
     * Update the specified Admin in storage.
     * PUT/PATCH /admins/{id}
     */
    public function update($id, UpdateAdminAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Admin $admin */
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            return $this->sendError('Admin not found');
        }

        $admin = $this->adminRepository->update($input, $id);

        return $this->sendResponse(new AdminResource($admin), 'Admin updated successfully');
    }

    /**
     * Remove the specified Admin from storage.
     * DELETE /admins/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Admin $admin */
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            return $this->sendError('Admin not found');
        }

        $admin->delete();

        return $this->sendSuccess('Admin deleted successfully');
    }
}
