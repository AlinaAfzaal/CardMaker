<?php 
include_once('header.php');  
?>
<style> 
#myImage:hover
{
  opacity: 0.5;
  cursor: pointer;
}
</style>


<?php 

// if($_GET['card']!=null&&$_GET['card']=='saved')
// {
  
// }
?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false" style="margin-bottom: 65px;">
  <div class="carousel-inner">
    <!-- Card Container -->
    <?php foreach($cardContainers['cards'] as $key =>$row){ ?>
    <div class="carousel-item <?php if($key==0) {echo "active"; }?>">
    <div class="editor mt-1 mb-1" id="editor" style=" width: <?php echo $row['containerWidth']?>px;height: <?php echo $row['containerheight']?>px; display: flex; flex-direction: row; margin: auto; overflow: hidden;">
      <div class="image-container" style="position: absolute; width:  <?php echo $row['containerWidth']?>px; height:<?php echo $row['containerheight']?>px; overflow:hidden;">
        <img class="cardImage"src="<?php echo $row['cardImage']?>" alt="Example Image" style="width:100%; height:100%;" />
      <?php  for($i=0; $i<sizeof($row['textOverlays']); $i++){
         $formattedData = str_replace("\n", "<br>", $row['textOverlays'][$i]["text"]);
         ?>
         <div class="text-overlay " style="top: <?php echo $row['textOverlays'][$i]["top"]?>px; left:<?php echo $row['textOverlays'][$i]["left"]?>px;">

          <div class="text draggable "  style=" top:  <?php echo $row['textOverlays'][$i]["top"]?>px; left:  <?php echo $row['textOverlays'][$i]["left"]?>px;font-size: <?php echo $row['textOverlays'][$i]["fontSize"]?>px; font-weight:<?php echo $row['textOverlays'][$i]["bold"]?> ;  text-align: <?php echo $row['textOverlays'][$i]["alignment"]?>; color: <?php echo $row['textOverlays'][$i]["color"]?>;text-transform:<?php echo $row['textOverlays'][$i]["texttransform"]?>; font-family:<?php $family = trim($row['textOverlays'][$i]["fontfamily"], "'\""); echo $family; ?>; font-style:<?php echo $row['textOverlays'][$i]["fontstyle"]?>; transform:<?php echo $row['textOverlays'][$i]["angletransform"]?> ;" contenteditable> <?php echo $formattedData; ?></div>
        </div>
       <?php }
            if($row["overlayImageSrc"]!=null)
            {
       ?>
        <img src="<?php echo $row["overlayImageSrc"]; ?>" title="Change Image" id="myImage" class="card-img-overlay overlaidImage draggable" style="width:<?php echo $row["overlayImagewidth"];  ?>px; height:<?php echo $row["overlayImageheight"]; ?>px; border-radius:<?php echo $row["overlayImageradius"];?>; top: <?php echo $row["overlayImagetop"]; ?>px; left:<?php echo $row["overlayImageleft"];?>px; object-fit: cover;"/> 
        <?php } ?>
      </div>

    </div>
  </div>
    <?php }?>
  </div>
  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" >
    <span class="carousel-control-prev-icon" aria-hidden="true"  style="background-color:#e03a3c;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="color: red;">
    <span class="sr-only">Next</span>
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:#e03a3c;"></span>
  </a>
</div>
    <!-- Card Container End -->

</main><!-- End #main -->
<?php 
include_once('footer.php');  
?>