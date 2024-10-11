<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('admin.master.brand', compact('brands'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create view not required in this single-page setup
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $data = $request->validated();

        // Menangani upload file
        if ($request->hasFile('icon_brand')) {
            $data['icon_brand'] = $request->file('icon_brand')->store('icons', 'public');
        }

        Brand::create($data);

        return redirect()->route('admin.brands.index')->with('status', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        // Show view not required in this single-page setup
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        // Edit view not required in this single-page setup
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->validated();

        // Menangani upload file jika ada
        if ($request->hasFile('icon_brand')) {
            // Hapus ikon lama jika ada
            if ($brand->icon_brand) {
                Storage::disk('public')->delete($brand->icon_brand);
            }
            $data['icon_brand'] = $request->file('icon_brand')->store('icons', 'public');
        }

        $brand->update($data);

        return redirect()->route('admin.brands.index')->with('status', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('status', 'Brand deleted successfully.');
    }
}
