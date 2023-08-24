<div class="mt-16 px-6 py-4 bg-white md:mx-auto shadow-md overflow-hidden sm:rounded-lg ">

    <x-form-paragraph>{{__('Add New User')}}</x-form-paragraph>

    <form action="{{ route('posts.store') }}" method="POST">
        
        @csrf
        
        <div>
            <x-input-label for="formItemTitle" :value="__('Email')" />

            <x-text-input id="formItemTitle" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  required autofocus />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="formItemName" :value="__('Name')" />

            <x-text-input id="formItemName" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  required />
    
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="formItemSurname" :value="__('Surname')" />

            <x-text-input id="formItemSurname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')"  required />
    
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="formItemAddress" :value="__('Address')" />

            <x-text-input id="formItemAddress" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
    
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="formItemPhoneNumber" :value="__('Phone Number')" />

            <x-text-input id="formItemPhoneNumber" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" />
    
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>
        
        <div class="flex items-center mt-4">    

            <x-primary-button>
                {{ __('Add') }}
            </x-primary-button>

        </div>
    
    </form>
    
</div>
