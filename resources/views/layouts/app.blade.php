<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nutrition App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Nutrition App</a>

        <ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('bmi.index') }}">BMI</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('diets.index') }}">Diets</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('foods.index') }}">Foods</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('meals.index') }}">Meals</a>
    </li>

    <li class="nav-item">
        <a class="nav-link fw-bold text-warning" href="{{ route('mealplan.index') }}">
            Meal Plan
        </a>
    </li>
</ul>


        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
