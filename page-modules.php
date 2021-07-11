<?php
if ( have_rows( 'page_modules' ) ):
  while ( have_rows( 'page_modules' ) ): the_row();
    
    switch ( get_row_layout() ):
      
      case 'utility':
        get_template_part( 'modules/page', 'utility' );
        break;
      
      case 'getting_started':
        get_template_part( 'modules/page', 'getting_started' );
        break;
      
      case 'upcoming_events':
        get_template_part( 'modules/page', 'upcoming_events' );
        break;
      
      case 'quote_slider':
        get_template_part( 'modules/page', 'quote_slider' );
        break;
      
      case 'tiled_highlights':
        get_template_part( 'modules/page', 'tiled_highlights' );
        break;
      
      case 'naccas_now':
        get_template_part( 'modules/page', 'naccas_now' );
        break;
      
      case 'email_capture':
        get_template_part( 'modules/page', 'email_capture' );
        break;
      
      case 'staff_directory':
        get_template_part( 'modules/page', 'staff_directory' );
        break;
      
      case 'contact_us':
        get_template_part( 'modules/page', 'contact_us' );
        break;
      
      case 'documents':
        get_template_part( 'modules/page', 'documents' );
        break;
      
      case 'accordion':
        get_template_part( 'modules/page', 'accordion' );
        break;
      
      case 'events_calendar':
        get_template_part( 'modules/page', 'events_calendar' );
        break;
      
      case 'school_directory':
        get_template_part( 'modules/page', 'school_directory' );
        break;
    
    endswitch;
  
  endwhile;
endif;