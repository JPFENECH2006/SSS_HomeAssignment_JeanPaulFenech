<x-app-layout>
    <h2>Foods</h2>
    <a href="{{ route('foods.create') }}">Add Food</a>

    <ul>
        @foreach($foods as $food)
            <li>
                {{ $food->name }} ({{ $food->diet->name }})
                - {{ $food->calories }} kcal
                <a href="{{ route('foods.edit', $food) }}">Edit</a>

                <form method="POST" action="{{ route('foods.destroy', $food) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
