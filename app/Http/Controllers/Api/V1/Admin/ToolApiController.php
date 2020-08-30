<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreToolRequest;
use App\Http\Requests\UpdateToolRequest;
use App\Http\Resources\Admin\ToolResource;
use App\Models\Tool;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToolApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tool_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ToolResource(Tool::with(['user_asignados'])->get());
    }

    public function store(StoreToolRequest $request)
    {
        $tool = Tool::create($request->all());
        $tool->user_asignados()->sync($request->input('user_asignados', []));

        return (new ToolResource($tool))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tool $tool)
    {
        abort_if(Gate::denies('tool_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ToolResource($tool->load(['user_asignados']));
    }

    public function update(UpdateToolRequest $request, Tool $tool)
    {
        $tool->update($request->all());
        $tool->user_asignados()->sync($request->input('user_asignados', []));

        return (new ToolResource($tool))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tool $tool)
    {
        abort_if(Gate::denies('tool_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tool->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
