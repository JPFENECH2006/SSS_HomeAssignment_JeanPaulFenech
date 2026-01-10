@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">

        <h3 class="mb-3">{{ $food->name }}</h3>

        <p>
            <strong>Diet:</strong>
            <span class="badge bg-primary">
                {{ $food->diet->name }}
            </span>
        </p>

        <table class="table table-bordered mt-3">
            <tr><th>Calories</th><td>{{ $food->calories }}</td></tr>
            <tr><th>Protein (g)</th><td>{{ $food->protein }}</td></tr>
            <tr><th>Carbs (g)</th><td>{{ $food->carbs }}</td></tr>
            <tr><th>Fats (g)</th><td>{{ $food->fats }}</td></tr>
        </table>

        <h5 class="mt-4">Meals using this food</h5>

        <ul class="list-group">
            @forelse($food->meals as $meal)
                <li class="list-group-item">
                    {{ $meal->meal_type }} – {{ $meal->portion_size }}g
                </li>
            @empty
                <li class="list-group-item text-muted">
                    No meals found
                </li>
            @endforelse
        </ul>

        <a href="{{ route('foods.index') }}" class="btn btn-secondary mt-3">
            Back
        </a>

    </div>
</div>
@endsection
