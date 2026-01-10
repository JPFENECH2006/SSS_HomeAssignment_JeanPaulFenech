@extends('layouts.app')

@section('content')
<div class="card shadow col-md-6 mx-auto">
    <div class="card-body">
        <h3>Create Diet</h3>

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('diets.store') }}">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                >
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea
                    name="description"
                    class="form-control"
                >{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Min BMI</label>
                <input
                    type="number"
                    step="0.1"
                    name="min_bmi"
                    class="form-control"
                    value="{{ old('min_bmi') }}"
                >
            </div>

            <div class="mb-3">
                <label>Max BMI</label>
                <input
                    type="number"
                    step="0.1"
                    name="max_bmi"
                    class="form-control"
                    value="{{ old('max_bmi') }}"
                >
            </div>

            <button type="submit" class="btn btn-success">
                Save
            </button>
        </form>
    </div>
</div>
@endsection
