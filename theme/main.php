<?php
@include_once('../layout/header.php');
?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-xl-6">
        <h1>Celebrate Life with CardMaker</h1>
        <h2>Easily Customize Cards for your Events.....<br>Download | Send | Place Order</h2>
        <a href="/CardMaker/theme/cards.php" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">


  <!-- ======= About Section ======= -->
  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">
        <div class="content col-xl-5 d-flex align-items-stretch">
          <div class="content">
            <h3>About CardMaker</h3>
            <p>
              CardMaker is a website that has all the tools necessary to create a greeting card for any occasion. Start with one of our professionally designed templates then edit the text, add your own photos, and change the color scheme for a personal touch.
            </p>
            <p id="opinionmsg"></p>

          </div>
        </div>
        <div class="col-xl-7 d-flex align-items-stretch">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>Keep it Simple
                </h4>
                <p>
                  We take our users hand in hand and walk them through their journey on our website, providing them with the easiest and fastest ways to create the perfect card or invitation. We also understand how important personal touch is;
                  that is why we offer our users some features that allow them to customize and create beautiful cards.
                </p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>We are Good at Sharing
                </h4>
                <p>
                  Creating beautiful cards or invitations is just the first step...Sending or Giving them is another.
                  That’s why we offer our users 3 simple options:<br>
                  Download | Place Order | Send Online<br>
                  All you need to do is decide how you want to spread the love!</p>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End About Section -->


  
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <ul class="faq-list accordion" data-aos="fade-up">
        <?php
        include_once('C:\xampp\htdocs\CardMaker\includes\dbconfig.php');
          $faqs = $database->getReference('faqs/')->getValue(); 
            if($faqs!=null)
            {                           
             foreach ($faqs as $key => $row) {  
        ?>

          <li>
            <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq<?php echo $key;?>"> <?php echo $row['question']; ?>? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq<?php echo $key;?>" class="collapse" data-bs-parent=".faq-list">
              <p><?php echo $row['answer']; ?> </p>
            </div>
          </li>
          <?php }} ?>

        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?php  echo count($database->getReference('users/')->getSnapshot()->getValue());?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Users</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?php  echo count($database->getReference('customCards/')->getSnapshot()->getValue()) + count($database->getReference('premiumCards/')->getSnapshot()->getValue()) ;?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>No of Cards</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-printer"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo count($database->getReference('printingPersons/')->getSnapshot()->getValue()); ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Printing Persons</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->


</main>
<!-- End #main -->

<?php
@include_once('../layout/footer.php');
?>