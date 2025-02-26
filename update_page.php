<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: signin.html");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Style/style.css" />
    <link rel="stylesheet" href="Style/sign.css" />
    <title>Signup Page</title>
    <style>
      textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #e8e8e8;
        color: #000000;
        height: 80px;
      }

      textarea:focus {
        border-color: var(--primary);
        outline: none;
      }

      #username{
        font-weight: bold;
        color: var(--secondary);
        /* background-color: #fff; */
        border: none;
      }
    </style>
  </head>
  <body>
    <header>
      <nav>
        <h1 class="logo">MediLink</h1>
        <ul class="menu">
          <li>
            <a href="index.html"><b>Home</b></a>
          </li>

          <li><a href="services.php">Services</a></li>

          <li><a href="aboutus.html">About us</a></li>

          <li><a href="contactus.html">Contact</a></li>

          <li><a href="signin.html">Account</a></li>
        </ul>
      </nav>
    </header>
    <div class="signup-container">
      <div class="image-section"></div>
      <div class="form-section">
        <h1>Edit account details</h1>
        <p>
          Nothing to edit? <a href="dashboard_page.php">Go back to dashboard</a>
        </p>
        <form method="post" action="php/update.php">
          <div class="form-row">
            <div class="form-group">
              <label for="username">Username</label>
              <input
                type="text"
                id="username"
                name="username"
                placeholder="john_doe"
                required
                value="<?php echo $user['username']; ?>"
                readonly
              />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="patient_name">Patient Name</label>
              <input
                type="text"
                id="patient_name"
                name="patient_name"
                placeholder="John Doe"
                required
                value="<?php echo $user['patient_name']; ?>"
              />
            </div>
            <div class="form-group">
              <label for="age">Age</label>
              <input
                type="number"
                id="age"
                name="age"
                placeholder="30"
                required
                value="<?php echo $user['age']; ?>"
              />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="gender">Gender</label>
              <select id="gender" name="gender" required>
                <option value="" disabled>Select Gender</option>
                <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
              </select>
            </div>
            <div class="form-group">
              <label for="phone_number">Phone Number</label>
              <input
                type="tel"
                id="phone_number"
                name="phone_number"
                placeholder="+94 123456789"
                required
                value="<?php echo $user['phone_number']; ?>"
              />
            </div>
          </div>

          <label for="address">Home Address</label>
          <input
            type="text"
            id="address"
            name="address"
            placeholder="Sri Lanka"
            class="inputs-below"
            required
            value="<?php echo $user['address']; ?>"
          />

          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="johndoe@example.com"
            class="inputs-below"
            required
            value="<?php echo $user['email']; ?>"
          />

          <label for="security_answer">Security Answer (Your Pet's Name)</label>
          <input
            type="text"
            id="security_answer"
            name="security_answer"
            placeholder="Buddy"
            required
            class="inputs-below"
            value="<?php echo $user['security_answer']; ?>"
          />

          <label for="patient_detail">Patient Detail (Optional)</label>
          <textarea
            type="patient_detail"
            id="patient_detail"
            name="patient_detail"
            placeholder="Usual office worker"
            class="inputs-below"
          ><?php echo $user['patient_detail']; ?></textarea>

          <label for="medical_history">Medical History (Optional)</label>
          <textarea
            type="medical_history"
            id="medical_history"
            name="medical_history"
            placeholder="Your medical history here (Healthy)"
            class="inputs-below"
          ><?php echo $user['medical_history']; ?></textarea>

          <button type="submit" class="btn">Update Account Details</button>
        </form>
      </div>
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
  </body>
</html>
