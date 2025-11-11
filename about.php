<!DOCTYPE html>
<html lang="en">
<?php include 'header.inc'; ?>

<body>
  <header class="hero">
    <img src="images/ALIMSON-LOGO.png" alt="Website Logo" class="mini-logo">
    <h1 id="logo">About Us</h1>
    <p>Meet the team behind ALIMSON Tech</p>
  </header>

  <?php include 'nav.inc'; ?>

  <!-- Group Details 
  <section class="features">
    <h2>ALIMSON - Group Name</h2>
    <h3>Our Swinburne Timetable</h3>
    <img src="images/timetable.jpg" class="slide s1" alt="Timetable"> -->

  <!-- Group Details -->
  <section class="about-section">
    <h2>Group Details</h2>
    <ul class="group-details">
      <li>Group Name
        <ul>
          <li><span class="sid">ALIMSON</span></li>
        </ul>
      </li>
      <li>Members & Student IDs
        <ul>
          <li>Alissa <span class="sid">106213011 / J24042059</span></li>
          <li>Yee Kuan <span class="sid">106212898 / J24042030</span></li>
          <li>Gibson <span class="sid">106212982 / J24042154</span></li>
        </ul>
      </li>
      <li>Class Timetable
        <ul>
          <li>Monday
            <ul>
              <li>8:00 AM – 10:00 AM: Introduction to Programming</li>
              <li>12:00 PM – 2:00 PM: Mathematics For Computing</li>
              <li>2:00 PM – 4:00 PM: Computer Systems</li>
            </ul>
          </li>
          <li>Tuesday
            <ul>
              <li>10:00 AM – 12:00 PM: Introduction to Programming</li>
              <li>12:00 PM – 2:00 PM: Computer Systems</li>
              <li>10:00 AM – 12:00 PM: Web Technology Project</li>
            </ul>
          </li>
          <li>Wednesday
            <ul>
              <li>10:00 AM – 12:00 PM: Networks and Switching</li>
              <li>12:00 PM – 2:00 PM: Web Technology Project</li>
            </ul>
          </li>
          <li>Thursday
            <ul>
              <li>11:00 AM – 2:00 PM: Networks and Switching</li>
              <li>4:00 PM – 6:00 PM: Mathematics</li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>

    <h3>Our Swinburne Timetable</h3>
    <img src="images/timetable.jpg" class="job-image" alt="Timetable">
  </section>

 <!-- Gallery -->
  <section class="about-section gallery-container">
    <h2>Our Team</h2>
    <figure class="gallery">
      <input type="radio" name="gallery" id="p1" checked>
      <input type="radio" name="gallery" id="p2">
      <input type="radio" name="gallery" id="p3">

      <img src="images/alimson-pic3.jpg" class="slide s1" alt="Group photo 1">
      <img src="images/alimson-pic2.jpg" class="slide s2" alt="Group photo 2">
      <img src="images/alimson-pic1.jpg" class="slide s3" alt="Group photo 3">

      <div class="controls">
        <label for="p1"><span class="visually-hidden">Photo 1</span></label>
        <label for="p2"><span class="visually-hidden">Photo 2</span></label>
        <label for="p3"><span class="visually-hidden">Photo 3</span></label>
      </div>
    </figure>
  </section>

    
  </section>

  <!-- Tutor -->
  <section class="about-section">
    <h2>Tutor</h2>
    <p><strong>Mrs. Rasaratnam</strong></p>
  </section>

  <!-- Contributions -->
  <section class="features">
    <h2>Member's Contributions</h2>
    <div class="feature-cards">
      <div class="card">
        <h3>Alissa Low Li Jin</h3>
        <p><strong>ID:</strong> 106213011 / J24042059</p>
        <p><strong>Project 1:</strong></p>
        <p>Developed the CSS styling and compiled detailed job descriptions to ensure clear role definitions.</p>
        <p><strong>Project 2:</strong></p>
        <p>Used php to reuse common elements in the website, created settings.php file and did the validation for process_eoi.php file.</p>
      </div>
      <div class="card">
        <h3>Lim Yee Kuan</h3>
        <p><strong>ID:</strong> 106212898 / J24042030</p>
        <p><strong>Project 1:</strong></p>
        <p>Managed the Jira workspace and designed and retrieved the content of the job application forms.</p>
        <p><strong>Project 2:</strong></p>
        <p>Created the EOI table</p>
      </div>
      <div class="card">
        <h3>Saw Zhi Chen (Gibson)</h3>
        <p><strong>ID:</strong> 106212982 / J24042154</p>
        <p>Designed and structured the layout for both the home page and the about page.</p>
      </div>
    </div>
  </section>



  <!-- Interests Table -->
  <section class="about-section">
    <h2>Our Interests</h2>
    <table>
      <thead>
        <tr>
          <th>Member</th>
          <th colspan="2">Interests</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Yee Kuan</td><td>Reading</td><td>Coding</td>
        </tr>
        <tr>
          <td>Alissa</td><td>Drawing</td><td>Web Design</td>
        </tr>
        <tr>
          <td>Gibson</td><td>Networking</td><td>Cybersecurity</td>
        </tr>
      </tbody>
    </table>
  </section>

  <?php include 'footer.inc'; ?>
</body>
</html>