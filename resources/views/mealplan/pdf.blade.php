<h2>{{ $diet->name }} Meal Plan</h2>

@foreach(['Breakfast', 'Lunch', 'Dinner'] as $type)
    <h3>{{ $type }}</h3>

    @if(isset($meals[$type]) && $meals[$type]->count())
        <table width="100%" border="1" cellspacing="0" cellpadding="6">
            <thead>
                <tr>
                    <th>Food</th>
                    <th>Portion (g)</th>
                    <th>Calories</th>
                    <th>Protein (g)</th>
                    <th>Carbs (g)</th>
                    <th>Fats (g)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($meals[$type] as $meal)
                    <tr>
                        <td>{{ $meal->food->name }}</td>
                        <td>{{ $meal->portion_size }}</td>
                        <td>{{ $meal->calories }}</td>
                        <td>{{ $meal->protein }}</td>
                        <td>{{ $meal->carbs }}</td>
                        <td>{{ $meal->fats }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No meals added.</p>
    @endif
@endforeach

<hr>

<h3>Nutrition Totals</h3>
<ul>
    <li><strong>Calories:</strong> {{ $totals['calories'] }}</li>
    <li><strong>Protein:</strong> {{ $totals['protein'] }} g</li>
    <li><strong>Carbs:</strong> {{ $totals['carbs'] }} g</li>
    <li><strong>Fats:</strong> {{ $totals['fats'] }} g</li>
</ul>
