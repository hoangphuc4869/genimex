<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TranslatedContent;
use App\Traits\SlugCreater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use SlugCreater;

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category:id,name', 'user:id,name', 'tags:id,name'])->latest()->paginate(15);

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        // $posts = Tag::all();


        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post_data = $request->safe()->except('image');

        if ($request->hasfile('image')) {
            $get_file = $request->file('image')->store('images/posts');
            $post_data['image'] = $get_file;
        }

        // dd($request);

        $post = Post::create($post_data);


       
            foreach ($request->trans_column as $column => $translation) {
                
               
                    $trans = TranslatedContent::updateOrCreate(
                        [   
                            'from' => 'posts',
                            'original_content_id' => $post->id,
                            'language_code' => $request->lang,
                            'column_name' => $column,
                        ],
                        [
                        
                           'translation' => !empty($translation) ? $translation : ($column === "title" ? $request->title : $request ->content),

                        ]
                        
                    );
                
            }
        


        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        

        return to_route('admin.post.index')->with('message', trans('admin.post_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        $transcontents = TranslatedContent::where('original_content_id', $post->id)->first();

        return view('admin.post.edit', compact('post', 'categories', 'tags', 'transcontents'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post, TranslatedContent $translatedContent)
    {
        $post_data = $request->safe()->except('image');

        if ($request->hasfile('image')) {
            Storage::delete($post->image);
            $get_file = $request->file('image')->store('images/posts');
            $post_data['image'] = $get_file;
        }

        $post->update($post_data);

        $post->tags()->sync($request->tags);

        // dd($request);

       
            foreach ($request->trans_column as $column => $translation) {
                
                
                    $trans = TranslatedContent::updateOrCreate(
                        [   
                            'from' => 'posts',
                            'original_content_id' => $post->id,
                            'language_code' => $request->lang,
                            'column_name' => $column,
                        ],
                        [
                           'translation' => !empty($translation) ? $translation : ($column === "title" ? $request->title : $request ->content),
                        ]
                    );
                
            }
        

        // else {
        //     $translatedContent->where('original_content_id', $post->id)->delete();
        // }

        return redirect()->route('admin.post.index')->with('message', trans('admin.post_updated'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image != null) {
            Storage::delete($post->image);
        }
        $post->delete();

        return back()->with('message', trans('admin.post_deleted'));
    }

    public function getSlug(Request $request)
    {
        $slug = $this->createSlug($request, Post::class);

        return response()->json(['slug' => $slug]);
    }

    public function search(Request $request)
    {
        $searched_text = $request->input('search');

        $posts = Post::query()->with(['category', 'user', 'tags'])
            ->where('title', 'LIKE', "%{$searched_text}%")
            ->orWhere('content', 'LIKE', "%{$searched_text}%")
            ->paginate(10);

        // Return the search view with the resluts
        return view('admin.post.search', compact('posts'));
    }
}