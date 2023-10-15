@if($message)
    <div x-data="{ show: true, progress: 0, timer: null }"
         x-show="show"
         x-data
         x-init="
            timer = setTimeout(() => {
                show = false;
                @this.set('infoMessage', null);
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
                    @this.set('infoMessage', null);
                }, 5000);
            });
        "
         class="z-50 max-w-xs flex gap-5 fixed right-8 bottom-4 bg-blue-100 rounded-b text-teal-900 px-5 py-4 pt-6 shadow-md"
         role="alert">
        <div class="absolute top-0 left-0 w-full">
            <div x-bind:style="'width: ' + progress + '%'" class="h-2 bg-blue-500 absolute top-0 left-0 rounded-t"></div>
        </div>
        <div class="flex gap-2">

            <div class="py-1">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>

            </div>
            <div>
                <p class="font-bold">Info !</p>
                <p class="text-sm">{{ $message }}</p>
            </div>
        </div>
        <button wire:click="clearMessage('{{ $clearProperty }}')" type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-800 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8"
                aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
