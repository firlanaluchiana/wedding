<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
Use Alert;

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
    public function store(Request $request)
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

        $slug = Str::slug($validated['groom_name']);
        $validated['slug'] = $slug;

            if (Wedding::where('slug', $slug)->exists()) {
            $slug .= '-' . Str::slug($request->bride_name) . '-' . $request->wedding_date;
            $validated['slug'] = $slug;
            }

        $validated['groom_image'] = $request->file('groom_image')->store('groom_images');
        $validated['bride_image'] = $request->file('bride_image')->store('bride_images');

        Wedding::create($validated);

        return redirect()->route('wedding.index')->withToastSuccess('Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function showBySlug(Wedding $wedding, $slug): Response
    {
    $wedding = Wedding::where('slug', $slug)->first();

    if ($wedding) {
        return response()->view('wedding.show', ['wedding' => $wedding]);
        } else {
        return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug): Response
    {
        $wedding = Wedding::where('slug', $slug)->firstOrFail();

        return response()->view('wedding.edit', [
            'wedding' => $wedding,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $wedding = Wedding::where('slug', $slug)->firstOrFail();

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

        $slug = Str::slug($validated['groom_name']);
        $validated['slug'] = $slug;

            if (Wedding::where('slug', $slug)->exists()) {
            $slug .= '-' . Str::slug($request->bride_name);
            $validated['slug'] = $slug;
            }

        if ($request->hasFile('groom_image', 'bride_image')) {
            Storage::delete($wedding->groom_images);
            Storage::delete($wedding->bride_images);
            $validated['groom_image'] = $request->file('groom_image')->store('groom_images');
            $validated['bride_image'] = $request->file('bride_image')->store('bride_images');
        }

        $wedding->update($validated);

        return redirect()->route('wedding.index')->withToastSuccess('Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $wedding = Wedding::where('slug', $slug)->firstOrFail();

        $wedding->delete();

        return redirect()->route('wedding.index')->withToastSuccess('Project deleted successfully.');
    }
}
