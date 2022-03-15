<?php

declare(strict_types=1);

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Domains\Profile\Enums\ProfileTemplate;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Redirect;
use Infrastructure\Profile\Actions\CreateProfileShareContract;
use Livewire\Component;

class ShareForm extends Component implements HasForms
{
    use InteractsWithForms;

    public Profile $profile;

    public null|string $email = null;

    public null|string $template = null;

    public function submit(CreateProfileShareContract $action): void
    {
        $this->validate();

        $action->handle(
            profile: $this->profile->id,
            email: $this->email,
            template: $this->template,
        );

        Redirect::route(
            'profile:shares:show', $this->profile->uuid,
        );
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')->email()->required(),
            Select::make('template')->options(
                options: ProfileTemplate::class,
            )->required(),
        ];
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return <<<'blade'
            <form class="space-y-8 divide-y divide-y-blue-gray-200" wire:submit.prevent="submit">
                {{ $this->form }}

                <div class="px-4 py-3 text-right sm:px-6">
                    <button
                        type="submit"
                        class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                    >
                        Save
                    </button>
                </div>
            </form>
        blade;
    }
}
