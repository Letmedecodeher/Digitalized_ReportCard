<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if the user is not authenticated
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Your existing CSS */
  </style>
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo">
        <img src="E:/icon/354637.png" alt="Flex Logo">
        <h3>Digitalized Report Card</h3>
      </div>
      <ul class="menu">
        <li onclick="showSection('home')"><i class="fas fa-home"></i> Home Page</li>
        <li onclick="showSection('attendance')"><i class="fas fa-calendar-check"></i> Attendance Analytics</li>
        <li onclick="showSection('report')"><i class="fas fa-edit"></i> Report Details</li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="header">
        <h1>Welcome back, <?php echo htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8'); ?>!</h1>
        <div class="search-bar">
          <input type="text" placeholder="Search">
          <i class="fas fa-search"></i>
        </div>
        <div class="profile">
          <img src="<?php echo htmlspecialchars($_SESSION['profile_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Picture">
          <span><?php echo htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
      </div>

      <!-- Home Section -->
      <div id="home" class="content-section active">
        <div class="info-card">
          <h3>Personal Information</h3>
          <p>This is your dashboard overview. Access your attendance analytics and report details using the sidebar menu.</p>
        </div>
      </div>

      <!-- Attendance Analytics Section -->
      <div id="attendance" class="content-section">
        <div class="chart-container">
          <h3>Monthly Attendance</h3>
          <canvas id="attendanceChart"></canvas>
        </div>
        <table>
          <tr>
            <th>Subject</th>
            <th>Total Classes</th>
            <th>Classes Attended</th>
            <th>Attendance %</th>
          </tr>
          <tr>
            <td>Math</td>
            <td>30</td>
            <td>28</td>
            <td>93%</td>
          </tr>
          <tr>
            <td>Physics</td>
            <td>25</td>
            <td>20</td>
            <td>80%</td>
          </tr>
        </table>
      </div>

      <!-- Report Details Section -->
      <div id="report" class="content-section">
        <div class="chart-container">
          <canvas id="reportChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Function to show specific section and hide others
    function showSection(sectionId) {
      const sections = document.querySelectorAll('.content-section');
      sections.forEach((section) => section.classList.remove('active'));
      document.getElementById(sectionId).classList.add('active');

      if (sectionId === 'report') renderReportChart();
      if (sectionId === 'attendance') renderAttendanceChart();
    }

    // Function to render the Attendance Chart
    function renderAttendanceChart() {
      const ctx = document.getElementById('attendanceChart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['January', 'February', 'March', 'April'], // Months
          datasets: [{
            label: 'Attendance (%)',
            data: [90, 85, 95, 80], // Sample data
            backgroundColor: ['#3f51b5', '#536dfe', '#ff9800', '#4caf50']
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
          },
        }
      });
    }

    // Function to render the Report Chart
    function renderReportChart() {
      const ctx = document.getElementById('reportChart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Math', 'Physics', 'Chemistry', 'Biology', 'English'],
          datasets: [{
            label: 'Marks Obtained',
            data: [85, 78, 92, 88, 75],
            backgroundColor: ['#3f51b5', '#536dfe', '#ff9800', '#4caf50', '#f44336']
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
          },
        }
      });
    }
  </script>
</body>
</html>

