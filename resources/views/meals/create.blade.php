@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow">
            <div class="card-body">

                <h3 class="mb-4">Create Meal</h3>

                <form method="POST" action="{{ route('meals.store') }}">
                    @csrf

                    <!-- Food -->
                    <div class="mb-3">
                        <label class="form-label">Food</label>
                        <select name="food_id" class="form-select" required>
                            @foreach($foods as $food)
                                <option value="{{ $food->id }}">
                                    {{ $food->name }} ({{ $food->diet->name }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Meal Type -->
                    <div class="mb-3">
                        <label class="form-label">Meal Type</label>
                        <select name="meal_type" class="form-select" required>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                        </select>
                    </div>

                    <!-- Portion -->
                    <div class="mb-3">
                        <label class="form-label">Portion Size</label>
                        <input type="text" name="portion_size" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100">
                        Save Meal
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
