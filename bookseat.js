function bookSeat(seatNumber, busId, userId) {
    fetch('book_seat.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ seatNumber, busId, userId }),
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text();
      })
      .then(data => {
        console.log(data); // Output response from PHP file
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  