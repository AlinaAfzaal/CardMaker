<?php 
include_once('header.php');  
?>
<style>  
  .editor {
  width: 450px;
  height: 600px;
  display: flex;
  flex-direction: row;
  margin: auto;
  overflow: hidden;
}
/* .image-container {
  position: absolute;
  width: 450px;
  height: 600px;
  overflow:hidden;
} */
.image-container img
{
  width: 100%;
  height: 100%;
}

 
#myImage
{
  object-fit: cover;
}
#myImage:hover
{
  opacity: 0.5;
  cursor: pointer;
}

</style>
    <!-- Card Container -->
    <div class="editor mt-1 mb-1" id="editor" >
      <div class="image-container" style="position:absolute; width:450px; height:600px; overflow:hidden;">
        <img class="cardImage"src="/CardMaker/CardImages/card.png" alt="Example Image" />
        <div class="text-overlay " style="top: 200px; left: 150px;">
          <div class="text draggable "  style=" top: 200px; left: 150px; font-size:24px; font-weight: normal; font-family: Arial; text-align: center; color: #f56656; text-transform:normal; font-style:normal; transform: rotate(0deg); " contenteditable>Happy Birthday</div>
        </div>
        <div class="text-overlay " style="top: 250px; left: 120px; " >
          <div class="text draggable" contenteditable style=" top: 250px; left: 120px; font-size:19px; font-weight: normal; font-family: Verdana; text-align: left; color: #ddd656; text-transform:normal;font-style:italic; transform: rotate(0deg);">“The day is all yours</br>have fun!”
          </div>
        </div>
        <img src="../CardImages/hands.jpg" title="Change Image" id="myImage" class="overlaidImage card-img-overlay draggable" style="width:200px; height:200px; border-radius:50%; top: 320px; left:120px;"/>
      </div>

    </div>
    <!-- Card Container End -->

</main><!-- End #main -->
<?php 
include_once('footer.php');  
?>