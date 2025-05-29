<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Piece;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $pieces = Piece::paginate(10);
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        return view('pieces.index', compact('categories', 'pieces', 'cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pieces.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $piece = new Piece();
        $piece->name = $request->name;
        $piece->price = $request->price;
        $piece->state = $request->state;
        $piece->offer = $request->offer;
        $piece->description = $request->description;
        $piece->image = $request->image;
        $piece->save();

        if($request->categories){
            $piece->categories()->attach($request->categories);
        }
        
        return redirect()->route('pieces.show', $piece);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Piece $piece)
    {
        return view('pieces.show', compact('piece'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Piece $piece)
    {
        $categories = Category::all();
        return view('pieces.edit', compact('piece', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piece $piece)
    {
        $piece->name = $request->name;
        $piece->price = $request->price;
        $piece->state = $request->state;
        $piece->offer = $request->offer;
        $piece->description = $request->description;
        $piece->image = $request->image;
        $piece->save();

        if($request->categories){
            if($piece->categories)
                $piece->categories()->sync($request->categories);
        }
        else {
            $piece->categories()->detach();
        }

        return redirect()->route('pieces.show', $piece);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piece $piece)
    {
        $piece->delete();
        return redirect()->route('pieces.index');
    }

    public static function sortByFavorites()
    {
        $categories = Category::all();
        $pieces = Piece::withCount('favoritesLists')->orderBy('favorites_lists_count', 'desc')->paginate(10);
        return view('pieces.index', compact('categories', 'pieces'));
    }

    public function addCategoryToPiece(Piece $piece, Category $category)
    {
        if (!$piece->categories->contains($category->id)) {
            $piece->categories()->attach($category->id);
        }
        return redirect()->route('pieces.show', $piece);
    }

    public function removeCategoryFromPiece(Piece $piece, Category $category)
    {
        if ($piece->categories->contains($category->id)) {
            $piece->categories()->detach($category->id);
        }
        return redirect()->route('pieces.show', $piece);
    }

    public function filterByCategory(Request $request)
    {
        $category_id = $request->input('category_id');

        if ($category_id){
            $pieces = Piece::whereHas('categories', function($query) use ($category_id) {
                $query->where('categories.id', $category_id);
            })->paginate(10);
        } else {
            $pieces = Piece::paginate(10);
        }

        $categories = Category::all();
        return view('pieces.index', compact('pieces', 'categories'));
    }

    public function home(){
        App::setLocale(Session::get('locale'));
        $categories = Category::all();
        $pieces = Piece::withCount('favoritesLists')->orderBy('favorites_lists_count', 'desc')->paginate(10);
        return view('home', compact('pieces'));
    }
}
