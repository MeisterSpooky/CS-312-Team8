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

    if ($rows_columns < 1 || $rows_columns > 26) {
        echo "<p class='error'>Rows & Columns must be between 1 and 26.</p>";
    } elseif ($colors < 1 || $colors > 10) {
        echo "<p class='error'>Number of Colors must be between 1 and 10.</p>";
    } else {
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

        echo "<button id='print-button'>Print View</button>";
    }
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

        const printButton = document.getElementById('print-button');
        if (printButton) {
            printButton.addEventListener('click', function() {
                const colorTable = document.getElementById('colors-table');
                const rcTable = document.getElementById('rc-table');

                const printWindow = window.open('', '_blank');
                // For some reason it's not linking to the stylesheet as of right now including styling here.
                printWindow.document.write(`
                <html>
                    <head>
                        <title>Printable View</title>
                        <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 0;
                            height: 100%;
                        }

                        header {
                            color: #000;
                            padding: 20px;
                            display: flex;
                            align-items: center;
                        }

                        table {
                            border-collapse: collapse;
                            margin-bottom: 20px;
                        }

                        td {
                            border: 1px solid black;
                            padding: 5px;
                            text-align: center;
                        }

                        header h1 {
                            margin: 0;
                            flex-grow: 1;
                        }

                        header img {
                            height: 50px;
                            margin-left: 20px;
                            filter: grayscale(100%);
                        }

                        #colors-table {
                            width: 100%;
                        }

                        #colors-table td {
                            height: 30px;
                        }

                        #color-col-left {
                            width: 20%;
                        }

                        #color-col-right {
                            width: 80%;
                        }

                        #rc-table {
                            width: 100%;
                        }

                        #rc-table td {
                            width: 30px;
                            height: 30px;
                        }

                        #header {
                            text-align: center;
                            margin-bottom: 20px;
                        }

                        #header img {
                            width: 200px;
                        }
                        </style>
                    </head>
                    <body>
                    <header>
                    <h1>Fictitious Company</h1>
                    <img id="companyLogo" src="./content/images/company.png" alt="Company Logo">
                    </header>
                    ${colorTable.outerHTML}
                    ${rcTable.outerHTML}
                    </body>
                `);
                printWindow.document.close();
                printWindow.print();
            });
        }
    });
</script>