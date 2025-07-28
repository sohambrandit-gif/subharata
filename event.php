<?php include 'header.php'; ?>

<!-- Body main wrapper start -->
<main>

    <!-- breadcrumb area start -->
    <section class="bd-breadcrumb-area p-relative fix z-index-11">
        <div class="bd-breadcrumb-bg-two" data-background="assets/images/breadcrumb/breadcrumb-bg-2.webp"></div>
        <div class="bd-breadcrumb-wrapper p-relative">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bd-breadcrumb style-two d-flex-center">
                            <div class="bd-breadcrumb-content">
                                <h1 class="bd-breadcrumb-title text-center">Event</h1>
                                <div class="bd-breadcrumb-list">
                                    <span><a href="index.html">iStudy</a></span>
                                    <span class="divider"><i class="fa-regular fa-angle-right"></i></span>
                                    <span class="active">Event</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bd-breadcrumb-shape">
                    <div class="shape-1"><img src="assets/images/shape/breadcrumb-shape-1.webp" alt="shape"></div>
                    <div class="shape-3"><img src="assets/images/shape/bulb-shape.webp" alt="shape"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- event grid area start -->
    <div class="bd-event-grid-area section-space">
        <div class="container">
            <div class="row gy-30">
                <?php
                $currentDate = date('Y-m-d'); // Gets current date in 'YYYY-MM-DD' format
                $sql12 = "SELECT * FROM events WHERE start_date >= '$currentDate' ORDER BY start_date ASC";
                $res = mysqli_query($conn, $sql12);
                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <article class="bd-event-wrapper style-one">
                            <div class="bd-event-item">
                                <div class="bd-event-thumb">
                                    <a href="event-details.php?event_id=<?php echo $row['sl_id']; ?>">
                                        <img src="<?php echo 'uploads/events/' . $row['image']; ?>" alt="image">
                                    </a>
                                    <div class="bd-event-badge">
                                        <span
                                            class="bd-circle-badge primary"><?php echo date('d', strtotime($row['start_date'])); ?>
                                            <span
                                                class="subtitle"><?php echo date('M', strtotime($row['start_date'])); ?></span></span>
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
                                        <!-- <div class="bd-event-meta-list">
                                            <span><i class="fa-regular fa-clock"></i>9:00am - 5:00pm</span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- event grid area end -->

</main>
<!-- Body main wrapper end -->
<?php include 'footer.php'; ?>