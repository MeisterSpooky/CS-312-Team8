<!-- color-coordinate.php -->
<h2>Color Coordinate Generation</h2>

<form method="post" action="index.php?page=color-coordinate">
  <div class="input-container">
    <label for="rows-columns">Rows & Columns (1-26):</label>
    <input type="number" id="rows-columns" name="rows-columns" min="1" max="26" required>
    
    <label for="colors">Number of Colors (1-10):</label>
    <input type="number" id="colors" name="colors" min="1" max="10" required>
    
    <button type="submit">Generate</button>
  </div>
</form>

<?php
// Bulk of table stuff probably goes here
?>