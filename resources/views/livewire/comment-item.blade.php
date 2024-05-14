<div>
    @if (!$deleted)
        <div
    class="my-6"
    x-data="{ replying: false, editing: false }"
    x-on:replied.window="replying = false"
    x-on:edited.window="editing = false"
>
    <div>
        <div class="flex items-center space-x-2">
            <img src="{{ $comment->user->avatar() }}" alt="{{ $comment->user->name }}" class="bg-black rounded-full size-8">
            <div class="font-semibold">{{ $comment->user->name }}</div>
            <div class="text-sm" x-human-date datetime="{{ $comment->created_at->toDateTimeString() }}">{{ $comment->created_at->diffForHumans() }}</div>
        </div>

        @can('edit', $comment)
            <template x-if="editing">
                <form wire:submit="edit" class="mt-4">
                    <div>
                        <x-textarea class="w-full" rows="4" wire:model="editForm.body" />
                        <x-input-error :messages="$errors->get('editForm.body')" />
                    </div>
                    <div class="flex items-baseline space-x-2">
                        <x-primary-button class="mt-2">
                            Edit
                        </x-primary-button>
                        <button x-on:click="editing = false" class="text-sm text-gray-500">Cancel</button>
                    </div>
                </form>
            </template>
        @endcan

        <div class="mt-4" x-show="!editing">{{ $comment->body }}</div>

        <div class="mt-6 text-sm flex items-center space-x-3">
            @can('reply', $comment)
                <button class="text-gray-500" x-on:click="replying = true">Reply</button>
            @endcan
            @can('edit', $comment)
                <button class="text-gray-500" x-on:click="editing = true">Edit</button>
            @endcan
            @can('delete', $comment)
                <button class="text-gray-500" x-on:click="if (window.confirm('Are you sure?')) { $wire.delete() }">Delete</button>
            @endcan
        </div>

        <template x-if="replying">
            <form wire:submit="reply" class="mt-4">
                <div>
                    <x-textarea placeholder="Reply to {{ $comment->user->name }}" class="w-full" rows="4" wire:model="replyForm.body" />
                    <x-input-error :messages="$errors->get('replyForm.body')" />
                </div>
                <div class="flex items-baseline space-x-2">
                    <x-primary-button class="mt-2">
                        Reply
                    </x-primary-button>
                    <button x-on:click="replying = false" class="text-sm text-gray-500">Cancel</button>
                </div>
            </form>
        </template>

        @if (is_null($comment->parent_id) && $comment->children->count())
            <div class="ml-8 mt-8">
                @foreach($comment->children as $child)
                    <livewire:comment-item :comment="$child" :key="$child->id" />
                @endforeach
            </div>
        @endif
    </div>
</div>
    @endif
</div>
