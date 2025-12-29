<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Exception;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    // Show user's articles
    public function show(){
        try{
            $articles = Articles::orderByDesc('updated_at')->get();
            return response()->json([
                'articles' => $articles,
                'status' => 201
            ]);
        } catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500
            ]);
        }
    }

    // Show user's article by id
    public function view(Request $request, Articles $article){
        try {
            return response()->json([
                'article' => $article,
                'status' => 201
            ]);
        } catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500
            ]);
        }
    }

    // Search user's article by title
    public function search(Request $request){
        $searchValue = $request->searchValue;
        try {
            $articles = Articles::where('title', 'LIKE', '%' . $searchValue . '%')->orderByDesc('updated_at')->get();
            return response()->json([
                'articles' => $articles,
                'status' => 201
            ]);
        } catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500
            ]);
        }
    }

    // Create user's article
    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required'],
            'image' => ['nullable','mimes:jpg,png,webp']
        ]);
        $articleData = [
            'title' => $request->title,
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
        ];
        
        // Upload image to server
        if ($request->has('image')){
            $imageName = time() . "." . $request->file('image')->getClientOriginalExtension();
            $uploadImage = $request->file('image')->move(public_path('images/'), $imageName);
            $articleData['image'] = $imageName;
        }
        try {
            $createArticle = Articles::create($articleData);
            return response()->json([
                'message' => 'مقاله با موفقیت ثبت شد',
                'article' => $createArticle,
                'status' => 201
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500
            ]);
        }
    }

    // Delete user's article
    public function delete(Articles $article){
        try {
            $deleteArticle = $article->delete();
            if (file_exists(public_path("images/$article->image")) && $article->image != null){
                unlink(public_path("images/$article->image"));
            }
            return response()->json([
                'message' => 'مقاله با موفقیت حذف شد',
                'status' => 201
            ]);
        } catch(Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500
            ]);
        }

    }

    // Update user's article
    public function update(Request $request, Articles $article){
        $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required'],
            'image' => ['nullable','mimes:jpg,png,webp']
        ]);
        $articleData = [
            'title' => $request->title,
            'content' => $request->input('content'),
        ];
        // Upload image to server
        if ($request->has('image')){
            if (file_exists(public_path("images/$article->image"))){
                unlink(public_path("images/$article->image"));
            }
            $imageName = time() . "." . $request->file('image')->getClientOriginalExtension();
            $uploadImage = $request->file('image')->move(public_path('images/'), $imageName);
            $articleData['image'] = $imageName;
        }
        try {
            $updateArticle = $article->update($articleData);
            return response()->json([
                'message' => 'مقاله با موفقیت ویرایش شد',
                'article' => $updateArticle,
                'status' => 201
            ]);
        } catch(Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500
            ]);
        }
    }
}
