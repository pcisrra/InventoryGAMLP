<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyActiveRequest;
use App\Http\Requests\StoreActiveRequest;
use App\Http\Requests\UpdateActiveRequest;
use App\Models\Active;
use App\Models\Location;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiveController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('active_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actives = Active::all();

        return view('admin.actives.index', compact('actives'));
    }

    public function create()
    {
        abort_if(Gate::denies('active_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ubications = Location::all()->pluck('code', 'id');

        return view('admin.actives.create', compact('ubications'));
    }

    public function store(StoreActiveRequest $request)
    {
        $active = Active::create($request->all());
        $active->ubications()->sync($request->input('ubications', []));

        return redirect()->route('admin.actives.index');
    }

    public function edit(Active $active)
    {
        abort_if(Gate::denies('active_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ubications = Location::all()->pluck('code', 'id');

        $active->load('ubications');

        return view('admin.actives.edit', compact('ubications', 'active'));
    }

    public function update(UpdateActiveRequest $request, Active $active)
    {
        $active->update($request->all());
        $active->ubications()->sync($request->input('ubications', []));

        return redirect()->route('admin.actives.index');
    }

    public function show(Active $active)
    {
        abort_if(Gate::denies('active_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $active->load('ubications');

        return view('admin.actives.show', compact('active'));
    }

    public function destroy(Active $active)
    {
        abort_if(Gate::denies('active_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $active->delete();

        return back();
    }

    public function massDestroy(MassDestroyActiveRequest $request)
    {
        Active::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
