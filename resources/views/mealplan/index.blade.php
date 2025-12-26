@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow">
            <div class="card-body">
                <h3 class="mb-3">Generate Meal Plan</h3>

                <form method="POST" action="{{ route('mealplan.generate') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Select Diet</label>
                        <select name="diet_id" class="form-select" required>
                            @foreach($diets as $diet)
                                <option value="{{ $diet->id }}">
                                    {{ $diet->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary w-100">
                        Generate Meal Plan
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
