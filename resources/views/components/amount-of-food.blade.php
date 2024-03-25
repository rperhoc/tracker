<div id="c2">
  <form id="food-amount-form">
  <label for="amount">Amount:</label>
      <input 
        type="number" 
        id="amount" 
        name="amount" 
        placeholder="Enter amount" 
        onchange="handleDataChange()"
      >
      
      <label for="units">Units:</label>
      <select 
        id="units" 
        name="units" 
        onchange="handleDataChange()"
      >
          <option value="g">Grams</option>
          <option value="oz">Ounces</option>
      </select>
  </form>
</div>



    