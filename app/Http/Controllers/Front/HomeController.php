<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\HomePage;

class HomeController extends Controller
{
    // Home Page
    public function index()
    {
        // Get the active posts with (Category and User) details
        $posts = Post::published()->with(['category', 'user'])->latest('created_at')->paginate(10);
        $homepage = new HomePage;
        $home_overview_text = $homepage->select('name', 'content')->where('name', 'home_overview_text')->first();
        $home_video = $homepage->select('name', 'content')->where('name', 'home_video')->first();
        $home_overview_logo = $homepage->select('name', 'content')->where('name', 'home_overview_logo')->first();
        $home_overview_img = $homepage->select('name', 'content')->where('name', 'home_overview_img')->first();
        return view('layouts.home', compact('posts', 'home_overview_text', 'home_video', 'home_overview_logo', 'home_overview_img' ));
        // return view('front.index', compact('posts'));

        // return view('welcome');
    }

}

// SELECT 
//     posts.id,
//     posts.title,
//     posts.slug,
//     posts.image,
//     posts.content,
//     posts.created_at, 
//     cate.name AS cate_name,
//     IFNULL(translated_contents_title.translation, posts.title) AS translated_title,
//     IFNULL(cate.category_translation, NULL) AS category_translation,
//     cate.slug AS cate_slug,
//     IFNULL(translated_contents_content.translation, posts.content) AS translated_content,
//     posts.user_id,
//     users.name AS user_name
// FROM 
//     posts
// LEFT JOIN 
//     users ON posts.user_id = users.id
// LEFT JOIN 
//     (SELECT 
//          p.id,
//          IFNULL(cate.translation, cate.name) AS category_translation,
//          cate.slug,
//          cate.name
//      FROM 
//          posts AS p
//      LEFT JOIN 
//          (SELECT 
//               categories.id,
//               categories.name,
//               categories.slug,
//               translated_contents.translation
//           FROM 
//               categories
//           LEFT JOIN 
//               translated_contents ON categories.id = translated_contents.original_content_id
//           WHERE 
//               translated_contents.from = 'categories'
//           AND 
//               translated_contents.language_code = 'vi'
//          ) AS cate ON p.category_id = cate.id
//     ) AS cate ON posts.id = cate.id
// LEFT JOIN 
//     translated_contents AS translated_contents_title ON posts.id = translated_contents_title.original_content_id
//     AND translated_contents_title.from = 'posts'
//     AND translated_contents_title.language_code = 'vi'
//     AND translated_contents_title.column_name = 'title'
// LEFT JOIN 
//     translated_contents AS translated_contents_content ON posts.id = translated_contents_content.original_content_id
//     AND translated_contents_content.from = 'posts'
//     AND translated_contents_content.language_code = 'vi'
//     AND translated_contents_content.column_name = 'content'