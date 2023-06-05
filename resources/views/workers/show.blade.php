@extends('layouts.layout')
@section('title', 'Hire [worker name] - Freelancer Profile')
@section('description', 'Find the perfect freelancer for your project. Discover the skills, portfolio, and experience of [worker name] on our platform. Contact [worker name] now to start your collaboration.')
@section('keywords', 'freelancer, [worker name], portfolio, skills, experience, collaboration')
@section('class-html', 'class="h-full bg-gray-100"')

@section('head')
    @vite('resources/css/swiper.css')
@endsection
@section('content')
    <div class="min-h-full">

        <!-- Page header -->
        <div>
            <div>
                <img class="h-32 w-full object-cover lg:h-48"
                     src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                     alt="">
            </div>
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                    <div class="flex">
                        <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                             src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                             alt="">
                    </div>
                    <div class="mt-4 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                        <div class="sm:hidden md:block min-w-0 flex-1">
                            <div class="flex gap-4 items-center">
                            <h1 class="text-2xl font-bold text-gray-900 truncate">Ricardo Cooper</h1></div>
                        </div>
                        <!-- Following/follower count -->

                        <div class="flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <button type="button"
                                    class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <!-- Heroicon name: solid/mail -->
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                <span>Message</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block md:hidden mt-6 min-w-0 flex-1">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">Ricardo Cooper</h1>
                </div>
            </div>
        </div>

        <div
            class="my-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
            <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                <!-- Description list-->
                <section aria-labelledby="applicant-information-title">
                    <div class="bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">
                                Applicant Information</h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                                    <dd class="mt-1 text-sm text-gray-900">ricardocooper@example.com</dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                    <dd class="mt-1 text-sm text-gray-900">+1 555-555-5555</dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Skills</dt>
                                    <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        Data science
                                    </dd>
                                    <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        Data science
                                    </dd>
                                    <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        Data science
                                    </dd>

                                    <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        Data science
                                    </dd>
                                    <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        Data science
                                    </dd>
                                    <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        Data science
                                    </dd>

                                    <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        Data science
                                    </dd>
                                    <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        Data science
                                    </dd>
                                    <dd class="mt-1 text-sm text-gray-900 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        Data science
                                    </dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">About</dt>
                                    <dd class="mt-1 text-sm text-gray-900">Fugiat ipsum ipsum deserunt culpa aute sint
                                        do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip
                                        consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure
                                        nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
                                    </dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <ul role="list"
                                            class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <!-- Heroicon name: solid/paper-clip -->
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                              d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate"> resume_front_end_developer.pdf </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                                                        Download </a>
                                                </div>
                                            </li>

                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <!-- Heroicon name: solid/paper-clip -->
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                              d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate"> coverletter_front_end_developer.pdf </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                                                        Download </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </section>

                <!-- Comments-->
                <section aria-labelledby="notes-title">
                    <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                        <div class="divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:px-6">
                                <h2 id="notes-title" class="text-lg font-medium text-gray-900">Notes</h2>
                            </div>
                            <div class="px-4 py-6 sm:px-6">
                                <ul role="list" class="space-y-8">
                                    <li>
                                        <div class="flex space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt="">
                                            </div>
                                            <div>
                                                <div class="text-sm">
                                                    <a href="#" class="font-medium text-gray-900">Leslie Alexander</a>
                                                </div>
                                                <div class="mt-1 text-sm text-gray-700">
                                                    <p>Ducimus quas delectus ad maxime totam doloribus reiciendis ex.
                                                        Tempore dolorem maiores. Similique voluptatibus tempore non
                                                        ut.</p>
                                                </div>
                                                <div class="mt-2 text-sm space-x-2">
                                                    <span class="text-gray-500 font-medium">4d ago</span>
                                                    <span class="text-gray-500 font-medium">&middot;</span>
                                                    <button type="button" class="text-gray-900 font-medium">Reply
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="flex space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt="">
                                            </div>
                                            <div>
                                                <div class="text-sm">
                                                    <a href="#" class="font-medium text-gray-900">Michael Foster</a>
                                                </div>
                                                <div class="mt-1 text-sm text-gray-700">
                                                    <p>Et ut autem. Voluptatem eum dolores sint necessitatibus quos.
                                                        Quis eum qui dolorem accusantium voluptas voluptatem ipsum. Quo
                                                        facere iusto quia accusamus veniam id explicabo et aut.</p>
                                                </div>
                                                <div class="mt-2 text-sm space-x-2">
                                                    <span class="text-gray-500 font-medium">4d ago</span>
                                                    <span class="text-gray-500 font-medium">&middot;</span>
                                                    <button type="button" class="text-gray-900 font-medium">Reply
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="flex space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt="">
                                            </div>
                                            <div>
                                                <div class="text-sm">
                                                    <a href="#" class="font-medium text-gray-900">Dries Vincent</a>
                                                </div>
                                                <div class="mt-1 text-sm text-gray-700">
                                                    <p>Expedita consequatur sit ea voluptas quo ipsam recusandae. Ab
                                                        sint et voluptatem repudiandae voluptatem et eveniet. Nihil quas
                                                        consequatur autem. Perferendis rerum et.</p>
                                                </div>
                                                <div class="mt-2 text-sm space-x-2">
                                                    <span class="text-gray-500 font-medium">4d ago</span>
                                                    <span class="text-gray-500 font-medium">&middot;</span>
                                                    <button type="button" class="text-gray-900 font-medium">Reply
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-6 sm:px-6">
                            <div class="flex space-x-3">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full"
                                         src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80"
                                         alt="">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <form action="#">
                                        <div>
                                            <label for="comment" class="sr-only">About</label>
                                            <textarea id="comment" name="comment" rows="3"
                                                      class="p-2 shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md"
                                                      placeholder="Add a note"></textarea>
                                        </div>
                                        <div class="mt-3 flex items-center justify-between">
                                            <div class="flex items-center">
                                                <!-- Heroicon name: solid/question-mark-circle -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                                                </svg>
                                                <div class="ml-2 text-sm text-gray-800 rounded-lg" role="alert">
                                                    <span class="font-medium">Keep it respectful.</span>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Comment
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                    <h2 id="timeline-title" class="text-lg font-medium text-gray-900">My realisations</h2>

                    <div>
                        <!-- Activity Feed -->
                        <div>
                            <div class="flow-root mt-6">
                                <ul role="list" class="-my-5 divide-y divide-gray-200 max-h-80 overflow-y-auto">
                                    <li class="py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                     src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt="">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900">Leonard Krasner</p>
                                                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet,
                                            </div>
                                            <div>
                                                <a href="#"
                                                   class="button-show-picture-1 inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                    Photos </a>
                                                <div></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="content-show-pictures-1 hidden fixed z-10 inset-0 overflow-y-auto">
                            <div
                                class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <!-- Background overlay -->
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <!-- Modal content -->
                                <div
                                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-screen-lg sm:w-full"
                                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                            NAME OF WORK</h3>
                                        <!-- Slider main container -->
                                        <swiper-container class="mySwiper" css-mode="true" navigation="true"
                                                          keyboard="true"
                                                          mousewheel="true" slides-per-view="auto" space-between="30">
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                            <swiper-slide><img class="w-full h-auto max-w-xl"
                                                               src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                               alt=""></swiper-slide>
                                        </swiper-container>

                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="button"
                                                class="closebtn-1 mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                @click="showModal = false">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <script>
        // JavaScript code
        document.addEventListener("DOMContentLoaded", function () {
            const pictureButtons = document.querySelectorAll(".button-show-picture-1");
            const modalContainers = document.querySelectorAll(".content-show-pictures-1");

            pictureButtons.forEach(function (button, index) {
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    modalContainers[index].classList.remove("hidden");
                });
            });

            modalContainers.forEach(function (modalContainer) {
                modalContainer.addEventListener("click", function (event) {
                    const targetClassList = event.target.classList;
                    if (
                        targetClassList.contains("content-show-pictures-1") ||
                        targetClassList.contains("closebtn-1")
                    ) {
                        modalContainer.classList.add("hidden");
                    }
                });
            });
        });

    </script>
@endsection
