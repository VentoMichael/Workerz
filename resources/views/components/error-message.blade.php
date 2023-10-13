@if($message)
        <div x-data="{ show: true, progress: 0, timer: null }"
             x-show="show"
             x-data
             x-init="
            timer = setTimeout(() => {
                show = false;
                @this.set('errorMessage', null);
            }, 5000);

            let interval = setInterval(() => {
                if (progress < 100) {
                    progress += 1;
                } else {
                    clearInterval(interval);
                }
            }, 50);

            $el.addEventListener('mouseenter', () => {
                clearInterval(interval);
                clearTimeout(timer);
            });

            $el.addEventListener('mouseleave', () => {
                interval = setInterval(() => {
                    if (progress < 100) {
                        progress += 1;
                    } else {
                        clearInterval(interval);
                    }
                }, 50);

                timer = setTimeout(() => {
                    show = false;
                    @this.set('errorMessage', null);
                }, 5000);
            });
        "
             class="z-50 max-w-xs flex gap-5 fixed right-8 bottom-4 bg-green-100 rounded-b text-teal-900 px-5 py-4 pt-6 shadow-md"
             role="alert">
            <div class="absolute top-0 left-0 w-full">
                <div x-bind:style="'width: ' + progress + '%'" class="h-2 bg-red-500 absolute top-0 left-0 rounded-t"></div>
            </div>
        <div class="flex gap-2">

            <div class="py-1">
                <svg class="flex-shrink-0 inline w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">Error !</p>
                <p class="text-sm">{{ $message }}</p>
            </div>
        </div>
        <button wire:click="clearMessage('{{ $clearProperty }}')" type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-800 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
