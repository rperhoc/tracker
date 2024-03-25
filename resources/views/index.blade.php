<x-layout>
    <x-food-list :foods="$foods" />
    <x-amount-of-food />
    <x-nutrition-values />
</x-layout>

<script>
    let selectedFoodId = null;

    document.addEventListener('dataChanged', function(event) {
        var amount = event.detail.amount;
        var units = event.detail.units;

        updateNutritionValues(amount, units);        
    });

    function handleDataChange() {
        
        var amount = document.getElementById('amount').value;
        var units = document.getElementById('units').value;
        
        var event = new CustomEvent('dataChanged', {
            detail: {
                amount: amount,
                units: units
            }
        });
        document.dispatchEvent(event);
    }

    function selectFood(foodId) {
        let previouslySelectedFood = document.querySelector('.selected');
        if (previouslySelectedFood) {
            previouslySelectedFood.classList.remove('selected', 'bg-blue-100'); // Unselect, remove background
        }
        
        let selectedFood = document.querySelector(`#food-list li[food-id="${foodId}"]`);
        if (selectedFood) {
            selectedFood.classList.add('selected', 'bg-blue-100');
        }

        selectedFoodId = foodId;
        handleDataChange();
    }
    
    function updateNutritionValues(amount = 0, units) {
        
        const url = `/api/food/nutrition-totals?foodId=${selectedFoodId}&amount=${amount}&units=${units}`;
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                console.log('Response: ', response);
                return response.json();
            })
            .then(data => {
                console.log('Data: ', data);
                document.getElementById("calories").innerHTML = data.calories;
                document.getElementById("protein").innerHTML = data.protein;
                document.getElementById("fat").innerHTML = data.fat;
                document.getElementById("carbs").innerHTML = data.carbs;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            }); 

    }

</script>
