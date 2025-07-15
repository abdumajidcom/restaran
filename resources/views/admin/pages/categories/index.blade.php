<div>
    <ul>
    @foreach ($categories as $category)
        <li>Category name: {{ $category->name }}</li>
    @endforeach
    </ul>
</div>
