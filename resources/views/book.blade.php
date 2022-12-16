<div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 mb-12">
    @foreach ($books as $book)
        <a href="{{ route('customer.book.show', $book->id) }}" class="group">
            <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:h-96">
                <img src="{{ asset('uploads/' . $book->image) }}"
                    alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                    class="w-full h-full object-center object-cover group-hover:opacity-75">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">{{ $book->name }}</h3>
            <p @class([
                'mt-1 text-lg font-medium',
                'text-blue-500' => $book->status_id == 1,
                'text-red-500' => $book->status_id == 2,
            ])>{{ $book->status->name }}</p>
        </a>
    @endforeach
</div>
{{ $books->links() }}
