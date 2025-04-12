<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Blog\categorySearchRequest;
use App\Http\Requests\Frontend\Blog\SearchRequest;
use App\Models\Answer;
use App\Models\Comment;
use App\Models\Podcast;
use App\Models\Post;
use App\Models\Post_category;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Services\DataTable;
use function App\Utilities\diePage;
use function App\Utilities\isAjaxRequest;

class WeblogController extends Controller
{
    public function webinars(){

        $webinars = Webinar::paginate(6);

    return view('frontend.webinar', compact('webinars'));
}
    public function webinarPlayer($webinar_id){

        $webinar = Webinar::findOrFail($webinar_id);

        return view('frontend.webinarPlayer', compact('webinar'));
    }

    public function blog(){

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        $categories = Post_category::get();


        return view('frontend.blog', compact('posts', 'categories'));
    }

    // Data-table command
/*    public function dataTable(Request $request){

        if ($request->ajax()){
            $user = Post::query();

            return DataTable::of($user)->make(true);
        }
    }*/
    public function basicSearch(SearchRequest $request){

        $validatedData = $request->validated();

        $output = "";
//        ->orWhere('author', 'Like', '%'.$validatedData['keyword'].'%')
        $results = Post::where('title', 'Like', '%'.$validatedData['keyword'].'%')->get();

        foreach ($results as $result){
            $output .=
                "<div class=' container text-center d-md-flex justify-content-end  shadow p-3 mb-5  rounded-4  col-10 pe-md-5'>

                <img class='col-md-4 ms-3 img-thumbnail rounded object-fit-fill ' src='/" . $result->thumbnail_url . "' alt=''
                     style='max-height: 245px;'>

                <div class='article-data col-md-8 text-md-end'>
                    <p class='article-cat h3'>" . $result->category_id . "</p>

                    <p class='article-title h2'>" . $result->title . "</p>

                    <p class='article-cat h3'>نام نویسنده: {$result->author}</p>

                    <p class='article-date'>{$result->created_at->jdate('j F Y')}</p>

                    <p class='article-discription'>{$result->abstract}</p>
                    <a href='" . route('home.post', $result->id) . "'>
                        <button class='article-btn btn'>مطالعه بیشتر</button>
                    </a>
                </div>

            </div>";
        }

        if (!$output){
            $noReuslt = '';
            return response('نتیجه ای یافت نشد');
        }

        return response($output);

    }

    public function categorySearch(categorySearchRequest $request){

        $validatedData = $request->validated();

        $output = "";
        // آیدی کتگوری رو تا اینجا داری

//        $category = Post_category::where()
        $selectedCategory = Post_category::where('id','Like',$validatedData['keyword'])->value('title');

        $results = Post::where('category_id', 'Like', '%'.$selectedCategory.'%')->get();

        foreach ($results as $result){
            $output .=
                "<div class=' container text-center d-md-flex justify-content-end  shadow p-3 mb-5  rounded-4  col-10 pe-md-5'>

                <img class='col-md-4 ms-3 img-thumbnail rounded object-fit-fill ' src='/" . $result->thumbnail_url . "' alt=''
                     style='max-height: 245px;'>

                <div class='article-data col-md-8 text-md-end'>
                    <p class='article-cat h3'>" . $result->category_id . "</p>

                    <p class='article-title h2'>" . $result->title . "</p>

                    <p class='article-cat h3'>نام نویسنده: {$result->author}</p>

                    <p class='article-date'>{$result->created_at->jdate('j F Y')}</p>

                    <p class='article-discription'>{$result->abstract}</p>
                    <a href='" . route('home.post', $result->id) . "'>
                        <button class='article-btn btn'>مطالعه بیشتر</button>
                    </a>
                </div>

            </div>";
        }

        if (!$output){
            $noReuslt = '';
            return response('نتیجه ای یافت نشد');
        }

        return response($output);
    }
    public function podcast(){

        $podcasts = Podcast::paginate(9);

        return view('frontend.podcast', compact('podcasts'));
    }
    public function responses(){

        $responses = Answer::paginate(9);

        return view('frontend.answers', compact('responses'));
    }
    public function article($post_id){

        $post = Post::findOrFail($post_id);

        $comments = Comment::where('post_id', '=', $post_id)->get('fingerprint')->toArray();
//        $comments = Comment::get('fingerprint')->toArray();

        $users_id_array = [];

        foreach ($comments as $keys => $value){
            $users_id_array[] = $value['fingerprint'];
        }

        return view('frontend.specificArticle', compact('post', 'users_id_array'));

//        return response()->file($post->post_url);

//        return view('frontend.post', compact('post'));
    }
    public function ask(){

        return view('frontend.ask');
    }

}
