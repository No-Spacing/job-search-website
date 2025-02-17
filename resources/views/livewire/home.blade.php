<div>
    {{-- Home Section --}}
    <x-header title="Home" separator>
    </x-header>
    @php
        $slides = [
            [
                'image' => '/image/job-search-cover.jpeg',
                'title' => 'Looking for a Job',
                'description' => 'Thousands of job to choose from.',
                'url' => '#',
                'urlText' => 'Apply now',
            ]
        ];
    @endphp
    <x-carousel :slides="$slides" class="h-96"  />
    
    {{-- Job Section. --}}
        @include('jobs')
</div>
