
<script src="/javascript/sorttable.js"></script>

<?php
/*
	pfSense_MODULE:	header
*/

require_once("globals.inc");
require_once("functions.inc");

/* $Id$ */


/* Determine automated help URL. Should output the page name and
   parameters separately */
$uri_split = "";
preg_match("/\/(.*)\?(.*)/", $_SERVER["REQUEST_URI"], $uri_split);

/* If there was no match, there were no parameters, just grab the filename
   Otherwise, use the matched filename from above. */
if (empty($uri_split[0])) {
	$pagename = ltrim($_SERVER["REQUEST_URI"], '/');
} else {
	$pagename = $uri_split[1];
}
/* If the page name is still empty, the user must have requested / (index.php) */
if (empty($pagename)) {
	$pagename = "index.php";
}

/* If the filename is pkg_edit.php or wizard.php, reparse looking
	for the .xml filename */
if (($pagename == "pkg.php") || ($pagename == "pkg_edit.php") || ($pagename == "wizard.php")) {
	$param_split = explode('&', $uri_split[2]);
	foreach ($param_split as $param) {
		if (substr($param, 0, 4) == "xml=") {
			$xmlfile = explode('=', $param);
			$pagename = $xmlfile[1];
		}
	}
}

/* Build the full help URL. */
$helpurl .= "{$g['help_base_url']}?page={$pagename}";

function return_ext_menu($section) {
	global $config;
	$htmltext = "";
	$extarray = array();
	if($config['installedpackages']['menu'] <> "") {
		foreach($config['installedpackages']['menu'] as $menuitem) {
			if($menuitem['section'] != $section) continue;
			if($menuitem['url'] <> "") {
			 	$addresswithport = getenv("HTTP_HOST");
				$colonpos = strpos($addresswithport, ":");
				if ($colonpos !== False){
					//my url is actually just the IP address of the pfsense box
					$myurl = substr($addresswithport, 0, $colonpos);
				} else {
					$myurl = $addresswithport;
				}
				$description = str_replace('$myurl', $myurl, $menuitem['url']);
			} else {
				$description = '/pkg.php?xml=' . $menuitem['configfile'];
			}
			$extarray[] = array($menuitem['name'], $description);
		}
	}
	return $extarray;
}

function output_menu($arrayitem, $target="") {
	foreach($arrayitem as $item) {
		if($target)
			$targetinfo = "target='{$target}'";
		echo '<li><a ' . $targetinfo. ' href="' . $item[1] . '" class="navlnk">' . $item[0] . '</a></li>' . "\n";
	}
}

// System
$system_menu = array();
$system_menu[] = array(gettext("Advanced"), "/system_advanced_admin.php");
$system_menu[] = array(gettext("Firmware"), "/system_firmware.php");
$system_menu[] = array(gettext("General Setup"), "/system.php");
$system_menu[] = array(gettext("Logout"), "/index.php?logout");
if ($g['platform'] == "pfSense" or $g['platform'] == "nanobsd")
	$system_menu[] = array(gettext("Packages"), "/pkg_mgr_installed.php");
$system_menu[] = array(gettext("Setup Wizard"), "/wizard.php?xml=setup_wizard.xml");
$system_menu[] = array(gettext("Routing"), "/system_gateways.php");
$system_menu[] = array(gettext("Cert Manager"), "/system_camanager.php");
if (!isAllowedPage("system_usermanager.php*"))
	$system_menu[] = array(gettext("User Manager"), "/system_usermanager_passwordmg.php");
else
	$system_menu[] = array(gettext("User Manager"), "/system_usermanager.php");
$system_menu = msort(array_merge($system_menu, return_ext_menu("System")),0);

// Interfaces
$interfaces_menu = array();
if (!isset($config['system']['webgui']['noassigninterfaces']))
	$interfaces_menu[] = array("(assign)", "/interfaces_assign.php");
$opts = get_configured_interface_with_descr(false, true);
foreach ($opts as $oif => $odescr)
	if (!isset($config['interfaces'][$oif]['ovpn']))
		$interfaces_menu[] = array(htmlspecialchars($odescr), "/interfaces.php?if={$oif}");
$interfaces_menu = msort(array_merge($interfaces_menu, return_ext_menu("Interfaces")),0);

