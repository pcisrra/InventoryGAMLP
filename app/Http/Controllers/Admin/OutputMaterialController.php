<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOutputMaterialRequest;
use App\Http\Requests\StoreOutputMaterialRequest;
use App\Http\Requests\UpdateOutputMaterialRequest;
use App\Models\Material;
use App\Models\OutputMaterial;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutputMaterialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('output_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputMaterials = OutputMaterial::all();

        return view('admin.outputMaterials.index', compact('outputMaterials'));
    }

    public function create()
    {
        abort_if(Gate::denies('output_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materials = Material::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.outputMaterials.create', compact('materials', 'users'));
    }

    public function store(StoreOutputMaterialRequest $request)
    {
        $outputMaterial = OutputMaterial::create($request->all());

        return redirect()->route('admin.output-materials.index');
    }

    public function edit(OutputMaterial $outputMaterial)
    {
        abort_if(Gate::denies('output_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputMaterial->load('material', 'user');

        return view('admin.outputMaterials.edit', compact('outputMaterial'));
    }

    public function update(UpdateOutputMaterialRequest $request, OutputMaterial $outputMaterial)
    {
        $outputMaterial->update($request->all());

        return redirect()->route('admin.output-materials.index');
    }

    public function show(OutputMaterial $outputMaterial)
    {
        abort_if(Gate::denies('output_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputMaterial->load('material', 'user');

        return view('admin.outputMaterials.show', compact('outputMaterial'));
    }

    public function destroy(OutputMaterial $outputMaterial)
    {
        abort_if(Gate::denies('output_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputMaterial->delete();

        return back();
    }

    public function massDestroy(MassDestroyOutputMaterialRequest $request)
    {
        OutputMaterial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
