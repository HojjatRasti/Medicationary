<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
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

        $fingerprint = $request->input('fingerprint');
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');

        $specificPost= Post::findOrFail($postId);
        $likesNumber = $specificPost->value('likes');

        if($request['likeStatus'] == 1){
            $userId = Str::uuid();    //  UUID (Universally Unique Identifier) - pseudo-anonymous user ID.
            Cookie::queue('user_id', $userId, 60 * 24 * 365 * 5); // 5 years
            Comment::create([
                'post_id' => $postId,
                'fingerprint' => $fingerprint,
                'user_cookie' => $userId,
                'ip_address' => $ip,
                'user_agent' => $userAgent
            ]);
            $specificPost->Update([
                'likes' => $likesNumber + 1
            ]);
            return response(1);

        } else {
            $specificPost->Update([
                'likes' => $likesNumber - 1
            ]);
            Comment::where('post_id', $postId)->where('fingerprint', $fingerprint)->delete();

            return response(0);
        }

    }
}
