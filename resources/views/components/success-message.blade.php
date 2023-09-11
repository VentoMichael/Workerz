@if($message)
    <div class="flex gap-5 fixed right-8 bottom-4 bg-green-100 border-t-4 border-green-500 rounded-b text-teal-900 px-5 py-4 shadow-md" role="alert">
        <div class="flex gap-2">

            <div class="py-1">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3 svg-success" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     height="1em" viewBox="0 0 512 512">
                    <style>.svg-success {
                            fill: #03543f
                        }</style>
                    <path
                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">Success !</p>
                <p class="text-sm">{{ $message }}</p>
            </div>
        </div>
        <button wire:click="clearMessage('{{ $clearProperty }}')" type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-800 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
