<x-app-layout>
    <h2>Diets</h2>

    <a href="{{ route('diets.create') }}">Add Diet</a>

    <ul>
        @foreach($diets as $diet)
            <li>
                <strong>{{ $diet->name }}</strong>
                (BMI {{ $diet->min_bmi }} - {{ $diet->max_bmi }})
                <a href="{{ route('diets.edit', $diet) }}">Edit</a>

                <form method="POST" action="{{ route('diets.destroy', $diet) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
