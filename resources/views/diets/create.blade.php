@extends('layouts.app')

@section('content')
<div class="card shadow col-md-6 mx-auto">
    <div class="card-body">
        <h3>Create Diet</h3>

        <form method="POST" action="{{ route('diets.store') }}">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Min BMI</label>
                <input name="min_bmi" class="form-control">
            </div>

            <div class="mb-3">
                <label>Max BMI</label>
                <input name="max_bmi" class="form-control">
            </div>

            <button class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
