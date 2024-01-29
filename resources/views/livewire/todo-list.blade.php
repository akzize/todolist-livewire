<div id="content" class="mx-auto flex gap-10 px-10" style=""> 
    {{-- insert todo section --}}
    @include('livewire.inc.insert-todo')

    <div class="w-1/2">
        {{-- for the search --}}
        @include('livewire.inc.search-todo')

        {{-- todo list --}}
        <div id="todos-list">
            @foreach ($todos as $todo)
                @include('livewire.inc.todo')
            @endforeach

            <div class="my-2">
                <!-- Pagination goes here -->
                {{ $todos->links() }}
            </div>
        </div>
    </div>
</div>
