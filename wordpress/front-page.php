<?php get_header();?>
      
  <!-- section -->
      <div class="head__section">
        <div class="head__container">
          <div class="head__logo">
            <?php 
                if( has_custom_logo() ){
                    $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
                    ?>
                    <img src="<?php echo $custom_logo__url[0]?>" alt="logo" >
                <?php
            }?>
          </div>
          <?php
            if( have_rows('first_section') ):
              while( have_rows('first_section') ) : the_row();
              ?>
              <div class="head__block">
                <h1 class="head__title"><?php the_sub_field('title')?></h1>
                <h2 class="head__subtitle">
                  <?php the_sub_field('subtitle')?>
                 
                </h2>
                <?php echo get_template_part( 'template-parts/content', 'form', ['class-form'=>'head__form']);?>
                <?
                  if( have_rows('users') ):
                    $i=0;
                    while( have_rows('users') ) : the_row();
                    $i++;
                    ?>
                    <div class="user__box user-<?php echo $i?>">
                      <?php $image = get_sub_field('image');
                          if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                      <?php endif; ?>
                      <div class="quote"><?php the_sub_field('quote')?></div>
                    </div>
                    <?php
                    endwhile;
                  endif;
                  ?>
              </div>
              <?php
              endwhile;
            endif;
            ?>

          <img src="<?php echo get_template_directory_uri() ?>/images/scroll-down.svg" alt="" class="head__scroll scroll-down">
        </div>
      </div>
      <?php echo get_template_part( 'template-parts/content', 'ticker', ['max-count'=>'10', 'ticker-value'=>'Introducing Byte Trader']);?>
              <!-- section -->
      <?php
      if( have_rows('work') ):
        while( have_rows('work') ) : the_row();
        ?>
        <div class="work__section">
          <div class="work__container">
            <div class="work__block">
              <div class="work__image">
                <div class="work__logo">
                <?php 
                  if( has_custom_logo() ){
                      $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
                      ?>
                      <img src="<?php echo $custom_logo__url[0]?>" alt="logo" >
                      <?php
                  }?>
                </div>
                <div class="work__lottie">
                  <lottie-player src="<?php echo get_template_directory_uri() ?>/files/Crypto.json" mode="normal" loop autoplay></lottie-player>
                </div>
                <div class="work__people">
                  <picture><source srcset="<?php echo get_template_directory_uri() ?>/images/work/people.webp" type="image/webp"><img src="images/work/people.png" alt=""></picture>
                </div>
                <div class="work__setting-img">
                  <img src="<?php echo get_template_directory_uri() ?>/images/work/setting.svg" alt="">
                </div>
                <div class="work__candle-img">
                  <img src="<?php echo get_template_directory_uri() ?>/images/work/candle.svg" alt="">
                </div>
              </div>
              <div class="work__text">
                <h2 class="work__title"><?php the_sub_field('title')?></h2>
                <?php the_sub_field('text')?>
              </div>
            </div>
          </div>
        </div>
        <?php
        endwhile;
      endif;
      ?>
        <!-- section -->
      <?php
      if( have_rows('funded') ):
        while( have_rows('funded') ) : the_row();
        ?>
        <div class="funded__section">
          <div class="funded__container">
            <h2 class="funded__title"><?php the_sub_field('title')?></h2>
            <h3 class="funded__subtitle"><?php the_sub_field('title')?></h3>
            <div class="funded__block">
              <?php
                if( have_rows('blocks') ):
                  while( have_rows('blocks') ) : the_row();
                  $number++; // если пост есть, увеличиваем на 1 
                  switch($number) {            
                      case '4': 
                          ?>
                          <div class="funded__box">
                            <span class="number"><?php echo $number?></span>
                            <?php
                              $image = get_sub_field('image');
                              if( !empty( $image ) ): ?>
                                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                              <?php endif; ?>
                            <h3><?php the_sub_field('box-title')?></h3>
                            <p><?php the_sub_field('box-subtitle')?></p>
                            <a href="#trigger" class="join-btn btn">Join waitlist now</a>
                          </div>
                        
                          <?php
                      break;
                      default: 
                      ?>
                        <div class="funded__box">
                          <span class="number"><?php echo $number?></span>
                          <?php
                            $image = get_sub_field('image');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                          <h3><?php the_sub_field('box-title')?></h3>
                          <p><?php the_sub_field('box-subtitle')?></p>
                        </div>
                      <?php
                      break;
                  }
                  endwhile;
                endif;
              ?>
            </div>
          </div>
        </div>
        <?php
        endwhile;
      endif;
      ?>

      <?php echo get_template_part( 'template-parts/content', 'ticker', ['max-count'=>'10', 'ticker-value'=>'Become a Byte Trader']);?>
        <!-- section -->
      <?php
        if( have_rows('our_trading_challenges') ):
            while( have_rows('our_trading_challenges') ) : the_row();
            ?>
          <div class="challenges__section">
            <div class="challenges__container">
              <h2 class="challenges__title"><?php the_sub_field('challenges__title')?></h2>
              <p class="challenges__subtitle">
                <?php the_sub_field('challenges__subtitle')?>
              </p>
              <form class="challenges__block">
                <?php
                if( have_rows('challenges__block') ):
                    while( have_rows('challenges__block') ) : the_row();
                        if( have_rows('select_tab') ):
                            ?>
                            <div class="challenges__tabs-select">
                            <?php
                            while( have_rows('select_tab') ) : the_row();
                                
                                $cnt++; // если пост есть, увеличиваем на 1 
                                switch($cnt) {            
                                    case '1': 
                                        ?>
                                        <label class="challenges__label">
                                            <input type="radio" name="category" value="starters" checked="checked">
                                            <span class="challenges__tabs-plan plan-<?php echo $cnt?>" data-tab="#tab_<?php echo $cnt?>">
                                            <?php 
                                            $image = get_sub_field('image');
                                            if( !empty( $image ) ): ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php endif; ?>
                                            <span><?php the_sub_field('plan')?></span>
                                            </span>
                                        </label>
                                        <?php
                                    break;
                                    default: 
                                    ?>
                                        <label class="challenges__label">
                                            <input type="radio" name="category" value="experienced">
                                            <span class="challenges__tabs-plan plan-<?php echo $cnt?>" data-tab="#tab_<?php echo $cnt?>">
                                            <?php 
                                            $image = get_sub_field('image');
                                            if( !empty( $image ) ): ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php endif; ?>
                                            <span><?php the_sub_field('plan')?></span>
                                            </span>
                                        </label>
                                    <?php
                                    break;
                                }
                            endwhile;
                            ?>
                            </div>
                            <?php
                        endif;
                        ?>
                        <div class="challenges__tabs-capital">
                            <span class="text">Capital:</span>
                            <div class="challenges__tabs-deposits">
                                <?php
                                    if( have_rows('deposits') ):
                                        while( have_rows('deposits') ) : the_row();
                                            $capital++; // если пост есть, увеличиваем на 1 
                                            switch($capital) {            
                                                case '1': 
                                                    ?>
                                                    <label class="challenges__label">
                                                    <input type="radio" name="capital" value="<?php the_sub_field('value')?>" checked="checked">
                                                    <span class="challenges__tabs-deposit">$<?php the_sub_field('deposit')?></span>
                                                    </label>
                                                    <?php
                                                break;
                                                default: 
                                                ?>
                                                    <label class="challenges__label">
                                                    <input type="radio" name="capital" value="<?php the_sub_field('value')?>">
                                                    <span class="challenges__tabs-deposit">$<?php the_sub_field('deposit')?></span>
                                                    </label>
                                                <?php
                                                break;
                                            }
                                        endwhile;
                                    endif;
                                ?>
                            </div>
                        </div>
                        <div class="challenges__tabs-content">
                  <?php
                    if( have_rows('content') ):
                        while( have_rows('content') ) : the_row();
                        $package = get_sub_field('package');
                          ?>
                          <div class="attached__block" data-table="<?php echo $package ?>">
                          <?php
                            if( have_rows('content_box') ):
                              while( have_rows('content_box') ) : the_row();
                              $box++; // если пост есть, увеличиваем на 1 
                                switch($box) {            
                                    case '1': 
                                        ?>
                                          <div class="content__box">
                                            <div class="content-wrapper active">
                                              <div class="title">
                                                <span><?php the_sub_field('box_title')?></span>
                                                <?php if(get_sub_field('box_text')){
                                                  ?>
                                                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.6">
                                                      <path d="M16.6004 12.5417L11.1671 7.10841C10.5254 6.46675 9.47539 6.46675 8.83372 7.10841L3.40039 12.5417" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                  </svg>
                                                  <?php
                                                }?>
                                              </div>
                                              <?php if(get_sub_field('box_text')){
                                                ?>
                                                <div class="text">
                                                  <span><?php the_sub_field('box_text')?></span>
                                                </div>
                                                <?php
                                              }?>

                                            </div>
                                            <div class="value">
                                              <?php if(get_sub_field('money')){
                                                ?>
                                                
                                                <span class="nosale"><?php the_sub_field('value_nosale')?></span>
                                                  <span class="sale"><?php the_sub_field('value_sale')?></span>
                                                <?php
                                              } else {
                                                ?>
                                                  <span><?php the_sub_field('box_value')?></span>
                                                <?php
                                              }?>
                                            </div>
                                          </div>
                                        <?php
                                    break;
                                    default: 
                                    ?>
                                        <div class="content__box">
                                            <div class="content-wrapper">
                                              <div class="title">
                                                <span><?php the_sub_field('box_title')?></span>
                                                <?php if(get_sub_field('box_text')){
                                                  ?>
                                                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.6">
                                                      <path d="M16.6004 12.5417L11.1671 7.10841C10.5254 6.46675 9.47539 6.46675 8.83372 7.10841L3.40039 12.5417" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                  </svg>
                                                  <?php
                                                }?>
                                              </div>
                                              <?php if(get_sub_field('box_text')){
                                                ?>
                                                <div class="text">
                                                  <span><?php the_sub_field('box_text')?></span>
                                                </div>
                                                <?php
                                              }?>

                                            </div>
                                            <div class="value">
                                              <?php if(get_sub_field('money')){
                                                ?>
                                                
                                                <span class="nosale"><?php the_sub_field('value_nosale')?></span>
                                                  <span class="sale"><?php the_sub_field('value_sale')?></span>
                                                <?php
                                              } else {
                                                ?>
                                                  <span><?php the_sub_field('box_value')?></span>
                                                <?php
                                              }?>
                                            </div>
                                          </div>
                                    <?php
                                    break;
                                }
                              endwhile;
                            endif;
                          ?>

                          </div>
                          <?php
                        endwhile;
                    endif;
                  ?>
                </div>
                        <?php
                    endwhile;
                endif;
                ?>
                
                <a href="#trigger" class="join-btn challenges__tabs-btn">Join waitlist </a>
              </form>
            </div>
          </div>
            <?php
            endwhile;
        endif;
      ?>
        <!-- section -->
        <?php
          if( have_rows('trading') ):
              while( have_rows('trading') ) : the_row();
              ?>
                <div class="trading__section">
                  <div class="trading__container">
                    <h2 class="trading__title"><?php the_sub_field('title')?></h2>
                    <div class="trading__block">
                      <?php
                      if( have_rows('big_box') ):
                          while( have_rows('big_box') ) : the_row();
                          ?>
                          <div class="trading__box big-box">
                            <p><?php the_sub_field('text')?></p>
                            <?php $image = get_sub_field('image');
                            if( !empty( $image ) ): ?>
                                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                          </div>
                          <?php
                          endwhile;
                      endif;
                      ?>  
                      <?php
                      if( have_rows('small_box') ):
                          while( have_rows('small_box') ) : the_row();
                          ?>

                          <div class="trading__box small-box box-1">
                            <div class="box-bg">
                            <?php $image = get_sub_field('background');
                            if( !empty( $image ) ): ?>
                                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                            <?php endif; ?>
                            </div>
                            <?php $image = get_sub_field('image');
                            if( !empty( $image ) ): ?>
                                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="icon" />
                            <?php endif; ?>
                            <span><?php the_sub_field('text')?></span>
                          </div>
                          <?php
                          endwhile;
                      endif;
                      ?>                        
                    </div>
                  </div>
                </div>
              <?php
              endwhile;
          endif;
        ?>            

        <!-- section -->
        <?php
          if( have_rows('trigger') ):
              while( have_rows('trigger') ) : the_row();
              ?>
              <div class="trigger__section" id="trigger">
                <div class="trigger__container">
                  <div class="trigger__block">
                    <h2 class="trigger__title"><?php the_sub_field('title')?></h2>
                    <h3 class="trigger__subtitle"><?php the_sub_field('subtitle')?></h3>
                    <?php echo get_template_part( 'template-parts/content', 'form', ['class-form'=>'trigger__form']);?>
                    <div class="trigger__box">
                      <p class="text"><?php the_sub_field('text_1')?></p>
                      <span class="line"></span>
                      <p class="text"><?php the_sub_field('text_2')?></p>
                    </div>
                    <div class="user__box user-1">
                      <picture><source srcset="<?php echo get_template_directory_uri() ?>/images/icons/join-user-1.webp" type="image/webp"><img src="<?php echo get_template_directory_uri() ?>/images/icons/join-user-1.png" alt=""></picture>
                      <div class="quote">Join our community</div>
                    </div>
                    <div class="user__box user-2">
                      <picture><source srcset="<?php echo get_template_directory_uri() ?>/images/icons/join-user-2.webp" type="image/webp"><img src="<?php echo get_template_directory_uri() ?>/images/icons/join-user-2.png" alt=""></picture>
                      <div class="quote">Hey, we are waiting for you</div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              endwhile;
          endif;
        ?>            

      <?php echo get_template_part( 'template-parts/content', 'ticker', ['max-count'=>'20', 'ticker-value'=>'About us']);?>
        <!-- section -->
        <?php
          if( have_rows('about') ):
              while( have_rows('about') ) : the_row();
              ?>
                <div class="about__section">
                  <div class="about__container">
                    <h2 class="about__title"><?php the_sub_field('title')?></h2>
                    <div class="about__block">
                      <div class="small-box about__box">
                        <h4 class="small-box__title"><?php the_sub_field('small_box_title')?></h4>
                        <div class="column">
                        <?php
                          if( have_rows('left_small_box') ):
                              while( have_rows('left_small_box') ) : the_row();
                                ?>
                                <?php $image = get_sub_field('image');
                                if( !empty( $image ) ): ?>
                                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="box" />
                                <?php endif; ?>
                                <?php
                              endwhile;
                          endif;
                          ?>  
                        </div>
                        <div class="column">
                        <?php
                          if( have_rows('right_small_box') ):
                              while( have_rows('right_small_box') ) : the_row();
                                ?>
                                <?php $image = get_sub_field('image');
                                if( !empty( $image ) ): ?>
                                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="box" />
                                <?php endif; ?>
                                <?php
                              endwhile;
                          endif;
                          ?>  
                        </div>
                      </div>
                      <div class="big-box about__box">
                        <div class="box about-info">
                          <h3 class="title"><?php the_sub_field('about_title')?></h3>
                          <?php the_sub_field('about_text')?>
                          <p></p>
                          <a href="<?php the_sub_field('about_link')?>" target="_blank"><span>Read more</span><img src="<?php echo get_template_directory_uri() ?>/images/icons/footer__arrow.svg" alt=""></a>
                        </div>
                        <div class="box funding-info">
                          <a href="<?php the_sub_field('funding_link')?>" target="_blank"><span><?php the_sub_field('funding_text')?></span><img src="<?php echo get_template_directory_uri() ?>/images/icons/footer__arrow.svg" alt=""></a>
                          <div class="box-image">
                            <?php
                            if( have_rows('funding_info') ):
                                while( have_rows('funding_info') ) : the_row();
                                  ?>
                                  <?php $image = get_sub_field('image');
                                  if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                                  <?php endif; ?>
                                  <?php
                                endwhile;
                            endif;
                            ?>  
                          </div>
                        </div>
                        <div class="box backed">
                          <h3 class="title">Backed by:</h3>
                          <div class="box-image">
                            <?php
                            if( have_rows('backed_by') ):
                                while( have_rows('backed_by') ) : the_row();
                                  ?>
                                  <?php $image = get_sub_field('image');
                                  if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                  <?php endif; ?>
                                  <?php
                                endwhile;
                            endif;
                            ?>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              endwhile;
          endif;
        ?>  
           
<?php get_footer();?>