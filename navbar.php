<header id="header" class="">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="./userdashboard.php?page=home">WhereTo?</a></h1>
		

      <nav class="nav-menu d-none d-lg-block" id='top-nav'>
        <ul>
          
           <li class="nav-schedule"><a href="./userdashboard.php?page=schedule">View Bus Schedule</a></li>
			<!-- <li class="nav-home"><a href="./userdashboard.php?page=login">Login</a></li> -->
             
              
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header>
  <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>';
      if(page != ''){
        $('#top-nav li').removeClass('active')
        $('#top-nav li.nav-'+page).addClass('active')
      }
      $('#manage_account').click(function(){
      uni_modal('Manage Account','manage_account.php')
  })
    })

  </script>