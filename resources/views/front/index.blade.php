<x-blog-layout>
     <!-- Posts Section -->
 <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <!-- Article -->
        {{-- {{dd($posts[0])}} --}}
        {{-- {{dd($post_translations)}} app()->getLocale())->first() --}}
        @forelse ($posts as $post)
            @php
                $translated_title = DB::table('translated_contents')
                    ->select('translated_contents.translation as translation', 'translated_contents.original_content_id as post_id')
                    ->where('translated_contents.original_content_id', $post->id)
                    ->where('translated_contents.from', 'posts')
                    ->where('translated_contents.language_code', app()->getLocale())
                    ->where('translated_contents.column_name', 'title')
                    ->first();

                $translated_content = DB::table('translated_contents')
                ->select('translated_contents.translation as translation', 'translated_contents.original_content_id as post_id')
                ->where('translated_contents.original_content_id', $post->id)
                ->where('translated_contents.from', 'posts')
                ->where('translated_contents.language_code', app()->getLocale())
                ->where('translated_contents.column_name', 'content')
                ->first();
                    echo !empty($translated_title->translation) ? $translated_title->translation : "trong";
            @endphp
                 <article class="flex flex-col shadow my-4">
                    <a href="{{ route('post.show', $post->slug ) }}" class="hover:opacity-75">
                    <img src="{{ $post->image }}" width="1000" height="500">
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="{{ route('category.show', $post->category->slug) }} " class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->category->name }}</a>
                        <a href="{{ route('post.show', $post->slug ) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ !empty($translated_title->translation) ? $translated_title->translation : $post->title }}</a>
                        <p href="#" class="text-sm pb-1">
                            By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ $post->created_at }}
                        </p>
                        <p class="pb-3">{!! substr(!empty($translated_content->translation) ? $translated_content->translation : $post->content, 0, 100) !!} ...</p>
                        {{-- <br /> --}}
                        <a href="{{ route('post.show', $post->slug) }}" class="mt-px uppercase text-gray-800 font-bold hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                
            
        @empty
        <p>
        {{__('blog.no_posts')}}
        </p>
        @endforelse

    <!-- Pagination -->
    <div class="flex items-center py-8">

        {{-- {{ $posts->links() }} --}}

    </div>

</section>
</x-blog-layout>
