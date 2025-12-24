<x-app-layout>
    <h2>Edit Diet</h2>

    <form method="POST" action="{{ route('diets.update', $diet) }}">
        @csrf
        @method('PUT')

        <input name="name" value="{{ $diet->name }}"><br>
        <textarea name="description">{{ $diet->description }}</textarea><br>
        <input name="min_bmi" value="{{ $diet->min_bmi }}"><br>
        <input name="max_bmi" value="{{ $diet->max_bmi }}"><br>

        <button type="submit">Update</button>
    </form>
</x-app-layout>