// Firewall
$firewall_menu = array();
$firewall_menu[] = array(gettext("Aliases"), "/firewall_aliases.php");
$firewall_menu[] = array(gettext("NAT"), "/firewall_nat.php");
$firewall_menu[] = array(gettext("Rules"), "/firewall_rules.php");
$firewall_menu[] = array(gettext("Schedules"), "/firewall_schedule.php");
$firewall_menu[] = array(gettext("Traffic Shaper"), "/firewall_shaper.php");
$firewall_menu[] = array(gettext("Virtual IPs"), "/firewall_virtual_ip.php");
$firewall_menu = msort(array_merge($firewall_menu, return_ext_menu("Firewall")),0);

// Services
$services_menu = array();
$services_menu[] = array(gettext("Captive Portal"), "/services_captiveportal.php");
$services_menu[] = array(gettext("DNS Forwarder"), "/services_dnsmasq.php");
$services_menu[] = array(gettext("DHCP Relay"), "/services_dhcp_relay.php");
$services_menu[] = array(gettext("DHCPv6 Relay"), "/services_dhcpv6_relay.php");
if($g['services_dhcp_server_enable']) {
	$services_menu[] = array(gettext("DHCP Server"), "/services_dhcp.php");
	$services_menu[] = array(gettext("DHCPv6 Server"), "/services_dhcpv6.php");
}
$services_menu[] = array(gettext("Dynamic DNS"), "/services_dyndns.php");
$services_menu[] = array(gettext("IGMP proxy"), "/services_igmpproxy.php");
$services_menu[] = array(gettext("Load Balancer"), "/load_balancer_pool.php");
$services_menu[] = array(gettext("OLSR"), "/pkg_edit.php?xml=olsrd.xml&id=0");
$services_menu[] = array(gettext("PPPoE Server"), "/vpn_pppoe.php");
$services_menu[] = array(gettext("RIP"), "/pkg_edit.php?xml=routed.xml&id=0");
$services_menu[] = array(gettext("SNMP"), "/services_snmp.php");
if(count($config['interfaces']) > 1) {
	/* no use for UPnP in single-interface deployments
	remove to reduce user confusion
	*/
	$services_menu[] = array(gettext("UPnP &amp; NAT-PMP"), "/pkg_edit.php?xml=miniupnpd.xml&id=0");
}
$services_menu[] = array(gettext("OpenNTPD"), "/pkg_edit.php?xml=openntpd.xml&id=0");
$services_menu[] = array(gettext("Wake on LAN"), "/services_wol.php");
$services_menu = msort(array_merge($services_menu, return_ext_menu("Services")),0);

// VPN
$vpn_menu = array();
$vpn_menu[] = array(gettext("IPsec"), "/vpn_ipsec.php");
$vpn_menu[] = array(gettext("OpenVPN"), "/vpn_openvpn_server.php");
$vpn_menu[] = array(gettext("PPTP"), "/vpn_pptp.php");
$vpn_menu[] = array(gettext("L2TP"), "/vpn_l2tp.php");
$vpn_menu = msort(array_merge($vpn_menu, return_ext_menu("VPN")),0);

// Status
$status_menu = array();
if (count($config['captiveportal']) > 0)
	$status_menu[] = array(gettext("Captive Portal"), "/status_captiveportal.php");
$status_menu[] = array(gettext("CARP (failover)"), "/carp_status.php");
$status_menu[] = array(gettext("Dashboard"), "/index.php");
$status_menu[] = array(gettext("Gateways"), "/status_gateways.php");
$status_menu[] = array(gettext("DHCP Leases"), "/status_dhcp_leases.php");
$status_menu[] = array(gettext("DHCPv6 Leases"), "/status_dhcpv6_leases.php");
$status_menu[] = array(gettext("Filter Reload"), "/status_filter_reload.php");
$status_menu[] = array(gettext("Interfaces"), "/status_interfaces.php");
$status_menu[] = array(gettext("IPsec"), "/diag_ipsec.php");
$status_menu[] = array(gettext("Load Balancer"), "/status_lb_pool.php");
$status_menu[] = array(gettext("OpenVPN"), "/status_openvpn.php");
if ($g['platform'] == "pfSense")
	$status_menu[] = array(gettext("Package Logs"), "/diag_pkglogs.php");
