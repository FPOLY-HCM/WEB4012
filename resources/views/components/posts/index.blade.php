@props(['posts', 'perRow' => 4])

<div
    @class([
        'grid',
        'sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8 mt-8 lg:mt-10' => $perRow == 4,
        'sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 md:gap-8 mt-8 lg:mt-10' => $perRow == 3,
        'sm:grid-cols-1 lg:grid-cols-1 xl:grid-cols-2 gap-6 md:gap-8 mt-8 lg:mt-10' => $perRow == 2,
        'sm:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 gap-6 md:gap-8 mt-8 lg:mt-10' => $perRow == 1,
    ])
>
    @foreach($posts as $post)
        <x-posts.item :$post />
    @endforeach
</div>
