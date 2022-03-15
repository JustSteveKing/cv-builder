<x-guest-layout>
    <article>
        <!-- Profile header -->
        <div>
            <div class="h-32 w-full bg-red-500 lg:h-48"></div>
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                    <div class="flex">
                        <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                             src="https://ui-avatars.com/api/?name={{ urlencode($owner->name) }}&color=7F9CF5&background=EBF4FF"
                             alt="">
                    </div>
                    <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                        <div class="sm:hidden 2xl:block mt-6 min-w-0 flex-1">
                            <h1 class="text-2xl font-bold text-gray-900 truncate">
                                {{ $owner->name }}
                            </h1>
                        </div>
                        <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <a
                                href="mailto:{{ $owner->email }}"
                                class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                            >
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" x-description="Heroicon name: solid/mail"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path
                                        d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                <span>Email</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block 2xl:hidden mt-6 min-w-0 flex-1">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                        {{ $share->profile->owner->name }}
                    </h1>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">

                        <a href="#"
                           class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                           x-state:on="Current" x-state:off="Default" aria-current="page"
                           x-state-description="Current: &quot;border-pink-500 text-gray-900&quot;, Default: &quot;border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300&quot;">
                            Profile
                        </a>

                        <a href="#"
                           class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                           x-state-description="undefined: &quot;border-pink-500 text-gray-900&quot;, undefined: &quot;border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300&quot;">
                            Calendar
                        </a>

                        <a href="#"
                           class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                           x-state-description="undefined: &quot;border-pink-500 text-gray-900&quot;, undefined: &quot;border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300&quot;">
                            Recognition
                        </a>

                    </nav>
                </div>
            </div>
        </div>

        <!-- Description list -->
        <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Phone
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        (555) 123-4567
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Email
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        ricardocooper@example.com
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Title
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        Senior Front-End Developer
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Team
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        Product Development
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Location
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        San Francisco
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Sits
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        Oasis, 4th floor
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Salary
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        $145,000
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Birthday
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        June 8, 1990
                    </dd>
                </div>

                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">
                        About
                    </dt>
                    <dd class="mt-1 max-w-prose text-sm text-gray-900 space-y-5">

                        {!! str($profile->bio)->markdown([
                            'html_input' => 'strip',
                        ]) !!}

                    </dd>
                </div>
            </dl>
        </div>

        <!-- Team member list -->
        <div class="mt-8 max-w-5xl mx-auto px-4 pb-12 sm:px-6 lg:px-8">
            <h2 class="text-sm font-medium text-gray-500">
                Work History
            </h2>
            <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-2">
                @foreach ($experiences as $experience)
                    <div
                        class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">

                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $experience->jobTitle->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    {{ $experience->company->name }}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </article>
</x-guest-layout>