$status_menu[] = array(gettext("Queues"), "/status_queues.php");
$status_menu[] = array(gettext("RRD Graphs"), "/status_rrd_graph.php");
$status_menu[] = array(gettext("Services"), "/status_services.php");
$status_menu[] = array(gettext("System Logs"), "/diag_logs.php");
$status_menu[] = array(gettext("Traffic Graph"), "/status_graph.php?if=wan");
if(count($config['interfaces']) > 1) 
	$status_menu[] = array(gettext("UPnP &amp; NAT-PMP"), "/status_upnp.php");
$ifentries = get_configured_interface_with_descr();
foreach ($ifentries as $ent => $entdesc) {
	if (is_array($config['interfaces'][$ent]['wireless']) &&
		preg_match($g['wireless_regex'], $config['interfaces'][$ent]['if']))
		$wifdescrs[$ent] = $entdesc;
}
if (count($wifdescrs) > 0)
	$status_menu[] = array(gettext("Wireless"), "/status_wireless.php");
$status_menu = msort(array_merge($status_menu, return_ext_menu("Status")),0);

// Diagnostics
$diagnostics_menu = array();
$diagnostics_menu[] = array(gettext("ARP Tables"), "/diag_arp.php");
$diagnostics_menu[] = array(gettext("Authentication"), "/diag_authentication.php");
$diagnostics_menu[] = array(gettext("Backup/Restore"), "/diag_backup.php");
$diagnostics_menu[] = array(gettext("Command Prompt"), "/exec.php");
$diagnostics_menu[] = array(gettext("DNS Lookup"), "/diag_dns.php");
$diagnostics_menu[] = array(gettext("Edit File"), "/edit.php");
$diagnostics_menu[] = array(gettext("Factory Defaults"), "/diag_defaults.php");
$diagnostics_menu[] = array(gettext("Halt System"), "/halt.php" );
$diagnostics_menu[] = array(gettext("Limiter Info"), "/diag_limiter_info.php" );
$diagnostics_menu[] = array(gettext("NDP Table"), "/diag_ndp.php" );

$diagnostics_menu[] = array(gettext("Tables"), "/diag_tables.php");
$diagnostics_menu[] = array(gettext("Ping"), "/diag_ping.php");
$diagnostics_menu[] = array(gettext("pfInfo"), "/diag_pf_info.php");
$diagnostics_menu[] = array(gettext("pfTop"), "/diag_system_pftop.php");
$diagnostics_menu[] = array(gettext("Reboot"), "/reboot.php");
$diagnostics_menu[] = array(gettext("Routes"), "/diag_routes.php");
$diagnostics_menu[] = array(gettext("SMART Status"), "/diag_smart.php");
$diagnostics_menu[] = array(gettext("States"), "/diag_dump_states.php");
$diagnostics_menu[] = array(gettext("States Summary"), "/diag_states_summary.php");
$diagnostics_menu[] = array(gettext("System Activity"), "/diag_system_activity.php");
$diagnostics_menu[] = array(gettext("Traceroute"), "/diag_traceroute.php");
$diagnostics_menu[] = array(gettext("Packet Capture"), "/diag_packet_capture.php");
if($g['platform'] == "nanobsd")
	$diagnostics_menu[] = array(gettext("NanoBSD"), "/diag_nanobsd.php");

if (isset($config['system']['developer'])) {
	echo "<li><hr width=\"80%\"/></li>";
	$diagnostics_menu[] = array(gettext("Restart HTTPD"), "/restart_httpd.php");
}
$diagnostics_menu = msort(array_merge($diagnostics_menu, return_ext_menu("Diagnostics")),0);

