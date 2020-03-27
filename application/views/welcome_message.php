<?php include_once 'template/header.php'; ?>
<link rel="stylesheet" href="<?php echo $base; ?>assets/css/main.css">

<section id="banner">
    <!--
      ".inner" is set up as an inline-block so it automatically expands
      in both directions to fit whatever's inside it. This means it won't
      automatically wrap lines, so be sure to use line breaks where
      appropriate (<br />).
    -->
    <div class="inner">

      <header>
        <h2>CV FORMAT</h2>
      </header>
      <p>Let us <strong>provide</strong> you
      <br />
      the best format
      <br />
      for your Curriculum Vitae.</p>
      <footer>
        <ul class="buttons vertical">
          <li><a href="<?php echo base_url('auth/web'); ?>" class="button fit scrolly">Get started</a></li>
        </ul> 
      </footer>

    </div>
  </section>

  <?php include_once 'template/footer.php'; ?>