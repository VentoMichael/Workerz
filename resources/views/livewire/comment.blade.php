<section aria-labelledby="notes-title">

    <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
        <div class="divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6 flex justify-between">
                <h2 id="notes-title" class="text-lg font-medium text-gray-900">Commentaires</h2>

                @if(!$comments->isEmpty())

                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <p class="ml-2 text-sm font-bold text-gray-900">{{ $totalRating }}</p>
                        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full"></span>
                        <p class="text-sm font-medium text-gray-900">{{ count($company->comments) }} reviews</p>
                    </div>
                @endif

            </div>
            <div class="px-4 py-6 sm:px-6">
                <ul role="list" class="divide-y space-y-6">
                    @foreach($comments as $comment)
                        <li class="pt-6">

                            <div class="flex items-center mb-4 space-x-4">
                                @if (is_string($user->company->logoUpload) && strpos($user->company->logoUpload, 'initials') !== false)
                                    <img
                                        class="rounded-full h-10 w-10"
                                        src="{{ asset('storage/' . $user->company->logoUpload . '.svg') }}"
                                        alt="Logo of {{ $user->company->name }}"/>
                                @else
                                    <img
                                        class="rounded-full h-10 w-10"
                                        srcset="
            @if (is_array($user->company->logoUpload))
                                        @foreach($user->company->logoUpload as $imagePath)
                                        {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                                        @endif
                                            "
                                        src="{{ asset('storage/' . (is_array($user->company->logoUpload) ? $user->company->logoUpload[0] : $user->company->logoUpload)) }}"
                                        alt="Logo of {{ $user->company->name }}"/>
                                @endif
                                <div class="space-y-1 font-medium">
                                    <p>{{ $comment->name }}
                                        <time datetime="{{$user->created_at}}"
                                              class="block text-sm text-gray-500">Joined on {{ $joinedAt }}
                                        </time>
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center mb-1">
                                @for ($i = 1; $i <= $comment->rating; $i++)
                                    <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                         viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>

                                @endfor
                                @if($comment->rating < 5)
                                    @for ($i = 1; $i <= 5 - $comment->rating ; $i++)
                                        <svg class="w-4 h-4 text-gray-300 mr-1" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                    @endfor
                                @endif
                                <p class="mb-5 text-sm text-gray-500">
                                            <span>Published on
                                                <time
                                                    datetime="{{$comment->created_at}}">{{ $comment->created_at->format('d/m/y, H\hi') }}</time>
                                            </span>
                                </p>

                            </div>
                            <p class="mb-2 text-gray-500">{{ $comment->comment_text }}</p>
                            <div>
                                @if ($commentVotesCount[$comment->id] > 0)
                                    <p class="mt-1 text-xs text-gray-500">
                                        {{ $commentVotesCount[$comment->id] }} {{ $commentVotesCount[$comment->id] === 1 ? 'person' : 'people' }}
                                        found this helpful
                                    </p>
                                @endif

                                @auth
                                    <div class="flex items-center mt-3 space-x-3 divide-x divide-gray-200">
                                        <button wire:click="toggleVote({{ $comment->id }})"
                                                class="text-gray-900 border {{ $commentVotes[$comment->id] ? 'bg-blue-500 text-white' : 'bg-white' }} border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-xs px-2 py-1.5">
                                            {{ $commentVotes[$comment->id] === auth()->user()->id ? 'Voted' : 'Vote' }}
                                        </button>
                                    </div>
                                @endauth
                            </div>
                        </li>
                    @endforeach

                    @if($comments->isEmpty())
                        No comments yet.
                    @endif
                </ul>
            </div>

        </div>
        @auth
            <div class="bg-gray-50 px-4 py-6 sm:px-6">
                <div class="flex space-x-3">
                    <div class="flex-shrink-0">
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole(1))
                            @if (is_string(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) && strpos(\Illuminate\Support\Facades\Auth::user()->company->logoUpload, 'initials') !== false)
                                <img class="w-10 h-10 rounded-full"
                                     src="{{ asset('storage/' . \Illuminate\Support\Facades\Auth::user()->company->logoUpload . '.svg') }}"
                                     alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                            @else
                                <img class="w-10 h-10 rounded-full"
                                     srcset="
            @if (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload))
                                     @foreach(\Illuminate\Support\Facades\Auth::user()->company->logoUpload as $imagePath)
                                     {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                                     @endif
                                         "
                                     src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->company->logoUpload) ? \Illuminate\Support\Facades\Auth::user()->company->logoUpload[0] : \Illuminate\Support\Facades\Auth::user()->avatarUpload)) }}"
                                     alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                            @endif
                        @else
                            @if (is_string(\Illuminate\Support\Facades\Auth::user()->avatarUpload) && strpos(\Illuminate\Support\Facades\Auth::user()->avatarUpload, 'initials') !== false)
                                <img class="w-10 h-10 rounded-full"
                                     src="{{ asset('storage/' . \Illuminate\Support\Facades\Auth::user()->avatarUpload . '.svg') }}"
                                     alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                            @else
                                <img class="w-10 h-10 rounded-full"
                                     srcset="
            @if (is_array(\Illuminate\Support\Facades\Auth::user()->avatarUpload))
                                     @foreach(\Illuminate\Support\Facades\Auth::user()->avatarUpload as $imagePath)
                                     {{ asset('storage/' . $imagePath) }} {{ $loop->iteration }}w,
                @endforeach
                                     @endif
                                         "
                                     src="{{ asset('storage/' . (is_array(\Illuminate\Support\Facades\Auth::user()->avatarUpload) ? \Illuminate\Support\Facades\Auth::user()->avatarUpload[0] : \Illuminate\Support\Facades\Auth::user()->avatarUpload)) }}"
                                     alt="Profile Picture of {{ \Illuminate\Support\Facades\Auth::user()->firstname . \Illuminate\Support\Facades\Auth::user()->lastname }}"/>
                            @endif
                        @endif
                    </div>
                    <div class="min-w-0 flex-1">

                        <div>
                            <form wire:submit.prevent="addComment">
                                <div class="flex space-x-1 mb-2 items-center" id="star-rating">
                                    <p>Note :</p>
                                    <fieldset class="flex space-x-1 mb-2 items-center">
                                        <legend class="sr-only">Star Rating and Comment</legend>
                                        @for($i = 1; $i <= 5; $i++)
                                            <label for="star{{$i}}" class="star"
                                                   style="font-size: 1.5rem; cursor: pointer;">
                                                <span class="sr-only">{{$i}} star</span>
                                                <svg class="hover:text-yellow-300 w-4 h-4 text-gray-300 mr-1"
                                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                     fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                </svg>
                                            </label>
                                            <input type="radio" id="star{{$i}}" name="rating" value="{{$i}}"
                                                   wire:model="rating"/>
                                        @endfor
                                    </fieldset>
                                </div>

                                <div>
                                    <label for="comment" class="sr-only">À propos de</label>
                                    <textarea id="comment" name="comment" rows="3"
                                              class="p-2 shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md"
                                              placeholder="Ajouter un commentaire" wire:model="commentText"></textarea>
                                    @error('commentText') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="mt-3 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <!-- Heroicon name: solid/question-mark-circle -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                                        </svg>
                                        <div class="ml-2 text-sm text-gray-800 rounded-lg" role="alert">
                        <span class="font-medium">Respectez les <a
                                href="{{route('disclaimer')}}"
                                class="underline hover:no-underline">règles.</a></span>
                                        </div>
                                    </div>
                                    <x-button kind="primary">Commenter</x-button>
                                </div>
                                @if($errors->any())
                                    {{ implode('', $errors->all('<div>:message</div>')) }}
                                @endif
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endauth

    </div>
    @if(!$comments->isEmpty())
        <div class="mt-4">
            {{ $comments->links('components/pagination') }}
        </div>
    @endif
</section>
