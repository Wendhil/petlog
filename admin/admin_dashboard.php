<?php
include('dbconn/config.php');
include('dbconn/authentication.php');
checkAccess('admin');

// Prepare data for breed distribution
$breedNames = [];
$breedData = [];

// Query for breed distribution
$breedSql = "SELECT breed, COUNT(*) as count FROM reports GROUP BY breed";
$breedResult = $conn->query($breedSql);
while ($row = $breedResult->fetch_assoc()) {
    $breedNames[] = $row['breed'];
    $breedData[] = $row['count'];
}

// Count total pets
$totalPets = array_sum($breedData);

// Prepare abuse data
$abuseTypes = [];
$abuseCounts = [];
$abusePercentages = [];

$sql = "SELECT typeabuse, SUM(numabuse) as totalAbuse FROM reports GROUP BY typeabuse";
$result = $conn->query($sql);

$totalAbuseCount = 0;
while ($row = $result->fetch_assoc()) {
    $abuseTypes[] = $row['typeabuse'];
    $abuseCounts[] = $row['totalAbuse'];
    $totalAbuseCount += $row['totalAbuse'];
}

// Calculate the percentage for each abuse type
foreach ($abuseCounts as $count) {
    $abusePercentages[] = round(($count / $totalAbuseCount) * 100, 2);
}

// Append percentages to abuse types
for ($i = 0; $i < count($abuseTypes); $i++) {
    $abuseTypes[$i] .= " ({$abusePercentages[$i]}%)";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Animal Welfare</title>
  <link rel="shortcut icon" href="img/barangay.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="disc/css/style.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>

    .chart-container {
      width: 800px;
      height: 400px;
      margin: auto;
    }
  </style>
</head>
<body class="flex bg-[#90e0ef] font-poppins">

  <!-- Sidebar -->
  <?php include('disc/partials/admin_sidebar.php'); ?>

  <div class="w-full mx-4">
    <?php include('disc/partials/admin_navbar.php'); ?>

    <!-- Pet Information Summary -->
    <div class="flex gap-2 mb-3">
   <!-- Total Number of Pets Box -->
   <div class="bg-[#f6fff8] shadow-md rounded-lg p-2 w-full sm:w-1/2 text-center">
     <i class="fas fa-paw text-3xl text-blue-500 mb-2"></i> <!-- Paw icon for pets -->
     <h2 class="text-lg font-bold mb-2">Total Pet Information</h2>
     <p class="text-lg">Total Number of Pets:</p>
     <span class="text-2xl font-bold"><?php echo $totalPets; ?></span>
   </div>

   <!-- Total Breeds Box -->
   <div class="bg-[#f6fff8] shadow-md rounded-lg p-2 w-full sm:w-1/2 text-center">
     <i class="fas fa-dog text-3xl text-green-500 mb-2"></i> <!-- Dog icon for breeds -->
     <h2 class="text-lg font-bold mb-2">Total Breeds</h2>
     <p class="text-lg">Total Breeds:</p>
     <span class="text-2xl font-bold"><?php echo count($breedNames); ?></span>
   </div>
</div>

    <!-- Combined Charts Box -->
    <div class="bg-[#f6fff8] rounded-lg shadow-md p-3 mb-4">
      <h2 class="text-lg font-bold mb-4">Animal Data Distribution</h2>
      <div class="chart-container">
        <canvas id="combinedChart"></canvas>
      </div>
    </div>
  </div>

  <script>
    // Combined Animal Data Distribution Chart
    const combinedCtx = document.getElementById('combinedChart').getContext('2d');
    const combinedChart = new Chart(combinedCtx, {
        type: 'bar',
        data: {
            labels: [...<?php echo json_encode($breedNames); ?>, ...<?php echo json_encode($abuseTypes); ?>],
            datasets: [
                {
                    label: 'Breed Distribution',
                    data: <?php echo json_encode($breedData); ?>,
                    backgroundColor: 'rgba(255, 206, 86, 0.6)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Animal Cruelty Counts',
                    data: <?php echo json_encode($abuseCounts); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                }
            }
        }
    });
  </script>

  <script src="disc/js/script.js"></script>
  <script src="disc/js/script-admin.js"></script>
</body>
</html>
