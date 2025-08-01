<?php include 'header.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] == '') {
    redir('login.php');
} ?>

<!-- Body main wrapper start -->
<main>
    <!-- $sql12 = "SELECT * FROM event_location where event_id= " . $_GET['event_id'] . " order by sl_id desc "; -->
    <?php $sql12 = "SELECT * FROM event_location where event_id= " . 1 . " order by sl_id desc ";
    $res = mysqli_query($conn, $sql12);
    $row = mysqli_fetch_array($res);
    ?>
    <?php $sql12 = "SELECT * FROM events where sl_id= " . 1;
    $res = mysqli_query($conn, $sql12);
    $row = mysqli_fetch_array($res);
    ?>

    <!-- event details area start -->
    <section class="bd-event-details-area section-space">
        <?php $sql12 = "SELECT * FROM event_location where event_id= " . $_GET['event_id'] . " order by sl_id desc ";
        $res = mysqli_query($conn, $sql12);
        $row = mysqli_fetch_array($res);
        ?>
        <div class="container">
            <div class="row gy-30">
                <div class="col-xl-12">
                    <div class="bd-event-main-thumb">
                        <img src="<?php echo 'uploads/event_location/' . $row['image']; ?>" alt="image">
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
                    <div class="bd-even-details-content">
                        <div class="bd-even-details-heading mb-30">
                            <h2 class="bd-course-details-title">Masterclass: Building a Successful Career in Education
                            </h2>
                        </div>
                        <div class="bd-event-details-content mb-30">
                            <h3 class="bd-details-content-title">Overview</h3>
                            <p class="description"><?php echo $row['description']; ?></p>
                        </div>
                        <div class="bd-event-details-content">
                            <h3 class="bd-details-content-title">Location</h3>
                            <div class="bd-event-details-location">
                                <div class="address"><span class="icon"><i
                                            class="fa-regular fa-location-dot"></i></span> <a
                                        href="#"><?php echo $row['location']; ?></a></div>
                                <div class="address"><span class="icon"><i class="fa-regular fa-phone"></i></span> <a
                                        href="tel:<?php echo $row['contact_no']; ?>"><?php echo $row['contact_no']; ?></a>
                                </div>
                            </div>
                            <div class="bd-event-map">
                                <?php echo $row['addressiframe']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
                    <div class="bd-event-sidebar-wrapper bd-event-sidebar-top sidebar-sticky">
                        <div class="bd-event-sidebar mb-30">
                            <div class="bd-event-info-list">
                                <ul>
                                    <li>
                                        <div class="label">
                                            <i class="fa-solid fa-calendar-days"></i>Date
                                        </div>
                                        <span class="value"><?php echo $row['date']; ?></span>
                                    </li>
                                    <li>
                                        <div class="label">
                                            <i class="fa-solid fa-clock"></i> Schedule
                                        </div>
                                        <span class="value"><?php echo $row['time']; ?></span>
                                    </li>
                                    <li>
                                        <div class="label">
                                            <i class="fa-solid fa-map-marker-alt"></i> Location
                                        </div>
                                        <span class="value"><?php echo $row['location']; ?></span>
                                    </li>
                                    <li>
                                        <div class="label">
                                            <i class="fa-solid fa-list"></i> Category
                                        </div>
                                        <span class="value"><?php echo $row['category']; ?></span>
                                    </li>
                                    <li>
                                        <div class="label">
                                            <i class="fa-solid fa-globe"></i> Language
                                        </div>
                                        <span class="value"><?php echo $row['language']; ?></span>
                                    </li>
                                    <li>
                                        <div class="label">
                                            <i class="fa-solid fa-bookmark"></i>Estimated Seats
                                        </div>
                                        <span class="value"><?php echo $row['total_seat']; ?> Seats</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bd-event-sidebar mb-30">
                            <div class="d-flex-between mb-20">
                                <h6>Vip Tickets ₹<?php echo $row['price1']; ?></h6>
                                <div class="bd-event-ticket">
                                    <span class="decrease">
                                        <i class="fa-regular fa-minus"></i>
                                    </span>
                                    <input class="bd-event-ticket-input" type="text" value="1">
                                    <span class="increase">
                                        <i class="fa-regular fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex-between mb-20">
                                <h6>Diamond Tickets ₹<?php echo $row['price2']; ?></h6>
                                <div class="bd-event-ticket">
                                    <span class="decrease">
                                        <i class="fa-regular fa-minus"></i>
                                    </span>
                                    <input class="bd-event-ticket-input" type="text" value="1">
                                    <span class="increase">
                                        <i class="fa-regular fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex-between mb-20">
                                <h6>Gold Tickets ₹<?php echo $row['price3']; ?></h6>
                                <div class="bd-event-ticket">
                                    <span class="decrease">
                                        <i class="fa-regular fa-minus"></i>
                                    </span>
                                    <input class="bd-event-ticket-input" type="text" value="1">
                                    <span class="increase">
                                        <i class="fa-regular fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex-between mb-20">
                                <h6>Silver Tickets ₹<?php echo $row['price4']; ?></h6>
                                <div class="bd-event-ticket">
                                    <span class="decrease">
                                        <i class="fa-regular fa-minus"></i>
                                    </span>
                                    <input class="bd-event-ticket-input" type="text" value="1">
                                    <span class="increase">
                                        <i class="fa-regular fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex-between mb-20">
                                <h6>Balcony Tickets ₹<?php echo $row['price5']; ?></h6>
                                <div class="bd-event-ticket">
                                    <span class="decrease">
                                        <i class="fa-regular fa-minus"></i>
                                    </span>
                                    <input class="bd-event-ticket-input" type="text" value="1">
                                    <span class="increase">
                                        <i class="fa-regular fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="bd-sidebar-booking">
                                <form class="bd-sidebar-booking-form" action="#" method="get">
                                    <div class="booking-btn">
                                        <button class="bd-btn btn-outline-border-primary w-100" type="submit">Reserve
                                            Your Spot
                                            Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- event details area end -->

    <!-- event speaker area start -->
    <section class="bd-event-speaker-area section-space-bottom">
        <div class="container">
            <?php
            $sql12 = "SELECT * FROM artists where event_id= " . $_GET['event_id'];
            $res = mysqli_query($conn, $sql12);
            $row = mysqli_fetch_array($res);
            ?>
            <div class="row">
                <div class="col-xl-6">
                    <div class="bd-section-wrapper section-title-space">
                        <h2 class="bd-section-title">Event Speakers</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-30">
                <?php if (!empty($row['artist1_name']) && !empty($row['artist1_img'])): ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="bd-instructor-wrapper style-two">
                            <div class="bd-instructor-item">
                                <div class="bd-instructor-thumb-wrap">
                                    <div class="bd-instructor-thumb">
                                        <a href="instructor-details.html"><img
                                                src="<?php echo 'uploads/events/artist_img/' . $row['artist1_img']; ?>"
                                                alt="image"></a>
                                    </div>
                                </div>
                                <div class="bd-instructor-info">
                                    <h6 class="name underline"><a href="#"><?php echo $row['artist1_name']; ?></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($row['artist2_name']) && !empty($row['artist2_img'])): ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="bd-instructor-wrapper style-two">
                            <div class="bd-instructor-item">
                                <div class="bd-instructor-thumb-wrap">
                                    <div class="bd-instructor-thumb">
                                        <a href="instructor-details.html"><img
                                                src="<?php echo 'uploads/events/artist_img/' . $row['artist2_img']; ?>"
                                                alt="image"></a>
                                    </div>
                                </div>
                                <div class="bd-instructor-info">
                                    <h6 class="name underline"><a href="#"><?php echo $row['artist2_name']; ?></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($row['artist3_name']) && !empty($row['artist3_img'])): ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="bd-instructor-wrapper style-two">
                            <div class="bd-instructor-item">
                                <div class="bd-instructor-thumb-wrap">
                                    <div class="bd-instructor-thumb">
                                        <a href="instructor-details.html"><img
                                                src="<?php echo 'uploads/events/artist_img/' . $row['artist3_img']; ?>"
                                                alt="image"></a>
                                    </div>
                                </div>
                                <div class="bd-instructor-info">
                                    <h6 class="name underline"><a href="#"><?php echo $row['artist3_name']; ?></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($row['artist4_name']) && !empty($row['artist4_img'])): ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="bd-instructor-wrapper style-two">
                            <div class="bd-instructor-item">
                                <div class="bd-instructor-thumb-wrap">
                                    <div class="bd-instructor-thumb">
                                        <a href="instructor-details.html"><img
                                                src="<?php echo 'uploads/events/artist_img/' . $row['artist4_img']; ?>"
                                                alt="image"></a>
                                    </div>
                                </div>
                                <div class="bd-instructor-info">
                                    <h6 class="name underline"><a href="#"><?php echo $row['artist4_name']; ?></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- event speaker area end -->

    <!-- upcoming event area start -->
    <section class="bd-upcoming-event-area section-space-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="bd-section-title-wrapper section-title-space text-center">
                        <h2 class="bd-section-title">Upcoming Event</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-30">
                <?php
                $currentDate = date('Y-m-d');
                $sql12 = "SELECT * FROM events 
              WHERE start_date >= '$currentDate' 
              ORDER BY start_date ASC 
              LIMIT 3";
                $res = mysqli_query($conn, $sql12);

                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_array($res)) {
                        ?>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <article class="bd-event-wrapper style-one">
                                <div class="bd-event-item">
                                    <div class="bd-event-thumb">
                                        <a href="event-details.php?event_id=<?php echo $row['sl_id']; ?></a>">
                                            <img src="<?php echo 'uploads/events/' . $row['image']; ?>" alt="image">
                                        </a>
                                        <div class="bd-event-badge">
                                            <span class="bd-circle-badge primary">
                                                <?php echo date('d', strtotime($row['start_date'])); ?>
                                                <span
                                                    class="subtitle"><?php echo date('M', strtotime($row['start_date'])); ?></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="bd-event-content">
                                        <h5 class="bd-event-title underline mb-15">
                                            <a href="event-details.php?event_id=<?php echo $row['sl_id']; ?>"><?php echo $row['title']; ?></a>
                                        </h5>
                                        <p class="bd-event-description"><?php echo $row['description']; ?></p>
                                        <div class="bd-event-divider"></div>
                                        <div class="bd-event-meta d-flex-between">
                                            <div class="bd-event-meta-list">
                                                <span><i
                                                        class="fa-regular fa-location-dot"></i><?php echo $row['mode']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php
                    }
                } else {
                    echo '<div class="col-12"><p>No upcoming events found.</p></div>';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- upcoming event area end -->

</main>
<!-- Body main wrapper end -->

<!-- footer area start -->
<?php include 'footer.php'; ?>