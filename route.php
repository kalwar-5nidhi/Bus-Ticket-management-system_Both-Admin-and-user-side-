<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>
<body>
    <main>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Handle form submissions
                if (isset($_POST["submit"])) {
                    // Process form data and add routes
                    // Code for adding routes goes here
                    echo '<div class="alert alert-success">Route Added Successfully!</div>';
                }
                if (isset($_POST["edit"])) {
                    // Process form data and edit routes
                    // Code for editing routes goes here
                    echo '<div class="alert alert-success">Route Edited Successfully!</div>';
                }
                if (isset($_POST["delete"])) {
                    // Process form data and delete routes
                    // Code for deleting routes goes here
                    echo '<div class="alert alert-danger">Route Deleted Successfully!</div>';
                }
            }
        ?>

        <!-- Form for adding, editing, and deleting routes -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <!-- Form fields for route details -->
            <label for="viaCities">Via Cities:</label>
            <input type="text" id="viaCities" name="viaCities" required>
            <br>
            <label for="busNo">Bus Number:</label>
            <input type="text" id="busNo" name="busNo" required>
            <br>
            <label for="departureDate">Departure Date:</label>
            <input type="date" id="departureDate" name="departureDate" required>
            <br>
            <label for="departureTime">Departure Time:</label>
            <input type="time" id="departureTime" name="departureTime" required>
            <br>
            <label for="cost">Cost:</label>
            <input type="number" id="cost" name="cost" required>
            <br>
            <!-- Buttons for submitting the form -->
            <button type="submit" name="submit">Add Route</button>
            <button type="submit" name="edit">Edit Route</button>
            <button type="submit" name="delete">Delete Route</button>
        </form>

        <!-- Display routes in a table -->
        <table class="table table-hover">
            <!-- Table headers -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Via Cities</th>
                    <th>Bus</th>
                    <th>Departure Date</th>
                    <th>Departure Time</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <!-- Table body with sample route data -->
            <tbody>
                <tr>
                    <td>1</td>
                    <td>City A - City B</td>
                    <td>Bus 101</td>
                    <td>2024-05-24</td>
                    <td>08:00 AM</td>
                    <td>$50</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>City B - City C</td>
                    <td>Bus 102</td>
                    <td>2024-05-25</td>
                    <td>09:00 AM</td>
                    <td>$60</td>
                </tr>
            </tbody>
        </table>
    </main>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
