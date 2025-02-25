<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function storeLike(Request $request, $postId){
        $userId = $request->cookie('user_id');

//  UUID (Universally Unique Identifier) - pseudo-anonymous user ID.

        if (!$userId) {
            $userId = Str::uuid();
            Cookie::queue('user_id', $userId, 60 * 24 * 365 * 5); // 5 years
        }

        try {
            Comment::create([
                'post_id' => $postId,
                'user_id' => $userId,
            ]);

            return response()->json(['message' => 'Like added'], 200); // Or redirect

        } catch (QueryException $e) {
            if ($e->getCode() === '23000') { // Duplicate entry error code
                return response()->json(['message' => 'You have already liked this post.'], 400); // Or appropriate error code
            }

            // Handle other database errors
            return response()->json(['message' => 'An error occurred.'], 500);
        }

    }
}
