<?php
require ('inc/essentials.php');
require ('inc/db_config.php');
adminLogin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require ('inc/links.php'); ?>

    <title>Admin Panel - New Bookings</title>
</head>

<body class="bg-light">
    <?php require ('inc/header.php') ?>


    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">New Bookings</h3>


                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <!-- <div class="text-end mb-4">
                            <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="type to search for user" >
                        </div> -->

                        <div class="table-responsive">
                            <table class="table table-hover border text-center" >
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">User Details</th>
                                        <th scope="col">Room Details</th>
                                        <th scope="col">Bookings Details</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>




    <?php require ('inc/scripts.php'); ?>
    <script src="scripts/new_bookings.js" ></script>
</body>

</html>