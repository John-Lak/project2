<?php include 'header.inc'; ?>
<head>
  <meta name="description" content="About JLNV Solutions">
  <meta name="keywords" content="About, mission, vision, team">
  <title>About Page</title>
</head>

<?php include 'nav.inc'; ?>

<!--Moved all the navigation menu to the nav.inc-->
<!--Moved all the footer to the footer.inc-->
<!--Moved all the header to the header.inc-->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="About page for the company">
  <meta name="keywords" content="Company, People, Contribution">
  <meta name="author" content="John Lakshmalla, Nam Vo">
  <title>About Page</title>
  <!-- References to external CSS files -->
  <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

  <!--Main content area for the About page -->
  <main class="about_main">
    <aside>
      <!-- Group photo wrapped in <figure> for accessibility -->
      <figure>
        <img src="images/group photo.JPG" alt="Group photo of JLNV members" class="prompt3">
      </figure>
      
      <h1 id="about_us">About us</h1>
      <p>Programming Group, Wednesday 2 pm, JLNV</p>
      <p><strong><span id="special">Tutor:</span></strong> Nick</p>
      <p>Members' contributions to Project:</p>
      
      <!-- Nested list structure for contributions -->
      <ul class="about-bullets">
        <li>
          <p><strong>Nam Vo</strong> - Full stack developer, Network administrator, Data Analyst <span class="student-id">ID: 105914229</span></p>
          <ul>
            <li>Worked on front-end design, back-end API integration, and data analysis for user behavior.</li>
            <li>Handled database management and set up the network infrastructure.</li>
            <li>Ensured website scalability and optimized performance for a smooth user experience.</li>
          </ul>
        </li>
        <li>
          <p><strong>John Lakshmalla</strong> - Full stack developer, Network administrator, Software developer <span class="student-id">ID: 106033196</span></p>
          <ul>
            <li>Contributed to front-end interface design, making it mobile responsive and user-friendly.</li>
            <li>Developed back-end services, focusing on functionality and integration with the front end.</li>
            <li>Implemented security features to ensure safe data transactions and user privacy.</li>
          </ul>
        </li>
      </ul>
    </aside>

    <!-- AI generated text section -->
    <section>
      <h1 id="members_page">Members interest</h1>
      <table class="info-table"> 
        <tr>
          <th>Name</th>
          <th>Programming Languages</th>
          <th>Hobbies</th>
          <th>Favourite movie</th>
          <th>Music</th>
          <th>Email</th>
        </tr>
        <tr>
          <td>John</td>
          <td>HTML, CSS, Ruby, C#, C++</td>
          <td>Gaming, Gym</td>
          <td>Star Wars</td>
          <td>RnB</td>
          <td>johnnylak16@gmail.com</td>
        </tr>
        <tr>
          <td>Nam</td>
          <td>HTML, CSS, Ruby</td>
          <td>Building, Mining</td>
          <td>Star Trek</td>
          <td>Classical</td>
          <td>vonam@gmail.com</td>
        </tr>
      </table>
    </section>

    <!-- Hometown descriptions of the members -->
    <section>
      <p id="hometown_description"><strong>Hometown Description:</strong></p>
      <p>
        <span id="color">Nam is from Ho Chi Minh City, Vietnam — </span>a busy and exciting city known for its history, street food, and old temples. He lived in District 7 for about 10 years before moving to Australia. His neighborhood was small, crowded, and a bit dirty, but full of friendly people. Every afternoon, he would hang out with his neighbors, play games, and enjoy his time. These moments were a big part of his childhood and something he still remembers fondly.
      </p>
      <p>
        <span id="color">John is from Hyderabad, India — </span>a city known for its rich history, culture, and technology. He was born and lived in Auckland, New Zealand for about 1 year before moving to Australia. His neighborhood was lively and full of friendly people. Every evening, he would play cricket with his friends and enjoy the local food. These moments were a big part of his childhood and something he still cherishes.
      </p>
    </section>
  </main>
  
  <?php include 'footer.inc'; ?>

</body>
</html>