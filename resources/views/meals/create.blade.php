<x-app-layout>
    <h2>Create Meal</h2>

    <form method="POST" action="{{ route('meals.store') }}">
        @csrf

        <select name="food_id">
            @foreach($foods as $food)
                <option value="{{ $food->id }}">{{ $food->name }}</option>
            @endforeach
        </select><br>

        <input name="meal_type" placeholder="Breakfast / Lunch / Dinner"><br>
        <input name="portion_size" placeholder="e.g. 200g"><br>

        <button>Add</button>
    </form>
</x-app-layout>
