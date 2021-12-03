<p>
    <div class="categories">
        @foreach ($categories::all() as $category)
            <div class="category">
                <div class="p-relative">
                    <img src="{{ $category->category_picture }}" alt="">
                    <div class="category-icon">
                        <span class="material-icons-round">
                        {{ $category->category_icon }}
                        </span>
                    </div>
                </div>
                <p>
                    <span class="kanit-mid">{{ $category->category }}</span>
                </p>
            </div>
        @endforeach
    </div>
</p>
