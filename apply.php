<?php include 'header.inc'; ?>
<head>
  <meta name="description" content="Apply for a job at JLNV">
  <meta name="keywords" content="Apply, application form, JLNV jobs">
  <title>Apply Page</title>
</head>

<?php include 'nav.inc'; ?>

<!--Moved all the navigation menu to thenav.inc-->
<!--Moved all the footer to the footer.inc-->
<!--Moved all the header to the header.inc-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Apply page for the company">
  <meta name="keywords" content="Form filling">
  <meta name="author" content="John Lakshmalla, Nam Vo">
  <title>Apply Page</title>
  <link href="styles/styles.css" rel="stylesheet">
</head>


  <!-- Main content of the apply page -->
  <main class="apply-box">
    <header>
      <h1>Job Application</h1> <!-- Page title -->
    </header>

    <!-- Job application form -->
    <form method="post" novalidate="novalidate" action="https://localhost/project2/process_eoi.php">

      <!-- Job Reference Selection -->
      <p>
        <label for="jobRef">Job reference Number: </label>
        <select name="job ref" id="jobRef" required>
          <option value="select">Select</option>
          <option value="ar001">AR001</option>
          <option value="nt027">NT027</option>
          <option value="da042">DA042</option>
          <option value="cs035">CS035</option>
          <option value="it042">IT042</option>
          <option value="ce403">CE403</option>
        </select>
      </p>

      <!-- First Name Input -->
      <p>
        <label for="firstName">First Name: </label>
        <input type="text" name="first name" id="firstName" placeholder="First Name" required maxlength="20" pattern="[A-Za-z]+">
      </p>
      
      <!-- Last Name Input -->
      <p>
        <label for="lastName">Last Name:</label> 
        <input type="text" name="last name" id="lastName" placeholder="Last Name" required maxlength="20" pattern="[A-Za-z]+">
      </p>

      <!-- Date of Birth Input -->
      <p>
        <label for="dob">Date of Birth: </label> 
        <input type="date" name="date of birth" id="dob" placeholder="dd/mm/yyyy" maxlength="10" size="10" pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/\d{4}" required>
      </p>

      <!-- Gender Selection -->
      <p>
        <label>Gender: </label>
        <section class="radio-group">
          <input type="radio" id="male" name="gender" value="male" required>
          <label for="male">Male</label>

          <input type="radio" id="female" name="gender" value="female">
          <label for="female">Female</label>
        </section>
      </p>

      <!-- Street Address Input -->
      <p>
        <label for="street">Street Address: </label>
        <input type="text" name="street address" id="street" required maxlength="40">
      </p>

      <!-- Suburb/Town Input -->
      <p>
        <label for="suburb">Suburb/Town: </label> 
        <input type="text" name="suburb/town" id="suburb" required maxlength="40">
      </p>

      <!-- State Selection -->
      <p>
        <label for="state">State: </label>
        <select name="state" id="state" required>
          <option value="">State</option>
          <option value="vic">VIC</option>
          <option value="nsw">NSW</option>
          <option value="qld">QLD</option>
          <option value="nt">NT</option>
          <option value="wa">WA</option>
          <option value="sa">SA</option>
          <option value="tas">TAS</option>
          <option value="act">ACT</option>
        </select>
      </p>

      <!-- Postcode Input -->
      <p>
        <label for="postcode">Postcode: </label>
        <input type="text" name="postcode" id="postcode" placeholder="Postcode" required maxlength="4" pattern="\d{4}">
      </p>

      <!-- Email Input -->
      <p>
        <label for="email">Email Address: </label>
        <input type="email" name="email" id="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
      </p>

      <!-- Technical Skills Checkboxes -->
      <p>
        <label>Required Technical Skills: </label>
        <section class="checkbox-group">
          <input type="checkbox" id="ts1" name="category[]" value="technical skill 1" checked>
          <label for="ts1">Programming</label> 

          <input type="checkbox" id="ts2" name="category[]" value="technical skill 2">
          <label for="ts2">Data Analysis</label>  

          <input type="checkbox" id="ts3" name="category[]" value="technical skill 3">
          <label for="ts3">Web Development</label>

          <input type="checkbox" id="ts4" name="category[]" value="technical skill 4">
          <label for="ts4">Database Management</label>

          <input type="checkbox" id="ts5" name="category[]" value="technical skill 5">
          <label for="ts5">Cloud Computing</label>
        </section>
      </p>

      <!-- Other Skills Textarea -->
      <p>
        <label for="skill">Other Skills:</label>
      </p>
      <p>
        <textarea id="skill" name="skill" rows="4" placeholder="Write description of your other skills here..." cols="40"></textarea>
      </p>

      <!-- Submit Button -->
      <input type="submit" value="Submit">
    </form>
  </main>   

  <!-- Footer Section -->
  <?php include 'footer.inc'; ?>

</body>
</html>