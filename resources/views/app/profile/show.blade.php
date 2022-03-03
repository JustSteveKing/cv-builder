<x-app-layout>
    <section>
        <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:py-12 lg:px-8 bg-white rounded-lg shadow-lg">
            <livewire:profile.profile-form
                :user="$user"
            />
        </div>
    </section>
</x-app-layout>
