function calculateNutrition() {
    var amount = document.getElementById('amount').value;
    var units = document.getElementById('units').value;
    var foodId = document.getElementById('nutrition-values').getAttribute()
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
}