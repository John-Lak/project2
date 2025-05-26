<?php include 'header.inc'; ?> <!-- Include header section -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> <!-- Set character encoding -->
  <meta name="description" content="Home page for the company"> <!-- Page description for SEO -->
  <meta name="keywords" content="Info, advertising, jobs"> <!-- Relevant keywords for SEO -->
  <meta name="author" content="John Lakshmalla, Nam Vo"> <!-- Author info -->
  <title>Home Page</title>
  <link href="styles/styles.css" rel="stylesheet"> <!-- External CSS for styling -->
</head>

<body>

<?php include 'nav.inc'; ?> <!-- Include navigation menu -->

<!-- Main content area of the homepage -->
<main class="content">
  <article class="index-container">
    
    <!-- Introduction and company overview -->
    <section class="index-box">
      <h1 id="title_index">Welcome to JLNV innovation</h1>
      <p>
        <span id="special">At JLNV Solutions,</span> we are dedicated to revolutionizing wireless communication through cutting-edge smart technology.<br>
        Our innovative team is focused on developing advanced solutions that make communication faster, more reliable, and more accessible—empowering individuals, businesses, and communities alike.<br>
        From wireless infrastructure to intelligent systems integration, our work bridges the gap between people and technology.<br>
        Join us in building a smarter, more connected world. Explore exciting career opportunities with JLNV Solutions.
      </p>
      <img src="images/prompt.png" alt="This is a prompt" class="prompt"> <!-- Image representing innovation -->
    </section>

    <!-- Job opportunity section -->
    <section class="index-box">
      <h1 id="sub_context">Job Opportunity</h1>
      <p>
        At JLNV Solutions, we're always on the lookout for passionate, driven individuals to join our growing team.<br>
        As a leader in wireless innovation and smart technology, we offer rewarding careers in engineering, project management, data analytics, and more.<br><br>
        Whether you're a seasoned expert or a new graduate, our inclusive environment values your ideas and supports your growth.<br>
        Help us connect the world through technology.
        <br><br>
        Explore open roles today and take the next step in your career with <span id="special">JLNV • Solutions.</span>
      </p>
    </section>

    <!-- Why work with us -->
    <section class="index-box">
      <img src="images/prompt2.png" alt="This is prompt2" class="prompt2"> <!-- Image representing work environment -->
      <h1 id="sub_context">Why work with us</h1>
      <p>Why join us?</p>
      <ul class="index-bullets">
        <li>Work on impactful projects at the forefront of wireless innovation</li>
        <li>Grow your career with professional development opportunities</li>
        <li>Enjoy a supportive, inclusive, and dynamic company culture</li>
        <li>Benefit from flexible working arrangements — on-site, remote, or hybrid</li>
        <li>Thrive in a workplace that prioritizes employee well-being</li>
      </ul>
      <p>Be part of a team driving the future of connectivity. Start your journey with JLNV Solutions today.</p>
      <a href="http://localhost/project2/jobs.php" class="job">View open jobs</a> <!-- Link to job page -->
    </section>

  </article>
</main>

<?php include 'footer.inc'; ?> <!-- Include footer section -->

</body>
</html>