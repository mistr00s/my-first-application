<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <!-- 🔹 Global Error Messages -->
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/jobs" class="space-y-4">
        @csrf

        <!-- Job Title -->
        <div>
            <label class="block font-semibold">Job Title</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full border rounded px-3 py-2">
            @error('title')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Salary -->
        <div>
            <label class="block font-semibold">Salary</label>
            <input type="text" name="salary" value="{{ old('salary') }}"
                   class="w-full border rounded px-3 py-2">
            @error('salary')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Employer -->
        <div>
            <label class="block font-semibold">Employer ID</label>
            <input type="number" name="employer_id" value="{{ old('employer_id') }}"
                   class="w-full border rounded px-3 py-2">
            @error('employer_id')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Create Job
        </button>
    </form>
</x-layout>
