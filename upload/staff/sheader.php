<?php
/*
	File: staff/sheader.php
	Created: 6/1/2016 at 6:06PM Eastern Time
	Info: Loads the template, CSS, JS, etc. inside the staff panel.
	Author: TheMasterGeneral
	Website: https://github.com/MasterGeneral156/chivalry-engine/
*/
class headers
{

    function startheaders()
    {
		global $ir, $set, $lang, $db, $userid;
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
		<center>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="<?php echo $set['Website_Description']; ?>">
		<meta property="og:title" content="<?php echo $set['WebsiteName']; ?>"/>
		<meta property="og:description" content="<?php echo $set['Website_Description']; ?>" />
		<meta property="og:image" content="http://vignette1.wikia.nocookie.net/helmet-heroes/images/e/e0/Knight_Helmet.png/revision/latest?cb=20131008030002" />
		<link rel="shortcut icon" href="http://vignette1.wikia.nocookie.net/helmet-heroes/images/e/e0/Knight_Helmet.png/revision/latest?cb=20131008030002" type="image/x-icon" />
		<meta name="author" content="<?php echo $set['WebsiteOwner']; ?>">
		 <?php echo "<title>{$set['WebsiteName']}</title>"; ?>

		<!-- CSS -->
		<?php
		if ($ir['theme'] == 1)
				{
					?>  
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
						<meta name="theme-color" content="#e7e7e7">
					<?php
				}
				elseif ($ir['theme'] == 2)
				{
					?> 
						<link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css"> 
						<meta name="theme-color" content="#375a7f">
					<?php
				}
				elseif ($ir['theme'] == 3)
				{
					?> 
						<link rel="stylesheet" href="../css/bootstrap-purple.css"> 
						<meta name="theme-color" content="#2d135d">
					<?php
				}
		?>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

		<!-- Custom CSS -->
		<style>
		body {
		padding-top: 70px;
		font-size: 16px;
		/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
		}
		</style>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		</head>
		<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo "{$set['WebsiteName']}"; ?></a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../index.php"><?php echo $lang['HDR_B2G']; ?></a>
                    </li>
                </ul>
					<ul class="nav navbar-nav navbar-right">
					<ul class="nav navbar-nav">
                    <li>
						<?php
						$ir['mail']=$db->fetch_single($db->query("SELECT COUNT(`mail_id`) FROM `mail` WHERE `mail_to` = {$ir['userid']} AND `mail_status` = 'unread'"));
						$ir['notifications']=$db->fetch_single($db->query("SELECT COUNT(`notif_id`) FROM `notifications` WHERE `notif_user` = {$ir['userid']} AND `notif_status` = 'unread'"));
						echo "<a href='../inbox.php'>{$lang['MENU_MAIL']} ({$ir['mail']})</a>";
						?>
                    </li>
                    <li>
                        <?php
							echo "<a href='../notifications.php'>{$lang['MENU_EVENT']} ({$ir['notifications']})</a>";
						?>
                    </li>
                    <li>
                        <a href="../inventory.php"><?php echo $lang['MENU_INVENTORY']; ?></a>
                    </li>
                </ul>
					<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php
				if (!$ir['display_pic'])
				{
					
				}
				else
				{
                    echo"<img src='{$ir['display_pic']}' width='24' height='24'>";
				}
					 
					echo" {$lang['GEN_GREETING']}, {$ir['username']}"; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../profile.php?user=<?php echo "{$ir['userid']}"; ?>"><i class="fa fa-fw fa-user"></i> <?php echo $lang['MENU_PROFILE']; ?></a>
                        </li>
                        <li>
                            <a href="../preferences.php?action=menu"><i class="fa fa-fw fa-gear"></i> <?php echo $lang['MENU_SETTINGS']; ?></a>
                        </li>
						<?php
							if (in_array($ir['user_level'], array('Admin', 'Forum Moderator', 'Web Developer', 'Assistant')))
							{
								?><li class="divider"></li>
								<li>
									<a href="index.php"><i class="fa fa-fw fa fa-terminal"></i> <?php echo $lang['MENU_STAFF']; ?></a>
								</li><?php
							}
						
						
						?>
                        <li class="divider"></li>
						<li>
                            <a href="../gamerules.php"><i class="fa fa-fw fa-server"></i> <?php echo $lang['MENU_RULES']; ?></a>
                        </li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> <?php echo $lang['MENU_LOGOUT']; ?></a>
                        </li>
                    </ul>
                </li>
				</ul>
            <!-- Collect the nav links, forms, and other content for toggling -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
		
        <div class="row">
            <div class="col-lg-12 text-center">
				<noscript>
					<?php alert('info',$lang['ERROR_INFO'],$lang['HDR_JS'],false); ?>
				</noscript>
				<?php
		$time=time();
		$fed=$db->fetch_row($db->query("SELECT * FROM `fedjail` WHERE `fed_userid` = {$userid}"));
		if ($fed['fed_out'] < $time)
		{
			$db->query("UPDATE `users` SET `fedjail` = 0 WHERE `userid` = {$userid}");
			$db->query("DELETE FROM `fedjail` WHERE `fed_userid` = {$userid}");
		}
		if ($ir['fedjail'] > 0)
		{
			alert('info',$lang['MENU_FEDJAIL'],"{$lang['MENU_FEDJAIL1']} " . TimeUntil_Parse($fed['fed_out']) . " {$lang['MENU_FEDJAIL2']} <b>{$fed['fed_reason']}</b>",false);
			die($h->endpage());
		}
		if ($ir['mail'] > 0)
		{
			alert('info',$lang['MENU_UNREADMAIL1'],"{$lang['MENU_UNREADMAIL2']} {$ir['mail']} {$lang['MENU_UNREADMAIL3']} <a href='../inbox.php'>{$lang["GEN_HERE"]}</a> {$lang['MENU_UNREADMAIL4']}",false);
		}
		if ($ir['notifications'] > 0)
		{
			alert('info',$lang['MENU_UNREADNOTIF'],"{$lang['MENU_UNREADMAIL2']} {$ir['notifications']} {$lang['MENU_UNREADNOTIF1']} <a href='../notifications.php'>{$lang["GEN_HERE"]}</a> {$lang['MENU_UNREADMAIL4']}",false);
		}
		if ($ir['announcements'] > 0)
		{
			alert('info',$lang['MENU_UNREADANNONCE'],"{$lang['MENU_UNREADANNONCE1']} {$ir['announcements']} {$lang['MENU_UNREADANNONCE2']} <a href='../announcements.php'>{$lang["GEN_HERE"]}</a>.",false);
		}
		if (user_infirmary($ir['userid']) == true)
		{
			$InfirmaryOut=$db->fetch_single($db->query("SELECT `infirmary_out` FROM `infirmary` WHERE `infirmary_user` = {$ir['userid']}"));
			$InfirmaryRemain=TimeUntil_Parse($InfirmaryOut);
			alert('info',$lang['GEN_INFIRM'],"{$lang['MENU_INFIRMARY1']} {$InfirmaryRemain}.",false);
		}
		if (user_dungeon($ir['userid']) == true)
		{
			$DungeonOut=$db->fetch_single($db->query("SELECT `dungeon_out` FROM `dungeon` WHERE `dungeon_user` = {$ir['userid']}"));
			$DungeonRemain=TimeUntil_Parse($DungeonOut);
			alert('info',$lang["GEN_DUNG"],"{$lang['MENU_DUNGEON1']} {$DungeonRemain}.",false);
		}
		$time=time();
		if (($ir['last_verified'] < ($time-$set['Revalidate_Time'])) || ($ir['need_verify'] == 1))
		{
			if (isset($macropage))
			{
				$db->query("UPDATE `users` SET `need_verify` = 1 WHERE `userid` = {$userid}");
				?>
					<div id="captcha" class="modal fade in show" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><?php echo $lang['RECAPTCHA_TITLE']; ?></h4>
						  </div>
						  <div class="modal-body">
							<p><?php echo $lang['RECAPTCHA_INFO']; ?>
							<form action='../macro.php' method='post'>
								<center><div class='g-recaptcha' data-theme='dark' data-sitekey='<?php echo $set['reCaptcha_public']; ?>'></div></center>
							</p>
						  </div>
						  <div class="modal-footer">
								<input type='hidden' value='<?php echo $macropage; ?>' name='page'>
								<input type='submit' value="<?php echo $lang['RECAPTCHA_BTN']; ?>" class="btn btn-default" data-dismiss="modal">
							</form>
						  </div>
						</div>
					  </div>
					</div>
				<?php
				die($h->endpage());
			}
		}
		date_default_timezone_set($ir['timezone']); 
	}
	function userdata($ir, $lv, $fm, $cm, $dosessh = 1)
    {
		global $db, $c, $userid, $set;
		$IP = $db->escape($_SERVER['REMOTE_ADDR']);
		$db->query(
                "UPDATE `users`
                 SET `laston` = {$_SERVER['REQUEST_TIME']}, `lastip` = '$IP'
                 WHERE `userid` = $userid");
		if (!$ir['email'])
        {
            global $domain;
            die("<body>{$lang['HDR_REKT']}{$domain} {$lang['HDR_REKT1']}");
        }
        if (!isset($_SESSION['attacking']))
        {
            $_SESSION['attacking'] = 0;
        }
        if ($dosessh && ($_SESSION['attacking'] || $ir['attacking']))
        {
			alert("warning",$lang['ERROR_GENERIC'],$lang['MENU_XPLOST'],false);
            $db->query("UPDATE `users` SET `xp` = 0, `attacking` = 0 WHERE `userid` = $userid");
            $_SESSION['attacking'] = 0;
        }
		$enperc = min((int) ($ir['energy'] / $ir['maxenergy'] * 100), 100);
        $wiperc = min((int) ($ir['will'] / $ir['maxwill'] * 100), 100);
        $experc = min((int) ($ir['xp'] / $ir['xp_needed'] * 100), 100);
        $brperc = min((int) ($ir['brave'] / $ir['maxbrave'] * 100), 100);
        $hpperc = min((int) ($ir['hp'] / $ir['maxhp'] * 100), 100);
        $enopp = 100 - $enperc;
        $wiopp = 100 - $wiperc;
        $exopp = 100 - $experc;
        $bropp = 100 - $brperc;
        $hpopp = 100 - $hpperc;
        $d = "";
        $u = $ir['username'];
        if ($ir['vip_days'])
        {
            $u = "<span style='color: red;'>{$ir['username']}</span>";
            $d =
                    "<img src='donator.gif'
                     alt='VIP: {$ir['vip_days']} Days Left'
                     title='VIP: {$ir['vip_days']} Days Left' />";
        }

        $gn = "";
        global $staffpage;

        $bgcolor = 'FFFFFF';
	}
	function endpage()
    {
        global $db, $ir, $lang;
        $query_extra = '';
        if (isset($_GET['mysqldebug']) && $ir['user_level'] == 'Admin')
        {
            $query_extra = '<br />' . implode('<br />', $db->queries);
        }
		?>
		</div>
			</div>
        <!-- /.row -->

			</div>
			<!-- /.container -->

			<!-- jQuery Version 1.12.4 -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			
			<!-- Other JS -->
			<script src='https://www.google.com/recaptcha/api.js'></script>
			<script src='../js/game.js'></script>
		</body>
			<footer>
				<p>
					<?php 
					echo "<hr />
					{$lang['MENU_TIN']}  
						" . date('F j, Y') . " " . date('g:i:s a') . "<br />
					{$lang['MENU_OUT']}";
					?>
					&copy; <?php echo date("Y");
					echo"<br/>{$db->num_queries} {$lang['MENU_QE']}.{$query_extra}";
					?>
				</p>
			</footer>
		</html>
			   <?php
			}
	
}