<nav class="top-nav">
    <div class="nav-wrap flex justify-between items-center w-full container mx-auto text-white py-1">
        <div class="company-name">
            CHUNG CƯ PHÚ MỸ C2
        </div>
        <div class="company-email">
            <a href="mailto: CHUNGCUPHUMYC2@GENIMEX.COM.VN">CHUNGCUPHUMYC2@GENIMEX.COM.VN</a>
        </div>

        <div class="hotline">
            HOTLINE: <a href="tel: 0816868688">081.68.68.688</a>
        </div>
    </div>
</nav>


<nav class="w-full py-2 shadow menu-wrap">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
        <div class="logo ">
            <a href="{{route('webhome')}}"><img src="{{asset('/storage/images/unnamed (1).jpg')}}" alt=""></a>
        </div>
       

       <ul class="main_menu flex gap-8 justify-between ">
            <li><a class="uppercase" href="{{ route('overview') }}">Tổng quan</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Chủ đầu tư</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Vị trí</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Tiện ích</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Hình ảnh</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Hồ sơ đăng ký</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Tin tức</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Liên hệ</a></li>
            
        </ul>

        
        <div class="lang-wrap flex items-center gap-8 pr-2">
            <div class="lang-switch flex justify-end items-center gap-2" >
                <a href="{{route('lang', 'vi')}}" class="" ><img src="{{asset('/storage/images/vietnam.svg')}}" alt=""></a>
                <a href="{{route('lang','en')}}" class=" "><img src="{{asset('/storage/images/united-kingdom.svg')}}" alt=""></a>  
            </div>

            <div class="bars">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        
    </div>
</nav>

<nav class="menu-mobile-wrap">
    <div class="close">
        &times;
    </div>
    <ul class="main_menu_mobile flex flex-col gap-8 justify-between items-center ">
            <li><a class="uppercase" href="{{ route('overview') }}">Tổng quan</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Chủ đầu tư</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Vị trí</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Tiện ích</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Hình ảnh</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Hồ sơ đăng ký</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Tin tức</a></li>
            <li><a class="uppercase" href="{{ route('overview') }}">Liên hệ</a></li>
        </ul>
</nav>




