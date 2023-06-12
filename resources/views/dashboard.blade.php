<x-app-layout>
    <div class="py-12">
        <div class="w-3/4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($comments as $comment)
                        <div class="mb-4 bg-gray-300 p-4 rounded shadow">
                            <h3>
                                <strong>{{ $comment->user->name }}</strong>
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </h3>
                            <p>{{ $comment->body }}</p>
                        </div>
                    @endforeach

                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
