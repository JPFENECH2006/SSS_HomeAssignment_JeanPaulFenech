@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h3>Diets</h3>
            <a href="{{ route('diets.create') }}" class="btn btn-success">Add Diet</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>BMI Range</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($diets as $diet)
                    <tr>
                        <td>{{ $diet->name }}</td>
                        <td>{{ $diet->min_bmi }} – {{ $diet->max_bmi }}</td>
                        <td>
                            <a href="{{ route('diets.edit', $diet) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form method="POST" action="{{ route('diets.destroy', $diet) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
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
