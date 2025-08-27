<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Podcast\PodcastRequest;
use App\Http\Requests\Admin\Podcast\UpdateRequest;
use App\Models\Podcast;
use App\Models\Podcast_category;
use App\Utilities\ImageUploader;
use Illuminate\Http\Request;

class PodcastsController extends Controller
{
    public function landscape()
    {

        $currentUser = auth()->user();

        $podcasts = Podcast::paginate(10);



        return view('admin.podcasts.index', compact('currentUser', 'podcasts'));
    }

    public function create()
    {

        $currentUser = auth()->user();

        $categories = Podcast_category::get();

        return view('admin.podcasts.add', compact('currentUser','categories'));
    }

    public function store(PodcastRequest $request)
    {
        $validatedData = $request->validated();

        $currentUser = auth()->user();

        $array_categories = [];

        foreach ($validatedData['cat'] as $cat){
            $array_categories[] = Podcast_category::where('id',$cat)->value('title');
        }

        $string_cat = implode(', ', $array_categories);

        $createdPodcast = Podcast::create([
            'title' => $validatedData['title'],
            'category_id' => $string_cat,
            'description' => $validatedData['description'],
            'meta_description' => $validatedData['meta_description'],
            'meta_title' => $validatedData['meta_title'],
            'user_id' => $currentUser['id']
        ]);

        if (!$this->uploadImage($createdPodcast, $validatedData) or !$createdPodcast) {
            return back()->with('failed', 'خطا در ایجاد پادکست');
        }

        return back()->with('success', 'پادکست با موفقیت ایجاد شد');

    }

    public function edit($podcast_id){

        $currentUser = auth()->user();

        $podcast = Podcast::findOrFail($podcast_id);

        $categories = Podcast_category::get();

        return view('admin.podcasts.edit', compact('podcast','currentUser', 'categories'));
    }

    public function update(UpdateRequest $request, $podcast_id){
        $validatedData = $request->validated();

        $currentUser = auth()->user();

        $podcast = Podcast::findOrFail($podcast_id);

        $array_categories = [];

        foreach ($validatedData['cat'] as $cat){
            $array_categories[] = Podcast_category::where('id',$cat)->value('title');
        }

        $string_cat = implode(', ', $array_categories);

        $updatedPodcast = $podcast->update([
            'title' => $validatedData['title'],
            'category_id' => $string_cat,
            'description' => $validatedData['description'],
            'meta_description' => $validatedData['meta_description'],
            'meta_title' => $validatedData['meta_title'],
            'user_id' => $currentUser['id']
        ]);
        if (!$this->uploadImage($podcast, $validatedData) or !$updatedPodcast) {
            return back()->with('failed', 'خطا در به روزرسانی پادکست');
        }

        return back()->with('success', 'پادکست با موفقیت به روزرسانی شد');

    }

    public function download($podcast_url)
    {
        $podcast = Podcast::findOrFail($podcast_url);

        return response()->download(public_path($podcast->podcast_url));
    }

    public function delete($podcast_id){
        $podcast = Podcast::findOrFail($podcast_id);

        $podcast->delete();

        return back()->with('success', 'پادکست حذف شد');
    }

    private function uploadImage($createdPodcast, $validatedData)
    {

        try {
            $data = [];

            if (isset($validatedData['thumbnail_url'])) {
                $path = 'podcasts/' . $createdPodcast->id . '/' . $validatedData['thumbnail_url']->getClientOriginalName();

                ImageUploader::Upload($validatedData['thumbnail_url'], $path, 'public_storage');

                $data += ['thumbnail_url' => $path];
            }

            if (isset($validatedData['podcast_url'])) {
                $path = 'podcasts/' . $createdPodcast->id . '/' . $validatedData['podcast_url']->getClientOriginalName();

                ImageUploader::Upload($validatedData['podcast_url'], $path, 'public_storage');

                $data += ['podcast_url' => $path];

            }

            $updatedPodcast = $createdPodcast->Update($data);

            if (!$updatedPodcast) {
                throw new \Exception('پادکست آپلود نشد');
            }

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }
}
