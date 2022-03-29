<?php

declare(strict_types=1);

use App\Http\Livewire\Profile\ProfileForm;
use App\Models\Profile;
use JustSteveKing\StatusCode\Http;
use Livewire\Livewire;

use function Pest\Laravel\get;

it('loads the profile form', function () {
    $profile = Profile::factory()->create();

    auth()->loginUsingId($profile->owner->id);

    get(route('profile:show'))
        ->assertStatus(Http::OK)
        ->assertSee('Bio')
        ->assertSee('Save');
})->group('profile');

it('allows the user to update their bio on their profile', function (string $string) {
    $profile = Profile::factory()->create();

    auth()->loginUsingId($profile->owner->id);

    expect(
        $profile->bio
    )->toBeString();

    Livewire::test(ProfileForm::class, ['profile' => $profile])
        ->set('bio', $string)
        ->call('submit')
        ->assertHasNoErrors();

    expect($profile->refresh())->bio->toEqual($string);
})->with('strings')->group('profile');
