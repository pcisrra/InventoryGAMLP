<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Resources\Admin\LocationResource;
use App\Models\Location;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocationResource(Location::all());
    }

    public function store(StoreLocationRequest $request)
    {
        $location = Location::create($request->all());

        if ($request->input('ref_picture', false)) {
            $location->addMedia(storage_path('tmp/uploads/' . $request->input('ref_picture')))->toMediaCollection('ref_picture');
        }

        return (new LocationResource($location))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Location $location)
    {
        abort_if(Gate::denies('location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocationResource($location);
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->all());

        if ($request->input('ref_picture', false)) {
            if (!$location->ref_picture || $request->input('ref_picture') !== $location->ref_picture->file_name) {
                if ($location->ref_picture) {
                    $location->ref_picture->delete();
                }

                $location->addMedia(storage_path('tmp/uploads/' . $request->input('ref_picture')))->toMediaCollection('ref_picture');
            }
        } elseif ($location->ref_picture) {
            $location->ref_picture->delete();
        }

        return (new LocationResource($location))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Location $location)
    {
        abort_if(Gate::denies('location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $location->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
