<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CrudRequest;
use App\Models\Crud;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('crud.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrudRequest $request)
    {
        $validatedData = $request->validated();
        $image = $request->file('image');
        $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move('site/Upload', $imageName);
        $validatedData['image'] = $imageName;
        Crud::create($validatedData);
        return redirect()->route('crud.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $crud = Crud::find($id);
        return view('crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CrudRequest $request, Crud $crud)
    {
        $validatedData = $request->validated();
        $image = $request->file('image');
        if ($image) {
            File::delete('site/Upload/'. $crud->image);
            $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('site/Upload', $imageName);
            $validatedData['image'] = $imageName;
        }
        $crud->update($validatedData);
        return redirect()->route('crud.edit', $crud);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
