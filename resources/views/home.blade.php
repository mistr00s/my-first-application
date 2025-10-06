<x-layout>
    <x-slot:heading>
        Welcome to The Jobseeker
    </x-slot:heading>

    <section class="text-center py-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Find Your Dream Job Today</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-6">
            Explore the latest job listings from top employers. Whether you’re looking for remote work,
            full-time positions, or specific skills like PHP or Laravel — we’ve got you covered.
        </p>

        <a href="/jobs"
           class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
           Browse Jobs
        </a>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h3 class="font-semibold text-lg mb-2"> Browse Opportunities</h3>
            <p class="text-gray-600 text-sm">Discover hundreds of job openings across industries and skill levels.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h3 class="font-semibold text-lg mb-2"> Easy Navigation</h3>
            <p class="text-gray-600 text-sm">Use our simple and clean interface to explore available roles quickly.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h3 class="font-semibold text-lg mb-2"> Post a Job</h3>
            <p class="text-gray-600 text-sm">Employers can create listings in minutes to reach potential candidates.</p>
        </div>
    </section>

    <section class="text-center mt-16 py-10 bg-blue-50 rounded-lg">
        <h3 class="text-2xl font-bold text-gray-800 mb-3">Ready to get started?</h3>
        <p class="text-gray-600 mb-6">Join today and start exploring exciting new opportunities.</p>
        <a href="/jobs/create"
           class="bg-blue-600 text-white px-5 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
           Post a Job
        </a>
    </section>
</x-layout>
