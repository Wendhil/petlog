<?php
include('dbconn/config.php');
include('dbconn/authentication.php');
checkAccess('admin');

// Prepare data for breed and species distribution
$breedNames = [];
$breedData = [];
$speciesNames = [];
$speciesData = [];

// Query for breed distribution
$breedSql = "SELECT breed, COUNT(*) as count FROM reports GROUP BY breed";
$breedResult = $conn->query($breedSql);
while ($row = $breedResult->fetch_assoc()) {
    $breedNames[] = $row['breed'];
    $breedData[] = $row['count'];
}

// Query for species distribution
$speciesSql = "SELECT species, COUNT(*) as count FROM reports GROUP BY species";
$speciesResult = $conn->query($speciesSql);
while ($row = $speciesResult->fetch_assoc()) {
    $speciesNames[] = $row['species'];
    $speciesData[] = $row['count'];
}

// Count total pets
$totalPets = 0;
foreach ($breedData as $count) {
    $totalPets += $count;
}

// Prepare vaccination status data
$abuseTypes = [];
$abuseCounts = [];

$sql = "SELECT typeabuse, SUM(numabuse) as totalAbuse FROM reports GROUP BY typeabuse";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $abuseTypes[] = $row['typeabuse'];
        $abuseCounts[] = $row['totalAbuse'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Animal Welfare</title>
  <link rel="shortcut icon" href="img/barangay.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="disc/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .chart-container {
      width: 800px; /* Adjust width for larger size */
      height: 400px; /* Adjust height for larger size */
      margin: auto;
    }
  </style>
</head>
<body class="flex bg-gray-100">

  <!-- Sidebar -->
  <?php include('disc/partials/admin_sidebar.php'); ?>

  <div class="w-full mx-4">
    <?php include('disc/partials/admin_navbar.php'); ?>

    <!-- Pet Information Summary -->
    <div class="overflow-x-auto mb-4">
      <h2 class="text-lg font-bold mb-2">Total Pet Information</h2>
      <p class="text-lg">Total Number of Pets: <span class="font-bold"><?php echo $totalPets; ?></span></p>
      <p class="text-lg">Total Breeds: <span class="font-bold"><?php echo count($breedNames); ?></span></p>
      <p class="text-lg">Total Species: <span class="font-bold"><?php echo count($speciesNames); ?></span></p>
    </div>

    <!-- Combined Charts Box -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-4">
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
            labels: [...<?php echo json_encode($breedNames); ?>, ...<?php echo json_encode($speciesNames); ?>, ...<?php echo json_encode($abuseTypes); ?>],
            datasets: [
                {
                    label: 'Breed Distribution',
                    data: <?php echo json_encode($breedData); ?>,
                    backgroundColor: 'rgba(255, 206, 86, 0.6)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Species Distribution',
                    data: <?php echo json_encode($speciesData); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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
