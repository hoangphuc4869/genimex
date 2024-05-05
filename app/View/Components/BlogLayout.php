<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\View\Component;
use App\Models\TranslatedContent;

class BlogLayout extends Component
{
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = Category::select('id', 'name', 'slug')->get();
        $top_users = User::withCount('posts')->orderByDesc('posts_count')->take(5)->get();


        $setting = Setting::first();

        $setting_about = Setting::select('settings.id', 'settings.about', 'translated_contents.translation')
        ->leftJoin('translated_contents', function ($join){
            $join->on('settings.id','=','translated_contents.original_content_id')
            ->where('translated_contents.from','=', 'settings')
            ->where('translated_contents.language_code', '=', app()->getLocale())
            ->where('translated_contents.column_name', '=', 'about');

        })->get();

        $setting_name = Setting::select('settings.id', 'settings.site_name', 'translated_contents.translation')
        ->leftJoin('translated_contents', function ($join){
            $join->on('settings.id','=','translated_contents.original_content_id')
            ->where('translated_contents.from','=', 'settings')
            ->where('translated_contents.language_code', '=', app()->getLocale())
            ->where('translated_contents.column_name', '=', 'site_name');
        })->get();

        $setting_des = Setting::select('settings.id', 'settings.description', 'translated_contents.translation')
        ->leftJoin('translated_contents', function ($join){
            $join->on('settings.id','=','translated_contents.original_content_id')
            ->where('translated_contents.from','=', 'settings')
            ->where('translated_contents.language_code', '=', app()->getLocale())
            ->where('translated_contents.column_name', '=', 'description');
        })->get();


        $pages_nav = Page::select('id', 'name', 'slug')->whereNavbar(true)->orderByDesc('id')->get();
        $pages_footer = Page::select('id', 'name', 'slug')->whereFooter(true)->orderByDesc('id')->get();
        $tags = Tag::whereHas('posts', function ($q) {
            $q->where('status', true);
        })->get();

        $categories2 = Category::select('categories.id', 'categories.name', 'categories.slug', 'translated_contents.translation')
        ->leftJoin('translated_contents', function ($join) {
            $join->on('categories.id', '=', 'translated_contents.original_content_id')
                ->where('translated_contents.from', '=', 'categories')
                ->where('translated_contents.language_code', '=', app()->getLocale());
        })->get();
        

        return view('layouts.blog', compact('categories', 'top_users', 'setting', 
        'pages_nav', 'pages_footer', 'tags', 'categories2','setting_about', 'setting_name', 'setting_des' ));
    }
}
// SELECT settings.id, settings.site_name, translated_contents.translation FROM settings JOIN translated_contents ON settings.id = translated_contents.original_content_id WHERE translated_contents.from = 'settings' AND translated_contents.language_code = "vi" and translated_contents.column = "site_name";