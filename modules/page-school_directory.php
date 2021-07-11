<?php
	$scroll_link = get_sub_field('scroll-to_label');
	$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
	$scroll_link = strtolower($scroll_link);
?>

<section id="<?php echo $scroll_link;?>" class="school-directory dark">
  <div class="container">
    <div class="row">

      <div class="col-12 text-center">
        <h2><?php the_sub_field('heading');?></h2>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="row justify-content-center align-items-start">
          <div class="col-12">
            <iframe name="Accredited School Search" src="https://websearch.naccas.org" width="100%" height="600" frameborder="0"></iframe>
          </div>
        </div>
      </div>
    </div>
      
      <!--
      <form method="post" enctype="multipart/form-data" target="" id="school-search" class="col col-12" action="">
      
        <div class="row">
          <div id="school_name" class="col col-12 col-md-6">
            <label class="sr-only" for="school_name">School Name</label>
            <input name="input_1" id="input_2_1" type="text" value="" class="medium" placeholder="School Name" aria-invalid="false">
          </div>
          
          <div id="city" class="col col-12 col-md-6">
            <label class="sr-only" for="city">City</label>
            <input name="input_4" id="input_2_4" type="text" value="" class="medium" placeholder="City" aria-invalid="false">
          </div>
          
          <div id="state" class="col col-12 col-md-6">
            <label class="sr-only" for="state">State</label>
            <input name="input_3" id="input_2_3" type="text" value="" class="medium" placeholder="State" aria-invalid="false">
          </div>
          
          <div id="course_category" class="col col-12 col-md-6">
            <label class="sr-only" for="course_category">Select Course Category</label>
            <select name="input_5" id="input_2_5" class="medium gfield_select" aria-invalid="false">
              <option value="Category 1">Category 1</option>
              <option value="Category 2">Category 2</option>
              <option value="Category 3">Category 3</option>
            </select>
          </div>
          
        <div class="sumbit-wrap text-center col col-12">
          <input type="submit" id="submit_button" class="button" value="Search">
        </div>
        
        </div>
        
      </form>
      -->

  </div>
</section>