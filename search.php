<?php
global $wp_query;
get_header(); ?>

<div id="content" class="top-wrapper">
  <div id="inner-content" class="cf middle-wrapper gutters">
    <main id="main" class="cf bottom-wrapper index-wrap" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h1 class="page-title">
              <?php _e( 'Search Results', 'coyotetheme' ); ?>
            </h1>
            <?php /* <h2 class="h6 subtitle">Showing <span class="result-count"><?php echo $wp_query->found_posts; ?></span> result(s).</h2> */ ?>
          </div>
        </div>
        
        <div class="row">
          <div class="col col-md-2 d-none d-md-block">
            <div class="search-facet-wrap">
              <?php
              if ( function_exists( 'alm_filters' ) ):
                $filter_array = array(
                  "id" =>  "search_filters",
                  "style" =>  "change",
                  "date_created" =>  1093481223,
                  "date_modified" =>  1093001683,
                  "filters" =>  [
                    array(
                        "key" =>  "search",
                        "field_type" =>  "text",
                        "title" =>  "Revise Your Search"
                    ),
                    array(
                        "key" =>  "post_type",
                        "field_type" =>  "checkbox",
                        "values" =>  array(
                            array(
                              "label" =>  "Pages",
                              "value" =>  "page"
                            ),
                            array(
                                "label" =>  "News",
                                "value" =>  "news"
                            ),
                            array(
                                "label" =>  "NACCAS Now",
                                "value" =>  "publications"
                            ),
                            array(
                                "label" =>  "Documents",
                                "value" =>  "documents"
                            ),
                            array(
                              "label" =>  "Events",
                              "value" =>  "events"
                            ),
                        ),
                        "title" =>  "Content Type"
                    ),
                    array(
                        "key" =>  "month",
                        "field_type" =>  "select",
                        "values" =>  array(
                            array(
                                "label" =>  "Month",
                                "value" =>  ""
                            ),
                            array(
                                "label" =>  "January",
                                "value" =>  "01"
                            ),
                            array(
                                "label" =>  "February",
                                "value" =>  "02"
                            ),
                            array(
                                "label" =>  "March",
                                "value" =>  "03"
                            ),
                            array(
                                "label" =>  "April",
                                "value" =>  "04"
                            ),
                            array(
                                "label" =>  "May",
                                "value" =>  "05"
                            ),
                            array(
                                "label" =>  "June",
                                "value" =>  "06"
                            ),
                            array(
                                "label" =>  "July",
                                "value" =>  "07"
                            ),
                            array(
                                "label" =>  "August",
                                "value" =>  "08"
                            ),
                            array(
                                "label" =>  "September",
                                "value" =>  "09"
                            ),
                            array(
                                "label" =>  "October",
                                "value" =>  "10"
                            ),
                            array(
                                "label" =>  "November",
                                "value" =>  "11"
                            ),
                            array(
                                "label" =>  "December",
                                "value" =>  "12"
                            )
                        ),
                        "title" =>  "Date Parameters",
                        "classes" =>  "form-group"
                    ),
                    array(
                        "key" =>  "year",
                        "field_type" =>  "select",
                        "values" =>  [
                            array(
                                "label" =>  "Year",
                                "value" =>  ""
                            ),
                            array(
                                "label" =>  "2020",
                                "value" =>  "2020"
                            ),
                            array(
                                "label" =>  "2019",
                                "value" =>  "2019"
                            ),
                            array(
                                "label" =>  "2018",
                                "value" =>  "2018"
                            ),
                            array(
                                "label" =>  "2017",
                                "value" =>  "2017"
                            ),
                            array(
                                "label" =>  "2016",
                                "value" =>  "2016"
                            )
                        ],
                        "classes" =>  "form-group"
                    ),
                    array(
                        "key" =>  "taxonomy",
                        "field_type" =>  "checkbox",
                        "taxonomy" =>  "news_categories",
                        "taxonomy_operator" =>  "IN",
                        "checkbox_toggle_label" =>  "News Categories",
                        "title" =>  "News Categories"
                    ),
                    array(
                      "key" =>  "taxonomy",
                      "field_type" =>  "checkbox",
                      "taxonomy" =>  "document_categories",
                      "taxonomy_operator" =>  "IN",
                      "checkbox_toggle_label" =>  "Document Categories",
                      "title" =>  "Document Categories"
                    ),
                    array(
                      "key" =>  "taxonomy",
                      "field_type" =>  "checkbox",
                      "taxonomy" =>  "event_category",
                      "taxonomy_operator" =>  "IN",
                      "title" =>  "Event Categories"
                    ),
                  ]
                );
                echo alm_filters($filter_array, 'alm_search_results');
              endif; ?>
            </div>
          </div>
          
          <div class="col-12 col-md-9 offset-md-1">
            <div class="alm-wrap">
              <?php
              $searchTerm = get_search_query();
              // echo '<h1 class="mb-5">Search Results: <small>'. $searchTerm .'</small></h1>';
    
              if ( function_exists( 'alm_render' ) ):
                alm_render( [
                  'id'                   => 'alm_search_results',
                  'theme_repeater'       => 'results.php',
                  'container_type'       => 'div',
                  'post_type'            => 'post, page, events, documents, staff, publications, news',
                  'scroll'               => 'false',
                  'filters'              => 'true',
                  'button_label'         => 'View More',
                  'button_loading_label' => 'Loading...',
                  'posts_per_page'       => (string) get_option( 'posts_per_page' ) ?: 5,
                  'search'               => $searchTerm,
                  'no_results_text'      => '<h2 class="text-center">No results found.</h2>',
                ] );
              endif; ?>
            </div>
          </div>
        </div>
      </div>
      
    </main>
  </div>
</div>

<?php get_footer(); ?>