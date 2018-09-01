<?php

include('../partials/header.php');

?>

  <?php
  
  include('../partials/navbar.php');
  
  ?>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h4 class="text-center" style="padding-top: 100px;">Comments and Suggestion</h4>
        <form action="../forms/suggesting.php" method="POST" class="col-5" style="display: block; margin: 0 auto; padding-bottom: 100px;">
          <div class="form-group">
            <label for="">Full Name</label>
            <input type="text" class="form-control" id="" name="fullName">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" name="emailAddress">
          </div>
          
          <div class="form-group">
            <p>Rating</p>
            <fieldset class="rating" style="display: block; margin: 0 auto; padding: 0; float: left;">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
            </fieldset>
          </div>
          <br>
          <br>
          <div class="form-group">
            <label for="">Comment</label>
            <textarea class="form-control" id="" rows="3" name="comment"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="display: block; float: right;">Submit</button>

          
        </form>

      </div>
    </div>
  </div>

  <?php

  include('../partials/company-details.php');

  ?>

<?php

include('../partials/scripts.php');
include('../partials/footer.php');

?>