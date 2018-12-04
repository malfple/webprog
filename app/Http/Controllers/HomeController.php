<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Comment;
use Validator;

class HomeController extends Controller
{
    // GET
    // shows home view, with optional search feature
    public function showHome(Request $request){
        $posts = Post::where('post_name', 'like', '%'.$request->search.'%')->paginate(10);
        return view('home', compact('posts'));
    }

    // GET
    // show myPosts view
    public function showMyPosts(){
        if(!Auth::check())return redirect('/');
        $posts = Auth::user()->posts()->paginate(5);
        return view('myPost', compact('posts'));
    }

    // GET
    // show the add post form
    public function showInsertPost(){
        if(!Auth::check())return redirect('/');
        $categories = Category::all();
        $error = "";
        return view('insertPost', compact('error', 'categories'));
    }

    // POST
    // validates inserted post, if accepted -> insert to database
    public function insertPost(Request $request){
        $categories = Category::all();
        if(strlen($request->title) < 20 || strlen($request->title) > 200){
            $error = "title must be between 20 and 200 characters";
            return view('insertPost', compact('error', 'categories'));
        }
        if(strlen($request->caption) < 1){
            $error = "caption must be filled";
            return view('insertPost', compact('error', 'categories'));
        }
        if(!$request->picture){
            $error = "browse file";
            return view('insertPost', compact('error', 'categories'));
        }
        $validator = Validator::make($request->all(), [
            'picture' => 'mimes:jpeg,png',
        ]);
        if($validator->fails()){
            $error = "file extension has to be .png/.jpg/.jpeg";
            return view('insertPost', compact('error', 'categories'));
        }
        if(!is_numeric($request->price)){
            $error = "price has to be integer";
            return view('insertPost', compact('error', 'categories'));
        }
        if(!$request->category){
            $error = "select a category";
            return view('insertPost', compact('error', 'categories'));
        }
        $post = new Post;
        $post->post_name = $request->title;
        $post->post_caption = $request->caption;
        $post->post_price = $request->price;
        $pic_url = $request->picture->store('public');
        $post->post_picture = substr($pic_url, 7);
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;
        $post->save();
        $error = "post added successfully";
        return view('insertPost', compact('error', 'categories'));
    }

    // GET
    // show followed posts view
    public function showFollowedPosts(){    
        if(!Auth::check())return redirect('/');
        $posts = Post::whereHas('category', function($query){
            $query->whereHas('users', function($query2){
                $query2->where('user_id', Auth::user()->id);
            });
        })->paginate(10);
        //return $posts;
        return view('followedPost', compact('posts'));
    }

    // GET
    // show post detail view
    public function showPostDetail($id){
        //return redirect('/testPostDetail');
        $post = Post::where('id', $id)->first();
        $owner = $post->user;
        $category = $post->category;
        $comments = $post->comments;
        $error = "";
        if(Auth::check()){
            $isOwner = Auth::user()->id == $owner->id;
            //return $comments;
            return view('postDetail', compact('post', 'owner', 'category', 'comments', 'error', 'isOwner'));
        }else{
            return view('postDetail', compact('post', 'owner', 'category', 'comments', 'error'));
        }
    }

    // POST
    // validates comment and insert
    public function addComment(Request $request){
        if(strlen($request->comment) < 1){
            $id = $request->post_id;
            $post = Post::where('id', $id)->first();
            $owner = $post->user;
            $category = $post->category;
            $comments = $post->comments;
            $error = "comment must be filled";
            $isOwner = Auth::user()->id == $owner->id;
            return view('postDetail', compact('post', 'owner', 'category', 'comments', 'error', 'isOwner'));
        }

        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect('/postDetail/'.$request->post_id);
    }

    // GET
    // deletes post
    public function deletePost($id){
        if(!Auth::check())return redirect('/');
        $post = Post::where('id', $id)->first();
        if($post->user->user_name != Auth::user()->user_name){
            if(Auth::user()->user_role != 'Admin')return redirect('/');
        }
        $post->delete();
        return redirect('/');
    }
}
