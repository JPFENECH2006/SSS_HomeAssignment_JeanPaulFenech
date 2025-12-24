<x-app-layout>
    <h2>BMI Calculator</h2>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <form method="POST" action="{{ route('bmi.calculate') }}">
        @csrf

        <div>
            <label>Height (cm)</label><br>
            <input type="number" name="height_cm"
                   value="{{ old('height_cm', auth()->user()->height_cm) }}">
        </div>

        <br>

        <div>
            <label>Weight (kg)</label><br>
            <input type="number" name="weight_kg"
                   value="{{ old('weight_kg', auth()->user()->weight_kg) }}">
        </div>

        <br>

        <button type="submit">Calculate BMI</button>
    </form>

    @if(auth()->user()->bmi)
        <hr>
        <h3>Your Last BMI</h3>
        <p>
            BMI: <strong>{{ auth()->user()->bmi->bmi_value }}</strong><br>
            Category: <strong>{{ auth()->user()->bmi->category }}</strong>
        </p>
    @endif
</x-app-layout>
