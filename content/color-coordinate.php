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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rows-columns']) && isset($_POST['colors'])) {
  $rows_columns = intval($_POST['rows-columns']);
  $colors = intval($_POST['colors']);
  $availableColors = ['red', 'orange', 'yellow', 'green', 'blue', 'purple', 'grey', 'brown', 'black', 'teal'];

  echo "<table id='colors-table' border='1'>";
  for ($i = 0; $i < $colors; $i++) {
      echo "<tr>";
      echo "<td id='color-col-left'>";
      echo "<select class='color-dropdown'>";
      for ($j = $i; $j < $i + count($availableColors); $j++) {
          $colorIndex = $j % count($availableColors);
          echo "<option value='$availableColors[$colorIndex]'>$availableColors[$colorIndex]</option>";
      }
      echo "</select>";
      echo "</td>";
      echo "<td id='color-col-right'>&nbsp;</td>";
      echo "</tr>";
  }
  echo "</table>";
  
  // TABLE TWO START
  echo "<table id='rc-table' border='1'>";
  echo "<tr><td>&nbsp;</td>";
  for ($i = 0; $i < $rows_columns; $i++) {
      echo "<td>" . chr(65 + $i) . "</td>"; 
  }
  echo "</tr>";
  for ($i = 1; $i <= $rows_columns; $i++) {
      echo "<tr>";
      echo "<td>$i</td>"; 
      for ($j = 0; $j < $rows_columns; $j++) {
          echo "<td>&nbsp;</td>";
      }
      echo "</tr>";
  }
  echo "</table>";
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdowns = document.querySelectorAll('.color-dropdown');

        dropdowns.forEach(dropdown => {
            dropdown.dataset.originalValue = dropdown.value;

            dropdown.addEventListener('change', function() {
                const selectedColor = this.value;
                const otherDropdowns = Array.from(dropdowns).filter(item => item !== dropdown);
                const duplicateDropdown = otherDropdowns.find(item => item.value === selectedColor);
                if (duplicateDropdown) {
                    this.value = this.dataset.originalValue;
                } else {
                    this.dataset.originalValue = selectedColor;
                }
            });
        });
    });
</script>