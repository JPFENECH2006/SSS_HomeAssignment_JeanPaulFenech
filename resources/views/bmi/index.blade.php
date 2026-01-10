@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow">
            <div class="card-body">

                <h3 class="mb-3">BMI Calculator</h3>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- BMI FORM --}}
                <form method="POST" action="{{ route('bmi.calculate') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Height (cm)</label>
                        <input type="number" name="height_cm" class="form-control @error('height_cm') is-invalid @enderror"
                               value="{{ old('height_cm', auth()->user()->height_cm) }}">
                        @error('height_cm')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Weight (kg)</label>
                        <input type="number" name="weight_kg" class="form-control @error('weight_kg') is-invalid @enderror"
                               value="{{ old('weight_kg', auth()->user()->weight_kg) }}">
                        @error('weight_kg')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100">Calculate BMI</button>
                </form>

                {{-- BMI RESULT --}}
                @if(auth()->user()->bmi)
                    <hr>
                    <p>
                        <strong>BMI:</strong> {{ auth()->user()->bmi->bmi_value }} <br>
                        <strong>Category:</strong> {{ auth()->user()->bmi->category }}
                    </p>
                @endif

                {{-- RECOMMENDED DIET --}}
                @if(isset($recommendedDiet))
                    <hr>
                    <div class="alert alert-info">
                        <h5 class="mb-1">🍽 Recommended Diet</h5>
                        <strong>{{ $recommendedDiet->name }}</strong>
                        <p class="mb-0">{{ $recommendedDiet->description }}</p>
                    </div>
                @endif

                {{-- BMI CHART --}}
                <hr>
                <h5>BMI Chart</h5>

                @php
                    $totalRange = 50;
                    $segments = [
                        ['color' => '#87CEFA', 'label' => 'Underweight', 'min' => 0, 'max' => 18.5],
                        ['color' => '#90EE90', 'label' => 'Normal', 'min' => 18.5, 'max' => 24.9],
                        ['color' => '#FFD700', 'label' => 'Overweight', 'min' => 25, 'max' => 29.9],
                        ['color' => '#FFA500', 'label' => 'Obesity I', 'min' => 30, 'max' => 34.9],
                        ['color' => '#FF4500', 'label' => 'Obesity II', 'min' => 35, 'max' => 39.9],
                        ['color' => '#FF0000', 'label' => 'Obesity III', 'min' => 40, 'max' => $totalRange],
                    ];

                    $bmi = auth()->user()->bmi->bmi_value ?? 0;
                    $bmiPercent = 0;
                    foreach ($segments as $segment) {
                        $segmentWidthPercent = ($segment['max'] - $segment['min']) / $totalRange * 100;
                        if ($bmi >= $segment['min'] && $bmi <= $segment['max']) {
                            $bmiPercent += (($bmi - $segment['min']) / ($segment['max'] - $segment['min'])) * $segmentWidthPercent;
                            break;
                        } else {
                            $bmiPercent += $segmentWidthPercent;
                        }
                    }
                @endphp

                {{-- Chart wrapper --}}
                <div style="position: relative; height: 60px; margin-top: 20px;">
                    <div style="display:flex; height:40px; border:1px solid #ccc; border-radius:5px; overflow:hidden;">
                        @foreach($segments as $segment)
                            @php
                                $flex = ($segment['max'] - $segment['min']) / $totalRange * 100;
                            @endphp
                            <div style="flex: {{ $flex }}%; background-color: {{ $segment['color'] }};" title="{{ $segment['label'] }}"></div>
                        @endforeach
                    </div>

                    {{-- Triangle marker --}}
                    @if(auth()->user()->bmi)
                        <div style="
                            position: absolute;
                            left: {{ $bmiPercent }}%;
                            top: -10px;
                            transform: translateX(-50%);
                            width: 0;
                            height: 0;
                            border-left: 6px solid transparent;
                            border-right: 6px solid transparent;
                            border-bottom: 10px solid black;
                        " title="Your BMI"></div>
                    @endif
                </div>

                {{-- Legend aligned with segment widths --}}
                <div style="display:flex; margin-top:5px;">
                    @foreach($segments as $segment)
                        @php
                            $flex = ($segment['max'] - $segment['min']) / $totalRange * 100;
                        @endphp
                        <div style="flex: {{ $flex }}%; text-align:center; font-size:0.8rem;">
                            {{ $segment['label'] }}
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
