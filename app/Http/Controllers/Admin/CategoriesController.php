<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CreateRequest;
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

        return view('admin.articles.category', compact('currentUser'));
    }

    public function landscapePodcast(){

        $currentUser = auth()->user();

        return view('admin.podcasts.category', compact('currentUser'));
    }

    public function landscapeInquiries(){

        $currentUser = auth()->user();

        return view('admin.inquiries.category', compact('currentUser'));
    }

    public function store(CreateRequest $request){
        $validatedData = $request->validated() ;
        $url = url()->full();
        $lastWord = substr($url, strrpos($url, '/') + 1);

        if ($lastWord = 'Post'){
            $createdCategory = Post_category::create([
                'title' => $validatedData['title'],
            ]);
        }
        if($lastWord = 'Podcast'){
            $createdCategory = Podcast_category::create([
                'title' => $validatedData['title'],
            ]);
        }
        if ($lastWord = 'Answer'){
            $createdCategory = Answer_category::create([
                'title' => $validatedData['title'],
            ]);
        }
        if ($lastWord = 'Webinar'){
            $createdCategory = Webinar_category::create([
                'title' => $validatedData['title'],
            ]);
        }

        if (!$createdCategory){
            return back()->with('failed','عملیات موفقیت آمیز نبود:(');
        }
        return back()->with('success', 'عملیات موفقیت آمیز بود:)');
    }

    public function delete($category_id){
        $url = url()->full();
        $lastWord = substr($url, strrpos($url, '/') + 1);

        if ($lastWord = 'deletePost'){
            $category = Post_category::find($category_id);
            $category->delete();
        }
        if($lastWord = 'deletePodcast'){
            $category = Podcast_category::find($category_id);
            $category->delete();
        }
        if ($lastWord = 'deleteAnswer'){
            $category = Answer_category::find($category_id);
            $category->delete();
        }
        if ($lastWord = 'deleteWebinar'){
            $category = Webinar_category::find($category_id);
            $category->delete();
        }


        return back()->with('success','دسته بندی حذف شد');

    }

    public function edit(){

    }

//    public function update(UpdateRequest $request, $category_id){
//        $validatedData = $request->validated();
//
//        $category = Category::find($category_id);
//
//        $updated_category = $category->update([
//            'title' => $validatedData['title'],
//            'slug' => $validatedData['slug']
//        ]);
//
//        if ($updated_category){
//            return back()->with('success','دسته بندی بروزرسانی شد D:');
//        }
//        return back()->with('failed', 'اختلالی رخ داده است');
//    }
}
