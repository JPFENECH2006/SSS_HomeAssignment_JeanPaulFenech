@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">

        <h3 class="mb-3">{{ $diet->name }}</h3>

        <p class="text-muted">{{ $diet->description }}</p>

        <p>
            <strong>BMI Range:</strong>
            {{ $diet->min_bmi }} – {{ $diet->max_bmi }}
        </p>

        <hr>

        <h5>Foods in this Diet</h5>

        <ul class="list-group">
            @forelse($diet->foods as $food)
                <li class="list-group-item">
                    {{ $food->name }}
                </li>
            @empty
                <li class="list-group-item text-muted">
                    No foods added yet
                </li>
            @endforelse
        </ul>

        <a href="{{ route('diets.index') }}" class="btn btn-secondary mt-3">
            Back
        </a>

    </div>
</div>
@endsection
