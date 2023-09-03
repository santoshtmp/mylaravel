<x-layout>
    @include('partials._hero')
    @include('partials._search')
    <div id="create-news" class="left-0 w-full flex items-center justify-start">
        <a href="/news/create" class="m-10 mr-20 ml-auto right-10 text-black border-2 py-2 px-5">Add Newa</a>
        <a href="/news/manage" class="m-10 mr-20 ml-10 right-10 text-black border-2 py-2 px-5">Manage News</a>
    </div>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless (count($datas) == 0)
            @foreach ($datas as $data)
                <x-listing-card :data="$data" :section="$parameter" />
            @endforeach
        @else
            <p>No data available.</p>
        @endunless
    </div>
    <div class="mt-6 p-4">
        {{ $datas->links() }}
    </div>
</x-layout>
