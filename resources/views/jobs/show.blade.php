<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <!-- Employer -->
    <p class="text-sm text-gray-500">
        Employer: {{ $job->employer->name }}
    </p>

    <!-- Job Title -->
    <h2 class="font-bold text-lg mt-2">{{ $job->title }}</h2>

    <!-- Salary -->
    <p class="mt-2">This job pays <strong>{{ $job->salary }}</strong> per year.</p>

    <!-- Tags -->
    <h3 class="font-semibold mt-4">Tags:</h3>
    <ul class="flex gap-2 text-sm text-gray-500">
        @foreach ($job->tags as $tag)
            <li class="bg-gray-200 px-2 py-1 rounded">#{{ $tag->name }}</li>
        @endforeach
    </ul>

    <!-- Actions -->
    <div class="mt-6 flex gap-4">
        <!-- Back -->
        <a href="/jobs" class="text-sm text-gray-600 hover:underline">← Back to Jobs</a>

        <!-- Edit -->
        <a href="/jobs/{{ $job->id }}/edit" class="text-sm text-blue-600 hover:underline">Edit</a>

        <!-- Delete -->
        <form method="POST" action="/jobs/{{ $job->id }}" 
      onsubmit="return confirm('Are you sure you want to delete this job?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-sm text-red-600 hover:underline">
        Delete Job
    </button>

    <div class="mt-6">
    <a href="/jobs" class="text-sm text-gray-600 hover:underline">
        ← Back to Jobs
    </a>
</div>

</form>
    </div>
</x-layout>
