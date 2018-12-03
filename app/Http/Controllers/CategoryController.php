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

    public function showManageCategories(){
        if(!Auth::check())return redirect('/');
        if(Auth::user()->user_role != 'Admin')return redirect('/');
        $categories = Category::all();
        return view('manageCategories', compact('categories'));
    }

    public function showUpdateCategory($id){
        if(!Auth::check())return redirect('/');
        if(Auth::user()->user_role != 'Admin')return redirect('/');
        $category = Category::where('id', $id)->first();
        $error = "";
        return view('updateCategory', compact('category', 'error'));
    }

    public function updateCategory(Request $request){
        if(strlen($request->name) < 3 || strlen($request->name > 20)){
            $category = Category::where('id', $request->id)->first();
            $error = "category name must be between 3 and 20 characters";
            return view('updateCategory', compact('category', 'error'));
        }
        $category = Category::where('id', $request->id)->first();
        $category->category_name = $request->name;
        $category->save();
        $error = "category updated";
        return view('updateCategory', compact('category', 'error'));
    }

    public function deleteCategory($id){
        if(!Auth::check())return redirect('/');
        if(Auth::user()->user_role != 'Admin')return redirect('/');
        $category = Category::where('id', $request->id)->first();
        //$category->delete();
        // uncomment the above line to enable delete
        return redirect('/manageCategories');
    }

    public function showAddCategory(){
        if(!Auth::check())return redirect('/');
        if(Auth::user()->user_role != 'Admin')return redirect('/');
        $error = "";
        return view('insertCategory', compact('error'));
    }

    public function addCategory(Request $request){
        if(strlen($request->name) < 3 || strlen($request->name) > 20){
            $error = "category name must be between 3 and 20 characters";
            return view('insertCategory', compact('error'));
        }
        $category = new Category;
        $category->category_name = $request->name;
        $category->save();
        $error = "category added";
        return view('insertCategory', compact('error'));
    }
}
