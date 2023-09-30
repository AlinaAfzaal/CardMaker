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
                <li>Cards</li>
            </ol>
            <h2>Our Cards</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Portfolio Section ======= -->
    <section id="product" class="product">
        <div class="container " data-aos="fade-up">

            <div class="section-title">
                <h2>Cards</h2>
                <p>Lets Create a card for any occasion. Start with one of our professionally designed templates then edit the text, add your own photos, and change the color scheme for a personal touch. Celebrate Life with CardMaker</p>
            </div>


        
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <li class="nav-link scrollto dropdown "><input style="color:black; padding:6px;" type="text" id="searchInput" placeholder="Search Card">
                        <ul id="addSearches"style="list-style:none;">
                        </ul>
                    </li>
                </div>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="product-flters">
                        <li data-filter="*" class="filter-active" onclick="subCategory('all')">All</li>
                        <li data-filter=".filter-greeting" onclick="subCategory('greeting')">Greeting</li>
                        <li data-filter=".filter-invitation" onclick="subCategory('invitation')">Invitation</li>
                        <li data-filter=".filter-professional" onclick="subCategory('professional')">Visting</li>
                    </ul>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="100" id="greetingCategories">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="product-flters">
                        <!-- <li data-filter=".filter-greeting" class="filter-active">All</li> -->
                        <li data-filter=".filter-birthday">Birthday</li>
                        <li data-filter=".filter-marriage">Marriage</li>
                        <li data-filter=".filter-graguation">Graguation</li>
                        <li data-filter=".filter-thankyou">Thankyou</li>
                        <li data-filter=".filter-friendshipday">FriendshipDay</li>
                    </ul>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="100" id="invitationCategories">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="product-flters">
                        <!-- <li data-filter=".filter-invitation" class="filter-active">All</li> -->
                        <li data-filter=".filter-bparty">Birthday Party</li>
                        <li data-filter=".filter-matrimonial">Matrimonial</li>
                        <li data-filter=".filter-specialguest">Party</li>
                    </ul>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="100" id="visitingCategories">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="product-flters">
                        <!-- <li data-filter=".filter-visiting" class="filter-active">All</li> -->
                        <li data-filter=".filter-education">Education</li>
                        <li data-filter=".filter-visiting">Visiting</li>
                    </ul>
                </div>
            </div>

            <div class="row product-container" data-aos="fade-up" data-aos-delay="200">
                <?php 
                $cards= $database->getReference('customCards/')->getValue(); 
                if($cards!=null)
                {

                
                foreach ($cards as $key => $row) { 
                    $isCardFav=false;
                    if(isset($_SESSION["email"])){
                        $favcards= $database->getReference('favCards/')->getValue(); 
                        if($favcards!=null)
                        {      
                            foreach ($favcards as $k => $r) {  
                            if(($r['user']==$_SESSION['email']) && ($r['cardid']==$key)) {
                                $isCardFav = true; 
                            }         
                            }
                        }
                    }
                        
                ?>
                <div class="col-lg-4 col-md-6 product-item filter-<?php echo $row['category'];?> filter-<?php echo $row['subCategory'];?>">
                    <div class="product-wrap">
                        <img src="/CardMaker/preparedCards/<?php echo $row['Images'][0];?>" class="img-fluid" alt="CardImage" style="width: 350px; height: 300px; ">
                        <div class="product-info">
                            <h4><?php echo $row['category'];?> Card</h4>
                            <p><?php echo $row['subCategory'];?> Card</p>
                            <div class="product-links">
                                <a href="cardDetail.php?id=<?php echo $key;?>" title="Detials"><i class="fa-solid fa-circle-info"></i></a>
                                <a href="#!"  class="favBtn" title="Add to Favourite"><i <?php if($isCardFav) echo 'style="color:red;"'; ?>class="fa fa-heart favHeart" data-id="<?php echo $key; ?>"data-type="custom" ></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }} ?>

            </div>

        </div>
    </section><!-- End Portfolio Section -->

</main><!-- End #main -->

<?php
include_once('../layout/footer.php');
?>
<script>
    $(document).ready(function() {

        $('#visitingCategories').hide();
        $('#greetingCategories').hide();
        $('#invitationCategories').hide();
    });

    function subCategory(c) {
        switch (c) {
            case 'all': {
                $('#visitingCategories').hide();
                $('#greetingCategories').hide();
                $('#invitationCategories').hide();
                break;
            }
            case 'greeting': {

                $('#visitingCategories').hide();
                $('#invitationCategories').hide();
                $('#greetingCategories').show();
                break;
            }
            case 'invitation': {

                $('#visitingCategories').hide();
                $('#greetingCategories').hide();
                $('#invitationCategories').show();
                break;

            }
            case 'professional': {

                $('#greetingCategories').hide();
                $('#invitationCategories').hide();
                $('#visitingCategories').show();
                break;
            }
        }
    }
</script>

<script>
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup',function(){
    const value = searchInput.value.trim().toLowerCase();
    console.log("Called"+value);
    var xhr = new XMLHttpRequest();
      xhr.open("GET", "/CardMaker/search.php?card=" + value, true);
      xhr.send();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("success");
            console.log(this.resposeText);
          document.getElementById('addSearches').innerHTML = this.responseText;
        }
      }
});

    






    // function search(value) {
    //   var xhr = new XMLHttpRequest();
    //   xhr.open("GET", "/CardMaker/search.php?card=" + value, true);
    //   xhr.send();
    //   xhr.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //       document.getElementById('addSearches').innerHTML = this.responseText;
    //     }
    //   }

    // }
  </script>