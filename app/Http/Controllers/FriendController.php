<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use App\Models\Wedding;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
Use Alert;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        if (Gate::allows('isAdmin')) {
            return response()->view('friend.index', [
                'friends' => Friend::all(),
        ]);
        } else {
            return response()->view('friend.index', [
                'friends' => Friend::where('user_id', Auth::user()->id)->get(),
        ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Wedding $wedding): Response
    {
        return response()->view('friend.create', [
            'wedding' => $wedding,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Wedding $wedding, Friend $friend, User $user ): RedirectResponse
    {
        $wedding = Wedding::find($wedding->id);

        if (Gate::denies('isGuest')) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = Auth::user()->id;
        $validated['user_id'] = $user_id;
        $validated['wedding_id'] = $wedding->id;

        $validated['image'] = $request->file('image')->store('friend_images');

        Friend::create($validated);

        return redirect()->route('wedding.index')->withToastSuccess('Friend created successfully.');
        }else {
            return redirect()->route('wedding.index')->withToastError('Friend created failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wedding $wedding, Friend $friend): Response
    {
        return response()->view('friend.edit', [
            'friend' => $friend,
            'wedding' => $wedding,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wedding $wedding, Friend $friend): RedirectResponse
    {
        if (Gate::denies('isGuest')) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($friend->image);
            $validated['image'] = $request->file('image')->store('friend_images');
        }

        $friend->update($validated);

        return redirect()->route('friend.index')->withToastSuccess('Friend updated successfully.');
        }else {
            return redirect()->route('friend.index')->withToastError('Friend updated failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wedding $wedding, Friend $friend): RedirectResponse
    {
        if (Gate::allows('isAdmin')) {

            $friend->delete();

            Storage::delete($friend->image);

            return redirect()->route('friend.index')->withToastSuccess('Friend deleted successfully.');
        } else {
            return redirect()->route('friend.index')->withToastError('Friend deleted failed.');
        }
    }
}
