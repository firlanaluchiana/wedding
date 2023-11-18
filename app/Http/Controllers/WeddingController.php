<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('wedding.index', [
            'weddings' => Wedding::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('wedding.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'groom_name' => 'required',
            'bride_name' => 'required',
            'groom_bio' => 'required',
            'bride_bio' => 'required',
            'groom_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bride_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'wedding_date' => 'required',
            'venue' => 'required',
            'city' => 'required',
        ]);

        $validated['groom_image'] = $request->file('groom_image')->store('groom_images');
        $validated['bride_image'] = $request->file('bride_image')->store('bride_images');

        Wedding::create($validated);

        return redirect()->route('wedding.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wedding $wedding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Response
    {
        $wedding = Wedding::where('id', $id)->firstOrFail();

        return response()->view('wedding.edit', [
            'wedding' => $wedding,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): ReddirectResponse
    {
        $wedding = Wedding::where('id', $id)->firstOrFail();

        $validated = $request->validate([
            'groom_name' => 'required',
            'bride_name' => 'required',
            'groom_bio' => 'required',
            'bride_bio' => 'required',
            'groom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bride_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'wedding_date' => 'required',
            'venue' => 'required',
            'city' => 'required',
        ]);

        if ($request->hasFile('groom_image', 'bride_image')) {
            Storage::delete($wedding->groom_images);
            Storage::delete($wedding->bride_images);
            $validated['groom_image'] = $request->file('groom_image')->store('groom_images');
            $validated['bride_image'] = $request->file('bride_image')->store('bride_images');
        }

        $wedding->update($validated);

        return redirect()->route('wedding.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $wedding = Wedding::where('id', $id)->firstOrFail();

        $wedding->delete();

        return redirect()->route('wedding.index');
    }
}