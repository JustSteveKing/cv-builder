<x-app-layout>
    <section>
        <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:py-12 lg:px-8 bg-white rounded-lg shadow-lg">

            <div class="space-y-6">
                <div>
                    <h1 class="text-lg leading-6 font-medium text-gray-900">
                        Shares
                    </h1>
                    <p class="mt-1 text-sm text-gray-500">
                        Create sharable links to your CV.
                    </p>
                </div>

                <livewire:profile.share-form
                    :profile="$profile"
                />

            </div>

        </div>
    </section>

    <x-slot:sidebar>
        <section aria-labelledby="section-2-title">
            <h2 class="sr-only" id="section-2-title">Section title</h2>
            <div class="rounded-lg bg-white overflow-hidden shadow">
                <div class="p-6">
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach ($shares as $share)
                            <li class="py-4">
                                <a
                                    href="{{ route('view:share', $share->token) }}"
                                    title="Share for {{ $share->email }}"
                                    class="flex"
                                >
                                    <img
                                        class="h-10 w-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode($share->email) }}&color=7F9CF5&background=EBF4FF"
                                        alt=""
                                    />
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">{{ $share->email }}</p>
                                        <p class="text-sm text-gray-500">{{ $share->template }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </x-slot:sidebar>
</x-app-layout>
