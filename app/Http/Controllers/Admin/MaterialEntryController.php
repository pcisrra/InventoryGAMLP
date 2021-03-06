<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMaterialEntryRequest;
use App\Http\Requests\StoreMaterialEntryRequest;
use App\Http\Requests\UpdateMaterialEntryRequest;
use App\Models\Material;
use App\Models\MaterialEntry;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;

class MaterialEntryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('material_entry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materialEntries = MaterialEntry::all();

        return view('admin.materialEntries.index', compact('materialEntries'));
    }

    public function create()
    {
        abort_if(Gate::denies('material_entry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materials = Material::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.materialEntries.create', compact('materials', 'users'));
    }

    public function store(StoreMaterialEntryRequest $request)
    {
        $materialEntry = MaterialEntry::create($request->all());
        DB::select("CALL updateFechaSalida()");
        return redirect()->route('admin.material-entries.index');
    }

    public function edit(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materialEntry->load('material', 'user');

        return view('admin.materialEntries.edit', compact('materialEntry'));
    }

    public function update(UpdateMaterialEntryRequest $request, MaterialEntry $materialEntry)
    {
        $materialEntry->update($request->all());

        return redirect()->route('admin.material-entries.index');
    }

    public function show(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materialEntry->load('material', 'user');

        return view('admin.materialEntries.show', compact('materialEntry'));
    }

    public function destroy(MaterialEntry $materialEntry)
    {
        abort_if(Gate::denies('material_entry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materialEntry->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaterialEntryRequest $request)
    {
        MaterialEntry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
