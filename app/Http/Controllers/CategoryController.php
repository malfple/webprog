<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoryController extends Controller
{
    public function showFollowedCategories(){
        if(!Auth::check())return redirect('/');
        $categories = Category::all();
        $followCat = Auth::user()->categories;
        $isActive = array_fill(0, $categories->count(), 0);
        foreach($categories as $i => $category){
            if($followCat->where('id', $category->id)->count() > 0){
                $isActive[$i] = 1;
            }
        }
        return view('/followedCategories', compact('categories', 'isActive'));
    }

    public function updateFollowedCategories(Request $request){
        $user = Auth::user();
        $categories = Category::all();
        $user->categories()->detach();
        foreach($categories as $i => $category){
            if($request->input($i) == '1'){
                $user->categories()->attach($category->id);
            }
        }
        return redirect('/manageFollowedCategories');
    }
}
