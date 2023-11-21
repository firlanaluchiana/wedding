<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
Use Alert;

class WeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        if (Gate::allows('isAdmin')) {
            return response()->view('wedding.index', [
                'weddings' => Wedding::all(),
        ]);
        } else {
            return response()->view('wedding.index', [
                'weddings' => Wedding::where('user_id', Auth::user()->id)->get(),
        ]);
        }
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
        if (Gate::denies('isGuest')) {
        $validated = $request->validate([
            'groom_name' => 'required',
            'bride_name' => 'required',
            'groom_bio' => 'required',
            'bride_bio' => 'required',
            'groom_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bride_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'wedding_date' => 'required',
            'ceremony' => 'required',
            'ceremony_start' => 'required',
            'ceremony_end' => 'required',
            'party' => 'required',
            'party_start' => 'required',
            'party_end' => 'required',
            'street' => 'required',
            'venue' => 'required',
            'city' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $validated['user_id'] = $user_id;

        $slug = Str::slug($validated['groom_name']);
        $validated['slug'] = $slug;

            if (Wedding::where('slug', $slug)->exists()) {
            $slug .= '-' . Str::slug($request->bride_name) . '-' . $request->wedding_date;
            $validated['slug'] = $slug;
            }

        $validated['groom_image'] = $request->file('groom_image')->store('groom_images');
        $validated['bride_image'] = $request->file('bride_image')->store('bride_images');

        Wedding::create($validated);

        return redirect()->route('wedding.index')->withToastSuccess('Wedding created successfully.');
        }else {
            return redirect()->route('wedding.index')->withToastError('Wedding created failed.');
        }
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
        $user = User::find(Auth::user()->id);
        $wedding = Wedding::where('slug', $slug)->firstOrFail();

        if (Gate::forUser($user)->allows('update-post', $wedding)) {
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

        return redirect()->route('wedding.index')->withToastSuccess('Wedding updated successfully.');
        }else {
            return redirect()->route('wedding.index')->withToastError('Wedding updated failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        if (Gate::allows('isAdmin')) {

            $wedding = Wedding::where('slug', $slug)->firstOrFail();
            $wedding->delete();

            return redirect()->route('wedding.index')->withToastSuccess('Wedding deleted successfully.');
        } else {
            return redirect()->route('wedding.index')->withToastError('Wedding deleted failed.');
        }

    }
}
