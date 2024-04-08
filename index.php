<!-- index.php -->
<!DOCTYPE html>
<html>

<head>
  <title>Fictitious Company</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
  <header>
    <h1>Fictitious Company</h1>
    <img id="companyLogo" src="./content/images/company.png" alt="Company Logo">
  </header>

  <?php include 'content/navbar.php'; ?>

  <main>
    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];

      switch ($page) {
        case 'about':
          include 'content/about.php';
          break;
        case 'color-coordinate':
          include 'content/color-coordinate.php';
          break;
        default:
          include 'content/home.php';
          break;
      }
    } else {
      include 'content/home.php';
    }
    ?>
  </main>
</body>
<footer>
  <p>&copy; <?php echo date('Y'); ?> Fictitious Company. All rights reserved.</p>
</footer>

</html>