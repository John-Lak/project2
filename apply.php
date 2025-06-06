<?php include 'header.inc'; ?> <!-- Shared header content -->
<?php include 'nav.inc'; ?>    <!-- Shared navigation bar -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Apply for a job at JLNV">
  <meta name="keywords" content="Apply, application form, JLNV jobs">
  <meta name="author" content="John Lakshmalla, Nam Vo">
  <title>Apply Page</title>
  <link href="styles/styles.css" rel="stylesheet">
</head>

<body>
<main class="apply-box">
  <header>
    <h1>Job Application</h1>
  </header>

  <form method="post" novalidate action="process_eoi.php">
    
    <!-- Job Reference Dropdown -->
    <p>
      <label for="jobRef">Job Reference Number:</label>
      <select name="jobref" id="jobRef" required>
        <option value="">Select</option>
        <option value="AR001">AR001</option>
        <option value="NT027">NT027</option>
        <option value="DA042">DA042</option>
        <option value="CS035">CS035</option>
        <option value="IT042">IT042</option>
        <option value="CE403">CE403</option>
      </select>
    </p>

    <!-- Personal Information -->
    <p>
      <label for="firstName">First Name:</label>
      <input type="text" name="firstname" id="firstName" placeholder="First Name" required maxlength="20" pattern="[A-Za-z]+">
    </p>

    <p>
      <label for="lastName">Last Name:</label>
      <input type="text" name="lastname" id="lastName" placeholder="Last Name" required maxlength="20" pattern="[A-Za-z]+">
    </p>

    <p>
      <label for="dob">Date of Birth:</label>
      <input type="date" name="dob" id="dob" required>
    </p>

    <!-- Gender Radio Buttons -->
    <p>
      <label>Gender:</label>
      <section class="radio-group">
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>

        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
      </section>
    </p>

    <!-- Address Information -->
    <p>
      <label for="street">Street Address:</label>
      <input type="text" name="address" id="street" required maxlength="40">
    </p>

    <p>
      <label for="suburb">Suburb/Town:</label>
      <input type="text" name="suburb" id="suburb" required maxlength="40">
    </p>

    <p>
      <label for="state">State:</label>
      <select name="state" id="state" required>
        <option value="">State</option>
        <option value="VIC">VIC</option>
        <option value="NSW">NSW</option>
        <option value="QLD">QLD</option>
        <option value="NT">NT</option>
        <option value="WA">WA</option>
        <option value="SA">SA</option>
        <option value="TAS">TAS</option>
        <option value="ACT">ACT</option>
      </select>
    </p>

    <p>
      <label for="postcode">Postcode:</label>
      <input type="text" name="postcode" id="postcode" required maxlength="4" pattern="\d{4}">
    </p>

    <!-- Contact Information -->
    <p>
      <label for="email">Email Address:</label>
      <input type="email" name="email" id="email" required>
    </p>

    <p>
      <label for="phone">Phone Number:</label>
      <input type="text" name="phone" id="phone" required maxlength="12" pattern="[0-9 ]{8,12}" placeholder="e.g. 0412 345 678">
    </p>

    <!-- Technical Skills (Checkboxes) -->
<p>
  <label>Required Technical Skills:</label>
  <section class="checkbox-group">
    <div class="checkbox-row">
      <input type="checkbox" id="ts1" name="skills[]" value="Programming" checked>
      <label for="ts1">Programming</label> 

      <input type="checkbox" id="ts2" name="skills[]" value="Data Analysis">
      <label for="ts2">Data Analysis</label>  

      <input type="checkbox" id="ts3" name="skills[]" value="Web Development">
      <label for="ts3">Web Development</label>
    </div>
    <div class="checkbox-row">
      <input type="checkbox" id="ts4" name="skills[]" value="Database Management">
      <label for="ts4">Database Management</label>

      <input type="checkbox" id="ts5" name="skills[]" value="Cloud Computing">
      <label for="ts5">Cloud Computing</label>
    </div>
  </section>
</p>

    <!-- Other Skills -->
    <p>
      <label for="skill">Other Skills:</label>
    </p>
    <p>
      <textarea id="skill" name="other_skills" rows="4" cols="40" placeholder="Write description of your other skills here..."></textarea>
    </p>

    <!-- Submit Button -->
    <input type="submit" value="Submit">
  </form>
</main>

<?php include 'footer.inc'; ?> <!-- Shared footer -->
</body>
</html>