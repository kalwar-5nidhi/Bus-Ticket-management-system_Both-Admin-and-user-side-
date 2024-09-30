document.addEventListener('DOMContentLoaded', function() {
  const dashboardCard = document.getElementById('Dashboard');
  const busesCard = document.getElementById('Buses');

  dashboardCard.addEventListener('click', function() {
      window.location.href = 'dashboard.html';
  });

  busesCard.addEventListener('click', function() {
      window.location.href = 'busesDisplay.php';
  });

  document.getElementById('routes-card').addEventListener('click', function() {
      window.location.href = 'routesDisplay.php';
  });

  document.getElementById('customers-card').addEventListener('click', function() {
      window.location.href = 'CustomerDisplay.php';
  });

  document.getElementById('booking-card').addEventListener('click', function() {
      window.location.href = 'bookingDisplay.php';
  });

//   document.getElementById('seats-card').addEventListener('click', function() {
//       window.location.href = 'seatsDisplay.php';
//   });

  document.getElementById('schedule-card').addEventListener('click', function() {
    window.location.href = 'scheduleDisplay.php';
});
});
function loadContent(url) {
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.text();
        })
        .then(html => {
            document.getElementById('main-content').innerHTML = html;
        })
        .catch(error => {
            console.error('Error loading content:', error);
            document.getElementById('main-content').innerHTML = 'Error loading content. Please try again later.';
        });
}

