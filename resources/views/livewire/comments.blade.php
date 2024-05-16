<div>
    <h1>Comments ({{ $this->commentsCount }})</h1>

    @auth
        <form wire:submit="createComment" class="mt-4">
            <div>
                <x-textarea placeholder="Post a comment" class="w-full" rows="4" wire:model="form.body" />
                <x-input-error :messages="$errors->get('form.body')" />
            </div>
            <x-primary-button class="mt-2">
                Post a comment
            </x-primary-button>
        </form>
    @endauth

    @if (count($chunks))
        <div class="mt-8 px-6">
            @for($chunk = 0; $chunk < $page; $chunk++)
                <div class="border-b border-gray-100 last:border-b-0" wire:key="chunk-{{ $chunk }}">
                    <livewire:comment-chunk :ids="$chunks[$chunk]" wire:key="chunk-{{ md5(json_encode($this->chunks[$chunk])) }}" />
                </div>
            @endfor
        </div>
    @endif

    @if ($this->hasMorePages())
        <div class="mt-8 flex items-center justify-center">
            <x-secondary-button wire:click="loadMore">
                Load more
            </x-secondary-button>
        </div>
    @endif
</div>
