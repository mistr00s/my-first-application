<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <p class="text-sm text-gray-500">Employer: {{ $job->employer->name }}</p>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>
    <p>This job pays {{ $job->salary }} per year.</p>

    <h3 class="font-semibold mt-4">Tags:</h3>
    <ul class="flex gap-2 text-sm text-gray-500">
        @foreach ($job->tags as $tag)
            <li class="bg-gray-200 px-2 py-1 rounded">#{{ $tag->name }}</li>
        @endforeach
    </ul>
</x-layout>
