document.getElementById('cancel-ticket-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const ticketNumber = document.getElementById('ticket-number').value;
    const lastName = document.getElementById('last-name').value;
    
    // Simulate cancellation logic (e.g., send a request to the server)
    // For demonstration, we'll just display a success message
    const messageDiv = document.getElementById('message');
    messageDiv.textContent = `Ticket ${ticketNumber} for ${lastName} has been successfully cancelled.`;
    messageDiv.classList.remove('hidden');
    
    // Reset the form
    document.getElementById('cancel-ticket-form').reset();
});
