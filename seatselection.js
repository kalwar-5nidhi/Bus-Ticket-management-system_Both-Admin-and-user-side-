document.addEventListener('DOMContentLoaded', () => {
    const seats = document.querySelectorAll('.seat');
    const availableCount = document.querySelector('.available-count');
    const selectedCount = document.querySelector('.selected-count');
    const bookedCount = document.querySelector('.booked-count');
    const overlay = document.getElementById('overlay');

    let available = 14;
    let selected = 0;
    let booked = 0;

    seats.forEach(seat => {
        seat.addEventListener('click', () => {
            if (seat.classList.contains('available')) {
                seat.classList.remove('available');
                seat.classList.add('selected');
                available--;
                selected++;
            } else if (seat.classList.contains('selected')) {
                seat.classList.remove('selected');
                seat.classList.add('available');
                available++;
                selected--;
            }
            updateCounts();
        });
    });

    function updateCounts() {
        availableCount.textContent = available;
        selectedCount.textContent = selected;
        bookedCount.textContent = booked;
    }

    const bookButton = document.getElementById('bookButton');
    const confirmYes = document.getElementById('confirmYes');

    bookButton.addEventListener('click', () => {
        if (selected > 0) {
            overlay.style.display = 'flex';
        } else {
            alert('Please select at least one seat to book.');
        }
    });

    confirmYes.addEventListener('click', () => {
        const selectedSeats = document.querySelectorAll('.selected');
        if (selectedSeats.length > 0) {
            let userName = prompt('Please enter your name:');
            if (userName) {
                selectedSeats.forEach(seat => {
                    seat.classList.remove('selected');
                    seat.classList.add('booked');
                    selected--;
                    booked++;
                });

                updateCounts();
                overlay.style.display = 'none';
                window.location.href = 'payment.php'; // Redirect to payment page
            } else {
                alert('Please enter your name to proceed.');
            }
        } else {
            alert('Please select at least one seat to book.');
        }
    });

    document.getElementById('confirmNo').addEventListener('click', () => {
        overlay.style.display = 'none';
    });
});
