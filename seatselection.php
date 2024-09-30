<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seat Selection</title>
  <link rel="stylesheet" href="seatselection.css">
</head>
<body>
    <div class="top">
        <h2>Where To?</h2>
        <div class="topbuttons">
          <a href="help.html">
            <button class="help">Help</button>
          </a>
          <a href="aboutus.html">
            <button class="about">About Us</button>
          </a>
        </div>
    </div>
  <div class="card">
    <div class="card-header">
      <h2>Seat Selection</h2>
    </div>
    <div class="seat-info">
        <p>Available seats: <span class="available-count">14</span></p>
        <p>Selected seats: <span class="selected-count">0</span></p>
        <p>Booked seats: <span class="booked-count">0</span></p>
      </div>
    <div class="card-body">
      <div class="keyboard">
        <!-- Add this code inside the <div class="keyboard"> -->
<button class="seat available" data-seat-number="A1"><img src="bus_seat_logo.png" alt="Seat A1"></button>
<button class="seat available" data-seat-number="A2"><img src="bus_seat_logo.png" alt="Seat A2"></button>
<button class="seat available" data-seat-number="A3"><img src="bus_seat_logo.png" alt="Seat A3"></button>
<button class="seat available" data-seat-number="A4"><img src="bus_seat_logo.png" alt="Seat A4"></button>
<button class="seat available" data-seat-number="A5"><img src="bus_seat_logo.png" alt="Seat A5"></button>
<button class="seat available" data-seat-number="A6"><img src="bus_seat_logo.png" alt="Seat A6"></button>
<button class="seat available" data-seat-number="A7"><img src="bus_seat_logo.png" alt="Seat A7"></button>
<button class="seat available" data-seat-number="A8"><img src="bus_seat_logo.png" alt="Seat A8"></button>
<button class="seat available" data-seat-number="A9"><img src="bus_seat_logo.png" alt="Seat A9"></button>
<button class="seat available" data-seat-number="A10"><img src="bus_seat_logo.png" alt="Seat A10"></button>
<button class="seat available" data-seat-number="A11"><img src="bus_seat_logo.png" alt="Seat A11"></button>
<button class="seat available" data-seat-number="A12"><img src="bus_seat_logo.png" alt="Seat A12"></button>
<button class="seat available" data-seat-number="A13"><img src="bus_seat_logo.png" alt="Seat A13"></button>
<button class="seat available" data-seat-number="A14"><img src="bus_seat_logo.png" alt="Seat A14"></button>

        <!-- Add more seats as needed -->
      </div>
      <div class="controls">
        <!-- HTML -->
<button id="bookButton">Book Selected Seats</button>
<div id="overlay" style="display: none;">
  <div id="confirmDialog">
    <p>Do you confirm booking the selected seats?</p>
    <button id="confirmYes">Yes</button>
    <button id="confirmNo">No</button>
  </div>
</div>
      </div>
    </div>
  </div>
  <script src="seatselection.js"></script>
</body>
</html>
