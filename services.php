<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Services</title>
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/services.css" />
    <link rel="stylesheet" href="Style/library.css" />
  </head>
  <body>
    <header>
      <nav>
        <h1 class="logo">MediLink</h1>
        <ul class="menu">
          <li><a href="index.html">Home</a></li>
          <li>
            <a href="services.php"><b>Services</b></a>
          </li>
          <li><a href="aboutus.html">About us</a></li>
          <li><a href="contactus.html">Contact</a></li>
          <li><a href="signin.html">Account</a></li>
        </ul>
      </nav>
    </header>

    <div class="service-body">
      <div class="checkup">
        <h2 class="service-title">Book Medical Checkups</h2>
        <form action="php/book_checkup.php" method="POST">
          <div class="checkup-container">
              <div class="checkup-field">
                  <label for="username">Username:</label>
                  <input type="text" name="username" value="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['username'] : ''; ?>" readonly />
              </div>

              <div class="checkup-field">
                  <label for="checkup_date">Schedule a date:</label>
                  <input type="date" name="checkup_date" required />
              </div>

              <div class="checkup-field">
                  <label for="checkup_type">Checkup Type:</label>
                  <select name="checkup_type" required>
                      <option value="" disabled selected>Select</option>
                      <option value="Blood Pressure Check">Blood Pressure Check</option>
                      <option value="Cholesterol Test (Lipid Panel)">Cholesterol Test (Lipid Panel)</option>
                      <option value="Blood Sugar Test (Glucose Levels)">Blood Sugar Test (Glucose Levels)</option>
                      <option value="Complete Blood Count (CBC)">Complete Blood Count (CBC)</option>
                      <option value="Electrocardiogram (ECG)">Electrocardiogram (ECG)</option>
                      <option value="Skin Check">Skin Check</option>
                      <option value="Eye Check">Eye Check</option>
                      <option value="Hearing Test">Hearing Test</option>
                  </select>
              </div>
          </div>

          <input type="submit" value="Book Checkup" class="checkup-btn" />
        </form>


        <h2 class="service-title">Health measures</h2>
      </div>
      <div class="content">
        <section id="calorie-calculator">
          <h1 class="cal-title">Ideal Calorie Intake Calculator</h1>
          <form id="calorieForm">
            <label for="cal-age">Age (years):</label>
            <input
              type="number"
              id="cal-age"
              name="age"
              placeholder="Enter age"
              required
            />

            <label for="cal-gender">Gender:</label>
            <select id="cal-gender" name="gender" required>
              <option value="" disabled selected>Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>

            <label for="cal-weight">Weight (kg):</label>
            <input
              type="number"
              id="cal-weight"
              name="weight"
              placeholder="Enter weight"
              required
            />

            <label for="cal-height">Height (cm):</label>
            <input
              type="number"
              id="cal-height"
              name="height"
              placeholder="Enter height"
              required
            />

            <label for="cal-activity">Activity Level:</label>
            <select id="cal-activity" name="activity" required>
              <option value="" disabled selected>Select Activity Level</option>
              <option value="1.2">Sedentary</option>
              <option value="1.375">Lightly active</option>
              <option value="1.55">Moderately active</option>
              <option value="1.725">Very active</option>
              <option value="1.9">Extra active</option>
            </select>

            <button type="button" onclick="calculateCalories()">
              Calculate
            </button>
          </form>
          <p class="cal-output" id="calorie-result"></p>
        </section>

        <!-- BMI Calculator -->
        <section id="bmi-calculator">
          <h1 class="cal-title">BMI Calculator</h1>
          <form id="bmiForm">
            <label for="bmi-height">Height (cm):</label>
            <input
              type="number"
              id="bmi-height"
              name="height"
              placeholder="Enter height"
              required
            />

            <label for="bmi-weight">Weight (kg):</label>
            <input
              type="number"
              id="bmi-weight"
              name="weight"
              placeholder="Enter weight"
              required
            />

            <label for="bmi-gender">Gender:</label>
            <select id="bmi-gender" name="gender" required>
              <option value="" disabled selected>Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>

            <button type="button" onclick="calculateBMI()">
              Calculate BMI
            </button>
          </form>
          <p class="cal-output" id="bmi-result"></p>
          <p class="cal-output" id="ideal-weight-result"></p>
        </section>

        <!-- Water Intake Calculator -->
        <section id="water-calculator">
          <h1 class="cal-title">Daily Water Intake Calculator</h1>
          <form id="waterForm">
            <label for="water-weight">Weight (kg):</label>
            <input
              type="number"
              id="water-weight"
              name="weight"
              placeholder="Enter weight"
              required
            />

            <label for="water-activity"
              >Physical Activity Level (hours/day):</label
            >
            <input
              type="number"
              id="water-activity"
              name="activity"
              placeholder="Enter active hours"
              required
            />

            <button type="button" onclick="calculateWater()">Calculate</button>
          </form>
          <p class="cal-output" id="water-result"></p>
        </section>
      </div>
    </div>

    <div class="library-container">
      <section class="videos-section">
        <h3>Health & Wellness Video Hub</h3>
        <div class="videos-grid">
          <div class="video-box">
            <iframe
              src="https://www.youtube.com/embed/T41mYCmtWls?si=r4gOtPqdYapl0mis"
              title="YouTube video"
              allowfullscreen
            ></iframe>
            <h4>Morning Yoga for Stretch</h4>
          </div>
          <div class="video-box">
            <iframe
              src="https://www.youtube.com/embed/wZAjVQWbMlE?si=sNGM65Qhd4cE_p2o"
              title="YouTube video"
              allowfullscreen
            ></iframe>
            <h4>What is Diabetes?</h4>
          </div>
          <div class="video-box">
            <iframe
              src="https://www.youtube.com/embed/NQ5gAP4AHUM?si=dZTW6SFwY899ilNY"
              title="YouTube video"
              allowfullscreen
            ></iframe>
            <h4>10 Rules to Prevent Heart Attack</h4>
          </div>
        </div>
      </section>

      <section class="categories-section">
        <h3>The Complete Health Resource Hub</h3>
        <div class="categories-grid">
          <div class="category-box">
            <img src="Images/library/image1.jpg" alt="Health IT" />
            <h4>GLP-1 Receptor Agonists: Benefits and Risks</h4>
            <p>
              A Nature Medicine study evaluates GLP-1 receptor agonists,
              discussing their effectiveness in treating diabetes and associated
              risks.
            </p>
            <a href="https://pubmed.ncbi.nlm.nih.gov/39833406/">Read more</a>
          </div>
          <div class="category-box">
            <img src="Images/library/image2.jpg" alt="UMLS" />
            <h4>The Link Between Alcohol and Cancer Risk</h4>
            <p>
              WebMD examines how alcohol increases cancer risk, including
              breast, liver, and colorectal cancer, even with moderate
              consumption.
            </p>
            <a href="https://www.webmd.com/cancer/cancer-alcohol-cancer-link"
              >Read more</a
            >
          </div>
          <div class="category-box">
            <img src="Images/library/image3.jpg" alt="Training Program" />
            <h4>How Many Steps Should You Take Daily?</h4>
            <p>
              Healthline explores daily step goals, their variation by
              lifestyle, and the benefits of walking for cardiovascular health
              and weight management.
            </p>
            <a
              href="https://www.healthline.com/health/average-steps-per-day#age"
              >Read more</a
            >
          </div>
          <div class="category-box">
            <img src="Images/library/image4.jpg" alt="Clinical Research" />
            <h4>Vitamin D Deficiency and Bone Health</h4>
            <p>
              Patient.info highlights vitamin D’s role in calcium absorption,
              preventing osteoporosis, and maintaining bone strength through
              diet and sun exposure.
            </p>
            <a
              href="https://patient.info/bones-joints-muscles/osteoporosis-leaflet/vitamin-d-deficiency"
              >Read more</a
            >
          </div>
        </div>
      </section>
    </div>

    <footer>
      <div class="container">
        <div class="item1">
          <p class="footer-title">MediLink Patient Management System</p>
          <p>
            Streamlining healthcare with secure, efficient, and user-friendly
            solutions, empowering patients for better medical management and
            care.
          </p>
          <br />
          <p class="footer-title">Address</p>
          <p>No.10, Colombo 04, Sri Lanka</p>
          <br />

          <p class="footer-title">Contact</p>
          <p>+94 123456789</p>
          <p>MediLinkpms@email.com</p>
        </div>
        <div></div>
        <div class="item2">
          <p class="footer-title">Navigation</p>
          <ul class="footer-nav">
            <li><a href="index.html">Home</a></li>

            <li><a href="services.php">Services</a></li>

            <li><a href="aboutus.html">About us</a></li>

            <li><a href="contactus.html">Contact</a></li>
          </ul>
        </div>
        <div class="item3">
          <p class="footer-title">Social Media</p>
          <ul class="footer-nav">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">LinkedIn</a></li>
          </ul>
        </div>
      </div>
      <p id="credits">Development Team 07</p>
    </footer>
    <script src="script/calculators.js"></script>
  </body>
</html>
