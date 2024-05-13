<div>
    <h1>Comments ([comment count])</h1>

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
</div>
