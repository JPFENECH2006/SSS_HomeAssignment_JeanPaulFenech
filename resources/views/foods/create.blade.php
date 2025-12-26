<x-app-layout>
    <h2>Create Food</h2>

    <form method="POST" action="{{ route('foods.store') }}">
        @csrf

        <select name="diet_id">
            @foreach($diets as $diet)
                <option value="{{ $diet->id }}">{{ $diet->name }}</option>
            @endforeach
        </select><br>

        <input name="name" placeholder="Food name"><br>

        <button>Add</button>
    </form>
</x-app-layout>
