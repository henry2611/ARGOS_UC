<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $this->pageTitle ?></title>
	
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/icon.png" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/css/print.css" media="print" />

	<style type="text/css" media="screen">
		h1.fontface {font: 32px/38px 'MichromaRegular', Arial, sans-serif;letter-spacing: 0;}
		p.style1 {font: 18px/27px 'MichromaRegular', Arial, sans-serif;}
		@font-face {
			font-family: 'MichromaRegular';
			src: url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.eot');
			src: url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.woff') format('woff'),
			url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.ttf') format('truetype'),
			url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.svg#MichromaRegular') format('svg');
			font-weight: normal;
			font-style: normal;
		}
	</style>


	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
</head>
<body>


	  <header>
	  
            <div id="logo">
              <a href="<?php echo Yii::app()->request->baseUrl; ?>"><img id="logoimg" src="<?php echo Yii::app()->request->baseUrl; ?>/images/rsz_argos1.png" alt="ARGOS - UC"/></a>
              <a href="#" style="float: right"><img id="logoimg" src="<?php echo Yii::app()->request->baseUrl; ?>/images/rsz_21rsz_1log_uc.png" alt="UC"/></a>
            </div>

    
	</header>
	<!--end header-->
 
	<nav>
		<div class="menu">
				<?php 
                                
                                /*function Comprobar_Rol($rol)
                                {
                                        if ($rol)
                                                return true;
                                        else
                                                return false;
                                }*/
                                
                             if(Yii::app()->user->checkAccess('docente'))
                             { 
                                 $this->widget('zii.widgets.CMenu',array( 
                                     'items'=>array(
                                        array('label'=>'Home', 'url'=>array('/site/index')),
                                     ),
                                     ));
                             }
                                
                                $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Administrar Usuarios'
					, 'url'=>Yii::app()->user->ui->userManagementAdminUrl
					, 'visible'=>Yii::app()->user->isSuperAdmin),
				array('label'=>'Login'
					, 'url'=>Yii::app()->user->ui->loginUrl
					, 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')'
					, 'url'=>Yii::app()->user->ui->logoutUrl
					, 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Perfil'
                                        , 'url' => array('/site/index')),
			),
		)); ?>
                                <?php 
                                    /*$iduser = Yii::app()->user->id;
                                    $this->widget(
                                        'ext.emenu.EMenu',array(
                                        'theme'=>'adobe',
                                        'items'=>Yii::app()->user->rbac->getMenu($iduser)  // <--- AQUI
));
                                */?>
		</div>
        </nav>
	<div id="wrapper"><!-- #wrapper -->
	<section id="main"><!-- #main content and sidebar area -->

		<!--<aside id="sidebar1"><!-- sidebar1 -->
			<!--	<br><br><br>
					
				
					<img src="<?php// echo Yii::app()->theme->baseUrl ?>/images/ad125.jpg" alt="" /><br /><img src="<?php //echo Yii::app()->theme->baseUrl ?>/images/ad125.jpg" alt="" /><br /><br />
						<h3>Latest News </h3><br>
					<ul>
						<li><a href="#">6.5 Mag Quake Rocks Mexican Coast</a></li>
						<li><a href="#">Cain Denies Allegations</a></li>
						<li><a href="#">Snowstorm Leaves N.E. In Dark</a></li>
						<li><a href="#">Plane Disaster Averted in N.J. </a></li>
						<li><a href="#">Employers May Drop Plans Once Health Law Starts</a></li>
						<li><a href="#">Obama Orders FDA to Reduce Drug Shortages</a></li>
						<li><a href="#">Hillary Clinton's Mother Dies at 92</a></li>
						<li><a href="#">10 Sickened in Conn. by Carbon Monoxide Exposure</a></li>
						<li><a href="#">Iran Seeks U.S. Apology Over Murder Plot Claims </a></li>
						<li><a href="#">Greek Bailout Referendum Sparks Outrage</a></li>
						<li><a href="#">Man dies in N.Y. gym fight after Tasered by police </a></li>
						<li><a href="#">Kansas City missing baby case becoming a circus, critics say</a></li>
					</ul>
			

		</aside><!-- end of sidebar1 -->
        
		<div class ="container">
			<div class= "row-fluid">
				<div class = "span12">
					<?php if(isset($this->breadcrumbs)):?>
						<?php $this->widget('zii.widgets.CBreadcrumbs', array(
							'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
					<?php endif?>
				</div>
			</div>
		</div>

		<?php echo $content ?>
		
		<div class="clear"></div>

		<aside id="sidebar">
			<!--	<h3>Did You Know?</h3>
					<ul>
						<li><a href="#">Curabitur sodales</a></li>
						<li><a href="#">Sed dignissim</a></li>
						<li><a href="#">Fusce nec</a></li>
						<li><a href="#">Nulla quis</a></li>
						<li><a href="#">Curabitur sodales</a></li>
						<li><a href="#">Sed dignissim</a></li>
						<li><a href="#">Fusce nec</a></li>
						<li><a href="#">Nulla quis</a></li>
					</ul>
				<br>-->
<!--<br>

<br>
			
				<!--<h3> Links</h3>
					<ul>
						<li><a href="http://www.uc.edu.ve/">Universidad de Carabobo (UC)</a></li>
						<li><a href="http://www.facyt.uc.edu.ve/">Facultad de Ciencias y Tecnología (FaCyT)</a></li>
						<li><a href="http://www.dta.uc.edu.ve/">Dirección de Tecnología Avanzada (DTA)</a></li>
					</ul>-->

		</aside><!-- end of sidebar -->

	</section><!-- end of #main content and sidebar-->
</div>
		<footer>
		<div class="container1">
		<section id="footer-area">

			<section id="footer-outer-block">
					<!--<aside class="footer-segment">
							<h4>News</h4>
								<ul>
									<li><a href="#">U.S.</a></li>
									<li><a href="#">Local</a></li>
									<li><a href="#">World</a></li>
								</ul>
					</aside><!-- end of #first footer segment -->

					<!--<aside class="footer-segment">
							<h4>About Us</h4>
								<ul>
									<li><a href="#">Corporate HQ</a></li>
									<li><a href="#">Staff</a></li>
									<li><a href="#">History</a></li>
								</ul>
					</aside><!-- end of #second footer segment -->

					<!--<aside class="footer-segment">
							<h4>Contact Us</h4>
								<ul>
									<li><a href="#">Customer Support</a></li>
									<li><a href="#">Divisions</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Job Opportunities</a></li>
								</ul>
					</aside><!-- end of #third footer segment -->
					
					<aside class="footer-segment">
							<h4> Links de Interes</h4>
                                                            <ul>
                                                                    <li><a href="http://www.uc.edu.ve/">Universidad de Carabobo (UC)</a></li>
                                                                    <li><a href="http://www.dta.uc.edu.ve/">Dirección de Tecnología Avanzada (DTA)</a></li>
                                                                    <li><a href="http://www.facyt.uc.edu.ve/">Facultad de Ciencias y Tecnología (FaCyT)</a></li>
                                                                    
                                                            </ul>
                                                        
                                                        <?php echo Yii::app()->user->ui->displayErrorConsole(); ?>
					</aside><!-- end of #fourth footer segment -->

			</section><!-- end of footer-outer-block -->

		</section><!-- end of footer-area -->
		</div>
	</footer>
<!-- Free template distributed by http://freehtml5templates.com -->
</body>
</html>
