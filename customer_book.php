<?php
session_start();
include('db_connect.php');

// Fetch schedule details based on provided ID
if(isset($_GET['id']) && !empty($_GET['id']) ){
    $qry = $conn->query("SELECT * FROM schedule_list WHERE id = ".$_GET['id'])->fetch_array();
    foreach($qry as $k => $val){
        $meta[$k] =  $val;
    }
    // Fetch bus details
    $bus = $conn->query("SELECT * FROM bus WHERE id = ".$meta['bus_id'])->fetch_array();
    // Fetch from and to locations
    $from_location = $conn->query("SELECT id, CONCAT(terminal_name, ', ', city, ', ', state) as location FROM location WHERE id = ".$meta['from_location'])->fetch_array();
    $to_location = $conn->query("SELECT id, CONCAT(terminal_name, ', ', city, ', ', state) as location FROM location WHERE id = ".$meta['to_location'])->fetch_array();
    // Fetch booked seat count
    $count = $conn->query("SELECT SUM(qty) as sum FROM booked WHERE schedule_id = ".$meta['id'])->fetch_array()['sum'];
}

// Fetch booking details if user is logged in and booking ID is provided
if(isset($_SESSION['login_id']) && isset($_GET['bid'])){
    $booked = $conn->query("SELECT * FROM booked WHERE id = ".$_GET['bid'])->fetch_array();
    foreach($booked as $k => $val){
        $bmeta[$k] =  $val;
    }
}
?>

<div class="container-fluid">
    <form id="manage_book">
        <div class="col-md-12">
            <!-- Display bus and trip details -->
            <p><b>Bus:</b> <?php echo $bus['bus_number'] . ' | '.$bus['name'] ?></p>
            <p><b>From:</b> <?php echo $from_location['location'] ?></p>
            <p><b>To:</b> <?php echo $to_location['location'] ?></p>
            <p><b>Departure Time:</b> <?php echo date('M d,Y h:i A', strtotime($meta['departure_time'])) ?></p>
            <p><b>Estimated Time of Arrival:</b> <?php echo date('M d,Y h:i A', strtotime($meta['eta'])) ?></p>
            
            <?php if(($count < $meta['availability']) || isset($_SESSION['login_id'])): ?>
            <!-- If seats are available or user is logged in, display booking form -->
            <input type="hidden" class="form-control" id="sid" name="sid" value='<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>' required="">
            <input type="hidden" class="form-control" id="bid" name="bid" value='<?php echo isset($_GET['bid']) ? $_GET['bid'] : '' ?>' required="">
            
            <div class="form-group mb-2">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($bmeta['name']) ? $bmeta['name'] : '' ?>">
            </div>
            <div class="form-group mb-2">
                <label for="qty" class="control-label">Quantity</label>
                <input type="number" maxlength="4" class="form-control text-right" id="qty" name="qty" value="<?php echo isset($bmeta['qty']) ? $bmeta['qty'] : '' ?>">
            </div>
            <?php if(isset($_SESSION['login_id'])): ?>
            <div class="form-group mb-2">
                <label for="status" class="control-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" <?php echo isset($bmeta['status']) && $bmeta['status'] == 1 ? "selected" : '' ?>>Paid</option>
                    <option value="0" <?php echo isset($bmeta['status']) && $bmeta['status'] == 0 ? "selected" : '' ?>>Unpaid</option>
                </select>
            </div>
            <?php endif; ?>
            <?php else: ?>
            <!-- If no seats are available, display a message -->
            <h3>Sorry, No Available Seat</h3>
            <style>
                .uni_modal .modal-footer {
                    display: none;
                }
            </style>
            <?php endif; ?>
        </div>
    </form>
</div>

<script>
    // Handle form submission
    $('#manage_book').submit(function(e) {
        e.preventDefault();
        start_load();
        $.ajax({
            url: './book_now.php',
            method: 'POST',
            data: $(this).serialize(),
            error: function(err) {
                console.log(err);
                end_load();
                alert_toast('An error occurred', 'danger');
            },
            success: function(resp) {
                resp = JSON.parse(resp);
                if (resp.status == 1) {
                    end_load();
                    $('.modal').modal('hide');
                    alert_toast('Data successfully saved', 'success');
                    if ('<?php echo !isset($_SESSION['login_id']) ?>' == 1) {
                        $('#book_modal .modal-body').html(
                            `<div class="text-center">
                                <p>Your seat reservation has been made. Thank You.<br>
                                <strong><h3>${resp.ref}</h3></strong></p>
                                <small>Reference Number</small><br/>
                                <small>Copy or Capture your Reference number</small>
                                <br/><br/>
								<!-- Link to the ticket -->
								<a href="fetch_ticket.php?ticket_id=1">View Ticket</a>
                            </div>`
                        );
                        $('#book_modal').modal('show');
                    } else {
                        load_booked();
                    }
                }
            }
        });
    });

    // Initialize datetime picker
    $('.datetimepicker').datetimepicker({
        format: 'Y/m/d H:i',
        startDate: '+3d'
    });
</script>
