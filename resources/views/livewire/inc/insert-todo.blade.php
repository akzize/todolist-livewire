<div class="content container mx-auto py-6 border-r-4 pe-4 w-1/2">
    <div class="mx-auto">
        <div id="create-form" class="border-t-2 border-blue-500 bg-white p-6 hover:shadow">
            <div class="flex">
                <h2 class="mb-5 text-lg font-semibold text-gray-800">Create New Todo</h2>
            </div>
            <div>
                <form>
                    <div class="mb-6">
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">*
                            Todo </label>

                        {{-- bind data --}}
                        <input wire:model="title" type="text" id="title" placeholder="Todo.."
                            class="block w-full rounded bg-gray-100 p-2.5 text-sm text-gray-900">

                        {{-- for validation error --}}
                        @error('title')
                            <span class="mt-3 block text-xs text-red-500">{{ $message }}</span>
                        @enderror

                    </div>

                    {{-- now the event --}}
                    <button wire:click.prevent='create' type="submit"
                        class="rounded bg-blue-500 px-4 py-2 font-semibold text-white hover:bg-blue-600">Create
                        +</button>
                    @session('success')
                        <span class="block text-xs text-green-500">Saved.</span>
                    @endsession

                </form>
            </div>
        </div>
    </div>
</div>
