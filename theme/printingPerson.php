<?php
include_once('../layout/header.php');
include_once('../includes/dbconfig.php');
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/CardMaker/index.php">Home</a></li>
                <li>Printing Persons</li>
            </ol>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Printing Person</h2>
                <p>There are no of printing person available in our website. You can order any of them. No of completed orders shown indicates the experience level of the person that will help you to choose best. Click on the profile on see details.</p>
            </div>

            <div class="row">

            <?php 
                $printingPersons = $database->getReference('printingPersons/')->getValue(); 
                    if($printingPersons!=null)
                    {                          
                       foreach ($printingPersons as $key => $row) {                                  
             ?>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">

                        <div class="member-img">
                            <a href="detailPrinting.php?printingPersonId=<?php echo $key; ?>" title="See Details"><img src="<?php  echo $row['photoUrl']; ?>" class="img-fluid" alt="" style="width:255px; height: 290px; "> </a>
                        </div>

                        <div class="member-info bg-light">
                            <h4><?php  echo $row['fname']; ?></h4>
                            <span><?php  echo $row['shortIntro']; ?></span>
                        </div>
                    </div>
                </div>
                <?php }} ?>


            </div>

        </div>
    </section><!-- End Team Section -->



</main>
<!-- End #main -->

<?php
@include_once('../layout/footer.php');
?>