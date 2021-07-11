<?php
get_header();

$intended = parse_url( $_SERVER['REQUEST_URI'] );
$trySearchTerm = trim(
  str_replace( '-', ' ',
    str_replace( '/',  ' ', $intended['path'] ) ) ); ?>

  <div id="content">

    <div id="inner-content" class="wrap cf">

      <main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

        <article id="post-not-found" class="container hentry cf">

          <header class="row article-header">
            <div class="col-12 text-center">
              <h1><?php _e( '404 Error', 'coyotetheme' ); ?></h1>
            </div>
          </header>

          <section class="row entry-content">
            <div class="col-12 text-center">
              <p><?php _e( 'The page you were looking for was not found, but maybe try looking again!', 'coyotetheme' ); ?></p>
              <div class="btn-wrap text-center mt-5 mb-3">
                <a href="<?php echo home_url(); ?>" class="btn hover-btn dark">
                  <?php _e( 'Back Home', 'coyotetheme' ); ?>
                </a>
              </div>
              <div class="btn-wrap text-center">
                <a href="<?php echo home_url() . '/?s=' . urlencode( $trySearchTerm ); ?>" class="btn hover-btn dark">
                  <?php _e( 'Search', 'coyotetheme' ); ?>
                </a>
              </div>
            </div>
          </section>

        </article>

      </main>

    </div>

  </div>

<?php get_footer(); ?>