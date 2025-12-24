<x-app-layout>
    <h2>Create Diet</h2>

    <form method="POST" action="{{ route('diets.store') }}">
        @csrf

        <input name="name" placeholder="Name"><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input name="min_bmi" placeholder="Min BMI"><br>
        <input name="max_bmi" placeholder="Max BMI"><br>

        <button type="submit">Save</button>
    </form>
</x-app-layout>
