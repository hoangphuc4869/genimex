<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Edit Category</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Category Details
                </p>
                <form method="POST" action="{{ route('admin.category.update', $category->id ) }}">
                    @csrf
                    @method('PUT')
                    <div class="">
                         <select class="languge" name="lang" id="postLang">
                            <option value="vi" >Tiếng việt</option>
                            <option value="en" selected>English</option>
                            <option value="spa">Spanish</option>
                        </select>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-1">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                    <input type="name" id="name" value="{{ $category->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex: News" required name="name">
                
                     <div class="translation">
                     <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Translation</label>
                    <input type="text" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="trans_column[name]" id="en-title" placeholder="Translation...">
                   </div>
                </div>
                <div class="mb-1">
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Slug</label>
                    <input type="text"  name="slug" id="slug" value="{{ $category->slug }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                {{--  --}}
                </div>
                <input type="hidden" id="user" name="user_id" value="{{ auth()->user()->id }}">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded">Update Category</button>
                </form>
            </div>
        </main>
    </div>
</x-admin-layout>

