<x-guest-layout>
    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- First Name -->
        <div class="mt-4">
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name', $user->first_name)"
                required />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name', $user->last_name)"
                required />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <div class="mt-2">
                <label for="male" class="inline-flex items-center">
                    <input type="radio" id="male" name="gender" value="m" class="form-radio"
                        {{ old('gender', $user->gender) == 'm' ? 'checked' : '' }}>
                    <span class="ml-2">Male</span>
                </label>
                <label for="female" class="inline-flex items-center ml-6">
                    <input type="radio" id="female" name="gender" value="f" class="form-radio"
                        {{ old('gender', $user->gender) == 'f' ? 'checked' : '' }}>
                    <span class="ml-2">Female</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone_numbers" :value="__('Phone Number(s)')" />

            @foreach ($user->phone_numbers as $index => $phoneNumber)
                <x-text-input id="phone_numbers_{{ $index }}" class="block mt-1 w-full" type="text" name="phone_numbers[]" :value="$phoneNumber" />
            @endforeach

            <x-input-error :messages="$errors->get('phone_numbers')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth"
                :value="old('date_of_birth', $user->date_of_birth)" />
        </div>

        {{-- Profile --}}
        <div class="mt-4">
            <x-input-label for="profile" :value="__('Profile Image')" />
            <input id="profile" type="file" name="profile" />
            <x-input-error :messages="$errors->get('profile')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
