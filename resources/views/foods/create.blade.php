@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <h3>Add Food</h3>

            {{-- Show validation / API error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('foods.store') }}">
                @csrf

                <div class="mb-2">
                    <label>Diet</label>
                    <select name="diet_id" class="form-control">
                        @foreach ($diets as $diet)
                            <option value="{{ $diet->id }}">
                                {{ $diet->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label>Food Name</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Food name (e.g. banana)"
                        value="{{ old('name') }}"
                    >
                </div>

                <button class="btn btn-primary">
                    Add Food
                </button>
            </form>
        </div>
    </div>
@endsection
