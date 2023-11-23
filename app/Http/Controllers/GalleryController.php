<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gallery;
use App\Models\Wedding;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
Use Alert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        if (Gate::allows('isAdmin')) {
            return response()->view('gallery.index', [
                'gallerys' => Gallery::all(),
        ]);
        } else {
            return response()->view('gallery.index', [
                'gallerys' => Gallery::where('user_id', Auth::user()->id)->get(),
        ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Wedding $wedding): Response
    {
        return response()->view('gallery.create', [
            'wedding' => $wedding,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Wedding $wedding, Gallery $gallery, User $user ): RedirectResponse
    {
        $wedding = Wedding::find($wedding->id);

        if (Gate::denies('isGuest')) {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = Auth::user()->id;
        $validated['user_id'] = $user_id;
        $validated['wedding_id'] = $wedding->id;

        $validated['image'] = $request->file('image')->store('gallery_images');

        Gallery::create($validated);

        return redirect()->route('wedding.index')->withToastSuccess('Gallery created successfully.');
        }else {
            return redirect()->route('wedding.index')->withToastError('Gallery created failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wedding $wedding, Gallery $gallery): Response
    {
        return response()->view('gallery.edit', [
            'gallery' => $gallery,
            'wedding' => $wedding,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wedding $wedding, Gallery $gallery): RedirectResponse
    {
        if (Gate::denies('isGuest')) {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($gallery->image);
            $validated['image'] = $request->file('image')->store('gallery_images');
        }

        $gallery->update($validated);

        return redirect()->route('gallery.index')->withToastSuccess('Gallery updated successfully.');
        }else {
            return redirect()->route('gallery.index')->withToastError('Gallery updated failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wedding $wedding, Gallery $gallery): RedirectResponse
    {
        if (Gate::allows('isAdmin')) {

            $gallery->delete();

            Storage::delete($gallery->image);

            return redirect()->route('gallery.index')->withToastSuccess('Gallery deleted successfully.');
        } else {
            return redirect()->route('gallery.index')->withToastError('Gallery deleted failed.');
        }
    }
}
