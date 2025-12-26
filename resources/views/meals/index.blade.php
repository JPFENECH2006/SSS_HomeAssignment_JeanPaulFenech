@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">

        <div class="d-flex justify-content-between mb-3">
            <h3>Meals</h3>
            <a href="{{ route('meals.create') }}" class="btn btn-success">
                Add Meal
            </a>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Food</th>
                    <th>Diet</th>
                    <th>Meal Type</th>
                    <th>Portion</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($meals as $meal)
                    <tr>
                        <td>{{ $meal->food->name }}</td>

                        <td>
                            @if(strtolower($meal->food->diet->name ?? '') === 'keto')
                                <span class="badge bg-success">Keto</span>
                            @else
                                <span class="badge bg-secondary">
                                    {{ $meal->food->diet->name ?? 'N/A' }}
                                </span>
                            @endif
                        </td>

                        <td>{{ $meal->meal_type }}</td>
                        <td>{{ $meal->portion_size }}</td>

                        <td>
                            <a href="{{ route('meals.edit', $meal) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('meals.destroy', $meal) }}"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this meal?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            No meals found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
