@extends('layouts.dashboard.layout')
@section('title', 'Messages')
@section('description', 'View and manage your messages and conversations.')
@section('keywords', 'messages, inbox, conversations, chat')

@section('content')

    <main class="max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        <section class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <h1 class="sr-only">Messenger</h1>
            @include('layouts.dashboard.secondHeader')

            <div id="main_content" class="container mx-auto col-span-9">
                <div class="scroll-smooth overflow-x-auto flex gap-2">
                    <div id="toast-notification"
                         class="border-2 border-gray-100 min-w-280 mb-4 w-full max-w-xs p-4 text-gray-900 bg-white rounded-lg cursor-pointer"
                         role="alert">
                        <div class="flex items-center">
                            <div class="relative inline-block shrink-0">
                                <img class="object-cover w-12 h-12 rounded-full"
                                     src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg"
                                     alt="Jese Leos image"/>
                                <span
                                    class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-indigo-600 rounded-full">
                <svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                              d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                              clip-rule="evenodd"></path></svg>
                <span class="sr-only">Message icon</span>
            </span>
                            </div>
                            <div class="ml-3 text-sm font-normal">
                                <div class="text-sm font-semibold text-gray-900">Bonnie Green</div>
                                <div class="text-sm font-normal truncate w-36">commmented on your photo</div>
                                <span class="text-xs font-medium text-indigo-600">a few seconds ago</span>
                            </div>
                        </div>
                    </div>
                    <div id="toast-notification"
                         class="border-2 border-gray-100 min-w-280 mb-4 w-full max-w-xs p-4 text-gray-900 bg-white rounded-lg cursor-pointer"
                         role="alert">
                        <div class="flex items-center">
                            <div class="relative inline-block shrink-0">
                                <img class="object-cover w-12 h-12 rounded-full"
                                     src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg"
                                     alt="Jese Leos image"/>
                                <span
                                    class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-indigo-600 rounded-full">
                <svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                              d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                              clip-rule="evenodd"></path></svg>
                <span class="sr-only">Message icon</span>
            </span>
                            </div>
                            <div class="ml-3 text-sm font-normal">
                                <div class="text-sm font-semibold text-gray-900">Bonnie Green</div>
                                <div class="text-sm font-normal truncate w-36">commmented on your photo</div>
                                <span class="text-xs font-medium text-indigo-600">a few seconds ago</span>
                            </div>
                        </div>
                    </div>
                    <div id="toast-notification"
                         class="border-2 border-gray-100 min-w-280 mb-4 w-full max-w-xs p-4 text-gray-900 bg-white rounded-lg cursor-pointer"
                         role="alert">
                        <div class="flex items-center">
                            <div class="relative inline-block shrink-0">
                                <img class="object-cover w-12 h-12 rounded-full"
                                     src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg"
                                     alt="Jese Leos image"/>
                                <span
                                    class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-indigo-600 rounded-full">
                <svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                              d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                              clip-rule="evenodd"></path></svg>
                <span class="sr-only">Message icon</span>
            </span>
                            </div>
                            <div class="ml-3 text-sm font-normal">
                                <div class="text-sm font-semibold text-gray-900">Bonnie Green</div>
                                <div class="text-sm font-normal truncate w-36">commmented on your photo</div>
                                <span class="text-xs font-medium text-indigo-600">a few seconds ago</span>
                            </div>
                        </div>
                    </div>
                    <div id="toast-notification"
                         class="border-2 border-gray-100 min-w-280 mb-4 w-full max-w-xs p-4 text-gray-900 bg-white rounded-lg cursor-pointer"
                         role="alert">
                        <div class="flex items-center">
                            <div class="relative inline-block shrink-0">
                                <img class="object-cover w-12 h-12 rounded-full"
                                     src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg"
                                     alt="Jese Leos image"/>
                                <span
                                    class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-indigo-600 rounded-full">
                <svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                              d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                              clip-rule="evenodd"></path></svg>
                <span class="sr-only">Message icon</span>
            </span>
                            </div>
                            <div class="ml-3 text-sm font-normal">
                                <div class="text-sm font-semibold text-gray-900">Bonnie Green</div>
                                <div class="text-sm font-normal truncate w-36">commmented on your photo</div>
                                <span class="text-xs font-medium text-indigo-600">a few seconds ago</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="border rounded">
                    <div>
                        <div class="w-full">
                            <div class="relative flex items-center p-3 border-b border-gray-300 justify-between">
                                <div class="flex items-center">
                                    <img class="object-cover w-10 h-10 rounded-full"
                                         src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg"
                                         alt="username"/>
                                    <span class="block ml-2 font-bold text-gray-600">Emma</span>
                                </div>
                            </div>

                            <div class="relative w-full p-6 overflow-y-auto h-[28rem]">

                                <ul class="space-y-2">
                                    <li class="flex justify-start">
                                        <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                            <span class="block">Hi</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-end">
                                        <div
                                            class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                            <span class="block">Hiiii</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-end">
                                        <div
                                            class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                            <span class="block">how are you?</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-start">
                                        <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                            <span class="block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. </span>
                                        </div>
                                    </li>
                                    <li class="flex justify-start">
                                        <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                            <span class="block">Hi</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-end">
                                        <div
                                            class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                            <span class="block">Hiiii</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-end">
                                        <div
                                            class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                            <span class="block">how are you?</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-start">
                                        <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                            <span class="block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. </span>
                                        </div>
                                    </li>
                                    <li class="flex justify-start">
                                        <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                            <span class="block">Hi</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-end">
                                        <div
                                            class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                            <span class="block">Hiiii</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-end">
                                        <div
                                            class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                            <span class="block">how are you?</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-start">
                                        <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                            <span class="block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. </span>
                                        </div>
                                    </li>
                                    <li class="flex justify-start">
                                        <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                            <span class="block">Hi</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-end">
                                        <div
                                            class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                            <span class="block">Hiiii</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-end">
                                        <div
                                            class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                            <span class="block">how are you?</span>
                                        </div>
                                    </li>
                                    <li class="flex justify-start">
                                        <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                            <span class="block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. </span>
                                        </div>
                                    </li>
                                </ul>

                            </div>

                            <div class="flex items-baseline justify-between w-full p-3 border-t border-gray-300">


                                <label for="message-input" class="hidden">Message</label><textarea placeholder="Message"
                                                                                                   class="resize-none block w-full py-2 px-3 mx-3 bg-gray-100 rounded-lg outline-none focus:text-gray-700"
                                                                                                   name="message"
                                                                                                   required
                                                                                                   id="message-input"
                                                                                                   rows="5"></textarea>


                                <button type="submit">
                                    <span class="hidden">Send</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor"
                                         class="w-6 h-6 text-gray-500 origin-center ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



@endsection

@section('scripts')
    <script>

        window.addEventListener('DOMContentLoaded', function () {
            const chatDiv = document.querySelector('.relative.w-full.p-6.overflow-y-auto');
            chatDiv.scrollTop = chatDiv.scrollHeight;
        });
    </script>
@endsection

