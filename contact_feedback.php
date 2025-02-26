<!DOCTYPE html>
<html lang="en">
<head>
    <title>MediLink | Contact Feedbacks</title>
    <link rel="stylesheet" href="Style/style.css" />

    <style>

        h2{
            text-align: center;
            padding-top: 16px;
        }
        table {
            max-width: 1100px;
            width: 100%;
            border-collapse: collapse;
            margin: 16px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: var(--secondary);
            color: #fff;
        }

        td{
            background-color: #fff;
        }
        .no-data {
            text-align: center;
            font-weight: bold;
            color: red;
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
<body>
<h2>Contact Form Feedback</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Inquiry Type</th>
                <th>Message</th>
                <th>Date Submitted</th>
            </tr>
        </thead>
        <tbody id="feedback-table">
            <tr><td colspan="7" class="no-data">Loading data...</td></tr>
        </tbody>
    </table>

    <footer>
      <div class="container">
        <div class="item1">
          <p class="footer-title">MediLink Patient Management System</p>
          <p>
            Streamlining healthcare with secure, efficient, and user-friendly
            solutions, empowering patients for better medical
            management and care.
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

    <script>
        fetch('./php/fetch_feedback.php')
            .then(response => response.json())
            .then(data => {
                let tableBody = document.getElementById('feedback-table');
                tableBody.innerHTML = ""; // Clear default row

                if (data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="7" class="no-data">No data record found</td></tr>`;
                } else {
                    data.forEach(row => {
                        let tr = document.createElement('tr');
                        tr.innerHTML = `<td>${row.id}</td>
                                        <td>${row.name}</td>
                                        <td>${row.email || 'N/A'}</td>
                                        <td>${row.phone || 'N/A'}</td>
                                        <td>${row.inquiry_type}</td>
                                        <td>${row.message}</td>
                                        <td>${row.submitted_at}</td>`;
                        tableBody.appendChild(tr);
                    });
                }
            })
            .catch(error => {
                console.error('Error loading data:', error);
                document.getElementById('feedback-table').innerHTML = `<tr><td colspan="7" class="no-data">Error loading data</td></tr>`;
            });
    </script>

</body>
</html>
