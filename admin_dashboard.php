<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="admin_dashboard.css">
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> 
</head>
<body>
  <div class="dashboard">
    <div class="sidebar">
        <div class="logo">
            <img src="logoo.png" alt="Logo">
        </div>
        <div class="profile">
            <img src="profile.png" alt="Profile Picture">  
        </div>
        <div class="card" id="Buses" onclick="loadContent('busesDisplay.php')"><a href="#"><i class="fas fa-bus"></i> Buses</a></div>
        <div class="card" id="routes-card" onclick="loadContent('routesDisplay.php')"><a href="#"><i class="fas fa-map-signs"></i> Routes</a></div>
        <div class="card" id="Customers-card" onclick="loadContent('CustomerDisplay.php')"><a href="#"><i class="fas fa-users"></i> Customers</a></div>
        <div class="card" id="booking-card" onclick="loadContent('bookingDisplay.php')"><a href="#"><i class="fas fa-ticket-alt"></i> Booking</a></div>
        <!-- <div class="card" id="seats-card" onclick="loadContent('seatsDisplay.php')"><a href="#"><i class="fas fa-sofa-alt"></i> Seats</a></div> -->
    </div>
    <div class="main-content" id="main-content">
      Select an option from the sidebar.
    </div>
  </div>
  <script src="admin_dashboard.js">
            $(document).ready(function() {
            $('#schedule-card').on('click', function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'scheduleDisplay.php',
                    method: 'GET',
                    success: function(response) {
                        $('#content').html(response);
                        $('#tabledata').DataTable();
                    },
                    error: function(error) {
                        console.error('Error loading content:', error);
                    }
                });
            });
        });
  </script>

</body>
</html>
