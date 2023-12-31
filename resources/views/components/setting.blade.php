@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h3 class="uppercase text-center font-semibold  mb-8 pb-2 border-b">{{ $heading }}</h3>

    <div class="flex flex-shrink-6">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'text-blue-500' : ''}}">Post History</a>
                </li>
                <li>
                    <a href="/posts" class="{{ request()->is('posts') ? 'text-blue-500' : ''}}">All Posts</a>
                </li>
                <li>
                    <a href="/post/create" class="{{ request()->is('post/create') ? 'text-blue-500' : ''}}">New Post</a>
                </li>
            </ul>
        </aside>
    
        <main class="flex-1">
            <x-panel class="mt-6 max-w-3xl mx-auto">
                {{ $slot }}
            </x-panel> 
        </main>      
    </div> 
</section>