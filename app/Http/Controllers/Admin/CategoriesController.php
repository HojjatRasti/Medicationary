<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\UpdateRequest;
use App\Models\Answer;
use App\Models\Answer_category;
use App\Models\Podcast_category;
use App\Models\Post_category;
use App\Models\Webinar_category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function landscapeWebinar(){

        $currentUser = auth()->user();

        $webinar_categories = Webinar_category::get();

        return view('admin.webinars.category', compact('webinar_categories', 'currentUser'));
    }

    public function landscapeArticles(){

        $currentUser = auth()->user();

        $post_categories = Post_category::get();

        return view('admin.articles.category', compact('currentUser', 'post_categories'));
    }

    public function landscapePodcast(){

        $currentUser = auth()->user();

        $podcast_categories = Podcast_category::get();

        return view('admin.podcasts.category', compact('currentUser', 'podcast_categories'));
    }

    public function landscapeInquiries(){

        $currentUser = auth()->user();

        $answer_categories = Answer_category::get();

        return view('admin.inquiries.category', compact('currentUser', 'answer_categories'));
    }

    public function store(CreateRequest $request){
        $validatedData = $request->validated() ;
        $url = url()->full();
        $lastWord = substr($url, strrpos($url, '/') + 1);

        switch ($lastWord){
            case "Post":
                $createdCategory = Post_category::create([
                    'title' => $validatedData['title'],
                ]);
                break;
            case "Podcast":
                $createdCategory = Podcast_category::create([
                    'title' => $validatedData['title'],
                ]);
                break;
            case "Answer":
                $createdCategory = Answer_category::create([
                    'title' => $validatedData['title'],
                ]);
                break;
            case "Webinar":
                $createdCategory = Webinar_category::create([
                    'title' => $validatedData['title'],
                ]);
                break;
        }

        if (!$createdCategory){
            return back()->with('failed','عملیات موفقیت آمیز نبود:(');
        }
        return back()->with('success', 'عملیات موفقیت آمیز بود:)');
//        if ($lastWord = 'Post'){
//            $createdCategory = Post_category::create([
//                'title' => $validatedData['title'],
//            ]);
//        }
//        if($lastWord = 'Podcast'){
//            $createdCategory = Podcast_category::create([
//                'title' => $validatedData['title'],
//            ]);
//        }
//        if ($lastWord = 'Answer'){
//            $createdCategory = Answer_category::create([
//                'title' => $validatedData['title'],
//            ]);
//        }
//        if ($lastWord = 'Webinar'){
//            $createdCategory = Webinar_category::create([
//                'title' => $validatedData['title'],
//            ]);
//        }
    }

    public function delete($category_id){

        $url = url()->full();
        $lastWord = substr($url, strrpos($url, '/') + 1);

        switch ($lastWord){
            case "deletePost":
                $category = Post_category::find($category_id);
                $category->delete();
            break;
            case "deletePodcast":
                $category = Podcast_category::find($category_id);
                $category->delete();
            break;
            case "deleteAnswer":
                $category = Answer_category::find($category_id);
                $category->delete();
            break;
            case "deleteWebinar":
                $category = Webinar_category::find($category_id);
                $category->delete();
            break;

        }

        return back()->with('success','دسته بندی حذف شد');

    }

    public function edit($category_id){

        $currentUser = auth()->user();

        $url = url()->full();
        $lastWord = substr($url, strrpos($url, '/') + 1);

        switch ($lastWord){
            case "articles":
                $category = Post_category::find($category_id);
            break;
            case "podcasts":
                $category = Podcast_category::find($category_id);
            break;
            case "inquiries":
                $category = Answer_category::find($category_id);
            break;
            case "webinars":
                $category = Webinar_category::find($category_id);
            break;
        }

        return view('admin.' . $lastWord .'.editCategory', compact('category', 'currentUser'));
    }

    public function update(UpdateRequest $request,$category_id){

        $validatedData = $request->validated();

        $url = url()->full();
        $lastWord = substr($url, strrpos($url, '/') + 1);

        switch ($lastWord){
            case "updatePost":
                $category = Post_category::findOrFail($category_id);
                $update = $category->Update([
                    'title' => $validatedData['title']
                ]);
            break;
            case "updatePodcast":
                $category = Podcast_category::findOrFail($category_id);
                $update = $category->Update([
                    'title' => $validatedData['title']
                ]);
            break;
            case "updateAnswer":
                $category = Answer_category::findOrFail($category_id);
                $update = $category->Update([
                    'title' => $validatedData['title']
                ]);
            break;
            case "updateWebinar":
                $category = Webinar_category::findOrFail($category_id);
                $update = $category->Update([
                    'title' => $validatedData['title']
                ]);
            break;
        }

        if (!$update){
            return back()->with('failed','خطا در بروزرسانی دسته بندی');
        }
        return back()->with('success', 'دسته بندی با موفقیت به روزرسانی شد');
    }

}
