<div class="my-6">
    <div>
        <div class="flex items-center space-x-2">
            <img src="" alt="" class="bg-black rounded-full size-8">
            <div class="font-semibold">{{ $comment->user->name }}</div>
            <div class="text-sm">{{ $comment->created_at->diffForHumans() }}</div>
        </div>
        <div class="mt-4">{{ $comment->body }}</div>
    </div>
</div>
