<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSettingRequest;
use App\Models\Setting;
use App\Models\TranslatedContent;
use Illuminate\Http\Request;
class SettingController extends Controller
{
    public function index(Request $request)
    {   
        $setting = Setting::first();

        $setting_about = Setting::select('settings.id', 'settings.about', 'translated_contents.translation')
        ->leftJoin('translated_contents', function ($join) use($request){
            $join->on('settings.id','=','translated_contents.original_content_id')
            ->where('translated_contents.from','=', 'settings')
            ->where('translated_contents.language_code', '=', 'vi')
            ->where('translated_contents.column_name', '=', 'about');

        })->get();

        $setting_name = Setting::select('settings.id', 'settings.site_name', 'translated_contents.translation')
        ->leftJoin('translated_contents', function ($join) use($request){
            $join->on('settings.id','=','translated_contents.original_content_id')
            ->where('translated_contents.from','=', 'settings')
            ->where('translated_contents.language_code', '=', 'vi')
            ->where('translated_contents.column_name', '=', 'site_name');
        })->get();

        $setting_des = Setting::select('settings.id', 'settings.description', 'translated_contents.translation')
        ->leftJoin('translated_contents', function ($join) use($request){
            $join->on('settings.id','=','translated_contents.original_content_id')
            ->where('translated_contents.from','=', 'settings')
            ->where('translated_contents.language_code', '=', 'vi')
            ->where('translated_contents.column_name', '=', 'description');
        })->get();


        return view('admin.setting.index', compact('setting', 'setting_name', 'setting_about', 'setting_des'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        // dd($request->id);
        
            
            // dd($request->trans_column);
            foreach ($request->trans_column as $column => $translation) {
                
                $trans = TranslatedContent::updateOrCreate(
                    [
                        'from' => 'settings',
                        'original_content_id' => $setting->id,
                        'language_code' => $request->lang,
                        'column_name' => $column,
                    ],
                    [
                        'translation' => !empty($translation) ? $translation : $request->name,
                    ]
                );
            }

        
         $setting->update($request->validated());
        return back()->with('message', trans('admin.data_updated'));
    }
}