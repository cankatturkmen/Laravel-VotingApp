<div>

    <div class="idea-and-buttons container">

        <div class="idea-container mt-4 bg-white rounded-xl flex" >

            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none mx-2  ">
                    <a href="#" >
                        <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>

                <div class="w-full mx-2  md:mx-4">
                    <h4 class="text-xl font-semibold mt-2 md:mt-0">
                     {{ $idea->title }}
                    </h4>
                    <div class="text gray-600 mt-3 ">
                        @admin
                        @if($idea->spam_reports >0)
                            <div class=" text-red mb-2">Spam Reports: {{ $idea->spam_reports }}</div>
                        @endif

                        @endadmin
                        {{ $idea->description }}
                    </div>
                    <div class="flex flex-col md:flex-row items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="hidden md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
                            <div class="hidden md:block">
                                &bull;
                            </div>
                            <div>{{ $idea->created_at->diffForHumans() }}</div>
                            <div>
                                &bull;
                            </div>
                            <div>{{ $idea->category->name }}</div>
                            <div>
                                &bull;
                            </div>
                            <div class="text-gray-900">3 comments</div>


                        </div>
                        <div
                        x-data="{isOpen : false}"
                        class="flex items-center space-x-2 mt-4 md:mt-0">
                            <div class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none
                            rounded-full text-center w-28 h-7 py-2 px-4">{{ $idea->status->name }}

                            </div>
                            @auth


                            <div class="relative">
                                <button
                                @click="isOpen = !isOpen"
                                class="relative bg-gray-100 hover:bg-gray-200 transition duration-150 ease-in border rounded-full h-7 py-2 px-3">
                                    <svg  fill="currentColor" width="24" height="15" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>

                                </button>
                                <ul
                                x-cloak
                                x-show.transition.origin.top.left.duration.300ms = "isOpen"
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class=" absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3
                                z-10 md:ml-8 top-8 md:top-6 right-0 md:left-0">
                                    @can('update',$idea)
                                        <li><a
                                            href="#"
                                            @click.prevent="
                                            isOpen= false
                                            $dispatch('custom-show-edit-modal')
                                            "
                                            class="hover:bg-gray-100 px-3 py-3 block transition duration-150 ease-in">Edit Idea</a>
                                        </li>
                                    @endcan
                                    @can('delete',$idea)
                                        <li><a
                                            href="#"
                                            @click.prevent="
                                            isOpen= false
                                            $dispatch('custom-show-delete-modal')
                                            "
                                            class="hover:bg-gray-100 px-3 py-3 block transition duration-150 ease-in">Delete Idea</a>
                                        </li>
                                    @endcan

                                        <li>
                                            <a
                                                href="#"
                                                @click.prevent="
                                                isOpen= false
                                                $dispatch('custom-show-mark-idea-as-spam-modal')
                                                "
                                                class="hover:bg-gray-100 px-3 py-3 block transition duration-150 ease-in">Mark as Spam</a>
                                        </li>

                                        <li>
                                            <a
                                                href="#"
                                                @click.prevent="
                                                    isOpen= false
                                                    $dispatch('custom-show-mark-idea-as-not-spam-modal')
                                                "
                                                class="hover:bg-gray-100 px-3 py-3 block transition duration-150 ease-in">Mark as Not Spam</a>
                                        </li>



                                </ul>
                            </div>
                            @endauth
                        </div>
                        <div class="flex items-center md:hidden  mt-4 md:mt-0">
                            <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                                <div class="text-sm font-bold leading-none @if($hasVoted) text-blue @endif">
                                    {{ $votesCount }}
                                </div>
                                <div class="text-xxs font-semibold leading-none text-gray-400">
                                    Votes
                                </div>

                            </div>
                            @if($hasVoted)
                                <button
                                wire:click.prevent="vote"
                                class="w-20 bg-blue text-white border border-blue font-bold text-xxs uppercase
                                rounded-xl hover:bg-blue-hover trasition duration-150 ease-in px-4 py-3 -mx-5">Voted</button>
                            @else
                                <button

                                wire:click.prevent="vote"
                                class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase
                                rounded-xl hover:border-gray-400 trasition duration-150 ease-in px-4 py-3 -mx-5">Vote</button>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end idea-container -->
        <div class="button-container flex items-center justify-between mt-6">
        <div class="flex flex-col md:flex-row items-center space-x-4 md:ml-6">
            <div
            x-data="{isOpen : false}"
            class="relative">
                    <button
                    @click="isOpen = !isOpen"
                    type="button"
                    class=" text-white flex items-center justify-center w-32 h-11 text-sm bg-blue font-semibold
                    rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">

                    Reply
                    </button>
                    <div
                    x-cloak
                    x-show.transition.origin.top.left.duration.300ms = "isOpen"
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class=" absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                        <form action="#" class="space-y-4 px-4 py-6">
                            <div>
                                <textarea name="post_comment" id="post_comment" cols="30" rows="4"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                                placeholder="Go ahead, don't be shy. Share your thought..." >
                                </textarea>
                                <!--TODO placeholder need to be fixed-->
                            </div>
                            <div class="flex flex-col md:flex-row items-center md:space-x-3">
                                <button type="button"
                                class=" text-white flex items-center justify-center w-full md:w-1/2 h-11 text-sm bg-blue font-semibold
                                rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0">

                                Post Comment
                                </button>
                                <button type="button" class="flex items-center justify-center w-full md:w-32  h-11 text-xs bg-gray-200 font-semibold
                                rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0">
                                <svg class=" text-gray-600 h-6 w-6 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-2">Attach</span>
                            </button>
                            </div>
                        </form>
                    </div>
            </div>
            @admin
                <livewire:set-status :idea="$idea" />
            @endadmin




        </div>
        <div class="hidden md:flex items-center space-x-3">
                <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                    <div class="text-xl leading-snug @if($hasVoted) text-blue @endif">
                        {{ $votesCount }}
                    </div>
                    <div class="text-gray-400 text-xs leading-none">Votes</div>
                </div>
                @if ($hasVoted)
                <button


                wire:click.prevent="vote"
                class=" w-32 h-11 text-xs bg-blue text-white  uppercase font-semibold
                rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">

                    <span >Voted</span>

                </button>
                @else
                <button


                wire:click.prevent="vote"
                class=" w-32 h-11 text-xs bg-gray-200 uppercase font-semibold
                rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">

                    <span >Vote</span>

                </button>
                @endif

        </div>
        </div><!--button container-->
    </div><!-- end ideas and button container-->
    {{-- Care about people's approval and you will be their prisoner. --}}
</div>
