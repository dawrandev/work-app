<div class="keywords style-two mt-30">
    <span class="title">{{ __('Top Categories') }}:</span>
    <ul>
        @foreach($popularCategories as $category)
        <li>
            <a href="{{ route('categories.show', ['category' => $category->id]) }}">
                {{ $category->translated_name ?? $category->name }} ({{ $category->jobs_count }})
            </a>
        </li>
        @endforeach
    </ul>
</div>