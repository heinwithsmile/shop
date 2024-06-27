<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        
        return view('admin.banner.list')->with('banners', $banners);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request,
            [
                'title' => 'required|string',
                'description' => 'required|string',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );
        if($request->hasFile('photo')){
            $validated['photo'] = $request->file('photo')->store('images/banners', 'public');
        }
        Banner::create($validated);
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if(!empty($banner)){
            $banner->delete();
            return redirect()->route('banner.index')->with('message', 'Deleted');
        }
        return redirect()->route('banner.index')->with('message', 'Could not delete!');
    }
}
