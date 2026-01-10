@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">

        <h3 class="mb-3">Meal Details</h3>

        <table class="table table-bordered">
            <tr>
                <th>Food</th>
                <td>{{ $meal->food->name }}</td>
            </tr>

            <tr>
                <th>Diet</th>
                <td>{{ $meal->food->diet->name }}</td>
            </tr>

            <tr>
                <th>Meal Type</th>
                <td>{{ $meal->meal_type }}</td>
            </tr>

            <tr>
                <th>Portion Size</th>
                <td>{{ $meal->portion_size }} g</td>
            </tr>
        </table>

        <h5 class="mt-4">Macros (Calculated)</h5>

        <table class="table table-striped">
            <tr><th>Calories</th><td>{{ $meal->calories }}</td></tr>
            <tr><th>Protein</th><td>{{ $meal->protein }}</td></tr>
            <tr><th>Carbs</th><td>{{ $meal->carbs }}</td></tr>
            <tr><th>Fats</th><td>{{ $meal->fats }}</td></tr>
        </table>

        <a href="{{ route('meals.index') }}" class="btn btn-secondary">
            Back
        </a>

    </div>
</div>
@endsection
