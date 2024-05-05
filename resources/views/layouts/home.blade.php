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
    </div>
</x-home>