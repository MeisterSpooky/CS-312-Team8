<!-- about.php -->
<h2>About Us</h2>
<ul class="team-members">
  <?php
  $teamMembers = [
    ['name' => 'Javier Schafer', 'biography' => 'Hello! I am Javier and am a soon to be graduate from the CS program at CSU! I have a passion for IT Security and plan on pursuing that after I graduate in May.', 'image' => './content/images/schaferj.jpg'],
    ['name' => 'Alex Knott', 'biography' => 'Hello! I am Alex and I am a sophomore studying computer science at CSU. I also love to go to the gym.', 'image' => './content/images/AlexKnott.jpg'],
    ['name' => 'Alberto Marmolejo-Daher', 'biography' => 'Hello! My name is Alberto and I like eating empanadas, I am a Junior in the CS program!', 'image' => './content/images/dumdog.png'],
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