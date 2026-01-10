@extends('layouts.app')

@section('content')
<div class="col-md-6 mx-auto">
    <div class="card shadow">
        <div class="card-body">

            <h3>Edit Food</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('foods.update', $food) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Diet</label>
                    <select name="diet_id" class="form-select">
                        @foreach($diets as $diet)
                            <option value="{{ $diet->id }}"
                                {{ old('diet_id', $food->diet_id) == $diet->id ? 'selected' : '' }}>
                                {{ $diet->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Name</label>
                    <input name="name" class="form-control"
                           value="{{ old('name', $food->name) }}">
                </div>

                <div class="mb-3">
                    <label>Calories</label>
                    <input type="number" step="0.1" name="calories"
                           class="form-control"
                           value="{{ old('calories', $food->calories) }}">
                </div>

                <div class="mb-3">
                    <label>Protein</label>
                    <input type="number" step="0.1" name="protein"
                           class="form-control"
                           value="{{ old('protein', $food->protein) }}">
                </div>

                <div class="mb-3">
                    <label>Carbs</label>
                    <input type="number" step="0.1" name="carbs"
                           class="form-control"
                           value="{{ old('carbs', $food->carbs) }}">
                </div>

                <div class="mb-3">
                    <label>Fats</label>
                    <input type="number" step="0.1" name="fats"
                           class="form-control"
                           value="{{ old('fats', $food->fats) }}">
                </div>

                <button class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>
@endsection
