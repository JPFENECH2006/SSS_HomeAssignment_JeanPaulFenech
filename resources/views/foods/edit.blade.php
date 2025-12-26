<x-app-layout>
    <h2>Edit Food</h2>

    <form method="POST" action="{{ route('foods.update', $food) }}">
        @csrf
        @method('PUT')

        <select name="diet_id">
            @foreach($diets as $diet)
                <option value="{{ $diet->id }}" @selected($diet->id == $food->diet_id)>
                    {{ $diet->name }}
                </option>
            @endforeach
        </select><br>

        <input name="name" value="{{ $food->name }}"><br>
        <input name="calories" value="{{ $food->calories }}"><br>
        <input name="protein" value="{{ $food->protein }}"><br>
        <input name="carbs" value="{{ $food->carbs }}"><br>
        <input name="fats" value="{{ $food->fats }}"><br>

        <button>Update</button>
    </form>
</x-app-layout>
