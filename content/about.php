<!-- about.php -->
<h2>About Us</h2>
<ul class="team-members">
  <?php
  $teamMembers = [
    ['name' => 'Javier Schafer', 'biography' => 'Hello! I am Javier and am a soon to be graduate from the CS program at CSU! I have a passion for IT Security and plan on pursuing that after I graduate in May.', 'image' => './content/images/schaferj.jpg'],
    ['name' => 'Knott Alex', 'biography' => 'Brief biography.', 'image' => './content/images/placeholder.jpg'],
    ['name' => 'Alejando Marmolejo-Daher', 'biography' => 'Brief biography.', 'image' => './content/images/placeholder.jpg'],
    ['name' => 'Lukas Elerson', 'biography' => 'Howdy, I am Lukas. I am a senior in the CS program and was in the Navy for 6 years before starting school.', 'image' => './content/images/lukas.jpg']
  ];
  
  foreach ($teamMembers as $member) {
    echo '<li>';
    echo '<img src="' . $member['image'] . '" alt="' . $member['name'] . '">';
    echo '<div class="member-info">';
    echo '<h3>' . $member['name'] . '</h3>';
    echo '<p>' . $member['biography'] . '</p>';
    echo '</div>';
    echo '</li>';
  }
  ?>
</ul>