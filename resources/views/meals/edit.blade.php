<x-app-layout>
    <h2>Edit Meal</h2>

    <form method="POST" action="{{ route('meals.update', $meal) }}">
        @csrf
        @method('PUT')

        <select name="food_id">
            @foreach($foods as $food)
                <option value="{{ $food->id }}" @selected($food->id == $meal->food_id)>
                    {{ $food->name }}
                </option>
            @endforeach
        </select><br>

        <input name="meal_type" value="{{ $meal->meal_type }}"><br>
        <input name="portion_size" value="{{ $meal->portion_size }}"><br>

        <button>Update</button>
    </form>
</x-app-layout>
