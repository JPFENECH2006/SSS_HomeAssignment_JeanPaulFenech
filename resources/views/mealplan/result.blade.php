@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">

        <h3 class="mb-4">{{ $diet->name }} Meal Plan</h3>

        @foreach(['Breakfast', 'Lunch', 'Dinner'] as $type)
            <h5 class="mt-4">{{ $type }}</h5>

            <ul class="list-group">
                @forelse($meals[$type] ?? [] as $meal)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>
                            {{ $meal->food->name }}
                        </span>
                        <span class="text-muted">
                            {{ $meal->portion_size }}
                        </span>
                    </li>
                @empty
                    <li class="list-group-item text-muted">
                        No {{ strtolower($type) }} meals available
                    </li>
                @endforelse
            </ul>
        @endforeach

        <a href="{{ route('mealplan.pdf', $diet) }}"
           class="btn btn-danger mt-4">
            Export as PDF
        </a>

    </div>
</div>
@endsection
