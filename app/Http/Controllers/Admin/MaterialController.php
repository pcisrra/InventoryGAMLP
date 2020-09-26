<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMaterialRequest;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Models\Location;
use App\Models\Material;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;

class MaterialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materials = Material::all();

        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        abort_if(Gate::denies('material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizations = Location::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.materials.create', compact('localizations'));
    }

    public function store(StoreMaterialRequest $request)
    {
        $material = Material::create($request->all());

        return redirect()->route('admin.materials.index');
    }

    public function edit(Material $material)
    {
        abort_if(Gate::denies('material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localizations = Location::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material->load('localization');

        return view('admin.materials.edit', compact('localizations', 'material'));
    }

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $material->update($request->all());

        return redirect()->route('admin.materials.index');
    }

    public function show(Material $material)
    {
        abort_if(Gate::denies('material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $material->load('localization');

        return view('admin.materials.show', compact('material'));
    }

    public function destroy(Material $material)
    {
        abort_if(Gate::denies('material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $material->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaterialRequest $request)
    {
        Material::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public static function enterMat($codigo_material, $cantidad){
        DB::select("UPDATE materials SET quantity = quantity + ? WHERE code = ?", [$cantidad, $codigo_material]);
        DB::select("DELETE FROM material_entries ORDER BY id DESC LIMIT 1");
        return back();
    }

    public static function exitMat($codigo_material, $cantidad){
        DB::select("UPDATE materials SET quantity = quantity - ? WHERE code = ?", [$cantidad, $codigo_material]);
        DB::select("DELETE FROM output_materials ORDER BY id DESC LIMIT 1");
        return back();
    }
}