if(! $g['disablehelpmenu']) {
	$help_menu = array();
	$help_menu[] = array(gettext("About this Page"), $helpurl);
	if($g['product_name'] == "pfSense") 
		$help_menu[] = array(gettext("Bug Database"), "http://www.pfsense.org/j.php?jumpto=redmine");
	$help_menu[] = array(gettext("User Forum"), "http://www.pfsense.org/j.php?jumpto=forum");
	$help_menu[] = array(gettext("Documentation"), "http://www.pfsense.org/j.php?jumpto=doc");
	$help_menu[] = array(gettext("Developers Wiki"), "http://www.pfsense.org/j.php?jumpto=devwiki");
	$help_menu[] = array(gettext("Paid Support"), "http://www.pfsense.org/j.php?jumpto=portal");
	$help_menu[] = array(gettext("pfSense Book"), "http://www.pfsense.org/j.php?jumpto=book");
	$help_menu[] = array(gettext("Search portal"), "http://www.pfsense.org/j.php?jumpto=searchportal");
	$help_menu[] = array(gettext("FreeBSD Handbook"), "http://www.pfsense.org/j.php?jumpto=fbsdhandbook");
	$help_menu = msort(array_merge($help_menu, return_ext_menu("Help")),0);	
}

/* NOTICE ACKNOWLEDGE CODE by Erik Kristensen */
if ($_REQUEST['noticeaction'] == 'acknowledge') {
	$notice_id = htmlspecialchars($_REQUEST['noticeid']);
	close_notice($notice_id);
}
/**********************************************/

?>

<div id="wrapper">
	<div id="header">
		<div id="header-left"><a href="/index.php" id="status-link"><img src="/themes/<?= $g['theme']; ?>/images/transparent.gif" border="0"></a></div>
		<div id="header-right">
			<div class="container">
				<div class="left">webConfigurator</div>
				<div class="right">
<?
				if (are_notices_pending()) {
					$notices = get_notices();

					$requests=array();

					## Get Query Arguments from URL ###
					foreach ($_REQUEST as $key => $value) {
						if ($key != "PHPSESSID")
							$requests[] = $key.'='.$value;
					}
					if(is_array($requests))
						$request_string = implode("&", $requests);

					if(is_array($notices)) {
						foreach ($notices as $key => $value) {
							$date = date("m-d-y H:i:s", $key);
							$noticemsg = str_replace("'", "", $value['notice']);
							$noticemsg = str_replace('"', "", $noticemsg);
							$noticemsg = str_replace("\n", "", $noticemsg);
							$noticemsg = str_replace("<p>", "", $noticemsg);
							$noticemsg = str_replace("<pre>", "", $noticemsg);
							$noticemsg = str_replace("</pre>", "", $noticemsg);
							$noticemsg = str_replace("</p>", "", $noticemsg);
							$noticemsg = str_replace("<br>", "", $noticemsg);
							$extra_args = "";
							if($_GET['xml']) 
								$extraargs="&xml=" .  htmlspecialchars($_GET['xml']);
							if($_POST['xml']) 
								$extraargs="&xml=" .  htmlspecialchars($_POST['xml']);
							if($_GET['id']) 
								$extraargs="&xml=" .  htmlspecialchars($_GET['id']);
							if($_POST['id'])
								$extraargs="&xml=" .  htmlspecialchars($_POST['id']);
							$notice_msgs = '<a href="?noticeaction=acknowledge&noticeid=all' . $extraargs . '">Acknowledge All</a> &nbsp;&nbsp;&nbsp;&nbsp;.:.&nbsp;&nbsp;&nbsp;&nbsp; ';
							if ($value['url']) {
								$notice_msgs .= $date.' - <a href="'.$url.'?' . htmlspecialchars($request_string) . '&noticeaction=acknowledge&noticeid='.$key.'">['.$value['id'].']</a>';
							} else {
								$notice_msgs .= $date.' - <a href="?' . htmlspecialchars($request_string) . '&noticeaction=acknowledge&noticeid='.$key.'">['.$value['id'].']'.htmlspecialchars($noticemsg).'</a>';
							}
							$notice_msgs .= " &nbsp;&nbsp;&nbsp;&nbsp;.:.&nbsp;&nbsp;&nbsp;&nbsp; ";
						}
					}
?>
					<div id="alerts">
						<script type="text/javascript">
							var content='<div id="marquee-text"><?= $notice_msgs; ?></div>'
						</script>
						<script type="text/javascript" src="/javascript/ticker.js"></script>
					</div>
<?
				} else {
?>
					<div id="hostname">
						<? print $config['system']['hostname'] . "." . $config['system']['domain']; ?>
					</div>
<?
				}
