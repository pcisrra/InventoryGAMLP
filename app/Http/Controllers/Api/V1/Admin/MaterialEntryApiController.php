<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMaterialEntryRequest;
use App\Http\Requests\UpdateMaterialEntryRequest;
use App\Http\Resources\Admin\MaterialEntryResource;
use App\Models\MaterialEntry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaterialEntryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('material_entry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaterialEntryResource(MaterialEntry::with(['material', 'user'])->get());
    }

    public function store(StoreMaterialEntryRequest $request)
    {
        $materialEntry = MaterialEntry::create($request->all());

        return (new MaterialEntryResource($materialEntry))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaterialEntryResource($materialEntry->load(['material', 'user']));
    }

    public function update(UpdateMaterialEntryRequest $request, MaterialEntry $materialEntry)
    {
        $materialEntry->update($request->all());

        return (new MaterialEntryResource($materialEntry))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materialEntry->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
