<?php

declare(strict_types=1);

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Closure;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class ExperienceForm extends Component implements HasForms
{
    use InteractsWithForms;

    public Profile $profile;

    public array $experiences = [];

    public function mount(): void
    {
        $this->form->fill([]);
    }

    public function submit(): void
    {
        $this->form->getState();
    }

    protected function getFormModel(): Profile
    {
        return $this->profile;
    }

    protected function getFormSchema(): array
    {
        return [
            HasManyRepeater::make('experiences')
                ->relationship('experiences')
                ->schema([
                    BelongsToSelect::make('job_title_id')
                        ->relationship('jobTitle', 'name')
                        ->required()->searchable()->preload(),
                    BelongsToSelect::make('company_id')
                        ->relationship('company', 'name')
                        ->required()->searchable()->preload(),
                    MarkdownEditor::make('description')->required(),
                    DatePicker::make('started_at')->withoutTime()->required(),
                    Checkbox::make('current')
                        ->afterStateUpdated(
                            static fn (Closure $set, $state) =>
                            $set('finished_at', null),
                        )
                        ->reactive()
                        ->nullable(),
                    DatePicker::make('finished_at')->hidden(
                        static fn (Closure $get): bool =>
                        $get('current'),
                    )->withoutTime()->required(
                        static fn (Closure $get): bool =>
                        ! $get('current'),
                    )
                ])
        ];
    }

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
