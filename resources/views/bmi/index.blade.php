@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="mb-3">BMI Calculator</h3>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('bmi.calculate') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Height (cm)</label>
                        <input type="number" name="height_cm" class="form-control"
                               value="{{ old('height_cm', auth()->user()->height_cm) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Weight (kg)</label>
                        <input type="number" name="weight_kg" class="form-control"
                               value="{{ old('weight_kg', auth()->user()->weight_kg) }}">
                    </div>

                    <button class="btn btn-primary w-100">Calculate BMI</button>
                </form>

                @if(auth()->user()->bmi)
                    <hr>
                    <p>
                        <strong>BMI:</strong> {{ auth()->user()->bmi->bmi_value }} <br>
                        <strong>Category:</strong> {{ auth()->user()->bmi->category }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
