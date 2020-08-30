<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOutputMaterialRequest;
use App\Http\Requests\UpdateOutputMaterialRequest;
use App\Http\Resources\Admin\OutputMaterialResource;
use App\Models\OutputMaterial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutputMaterialApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('output_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutputMaterialResource(OutputMaterial::with(['material', 'user'])->get());
    }

    public function store(StoreOutputMaterialRequest $request)
    {
        $outputMaterial = OutputMaterial::create($request->all());

        return (new OutputMaterialResource($outputMaterial))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OutputMaterial $outputMaterial)
    {
        abort_if(Gate::denies('output_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutputMaterialResource($outputMaterial->load(['material', 'user']));
    }

    public function update(UpdateOutputMaterialRequest $request, OutputMaterial $outputMaterial)
    {
        $outputMaterial->update($request->all());

        return (new OutputMaterialResource($outputMaterial))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OutputMaterial $outputMaterial)
    {
        abort_if(Gate::denies('output_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputMaterial->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
