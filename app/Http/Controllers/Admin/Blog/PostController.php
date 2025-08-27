<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogRequest;
use App\Http\Requests\Admin\Blog\UpdateRequest;
use App\Models\Post;
use App\Models\Post_category;
use App\Utilities\ImageUploader;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUser = auth()->user();

        $posts = Post::latest()->with('user')->paginate(5);

        return view('admin.articles.index', compact('currentUser', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentUser = auth()->user();

        $categories = Post_category::get();

        return view('admin.articles.add', compact('currentUser', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $currentUser = auth()->user();

        $validatedData = $request->validated();

        $array_categories = [];

        foreach ($validatedData['cat'] as $cat){
            $array_categories[] = Post_category::where('id',$cat)->value('title');
        }

        $string_cat = implode(', ', $array_categories);

        $createdPost = Post::create([
            'user_id' => $currentUser['id'],
            'title' => $validatedData['title'],
            'category_id' =>$string_cat ,
            'abstract' => $validatedData['abstract'],
            'body' => $validatedData['quillBody'],
            'meta_description' => $validatedData['meta_description'],
            'meta_title' => $validatedData['meta_title'],
            'schema' => $validatedData['schema'],
            'author' => $validatedData['author'],
        ]);

        if (!$this->uploadImage($createdPost, $validatedData) or !$createdPost){
            return back()->with('failed', 'خطا در ایجاد پست');
        }

        return back()->with('success', 'پست با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post_id)
    {
        $currentUser = auth()->user();

        $post = Post::findOrFail($post_id);

        $categories = Post_category::get();

        return view('admin.articles.edit', compact('post','currentUser', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $post_id)
    {
        $currentUser = auth()->user();

        $validatedData = $request->validated();

        $post = Post::findOrFail($post_id);

        $array_categories = [];

        foreach ($validatedData['cat'] as $cat){
            $array_categories[] = Post_category::where('id',$cat)->value('title');
        }

        $string_cat = implode(', ', $array_categories);

        $updatePost = $post->Update([
            'user_id' => $currentUser['id'],
            'title' => $validatedData['title'],
            'category_id' =>$string_cat ,
            'abstract' => $validatedData['abstract'],
            'body' => $validatedData['quillBody'],
            'meta_description' => $validatedData['meta_description'],
            'meta_title' => $validatedData['meta_title'],
            'schema' => $validatedData['schema'],
            'author' => $validatedData['author'],
        ]);

        if (!$this->uploadImage($post, $validatedData) or !$updatePost){
            return back()->with('failed', 'خطا در بروزرسانی پست');
        }

        return back()->with('success', 'پست به روزرسانی شدند');
    }

    public function download($post_id)
    {
        dd();
        $post = Post::findOrFail($post_id);

        return response()->download(public_path($post->post_url));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($post_id)
    {
        $post = Post::findOrFail($post_id);

        $post->delete();

        return back()->with('success', 'پست با موفقیت حذف شد');
    }

    private function uploadImage($createdPost, $validatedData)
    {
        try {
            $data = [];

            if (isset($validatedData['thumbnail_url'])){
                $path = 'Posts/' . $createdPost->id . '/' . $validatedData['thumbnail_url']->getClientOriginalName();

                ImageUploader::Upload($validatedData['thumbnail_url'],$path,'public_storage');

                $data += ['thumbnail_url' => $path] ;
            }

            if (isset($validatedData['post_url'])){
                $path = 'Posts/' . $createdPost->id . '/' . $validatedData['post_url']->getClientOriginalName();

                ImageUploader::Upload($validatedData['post_url'],$path,'public_storage');

                $data += ['post_url' => $path] ;
            }

            $updatedPost = $createdPost->Update($data);

            if(!$updatedPost){
                throw new \Exception('تصویر آپلود نشد');
            }

            return true;

        }catch (\Exception $e){
            return false;
        }
    }
}


