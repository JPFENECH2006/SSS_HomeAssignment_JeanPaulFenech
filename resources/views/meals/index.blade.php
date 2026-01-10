@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h3>Meals</h3>
            <a href="{{ route('meals.create') }}" class="btn btn-success">
                Add Meal
            </a>
        </div>

        {{-- Order By --}}
        <form method="GET" class="mb-3">
            <select name="order" class="form-select w-auto d-inline">
                <option value="">Order by</option>
                <option value="time">Meal Type</option>
            </select>
            <button class="btn btn-secondary btn-sm">Apply</button>
        </form>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Food</th>
                    <th>Diet</th>
                    <th>Meal Type</th>
                    <th>Portion (g)</th>
                    <th width="240">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($meals as $meal)
                    <tr>
                        <td>{{ $meal->food->name }}</td>

                        <td>
                            <span class="badge bg-secondary">
                                {{ $meal->food->diet->name ?? 'N/A' }}
                            </span>
                        </td>

                        <td>{{ $meal->meal_type }}</td>
                        <td>{{ $meal->portion_size }}</td>

                        <td>
                            <a href="{{ route('meals.show', $meal) }}"
                               class="btn btn-info btn-sm">
                                View
                            </a>

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
                                        onclick="return confirm('Meal deleted successfully')">
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