?>
				</div>
			</div>
		</div>
	</div> <!-- Header DIV -->
	<div id="content">
		<div id="left">
			<div id="navigation" style="z-index:1000">
				<ul id="menu">
					<li class="firstdrop">
						<div><?php echo gettext("System"); ?></div>
						<ul class="subdrop">
						<?php
							output_menu($system_menu);
						?>
						</ul>
					</li>
					<li class="drop">
						<div><?php echo gettext("Interfaces"); ?></div>
						<ul class="subdrop">
						<?php
							output_menu($interfaces_menu);
						?>
						</ul>
					</li>
					<li class="drop">
						<div><?php echo gettext("Firewall"); ?></div>
						<ul class="subdrop">
						<?php
							output_menu($firewall_menu);
						?>
						</ul>
					</li>
					<li class="drop">
						<div><?php echo gettext("Services"); ?></div>
						<ul class="subdrop">
						<?
							output_menu($services_menu);
						?>
						</ul>
					</li>
					<li class="drop">
						<div><?php echo gettext("VPN"); ?></div>
						<ul class="subdrop">
						<?php
							output_menu($vpn_menu);
						?>
						</ul>
					</li>
					<li class="drop">
						<div><?php echo gettext("Status"); ?></div>
						<ul class="subdrop">
						<?php
							output_menu($status_menu);
						?>
						</ul>
					</li>
					<li class="drop">
						<div><?php echo gettext("Diagnostics"); ?></div>
						<ul id="diag" class="subdrop">
						<?
							output_menu($diagnostics_menu);
						?>
						</ul>
					</li>
					<?php if(! $g['disablehelpmenu']): ?>
					<li class="lastdrop">
						<div><?php echo gettext("Help"); ?></div>
						<ul id="help" class="subdrop">
						<?
							output_menu($help_menu, "_new");
						?>
						</ul>
					</li>
					<?php endif; ?>
				</ul>
			</div>

		</div> <!-- Left DIV -->

		<div id="right">

<?php

	/* display a top alert bar if need be */
	$need_alert_display = false;
	$found_notices = are_notices_pending();
	if($found_notices == true) {
		$notices = get_notices();
		if(!$notices) {
			$need_alert_display = true;
			$display_text = print_notices($notices) . "<br>";
		}
	}
	if($need_alert_display == true) {
                echo "<div style=\"background-color:#000000\" id=\"roundalert\">";
                echo "<table>";
		echo "<tr><td><font color=\"#ffffff\">";
		echo "&nbsp;&nbsp;<img align=\"middle\" src=\"/top_notification.gif\">&nbsp;&nbsp;&nbsp;";
		echo $display_text;
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
	}

function add_to_menu($url, $name) {
	if (isAllowedPage($url))
		echo "<li><a href=\"{$url}\" class=\"navlnk\">{$name}</a></li>\n";
}
?>

<div>
<span class="pgtitle"><a href="<?= $_SERVER['SCRIPT_NAME'] ?>"><?=genhtmltitle($pgtitle);?></a></span>
<span style="float:right; margin: 0 0 20px 20px;">
<?php if(! empty($statusurl)): ?>
<a href="<?php echo $statusurl; ?>" target="_new" title="<?php echo gettext("Status of items on this page."); ?>"><img src="/themes/<?php echo $g['theme']; ?>/images/status.png" border="0"></a>
<?php endif; ?>
<?php if(! empty($logurl)): ?>
<a href="<?php echo $logurl; ?>" target="_new" title="<?php echo gettext("Log entries for items on this page."); ?>"><img src="/themes/<?php echo $g['theme']; ?>/images/log.png" border="0"></a>
<?php endif; ?>
<?php if(! $g['disablehelpicon']): ?>
<a href="<?php echo $helpurl; ?>" target="_new" title="<?php echo gettext("Help for items on this page."); ?>"><img src="/themes/<?php echo $g['theme']; ?>/images/help.png" border="0"></a>
<?php endif; ?>
</span>
</div>
<br />

<?php
/* if upgrade in progress, alert user */
if(is_subsystem_dirty('packagelock')) {
	$pgtitle = array(gettext("System"),gettext("Package Manager"));
	print_info_box(gettext("Packages are currently being reinstalled in the background.<p>Do not make changes in the GUI until this is complete.") . "<p><img src='/themes/{$g['theme']}/images/icons/icon_fw-update.gif'>");
}
	$pgtitle_output = true;
?>
