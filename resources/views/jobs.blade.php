<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
            <li class="mb-4">
                <a href="/jobs/{{ $job->id }}" class="text-blue-500 hover:underline">
                    <strong>{{ $job->title }}</strong>
                </a>
                <p>Employer: {{ $job->employer->name }}</p>
                <p>Salary: {{ $job->salary }}</p>

                <ul class="flex gap-2 text-sm text-gray-500">
                    @foreach ($job->tags as $tag)
                        <li class="bg-gray-200 px-2 py-1 rounded">#{{ $tag->name }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</x-layout>
