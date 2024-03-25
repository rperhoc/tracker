@props(['foods'])

<div id="c1" class="scrollable-box bg-gray-100 border border-gray-300 p-4">
  <h2 class="text-lg font-semibold">List of Food Items</h2>
  <ul id="food-list" class="mt-2">
      <!-- Food items will be dynamically added here -->
      @foreach($foods as $food)
        <li food-id="{{ $food->id }}">
          <a href='#' onclick="selectFood({{ $food->id }});">{{ $food->name }}</a>
        </li>
      @endforeach
  </ul>
</div>
