@php
    $views = App\Models\PageView::all();
    $post_url = '/' . 'posts/' . $post->slug;
    $views = $views->where('page', $post_url)->count();   
@endphp

<article class="w-full sm:w-80 bg-white rounded-lg shadow-md dark:bg-gray-800 m-4 my-5 flex flex-col flex-grow">
    <header>
        <a href="{{ route('posts.show', $post) }}">
            <span class="rounded-t-lg featured-post-image relative dark:opacity-75" role="img" style="background-image: url('{{ $post->featured_image }}');" alt="Featured Image">@if($post->is_premium)
                <span class="text-yellow-500" title="Premium Post" style="position: absolute; top:15px; left: 15px; padding: 5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#FFD700" height="30px" width="30px" version="1.1" id="Capa_1" viewBox="0 0 220 220" xml:space="preserve">
                        <path d="M220,98.865c0-12.728-10.355-23.083-23.083-23.083s-23.083,10.355-23.083,23.083c0,5.79,2.148,11.084,5.681,15.14  l-23.862,21.89L125.22,73.002l17.787-20.892l-32.882-38.623L77.244,52.111l16.995,19.962l-30.216,63.464l-23.527-21.544  c3.528-4.055,5.671-9.344,5.671-15.128c0-12.728-10.355-23.083-23.083-23.083C10.355,75.782,0,86.137,0,98.865  c0,11.794,8.895,21.545,20.328,22.913l7.073,84.735H192.6l7.073-84.735C211.105,120.41,220,110.659,220,98.865z"/>
                    </svg>
                </span>
            @endif
            </span>     
        </a>
    </header>
    <div class="p-5 h-full flex flex-col">

        @if(config('blog.withTags') && config('blog.showTagsOnPostCard') && $post->tags)
            <x-post-tags :tags="$post->tags" class="text-xs" />
        @endif

        <a href="{{ route('posts.show', $post) }}">
            <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white break-words">
            @if($post->isPublished())
                {{ $post->title }}
            @else
                <span class="opacity-75" title="This post has not yet been published">
                Draft:
                </span>
                <i>{{ $post->title }}</i>
            @endif
            </h3>
        </a>


        <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400 overflow-hidden text-ellipsis">
            By <x-link :href="route('profile', ['user' => $post->author])" rel="author">{{ $post->author->name }}</x-link>
            @if($post->isPublished())
            <span class="opacity-75" role="none">&bullet;</span>
            <time datetime="{{ $post->published_at }}" title="Published {{ $post->published_at }}">{{ $post->published_at->format('Y-m-d') }}</time>.
            @endif
            @if(config('blog.allowComments') || config('analytics.enabled'))
                <span class="inline float-right">
                    @if(config('analytics.enabled'))
                        <span class="{{ config('blog.allowComments') ? 'mr-2' : '' }}" role="none" aria-hidden="true" title="{{ number_format($post->getViewCount()) }} views">
                            <svg class="inline fill-gray-500 dark:text-gray-300" role="presentation" xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                            {{ $views }}
                        </span>
                    @endif

                    @if(config('blog.allowComments'))
                        <span class="sr-only">
                        The post has {{ $post->comments->count() }} comments.
                            <a href="{{ route('posts.show', $post) }}#comments">Go to post comment section</a>
                        </span>

                        <a href="{{ route('posts.show', $post) }}#comments" role="none" aria-hidden="true" title="{{ $post->comments->count() }} comments">
                            <svg class="inline fill-gray-500 dark:text-gray-300" role="presentation" xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM18 14H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>
                            {{ $post->comments->count() }}
                        </a>
                    @endif
                </span>
            @endif
        </p>

        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden text-ellipsis">
            {{ $post->description }}
        </p>

        <a href="{{ route('posts.show', $post) }}" class="mt-auto w-fit inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{ __('Read more') }}
            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
</article>
