<x-home>
    <div class="home_video">
        <video autoplay playsinline muted loop class="w-full" src="{{ !empty($home_video->content) ? asset('/storage/videos/' . $home_video->content) : '' }}"></video>
    </div>

    <div class="overview container">
        <div class="row">
            <div class="col-lg-6">
                <div class="overview-img">
                    <img src="{{ !empty($home_overview_img->content) ? asset('/storage/images/' . $home_overview_img->content) : '' }}" alt="">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="overview-content">
                    <div class="overview-logo">
                        <img src="{{ !empty($home_overview_logo->content) ? asset('/storage/images/' . $home_overview_logo->content) : '' }}" alt="">
                    </div>
                    <div class="overview-text">
                        {!! !empty($home_overview_text->content) ? $home_overview_text->content : '' !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="register-btn d-flex justify-content-center mt-5">
            <button>
                <a href="#">ĐĂNG KÝ NHU CẦU</a>
            </button>
        </div>
    </div>

    <div class="overview-img2">
        <img src="{{ !empty($home_overview_img2->content) ? asset('/storage/images/' . $home_overview_img2->content) : '' }}" alt="" class="w-100">
    </div>

    <div class="location-utilities container">
        <div class="location_title">
            {{ !empty($location_title->content) ? $location_title->content : '' }}
        </div>
        <div class="location-imgs row align-items-center">

            
            
            @if (!empty(json_decode($location_imgs->content)))
                 @foreach (json_decode($location_imgs->content) as $img)
                <div class="col-lg-6"> 
                    <div class="l-u-img">
                        <img src="{{asset('/storage/images/' . $img)}}" alt="" class="w-100 img-fluid">
                    </div>
                </div>
                 @endforeach
            @endif

          
        </div>
    </div>

    <div class="milestone-wrap">
        <div class="container">
            <div class="milestone-title">
                {{!empty($milestone_title->content)? $milestone_title->content : ''}}
            </div>
            <div class="row">
                @foreach (json_decode($milestone_imgs->content) as $item)
                    @if (!empty($item))
                        <div class="col-md-6">
                            <div class="milestone_img">
                                <img src="{{asset('/storage/images/' . $item)}}" alt="" class="w-100">
                            </div>
                        </div>                      
                    @endif
                @endforeach
               
            </div>
        </div>
    </div>


    <div class="sample container">
        <div class="sample_title">
           {{ !empty($sample_title->content) ? $sample_title->content : '' }}
        </div>
        <div class="sample_img">
            <img src="{{ !empty($sample_img->content) ? asset('/storage/images/' . $sample_img->content ) : '' }}" alt="">
        </div>
    </div>

    <div class="container">
        <div class="swiper apartment_slider">
            <div class="swiper-wrapper">
                @foreach (json_decode($apartment_imgs->content) as $item)
                        @if (!empty($item))
                            <div class="swiper-slide">
                                
                                    <img src="{{asset('/storage/images/' . $item)}}" alt="" class="w-100">
                                
                            </div>                      
                        @endif
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="register-btn d-flex justify-content-center mt-5">
            <button>
                <a href="#">ĐĂNG KÝ NHU CẦU</a>
            </button>
        </div>
    </div>
    
</x-home>