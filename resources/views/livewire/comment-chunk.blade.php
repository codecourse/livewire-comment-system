<div>
    @foreach($comments as $comment)
        <div class="border-b border-gray-100 last:border-b-0" wire:key="{{ $comment->id }}">
            <livewire:comment-item :comment="$comment" :key="$comment->id" />
        </div>
    @endforeach
</div>
