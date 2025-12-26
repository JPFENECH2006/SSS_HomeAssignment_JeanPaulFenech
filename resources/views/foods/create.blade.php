@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <h3>Add Food</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('foods.store') }}">
                @csrf

                <select name="diet_id" class="form-control mb-2">
                    @foreach($diets as $diet)
                        <option value="{{ $diet->id }}">{{ $diet->name }}</option>
                    @endforeach
                </select>

                <input class="form-control mb-2" name="name" placeholder="Food name (e.g. banana)">
                <button class="btn btn-primary">Add Food</button>
            </form>
        </div>
    </div>
@endsection