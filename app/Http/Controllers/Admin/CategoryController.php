<?php

namespace App\Http\Controllers\Admin;

use App\Traits\SlugCreater;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\TranslatedContent;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use SlugCreater;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TranslatedContent $translatedContent)
    {
        $categories = Category::with('user:id,name')->get();
       
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // dd($request);
        $category = Category::create($request->validated());
        
            foreach ($request->trans_column as $column => $transaltion) {
                    $trans = TranslatedContent::updateOrcreate ([
                        'from'=> "categories",
                        'original_content_id' => $category->id,
                        'language_code' => $request->lang,
                        'column_name' => $column,
                    ],[
                        'translation'=> !empty($transaltion) ? $transaltion : $request->name,
                    ]);
                
            }

        
        return to_route('admin.category.index')->with('message', trans('admin.category_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        if(!empty($request->trans_column)){
            foreach ($request->trans_column as $column => $transaltion) {
                if($transaltion != null && $transaltion != ''){
                    
                    $trans = TranslatedContent::updateOrcreate ([
                        'from'=> "categories",
                        'original_content_id' => $category->id,
                        'language_code' => $request->lang,
                        'column_name' => $column,
                    ],[
                        'translation'=> $transaltion
                    ]);
                }
            }

        }

        return to_route('admin.category.index')->with('message',  trans('admin.category_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return to_route('admin.category.index')->with('message', trans('admin.category_deleted'));
    }

    public function getSlug(Request $request)
    {
        $slug = $this->createSlug($request, Category::class);

        return response()->json(['slug' => $slug]);
    }
}