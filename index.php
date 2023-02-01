<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/travel_agency_style.css">
    <title>Trip Search</title>
</head>
<body>
    <div class="header"></div>
    <div class="search_container">
        <div class="search_filters"></div>
        <div class="search_results">
            <?php
                require("scripts/trip_service.php");
                $TService = new TripService();
                $trips = $TService->getTripData("SELECT * FROM trips");
                foreach ($trips as $trip) {
                    echo    "<div class='trip'>
                                <div class='trip_image'>" . $trip->getImage() . "</div>
                                <div class='trip_info'>
                                    <div>" . $trip->getName() . "</div>
                                    <div>" . $trip->getStartLocation() . "</div>
                                    <div>" . $trip->getDestination() . "</div>
                                    <div>" . $trip->getStartDate() . "</div>
                                    <div>" . $trip->getEndDate() . "</div>
                                </div>
                                <div class='trip_button'><button type='button'>" . $trip->getPrice() . "</button></div>
                            </div>";
                }
            ?>
        </div>
    </div>
</body>
</html>