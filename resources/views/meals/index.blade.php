<x-app-layout>
    <h2>Meals</h2>
    <a href="{{ route('meals.create') }}">Add Meal</a>

    <ul>
        @foreach($meals as $meal)
            <li>
                {{ $meal->meal_type }} —
                {{ $meal->food->name }} —
                {{ $meal->portion_size }}
                <a href="{{ route('meals.edit', $meal) }}">Edit</a>

                <form method="POST" action="{{ route('meals.destroy', $meal) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
