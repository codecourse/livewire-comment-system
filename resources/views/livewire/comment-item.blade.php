<div
    class="my-6"
    x-data="{ replying: false }"
>
    <div>
        <div class="flex items-center space-x-2">
            <img src="" alt="" class="bg-black rounded-full size-8">
            <div class="font-semibold">{{ $comment->user->name }}</div>
            <div class="text-sm">{{ $comment->created_at->diffForHumans() }}</div>
        </div>
        <div class="mt-4">{{ $comment->body }}</div>

        <div class="mt-6 text-sm flex items-center space-x-3">
            <button class="text-gray-500" x-on:click="replying = true">Reply</button>
        </div>

        <template x-if="replying">
            <form class="mt-4">
                <div>
                    <x-textarea placeholder="Post a comment" class="w-full" rows="4" />
                    <x-input-error :messages="$errors->get('form.body')" />
                </div>
                <div class="flex items-baseline space-x-2">
                    <x-primary-button class="mt-2">
                        Reply
                    </x-primary-button>
                    <button x-on:click="replying = false" class="text-sm text-gray-500">Cancel</button>
                </div>
            </form>
        </template>
    </div>
</div>
