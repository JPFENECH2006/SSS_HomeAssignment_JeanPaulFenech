@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Foods</h3>
                <a href="{{ route('foods.create') }}" class="btn btn-success">
                    + Add Food
                </a>
            </div>

            {{-- Order By --}}
            <form method="GET" class="mb-3">
                <select name="order" class="form-select w-auto d-inline">
                    <option value="">Order by</option>
                    <option value="protein">Protein</option>
                    <option value="carbs">Carbs</option>
                    <option value="fats">Fats</option>
                </select>
                <button class="btn btn-secondary btn-sm">Apply</button>
            </form>

            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Calories</th>
                        <th>Protein (g)</th>
                        <th>Fat (g)</th>
                        <th>Carbs (g)</th>
                        <th>Diet</th>
                        <th class="text-center" width="220">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($foods as $food)
                        <tr>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->calories }}</td>
                            <td>{{ $food->protein }}</td>
                            <td>{{ $food->fats }}</td>
                            <td>{{ $food->carbs }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $food->diet->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('foods.show', $food) }}"
                                   class="btn btn-info btn-sm">
                                    View
                                </a>

                                <a href="{{ route('foods.edit', $food) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('foods.destroy', $food) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Food deleted successfully')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No foods found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
