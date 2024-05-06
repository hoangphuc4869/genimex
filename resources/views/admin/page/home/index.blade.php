<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6  main-admin-home relative">
            <h1 class="w-full text-3xl text-black pb-6">Trang chủ</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Chi tiết
                </p>
                <form method="POST" action="{{route('admin.update_homepage')}}" class="" enctype="multipart/form-data">
                    <div class="submit-wrap flex justify-end">
                        <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded">Cập nhật</button>
                    </div>
                    @csrf

                    @method('PUT')

                    <select class="languge" name="lang" id="postLang">
                        <option value="vi" selected >Tiếng việt</option>
                        <option value="en" >English</option>  
                    </select>
                    <br>


                    <div class="mb-1">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home Video</label>
                        <input type="file"  name="home_video" id="home_video" >
                        {{-- <img class="preview-img" src="{{ !empty($home_video->content) ? asset('/storage/videos/' . $home_video->content) : '' }}" alt=""> --}}
                        <video class= "preview-video"  controls muted src="{{ !empty($home_video->content) ? asset('/storage/videos/' . $home_video->content) : '' }}"></video>
                        
                        <script>
                            document
                            .querySelector("#home_video")
                            .addEventListener("change", function (event) {
                                var file = event.target.files[0];

                                if (file) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        document.querySelector(".preview-video").src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                } else {
                                    document.querySelector(".preview-video").src = "";
                                }
                            });
                        </script>
                    </div>
                    <br>

                    <div class="mb-1">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home Overview Image</label>
                        <input type="file"  name="home_overview_img" id="home_overview_img" value="{{!empty($home_overview_img->content)? $home_overview_img->content : ''}}">
                        <img class="preview-img home_overview_img" src="{{ !empty($home_overview_img->content) ? asset('/storage/images/' . $home_overview_img->content) : '' }}" alt="">
                        <script>
                            document
                            .querySelector("#home_overview_img")
                            .addEventListener("change", function (event) {
                                var file = event.target.files[0];

                                if (file) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        document.querySelector(".home_overview_img").src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                } else {
                                    document.querySelector(".home_overview_img").src = "";
                                }
                            });
                        </script>
                    </div>
                    <br>

                    <div class="mb-1">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home Overview Logo</label>
                        <input type="file"  name="home_overview_logo" id="home_overview_logo" value="{{!empty($home_overview_logo->content)? $home_overview_logo->content : ''}}">
                        <img class="preview-img home_overview_logo" src="{{ !empty($home_overview_logo->content) ? asset('/storage/images/' . $home_overview_logo->content) : '' }}" alt="">
                        <script>
                            document
                            .querySelector("#home_overview_logo")
                            .addEventListener("change", function (event) {
                                var file = event.target.files[0];
                                if (file) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        document.querySelector(".home_overview_logo").src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                } else {
                                    document.querySelector(".home_overview_logo").src = "";
                                }
                            });
                        </script>
                    </div>
                    <br>

                    <div class="mb-1">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home Overview Text</label>
                        <textarea name="home_overview_text" id="editor" cols="30" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{!empty($home_overview_text->content)? $home_overview_text->content : ''}}</textarea>
                        
                    </div>
                    <br>

                    <div class="mb-1">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home Overview Image 2</label>
                        <input type="file"  name="home_overview_img2" id="home_overview_img2" value="{{!empty($home_overview_img2->content)? $home_overview_img2->content : ''}}">
                        <img class="preview-img home_overview_img2" src="{{ !empty($home_overview_img2->content) ? asset('/storage/images/' . $home_overview_img2->content) : '' }}" alt="">
                        <script>
                            document
                            .querySelector("#home_overview_img2")
                            .addEventListener("change", function (event) {
                                var file = event.target.files[0];
                                if (file) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        document.querySelector(".home_overview_img2").src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                } else {
                                    document.querySelector(".home_overview_img2").src = "";
                                }
                            });
                        </script>
                    </div>

                    <div class="mb-1">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location Text</label>
                        <input type="text" name="location_title" value="{{!empty($location_title->content)? $location_title->content : ''}}" id="location_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </div>


                    <div class="mb-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location Images</label>
                        <input type="file" multiple name="home_location_imgs[]" id="home_location_imgs">
                        <div class="grid_img">
                            @if (!empty($location_imgs->content))
                                @foreach (json_decode($location_imgs->content) as $img)
                                    <img class="grid_img_item" src="{{ asset('/storage/images/' . $img) }}" alt="">
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <script>
                        document.querySelector("#home_location_imgs").addEventListener("change", function (event) {
                            var files = event.target.files;
                            var gridImg = document.querySelector(".grid_img");
                            gridImg.innerHTML = ""; 

                            for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var img = document.createElement("img");
                                    img.className = "grid_img_item";
                                    img.src = e.target.result;
                                    gridImg.appendChild(img);
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>

                    <div class="mb-1">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Milestone Text</label>
                        <input type="text" name="milestone_title" value="{{!empty($milestone_title->content)? $milestone_title->content : ''}}" id="location_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>


                    <div class="mb-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Milestone Images</label>
                        <input type="file" multiple name="milestone_imgs[]" id="home_milestone_imgs">
                        <div class="grid_milestone_img">
                            @if (!empty($milestone_imgs->content))
                                @foreach (json_decode($milestone_imgs->content) as $img)
                                    <img class="grid_img_item_milestone" src="{{ asset('/storage/images/' . $img) }}" alt="">
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <script>
                        document.querySelector("#home_milestone_imgs").addEventListener("change", function (event) {
                            var files = event.target.files;
                            var gridImg = document.querySelector(".grid_milestone_img");
                            gridImg.innerHTML = ""; 

                            for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var img = document.createElement("img");
                                    img.className = "grid_img_item_milestone";
                                    img.src = e.target.result;
                                    gridImg.appendChild(img);
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>


                    <div class="mb-1">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sample Text</label>
                        <input type="text" name="sample_title" value="{{!empty($sample_title->content)? $sample_title->content : ''}}" id="sample_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <br>

                    <div class="mb-1">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sample Image</label>
                        <input type="file"  name="sample_img" id="sample_img" value="{{!empty($sample_img->content)? $sample_img->content : ''}}">
                        <img class="preview-img sample_img" src="{{ !empty($sample_img->content) ? asset('/storage/images/' . $sample_img->content) : '' }}" alt="">
                        <script>
                            document
                            .querySelector("#sample_img")
                            .addEventListener("change", function (event) {
                                var file = event.target.files[0];
                                if (file) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        document.querySelector(".sample_img").src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                } else {
                                    document.querySelector(".sample_img").src = "";
                                }
                            });
                        </script>
                    </div>


                    <div class="mb-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apartments' Images</label>
                        <input type="file" multiple name="apartment_imgs[]" id="home_apartment_imgs">
                        <div class="grid_apartment_img">
                            @if (!empty($apartment_imgs->content))
                                @foreach (json_decode($apartment_imgs->content) as $img)
                                    <img class="grid_img_item_milestone" src="{{ asset('/storage/images/' . $img) }}" alt="">
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <script>
                        document.querySelector("#home_apartment_imgs").addEventListener("change", function (event) {
                            var files = event.target.files;
                            var gridImg = document.querySelector(".grid_apartment_img");
                            gridImg.innerHTML = ""; 

                            for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var img = document.createElement("img");
                                    img.className = "grid_img_item_apartment";
                                    img.src = e.target.result;
                                    gridImg.appendChild(img);
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>



                    
                </form>
            </div>
        </main>
    </div>
</x-admin-layout>

