@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">

                <h3 class="mb-4">Edit Meal</h3>

                <form method="POST" action="{{ route('meals.update', $meal) }}">
                    @csrf
                    @method('PUT')

                    
                    <div class="mb-3">
                        <label class="form-label">Food</label>
                        <select name="food_id" class="form-select" required>
                            @foreach($foods as $food)
                                <option value="{{ $food->id }}"
                                    @selected($food->id == $meal->food_id)>
                                    {{ $food->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label">Meal Type</label>
                        <select name="meal_type" class="form-select" required>
                            <option value="Breakfast" @selected($meal->meal_type == 'Breakfast')>
                                Breakfast
                            </option>
                            <option value="Lunch" @selected($meal->meal_type == 'Lunch')>
                                Lunch
                            </option>
                            <option value="Dinner" @selected($meal->meal_type == 'Dinner')>
                                Dinner
                            </option>
                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label">Portion Size (grams)</label>
                        <input type="number"
                               name="portion_size"
                               class="form-control"
                               value="{{ $meal->portion_size }}"
                               min="1"
                               required>
                    </div>

                   
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('meals.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button class="btn btn-primary">
                            Update Meal
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
