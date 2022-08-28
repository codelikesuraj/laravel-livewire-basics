<div class="grid grid-cols-1 sm:grid-cols-2 px-5 my-5 text-sm gap-3 m-auto w-full lg:w-2/3">
    <div class="bg-gray-100 space-y-5 p-3 pt-20">
        <h1 class="text-3xl font-bold">Get in touch</h1>
        <p>Nullam risus blandlit ac aliquam justo Iplsum. Quam mauris volutpat massa dictumst amet. Sapien tortor
            lacus arcu.
        </p>
        <p>742 Evergreen Terrace<br />Springfield, OR 12345</p>
        <p>Phone: +1 (555) 123-4567<br />Email: support@example.com</p>
        <p>Looking for careers? <a href="#"><span class="font-bold underline">View all job openings.</span></a>
        </p>
    </div>
    <div class="p-2 py-20">
        @if (Session::has('status'))
            <div class="flex justify-center text-center my-4">
                <p
                    class="w-full p-2 px-4 rounded-md bg-green-50  border tracking-wide text-gray-700 border-green-500 font-bold ">
                    {{ Session::get('status') }}</p>
            </div>
        @endif
        <form method="post" action="{{ url('/contact-form') }}" class="grid grid-cols-1 gap-6"
            wire:submit.prevent="submitForm">
            @csrf
            <label for="name" class="block">
                <input type="text" id="name" name="name" wire:model="name"
                    class="form-input w-full @error('name') border border-red-500 @enderror" placeholder="Full Name"
                    value="{{ old('name') }}" />
                @error('name')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </label>
            <label for="email" class="block">
                <input type="email" id="email" wire:model="email"
                    class="form-input w-full @error('email') border border-red-500 @enderror" placeholder="Email"
                    name="email" value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </label>
            <label for="phone" class="block">
                <input type="text" id="phone" wire:model="phone"
                    class="form-input w-full @error('phone') border border-red-500 @enderror" placeholder="Phone"
                    name="phone" value="{{ old('phone') }}" />
                @error('phone')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </label>
            <label for="message" class="block">
                <textarea class="form-input w-full @error('message') border border-red-500 @enderror" placeholder="Message"
                    id="message" wire:model="message" name="message">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </label>
            <label class="block">
                <button
                    class="inline-flex p-2 px-5 items-center bg-indigo-600 text-white hover:bg-indigo-700 tracking-widest disabled:opacity-50  text-base">
                    <svg wire:target="submitForm" wire:loading.class="animate-spin -ml-1 mr-3 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span>Submit</span>
                </button>
            </label>
        </form>
    </div>
</div>
