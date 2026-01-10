@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">

        <div class="d-flex justify-content-between mb-3">
            <h3>Diets</h3>
            <a href="{{ route('diets.create') }}" class="btn btn-success">Add Diet</a>
        </div>

        <form method="GET" class="mb-3">
            <select name="order" class="form-select w-auto d-inline">
                <option value="">Order by</option>
                <option value="bmi_low">Lowest BMI</option>
                <option value="bmi_high">Highest BMI</option>
            </select>
            <button class="btn btn-secondary btn-sm">Apply</button>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>BMI Range</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($diets as $diet)
                    <tr>
                        <td>{{ $diet->name }}</td>
                        <td>{{ $diet->min_bmi }} – {{ $diet->max_bmi }}</td>
                        <td>
                            <a href="{{ route('diets.show', $diet) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('diets.edit', $diet) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form method="POST" action="{{ route('diets.destroy', $diet) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this diet?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">No diets found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
