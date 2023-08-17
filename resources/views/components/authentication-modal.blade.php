<!-- Main modal -->
<section id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed items-center justify-center z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-gray-50 rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h2 class="mb-4 text-xl font-medium text-gray-900">Sign in to our platform</h2>
                <form class="space-y-6" action="#">
                    <div>
                        <label for="email-login" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input type="email" name="email-login" id="email-login" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" required>
                    </div>
                    <div>
                        <label for="password-login" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                        <input type="password" name="password-login" id="password-login" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required>
                            </div>
                            <label for="remember" class="ml-2 text-sm font-medium text-gray-900">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-blue-700 hover:underline">Lost Password?</a>
                    </div>
                    <x-button type="submit" kind="primary">Login to your account</x-button>
                    <div class="text-sm font-medium text-gray-500">
                        Not registered? <a href="#" class="text-blue-700 hover:underline">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
