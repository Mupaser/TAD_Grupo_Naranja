<?php

namespace App\Http\Controllers;

use App\Models\FavoritesList;
use Illuminate\Http\Request;

class FavoritesListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favoritesLists = FavoritesList::paginate(10);
        return view('favoritesLists.index', compact('favoritesLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('favoritesLists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $favoritesList = new FavoritesList();
        $favoritesList->user_id = $request->user_id;
        $favoritesList->save();
        return redirect()->route('favoritesLists.show',$favoritesList);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FavoritesList $favoritesList)
    {
        return view('favoritesLists.show', compact('favoritesList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FavoritesList $favoritesList)
    {
        return view('favoritesLists.edit', compact('favoritesList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FavoritesList $favoritesList)
    {
        $favoritesList->user_id = $request->user_id;
        $favoritesList->save();
        return redirect()->route('favoritesLists.show',$favoritesList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FavoritesList $favoritesList)
    {
        $favoritesList->delete();
        return redirect()->route('favoritesLists.index');
    }

    public function addPieceToFavoritesList(Request $request)
    {
        $favoritesList = FavoritesList::where('user_id', $request->user_id)->first();
        
        if (!$favoritesList) {
            $favoritesList = new FavoritesList();
            $favoritesList->user_id = $request->user_id;
            $favoritesList->save();
        }

        if (!$favoritesList->pieces->contains($request->piece_id)) {
            $favoritesList->pieces()->attach($request->piece_id);
        }

        return redirect()->route('pieces.index');
    }
    
    public function removePieceFromFavoritesList(Request $request, $user_id, $piece_id)
    {
        $favoritesList = FavoritesList::where('user_id', $user_id)->first();

        if ($favoritesList) {
            $favoritesList->pieces()->detach($piece_id);
        }

        return redirect()->route('pieces.index');
    }

    public static function countPiecesInFavoritesList($user_id)
    {
        $favoritesList = FavoritesList::where('user_id', $user_id)->first();
        if ($favoritesList) {
            return $favoritesList->pieces->count();
        }
        return 0;
    }
}
