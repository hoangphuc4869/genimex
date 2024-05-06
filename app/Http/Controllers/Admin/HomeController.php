<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\HomePageRequest;

class HomeController extends Controller
{
    public function  index(HomePage $homepage) {

       $home_overview_text = $homepage->select('name', 'content')->where('name', 'home_overview_text')->first();
       $home_video = $homepage->select('name', 'content')->where('name', 'home_video')->first();
       $home_overview_logo = $homepage->select('name', 'content')->where('name', 'home_overview_logo')->first();
       $home_overview_img = $homepage->select('name', 'content')->where('name', 'home_overview_img')->first();
       $home_overview_img2 = $homepage->select('name', 'content')->where('name', 'home_overview_img2')->first();
       $location_title = $homepage->select('name', 'content')->where('name', 'location_title')->first();
       $location_imgs = $homepage->select('name', 'content')->where('name', 'home_location_imgs')->first();
       $milestone_title = $homepage->select('name', 'content')->where('name', 'milestone_title')->first();
       $milestone_imgs = $homepage->select('name', 'content')->where('name', 'milestone_imgs')->first();
       $sample_title = $homepage->select('name', 'content')->where('name', 'sample_title')->first();
       $sample_img = $homepage->select('name', 'content')->where('name', 'sample_img')->first();
       $apartment_imgs = $homepage->select('name', 'content')->where('name', 'apartment_imgs')->first();

    //    dd(json_decode($location_imgs->content));
       
        return view('admin.page.home.index', compact('home_overview_text', 'home_video',
         'home_overview_logo', 'home_overview_img', 'home_overview_img2',
          'location_title', 'location_imgs','milestone_title','milestone_imgs',
           'sample_title','sample_img','apartment_imgs' ));
    }

    public function update(HomePageRequest $request) {

        
        if ($request->hasFile('home_video')) {
            $home_video = $request->file('home_video');
            $home_video_name = $home_video->getClientOriginalName();
            $home_video->storeAs('videos', $home_video_name); 
            
            HomePage::updateOrCreate(
                ['name' => "home_video"], 
                ['content' => $home_video_name] 
            ); 
        }

        if ($request->hasFile('home_overview_img')) {
            $home_overview_img = $request->file('home_overview_img');
            $home_overview_img_name = $home_overview_img->getClientOriginalName();
            $home_overview_img->storeAs('images', $home_overview_img_name); 
            
            HomePage::updateOrCreate(
                ['name' => "home_overview_img"], 
                ['content' => $home_overview_img_name] 
            ); 
        }

        if ($request->hasFile('home_overview_logo')) {
            $home_overview_logo = $request->file('home_overview_logo');
            $home_overview_logo_name = $home_overview_logo->getClientOriginalName();
            $home_overview_logo->storeAs('images', $home_overview_logo_name); 
            
            HomePage::updateOrCreate(
                ['name' => "home_overview_logo"], 
                ['content' => $home_overview_logo_name] 
            ); 
        }

        if ($request->hasFile('sample_img')) {
            $home_overview_logo = $request->file('sample_img');
            $home_overview_logo_name = $home_overview_logo->getClientOriginalName();
            $home_overview_logo->storeAs('images', $home_overview_logo_name); 
            
            HomePage::updateOrCreate(
                ['name' => "sample_img"], 
                ['content' => $home_overview_logo_name] 
            ); 
        }

        if ($request->hasFile('home_overview_img2')) {
            $home_overview_logo = $request->file('home_overview_img2');
            $home_overview_logo_name = $home_overview_logo->getClientOriginalName();
            $home_overview_logo->storeAs('images', $home_overview_logo_name); 
            
            HomePage::updateOrCreate(
                ['name' => "home_overview_img2"], 
                ['content' => $home_overview_logo_name] 
            ); 
        }



        if ($request->hasFile('home_location_imgs')) {
            $uploaded_files = $request->file('home_location_imgs');
            $file_names = []; 
            
            foreach ($uploaded_files as $file) {
                $file_name = $file->getClientOriginalName();
                
            
                $file_names[] = $file_name;
                
                
                $file->storeAs('images', $file_name); 
            }
            
            
            $json_file_names = json_encode($file_names);

            // dd($json_file_names);
            
            HomePage::updateOrCreate(
                ['name' => "home_location_imgs"], 
                ['content' => $json_file_names] 
            ); 
        }


        if ($request->hasFile('milestone_imgs')) {
            $uploaded_files = $request->file('milestone_imgs');
            $file_names = []; 
            
            foreach ($uploaded_files as $file) {
                $file_name = $file->getClientOriginalName();
                
            
                $file_names[] = $file_name;
                
                
                $file->storeAs('images', $file_name); 
            }
            
            
            $json_file_names = json_encode($file_names);

            // dd($json_file_names);
            
            HomePage::updateOrCreate(
                ['name' => "milestone_imgs"], 
                ['content' => $json_file_names] 
            ); 
        }


        if ($request->hasFile('apartment_imgs')) {
            $uploaded_files = $request->file('apartment_imgs');
            $file_names = []; 
            
            foreach ($uploaded_files as $file) {
                $file_name = $file->getClientOriginalName();
                
            
                $file_names[] = $file_name;
                
                
                $file->storeAs('images', $file_name); 
            }
            
            
            $json_file_names = json_encode($file_names);

            // dd($json_file_names);
            
            HomePage::updateOrCreate(
                ['name' => "apartment_imgs"], 
                ['content' => $json_file_names] 
            ); 
        }




        $data = $request->safe()->except('home_video', 'home_overview_img',
         'home_overview_logo','home_overview_img2',
         'home_location_imgs', 'milestone_imgs', 'sample_img' ,'apartment_imgs');

        foreach ($data as $name => $content) {
            HomePage::updateOrCreate(
                ['name' => $name],
                ['content' => $content]
            );
        }

        return redirect()->route('admin.update_homepage')->with('message', trans('admin.data_updated'));
    }



}