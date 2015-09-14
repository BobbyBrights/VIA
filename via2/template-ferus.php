<?php

/*
 * Template name: Ferus
 */


global $avia_config;

  /*
   * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
   */
   get_header();


   if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
   ?>

    <div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

      <div class='container' id="ferus">

        <main class='template-page content  <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>

                            <div class="two_col">
                              <p>In May 2014, from the 13th through the 18th, VIA launched our inaugural FERUS FESTIVAL, which we have designated as our incubation time for new projects in a workshop perfor- mance setting. Each evening features an artist or many artists with whom we are honored to have had the chance to work with.</p>
                              <p>We are thrilled to have had Q2 Music as our Digital Partner. FERUS Festival was recorded for on-demand listening by our Digital Partner, Q2 Music, WQXR’s online radio station for con- temporary classical music at q2music.org. For the full list of performances on-demand, visit their page featuring our festival.</p>
                            </div>

                            <div class="one_col">
                                <?php dynamic_sidebar('homepage'); ?>
                            </div>

                            <div class="four_col">
                              <h1>2014</h1>
                              <h3>MAY</h3>
                              <ul>
                                <li>
                                  <span>13</span>
                                  <span>Tue</span>
                                  <span>8&10pm</span>
                                  <span>Jeff Zeigler, Vijay Iyer, Scott Colley, Satoshi Takeishi</span></li>
                                <li>
                                  <span>14</span>
                                  <span>Wed</span>
                                  <span>8&10pm</span>
                                  <span>Gity Razaz, Deborah Lifton, Mikhail Smigelski, Steve Beck, Vasko Dukovski, Serafim Smigelskiy</span></li>
                                <li>
                                  <span>16</span>
                                  <span>Fri</span>
                                  <span>8&10pm</span>
                                  <span>Jeff Zeigler, Vijay Iyer, Scott Colley, Satoshi Takeishi</span></li>
                              </ul>
                              <p>The Stone NYC, E 2nd St & Ave C New York, NY</p>
                              <p>Jeffrey Zeigler bringing together the wonderful musicians, Vijay Iyer, Scott Colley, and Satoshi Takeishi in a small debut at Ferus festival. This will be the first time that these musicians have ever shared the stage together in what will most assuredly be a gripping performance that will be an exploration of fresh possibilities and new sounds.</p>
                            </div>

                            <div class="four_col">
                              <a href="">2014</a>
                              <a href="">2015</a>
                            </div>



                    <?php
                    /* Run the loop to output the posts.
                    * If you want to overload this in a child theme then include a file
                    * called loop-page.php and that will be used instead.
                    */

                    $avia_config['size'] = avia_layout_class( 'main' , false) == 'entry_without_sidebar' ? '' : 'entry_with_sidebar';
                    get_template_part( 'includes/loop', 'page' );
                    ?>

        <!--end content-->
        </main>

      </div><!--end container-->

    </div><!-- close default .container_wrap element -->

<?php get_footer(); ?>