@extends('layouts.app')

@section('content')
<div class="card shadow col-md-6 mx-auto">
    <div class="card-body">
        <h3>Edit Diet</h3>

        <form method="POST" action="{{ route('diets.update', $diet) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input name="name" value="{{ $diet->name }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $diet->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Min BMI</label>
                <input name="min_bmi" value="{{ $diet->min_bmi }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Max BMI</label>
                <input name="max_bmi" value="{{ $diet->max_bmi }}" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
