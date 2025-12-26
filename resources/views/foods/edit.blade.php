@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow">
            <div class="card-body">

                <h3 class="mb-4">Edit Food</h3>

                <form method="POST" action="{{ route('foods.update', $food) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Diet</label>
                        <select name="diet_id" class="form-select">
                            @foreach($diets as $diet)
                                <option value="{{ $diet->id }}"
                                    {{ $diet->id == $food->diet_id ? 'selected' : '' }}>
                                    {{ $diet->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Food Name</label>
                        <input name="name" class="form-control" value="{{ $food->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Calories</label>
                        <input name="calories" class="form-control" value="{{ $food->calories }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Protein (g)</label>
                        <input name="protein" class="form-control" value="{{ $food->protein }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Carbs (g)</label>
                        <input name="carbs" class="form-control" value="{{ $food->carbs }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fats (g)</label>
                        <input name="fat" class="form-control" value="{{ $food->fat }}">
                    </div>

                    <button class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
