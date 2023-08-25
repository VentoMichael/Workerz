<div class="mt-8">

    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md" id="form">
        @if($successMessage)
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Success</span>
                <div>
                    <span class="font-medium">Success!</span> {{ $successMessage }}.
                </div>
                <button wire:click="$set('successMessage',null)" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif
        <form wire:submit.prevent="submitForm" method="get" class="space-y-8">
            <!-- TODO: add error handling for form submission -->
            <!-- TODO: add automatically the email if connected -->
            @csrf
            <div>
                <label for="email_contact" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                <input wire:model.lazy="email_contact" value="{{ old('email_contact') }}" type="email" id="email_contact" name="email_contact"
                       class="@error('email_contact')border border-red-500 @enderror placeholder:text-gray-400 shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                       placeholder="your-email@hotmail.com" >
                 @error('email_contact')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                <input wire:model.lazy="subject" value="{{ old('subject') }}" type="text" id="subject" name="subject"
                       class="@error('subject')border border-red-500 @enderror placeholder:text-gray-400 block p-3 w-full text-sm text-black bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500"
                       placeholder="Let us know how we can help you" >
                @error('subject')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your
                    message</label>
                <textarea wire:model.lazy="message" id="message" name="message" rows="6"
                          class="@error('message')border border-red-500 @enderror placeholder:text-gray-400 block p-2.5 w-full text-sm text-black bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                          placeholder="Leave a message...">{{ old('message') }}</textarea>
                @error('message')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:w-fit">
                <x-button type="submit" kind="primary" class="disabled:opacity-50">
                        Send message
                    <svg wire:loading wire:target="submitForm" aria-hidden="true" class="inline w-5 h-5 ml-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                </x-button>
            </div>
        </form>
    </div>
</div>
