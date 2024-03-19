<!-- about.php -->
<h2>About Us</h2>
<ul class="team-members">
  <?php
  $teamMembers = [
    ['name' => 'Javier Schafer', 'biography' => 'Brief biography.', 'image' => 'member1.jpg'],
    ['name' => 'Knott Alex', 'biography' => 'Brief biography.', 'image' => 'member2.jpg'],
    ['name' => 'Alejando Marmolejo-Daher', 'biography' => 'Brief biography.', 'image' => 'member3.jpg'],
    ['name' => 'Lukas Elerson', 'biography' => 'Brief biography.', 'image' => 'member4.jpg']
  ];
  
  foreach ($teamMembers as $member) {
    echo '<li>';
    echo '<img src="' . $member['image'] . '" alt="' . $member['name'] . '">';
    echo '<h3>' . $member['name'] . '</h3>';
    echo '<p>' . $member['biography'] . '</p>';
    echo '</li>';
  }
  ?>
</ul>