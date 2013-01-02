<body>
<?php echo $this->load->view('headup'); ?>
<div class="shell">
<?php echo $this->load->view('slider'); ?>
<?php $menu_page='menu';
  if($this->authentication->is_signed_in()){
    $menu_page.='_'.$account->role;
  }
  echo $this->load->view($menu_page); ?>
<!-- main -->
<div id="main">

  <!-- content -->
  <div id="content" class="left">
  <!-- ==================================================================-->
  <!-- welcome  -->
      <?php echo $page_info; ?>
      <!-- end welcome  -->
  <!-- news -->
      <div class="news">
        
        <!-- news item -->
        <div class="news-item">
         <span class="news-pointer-date"><b>10 Dec</b>&nbsp; <i>2012</i></span>
          <div class="news-body">
            <h3>Concert Voltaj</h3>
            <a href="#" class="btn"><span><em>mai mult</em></span></a>
            <div class="cl">&nbsp;</div>
            <p>In data de 31.12.2012 Voltaj va concerta!!!<br>Cei care au ales sa faca Revelionul in Bucuresti vor putea sa ii vada in:
<br>- Parcul Sebastian - ora 20:20,
<br>- Piata Revolutiei - ora 22:45, 
<br>- Piata Constitutiei - ora 00:15,
<br>- Romexpo - ora 5:15.</p>
          </div>
          <div class="cl">&nbsp;</div>
        </div>
        <!-- end news item -->
        
        <!-- news item -->
        <div class="news-item">
        
           <span class="news-pointer-date"><b>9 Nov</b>&nbsp; <i>2012</i></span>
          <div class="news-body">
            <h3>Ziua mondiala a fericirii</h3>
            <a href="#" class="btn"><span><em>mai mult</em></span></a>
            <div class="cl">&nbsp;</div>
            <p>In curand incepe luna cadourilor alaturi de cei dragi. Pana atunci urmeaza insa petrecerea de Craciun cu colegii de servici. Iti doresti sa fie un moment de neuitat? Contacteaza-ne</p>
          </div>
          <div class="cl">&nbsp;</div>
        </div>
        <!-- end news item -->
        
        <!-- news item -->
        <div class="news-item">
          <span class="news-pointer-date"><b>29 Apr</b>&nbsp; <i>2011</i></span>
          <div class="news-body">
            <h3>Nunta la Palat</h3>
            <a href="#" class="btn"><span><em>mai mult</em></span></a>
            <div class="cl">&nbsp;</div>
            <p>Pentru cei care isi doresc o nunta la palat, in Romania, variantele sunt multiple.</p>
          </div>
          <div class="cl">&nbsp;</div>
        </div>
        <!-- end news item -->
        
        <!-- news item -->
        <div class="news-item">
          <span class="news-pointer-date"><b>9 Nov</b>&nbsp; <i>2009</i></span>
          <div class="news-body">
            <h3>Deschiderea oficiala a sediului PropaDropa</h3>
            <a href="#" class="btn"><span><em>mai mult</em></span></a>
            <div class="cl">&nbsp;</div>
            <p>Inaugurarea noului sediu a avut loc intr-o atmosfera de neuitat, cand noi am devenit proprii nostri clienti fideli in materie de organizat evenimente. pe harta de mai jos puteti localiza cu usurinta noul sediu. Va asteptam cu drag.</p>
          </div>
          <?php echo $gmap; ?>
          <div class="cl">&nbsp;</div>
        </div>
        <!-- end news item -->
        
      </div>
      <!-- end news -->

<!-- ============================================================= -->

  </div>
  <!-- end content -->
  
  <!-- sidebar -->
  <div id="sidebar" class="right">

<!--  ==================================================================== -->
<!-- blog roll -->
      <div class="blog-roll">
        <a href="<?php echo site_url('rss'); ?>" class="rss-feed notext">&nbsp;</a>
        <h2><?php echo lang('menu_blog'); ?></h2>
        <div class="cl">&nbsp;</div>
        <?php echo $items; ?>
      </div>
      <!-- end blog roll -->
              
      <!-- contact -->
      <div class="contact">
        <h2>Contact</h2>
        <p>Ne puteti contacta folosind formularul din coltul dreapta sus. Asteptam cu nerabdare sugestiile dumneavoastra.</p>
      </div>
      <!-- end contact -->
<!-- ====================================================================================== -->


  </div>
  <!-- end sidebar -->

  <div class="cl">&nbsp;</div>
</div>
<!-- end main -->
