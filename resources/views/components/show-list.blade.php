@props(['list', 'items', 'edit'])
<div class="max-w-sm mx-auto sm:px-6 lg:px-8 pt-5">
    <div class="overflow-hidden sm:rounded-lg border-b border-white shadow divide-y">
        <a href="/dashboard/{{ $list->slug }}/edit">
            <p class="font-semibold text-center py-4 bg-white">{{ $list->name }}  ({{ count($items) }})</p>
        </a>
        @foreach ($items as $item)
            {{-- @if ($item->list->id == $list->id) --}}
            <div class="bg-white hover:bg-gray-300 px-4 py-3 flex mx-auto justify-between">
                <form method="POST" action="/dashboard/{{ $item->id }}/edit">
                    @csrf
                    @method('put')
                    <label class="">
                        <input class="ml-2 mr-1 mb-1 mt-1 inline-block" id="completed" type="checkbox" name="completed"
                            value="1" onchange="this.form.submit()" 
                            @if ($item->completed) checked @endif>
                        <span class="text-sm inline-block @if($item->completed) line-through text-gray-400 @endif">
                            {{ $item->content }}
                        </span>
                    </label>
                </form>
                @if ($edit)
                    <form method='POST' action="/dashboard/{{ $item->id }}/edit" class="">
                        @csrf
                        @method('DELETE')

                        <button class=" bg-red-500 tracking-wide text-white shadow-lg 
                            rounded hover:shadow text-xs ">Delete</button>
                    </form>
                @endif
            </div>
            {{-- @endif --}}
        @endforeach
    </div>
</div>
