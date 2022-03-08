<x-app-layout>
    <section>
        <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:py-12 lg:px-8 bg-white rounded-lg shadow-lg">

            <div class="space-y-6">
                <div>
                    <h1 class="text-lg leading-6 font-medium text-gray-900">
                        Profile Experiences
                    </h1>
                    <p class="mt-1 text-sm text-gray-500">
                        Add your work history.
                    </p>
                </div>
                <livewire:profile.experience-form
                    :profile="$user->profile"
                />
            </div>

        </div>
    </section>
</x-app-layout>
