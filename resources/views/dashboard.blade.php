<x-app-layout>
    <div class="py-12">
        <div class="w-3/4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('comments.store') }}" method="POST" class="mb-10">
                @csrf
                <textarea name="body" rows="2" class="w-full border-gray-200 dark:bg-slate-700 rounded dark:text-white" required></textarea>
                <input type="submit" value="Comentar"
                    class="text-white bg-gray-800 p-2 rounded dark:text-black dark:bg-slate-200 hover:opacity-50 cursor-pointer">
            </form>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($comments as $comment)
                        <div class="mb-4 bg-gray-100 dark:bg-slate-700 p-4 rounded shadow">
                            <h3>
                                <strong>{{ $comment->user->name }}</strong>
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </h3>
                            <p>{{ $comment->body }}</p>

                            <form action="{{ route('replies.store', $comment) }}" method="POST" class="my-4">
                                @csrf
                                <input type="text" name="body"
                                    class="w-full text-xs text-gray-500 dark:text-white dark border border-gray-200 bg-gray-100 dark:bg-slate-500 dark:border-slate-400 rounded p-2 placeholder:italic placeholder:text-slate-400"
                                    placeholder="Responder">
                            </form>
                        </div>

                        @if (count($comment->replies) > 0)
                            <div class="mt-1 mb-10 p-3 bg-gray-100 dark:bg-slate-900 rounded">
                                @foreach ($comment->replies as $reply)
                                    <p class="ml-4 my-4 text-xs dark:text-slate-400">
                                        --
                                        {{ $reply->body }}
                                        <strong>{{ $reply->user->name }}</strong>
                                        <small>{{ $reply->created_at->diffForHumans() }}</small>
                                    </p>
                                    @if (!$loop->last)
                                        <hr class="border-slate-600">
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
