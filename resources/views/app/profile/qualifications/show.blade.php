<x-app-layout>
    <section>
        <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:py-12 lg:px-8 bg-white rounded-lg shadow-lg">

            <div class="space-y-6">

                    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ml-4 mt-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Qualifications
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Add your qualifications here.
                            </p>
                        </div>
                        <div class="ml-4 mt-4 flex-shrink-0">
                            <button
                                type="button"
                                class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                onclick='Livewire.emit("openModal", "profile.qualification-form", {{ json_encode(["profile" => $profile]) }})'
                            >
                                Add New
                            </button>
                        </div>
                    </div>

                <ul role="list" class="divide-y divide-gray-200">

                    @foreach ($qualifications as $qualification)
                        <li>
                        <a href="#" class="block hover:bg-gray-50">
                        <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-indigo-600 truncate">
                         {{ $qualification->title->name }}
                        </div>
                        <div class="ml-2 flex-shrink-0 flex">
                        <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{ $qualification->grade ? $qualification->grade : 'Not complete' }}
                        </span>
                        </div>
                        </div>
                        <div class="mt-2 flex justify-between">
                        <div class="sm:flex">
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        {{ $qualification->institute->name }}
                        </div>
                        </div>
                        <div class="ml-2 flex items-center text-sm text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $qualification->current ? 'Ongoing' : 'finished ' . $qualification->started_at->diffForHumans() }}
                        </div>
                        </div>
                        </div>
                        </a>
                        </li>
                    @endforeach

                </ul>
            </div>

{{--            <livewire:profile.qualification-form--}}
{{--                :profile="$user->profile"--}}
{{--            />--}}

        </div>
    </section>
</x-app-layout>
