<x-app-layout>
   <div>
       <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
        <svg  class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
            <span class="ml-2">All ideas (or back to chosen category with filters)</span>
       </a>
   </div>
   <livewire:idea-show :idea='$idea' :votesCount="$votesCount"/>
   <!-- This example requires Tailwind CSS v2.0+ -->
   <livewire:edit-idea />

<div class="comments-container relative space-y-6 md:ml-22 my-8 pt-4 mt-1">
    <div class="comment-container relative mt-4 bg-white rounded-xl flex" >

        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#" >
                    <img src="" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>

            <div class="w-full md:mx-4">
                {{-- <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">Title</a>
                </h4> --}}
                <div class="text gray-600 mt-3 line-clamp-3">
                    Lorem ipsum dolor sit amet consectet
                    ur adipisicing elit. Architecto numquam repudianda
                    e qui aliquam illo. Deserunt, eum consectetur sint quia adipisc
                    i a aut impedit dolor cupiditate ipsum, amet similique at officia?
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-gray-900">John Doe</div>
                        <div>
                            &bull;
                        </div>
                        <div>10 hours Ago</div>
                        <div>
                            &bull;
                        </div>



                    </div>
                    <div
                    x-data="{isOpen : false}"
                    class="flex items-center space-x-2">
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
                                class=" absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3  z-10 md:ml-8 top-8 md:top-6 right-0 md:left-0">
                                        <li><a href="#" class="hover:bg-gray-100 px-3 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 px-3 py-3 block transition duration-150 ease-in">Delete Post</a></li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end comment-container -->

    <div class="is-admin comment-container relative mt-4 bg-white rounded-xl flex" >

        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#" >
                    <img src="" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="uppercase text-blue text-xxs text-center font-bold mt-1">Admin</div>
            </div>

            <div class="w-full mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">Status changed</a>

                </h4>
                <div class="text gray-600 mt-3 line-clamp-3">
                    Lorem ipsum dolor sit amet consectet
                    ur adipisicing elit. Architecto numquam repudianda
                    e qui aliquam illo. Deserunt, eum consectetur sint quia adipisc
                    i a aut impedit dolor cupiditate ipsum, amet similique at officia?
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-blue">Adrea</div>
                        <div>
                            &bull;
                        </div>
                        <div>10 hours Ago</div>
                        <div>
                            &bull;
                        </div>



                    </div>
                    <div class="flex items-center space-x-2">

                        <button class="relative bg-gray-100 hover:bg-gray-200 transition duration-150 ease-in border rounded-full h-7 py-2 px-3">
                            <svg  fill="currentColor" width="24" height="15" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                              </svg>
                              <ul class="hidden absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
                                    <li><a href="#" class="hover:bg-gray-100 px-3 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-3 py-3 block transition duration-150 ease-in">Delete Post</a></li>
                              </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end comment-container -->

</div><!--comments container -->
</x-app-layout>
