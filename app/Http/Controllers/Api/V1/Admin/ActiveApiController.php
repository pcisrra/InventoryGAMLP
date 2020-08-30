<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActiveRequest;
use App\Http\Requests\UpdateActiveRequest;
use App\Http\Resources\Admin\ActiveResource;
use App\Models\Active;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiveApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('active_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActiveResource(Active::with(['ubications'])->get());
    }

    public function store(StoreActiveRequest $request)
    {
        $active = Active::create($request->all());
        $active->ubications()->sync($request->input('ubications', []));

        return (new ActiveResource($active))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Active $active)
    {
        abort_if(Gate::denies('active_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActiveResource($active->load(['ubications']));
    }

    public function update(UpdateActiveRequest $request, Active $active)
    {
        $active->update($request->all());
        $active->ubications()->sync($request->input('ubications', []));

        return (new ActiveResource($active))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Active $active)
    {
        abort_if(Gate::denies('active_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $active->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
