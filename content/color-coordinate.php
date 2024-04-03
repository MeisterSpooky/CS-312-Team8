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
    $rows_colums = intval($_POST['rows-columns']);
    $colors = intval($_POST['colors']);

    echo "<table id='colors-table' border='1'>";
    for ($i = 0; $i < $colors; $i++) {
      echo "<tr>";
      echo "<td id='color-col-left'>&nbsp;</td>";
      echo "<td id='color-col-right'>&nbsp;</td>";
      echo "</tr>";
    }
    echo "</table>";


    echo "<table id='rc-table' border='1'>";
    for ($i = 0; $i < ($rows_colums+1); $i++) {
        echo "<tr>";
        for ($j = 0; $j < ($rows_colums+1); $j++) {
            echo "<td>&nbsp;</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
  }
?>