<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Story;
use App\Models\Wedding;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
Use Alert;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        if (Gate::allows('isAdmin')) {
            return response()->view('story.index', [
                'storys' => Story::all(),
        ]);
        } else {
            return response()->view('story.index', [
                'storys' => Story::where('user_id', Auth::user()->id)->get(),
        ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Wedding $wedding): Response
    {
        return response()->view('story.create', [
            'wedding' => $wedding,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Wedding $wedding, Story $story, User $user ): RedirectResponse
    {
        $wedding = Wedding::find($wedding->id);

        if (Gate::denies('isGuest')) {
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = Auth::user()->id;
        $validated['user_id'] = $user_id;
        $validated['wedding_id'] = $wedding->id;

        $validated['image'] = $request->file('image')->store('story_images');

        Story::create($validated);

        return redirect()->route('story.index')->withToastSuccess('Story created successfully.');
        }else {
            return redirect()->route('story.index')->withToastError('Story created failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story): RedirectResponse
    {
        if (Gate::allows('isAdmin')) {

            $story->delete();

            Storage::delete($story->image);

            return redirect()->route('story.index')->withToastSuccess('Story deleted successfully.');
        } else {
            return redirect()->route('story.index')->withToastError('Story deleted failed.');
        }
    }
}
