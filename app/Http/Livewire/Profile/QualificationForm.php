<?php

declare(strict_types=1);

namespace App\Http\Livewire\Profile;

use App\Models\Institute;
use App\Models\Profile;
use App\Models\QualificationTitle;
use Closure;
use Domains\Profile\Factories\QualificationFactory;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Infrastructure\Profile\Actions\CreateQualificationContract;
use LivewireUI\Modal\ModalComponent;

class QualificationForm extends ModalComponent implements HasForms
{
    use InteractsWithForms;

    public int $identifier;
    public null|int $title = null;
    public null|int $institute = null;
    public null|string $description = null;
    public null|string $grade = null;
    public null|string $started = null;
    public bool $current = false;
    public null|string $finished = null;

    /**
     * @param Profile $profile
     * @return void
     */
    public function mount(Profile $profile): void
    {
        $this->identifier = $profile->id;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'int',
                Rule::exists('qualification_titles', 'id'),
            ],
            'institute' => [
                'required',
                'int',
                Rule::exists('institutes', 'id'),
            ],
            'description' => [
                'required',
                'string',
            ],
            'grade' => [
                'nullable',
                'string',
            ],
            'started' => [
                'required',
                'date',
            ],
            'current' => [
                'nullable',
                'boolean',
            ],
            'finished' => [
                'nullable',
                'date'
            ]
        ];
    }

    /**
     * @return void
     */
    public function submit(
        CreateQualificationContract $action,
    ): void {
        $this->validate();

        $action->handle(
            object: QualificationFactory::make(
                attributes: array_merge(
                    $this->form->getState(),
                    ['profile' => $this->identifier],
                ),
            ),
        );

        Redirect::route(
            route: 'profile:qualifications:show'
        );
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('title')
                ->options(
                    QualificationTitle::query()
                        ->pluck('name', 'id')
                )->searchable()->required()->columnSpan(2),
            MarkdownEditor::make('description')->nullable()->columnSpan(2),
            Select::make('institute')
                ->options(
                    Institute::query()
                        ->pluck('name', 'id')
                )->searchable()->required()->columnSpan(2),
            TextInput::make('grade')->nullable(),
            DatePicker::make('started')->withoutTime()->required(),
            Checkbox::make('current')
                ->afterStateUpdated(
                    static fn (Closure $set, $state) =>
                    $set('finished', null),
                )
                ->reactive()
                ->nullable(),
            DatePicker::make('finished')
                ->hidden(
                    static fn (Closure $get): bool =>
                    $get('current'),
                )->withoutTime()->required()
        ];
    }

    public function render(): string
    {
        return <<<'blade'
            <div class="p-4">
                <form class="mb-6 space-y-8 divide-y divide-y-blue-gray-200" wire:submit.prevent="submit">
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
            </div>
        blade;
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
