<div>

    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md: w-1/3">
                <select
                wire:model="category"
                 name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                    <option value="All Categories">All Categories</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach

                </select>
        </div>
        <div class="w-full md: w-1/3">
            <select
            wire:model="filter"
            name="other_filter" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="No Filter">No Filter</option>
                <option value="Top Voted">Top Voted</option>
                <option value="My Ideas">My Ideas</option>
                @admin
                    <option value="Spam Ideas">Spam Ideas</option>
                @endadmin



            </select>
        </div>
        <div class="w-full md: w-2/3 relative">

            <input wire:model="search" type="search" placeholder="Find an idea"  class="w-full rounded-xl bg-white  border-none px-4 py-2 pl-8"/>

            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg  class="w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg></div>
        </div>
    </div> <!-- end filters -->
    <div class="ideas-container space-y-6 my-6">
        @forelse ( $ideas as $idea )


        <livewire:idea-index
        :key="$idea->id"
        :idea='$idea' :votesCount="$idea->votes_count"/>
        @empty
            <div class="mx-auto w-70 mt-12">
                <img src="{{ asset('img/no-ideas.svg') }}" alt="No Ideas" class="mx-auto" >

                {{-- style="mix-blend-mode: limunosity"  can be used to make svg black and white--}}

                <div class="text-gray-400 text-center font-bold mt-6">Opss! Try Something More Common </div>

            </div>
        @endforelse
    </div><!-- end ideas-container -->
       {{-- {{ $ideas->links() }} --}}

       {{ $ideas->appends(request()->query())->links() }}
    </div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
</div>
