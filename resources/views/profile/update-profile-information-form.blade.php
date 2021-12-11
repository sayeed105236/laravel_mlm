<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Applicant Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="user_name" value="{{ __('User Name') }}" />
            <x-jet-input disabled id="user_name" type="text" class="mt-1 block w-full" wire:model.defer="state.user_name" autocomplete="user_name" />
            <x-jet-input-error for="user_name" class="mt-2" />
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input disabled id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />

            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="image" value="{{ __('Profile Photo') }}" />
            <x-jet-input  id="photo" type="file" class="mt-1 block w-full" wire:model.defer="state.photo" />

            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="gender" value="{{ __('Gender') }}" />

            <select class="mt-1 block w-full" wire:model.defer="state.gender" autocomplete="gender" id="gender" name="gender">
                <option label="Choose Gender"></option>


                <option value="male">Male</option>
                <option value="female">Female</option>

            </select>
            <x-jet-input-error for="gender" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="user_name" value="{{ __('Date of Birth') }}" />
            <x-jet-input id="birth" type="date" class="mt-1 block w-full" wire:model.defer="state.birth" autocomplete="birth" />
            <x-jet-input-error for="birth" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="gender" value="{{ __('Personal Address') }}" />
            <x-jet-input id="gender" type="text" class="mt-1 block w-full" wire:model.defer="state.gender" autocomplete="gender" />
            <x-jet-input-error for="gender" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="number" value="{{ __('Mobile') }}" />
            <x-jet-input id="number" type="number" class="mt-1 block w-full" wire:model.defer="state.number" autocomplete="number" />
            <x-jet-input-error for="number" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="national_id" value="{{ __('National Id') }}" />
            <x-jet-input id="national_id" type="number" class="mt-1 block w-full" wire:model.defer="state.national_id" autocomplete="national_id" />
            <x-jet-input-error for="national_id" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nominee_name" value="{{ __('Nominee Name') }}" />
            <x-jet-input id="nominee_name" type="text" class="mt-1 block w-full" wire:model.defer="state.nomineee_name" autocomplete="nominee_name" />
            <x-jet-input-error for="npminee_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nominee_email" value="{{ __('Nominee Email') }}" />
            <x-jet-input id="nominee_email" type="email" class="mt-1 block w-full" wire:model.defer="state.nominee_email" autocomplete="nominee_email" />
            <x-jet-input-error for="nominee_email" class="mt-2" />
        </div>



    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
