@props(['data', 'section'])
<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $data->logo ? asset('storage/' . $data->logo) : asset('images/no-image.png') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/news/{{ $data->id }}"> {{ $data['title'] }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $data->description }}</div>
            <x-listing-tags :tagsCSV="$data->tags" :section="$section" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>
                {{ $data->location }}
            </div>
        </div>''
    </div>
</x-card>
