<?php
/* Redirector for Contextual Help System
 * (c) 2009 Jim Pingle <jimp@pfsense.org>
 *
 */

/* Define hash of jumpto url maps */

/* Links to categories could probably be more specific. */
$helppages = array(
	/* These pages are confirmed to work and have usable content */
	'index.php' => 'http://doc.pfsense.org/index.php/Dashboard',
	'license.php' => 'http://www.pfsense.org/index.php?option=com_content&task=view&id=42&Itemid=62',
	'miniupnpd.xml' => 'http://doc.pfsense.org/index.php/What_is_UPNP%3F',
	'status_upnp.php' => 'http://doc.pfsense.org/index.php/What_is_UPNP%3F',
	'firewall_virtual_ip.php' => 'http://doc.pfsense.org/index.php/What_are_Virtual_IP_Addresses%3F',
	'firewall_virtual_ip_edit.php' => 'http://doc.pfsense.org/index.php/What_are_Virtual_IP_Addresses%3F',
	'firewall_aliases.php' => 'http://doc.pfsense.org/index.php/Aliases',
	'firewall_aliases_edit.php' => 'http://doc.pfsense.org/index.php/Aliases',
	'firewall_aliases_import.php' => 'http://doc.pfsense.org/index.php/Aliases',
	'firewall_nat_out.php' => 'http://doc.pfsense.org/index.php/Outbound_NAT',
	'firewall_nat_out_edit.php' => 'http://doc.pfsense.org/index.php/Outbound_NAT',
	'firewall_rules.php' => 'http://doc.pfsense.org/index.php/Firewall_Rule_Basics',
	'firewall_rules_edit.php' => 'http://doc.pfsense.org/index.php/Firewall_Rule_Basics',
	'firewall_rules_schedule_logic.php' => 'http://doc.pfsense.org/index.php/Firewall_Rule_Schedules',
	'firewall_schedule.php' => 'http://doc.pfsense.org/index.php/Firewall_Rule_Schedules',
	'firewall_schedule_edit.php' => 'http://doc.pfsense.org/index.php/Firewall_Rule_Schedules',
	'interfaces_vlan.php' => 'http://doc.pfsense.org/index.php/VLAN_Trunking',
	'interfaces_vlan_edit.php' => 'http://doc.pfsense.org/index.php/VLAN_Trunking',
	'diag_routes.php' => 'http://doc.pfsense.org/index.php/Viewing_Routes',
	'diag_packet_capture.php' => 'http://doc.pfsense.org/index.php/Sniffers,_Packet_Capture',
	'diag_system_pftop.php' => 'http://doc.pfsense.org/index.php/How_can_I_monitor_bandwidth_usage%3F#pftop',
	'status_rrd_graph.php' => "http://doc.pfsense.org/index.php/RRD_Graphs",
	'status_rrd_graph_img.php' => "http://doc.pfsense.org/index.php/RRD_Graphs",
	'status_rrd_graph_settings.php' => "http://doc.pfsense.org/index.php/RRD_Graphs",
	'firewall_nat.php' => 'http://doc.pfsense.org/index.php/How_can_I_forward_ports_with_pfSense%3F',
	'firewall_nat_edit.php' => 'http://doc.pfsense.org/index.php/How_can_I_forward_ports_with_pfSense%3F',
	'diag_arp.php' => 'http://doc.pfsense.org/index.php/ARP_Table',
	'diag_backup.php' => 'http://doc.pfsense.org/index.php/Configuration_Backup_and_Restore',
	'diag_confbak.php' => 'http://doc.pfsense.org/index.php/Configuration_History',
	'diag_defaults.php' => 'http://doc.pfsense.org/index.php/Factory_Defaults',
	'firewall_shaper.php' => 'http://doc.pfsense.org/index.php/Traffic_Shaping_Guide',
	'firewall_shaper_edit.php' => 'http://doc.pfsense.org/index.php/Traffic_Shaping_Guide',
	'firewall_shaper_layer7.php' => 'http://doc.pfsense.org/index.php/Traffic_Shaping_Guide',
	'firewall_shaper_queues.php' => 'http://doc.pfsense.org/index.php/Traffic_Shaping_Guide',
	'firewall_shaper_queues_edit.php' => 'http://doc.pfsense.org/index.php/Traffic_Shaping_Guide',
	'firewall_shaper_vinterface.php' => 'http://doc.pfsense.org/index.php/Traffic_Shaping_Guide',
	'firewall_shaper_wizards.php' => 'http://doc.pfsense.org/index.php/Traffic_Shaping_Guide',
	'status_queues.php' => 'http://doc.pfsense.org/index.php/Traffic_Shaping_Guide',
	'diag_dhcp_leases.php' => 'http://doc.pfsense.org/index.php/DHCP_Leases',
	'diag_dns.php' => 'http://doc.pfsense.org/index.php/DNS_Lookup',
	'diag_dump_states.php' => 'http://doc.pfsense.org/index.php/Show_States',
	'diag_resetstate.php' => 'http://doc.pfsense.org/index.php/Reset_States',
	'diag_logs.php' => 'http://doc.pfsense.org/index.php/System_Logs',
	'diag_logs_auth.php' => 'http://doc.pfsense.org/index.php/Captive_Portal_Authentication_Logs',
	'diag_logs_dhcp.php' => 'http://doc.pfsense.org/index.php/DHCP_Logs',
	'diag_logs_filter.php' => 'http://doc.pfsense.org/index.php/Firewall_Logs',
	'diag_logs_filter_dynamic.php' => 'http://doc.pfsense.org/index.php/Firewall_Logs',
	'diag_logs_filter_summary.php' => 'http://doc.pfsense.org/index.php/Firewall_Logs',
	'diag_logs_ntpd.php' => 'http://doc.pfsense.org/index.php/NTP_Logs',
	'diag_logs_ppp.php' => 'http://doc.pfsense.org/index.php/PPP_Logs',
	'diag_logs_relayd.php' => 'http://doc.pfsense.org/index.php/Load_Balancer_Logs',
	'diag_logs_settings.php' => 'http://doc.pfsense.org/index.php/Log_Settings',
	'diag_logs_slbd.php' => 'http://doc.pfsense.org/index.php/Load_Balancer_Logs',
	'diag_logs_vpn.php' => 'http://doc.pfsense.org/index.php/PPTP_VPN_Logs',
	'diag_logs_ipsec.php' => 'http://doc.pfsense.org/index.php/IPsec_Logs',
	'diag_logs_openvpn.php' => 'http://doc.pfsense.org/index.php/OpenVPN_Logs',
	'diag_nanobsd.php' => 'http://doc.pfsense.org/index.php/NanoBSD_Diagnostics',
	'diag_patterns.php' => 'http://doc.pfsense.org/index.php/Layer7_Pattern_Diagnostics',
	'diag_ping.php' => 'http://doc.pfsense.org/index.php/Ping_Host',
	'diag_pkglogs.php' => 'http://doc.pfsense.org/index.php/Package_Logs',
	'diag_showbogons.php' => 'http://doc.pfsense.org/index.php/Show_Bogons',
	'diag_system_activity.php' => 'http://doc.pfsense.org/index.php/System_Activity',
	'diag_traceroute.php' => 'http://doc.pfsense.org/index.php/Traceroute',
	'easyrule.php' => 'http://doc.pfsense.org/index.php/Easy_Rule',
	'edit.php' => 'http://doc.pfsense.org/index.php/Edit_File',
	'exec.php' => 'http://doc.pfsense.org/index.php/Execute_Command',
	'firewall_nat_1to1.php' => 'http://doc.pfsense.org/index.php/1:1_NAT',
	'firewall_nat_1to1_edit.php' => 'http://doc.pfsense.org/index.php/1:1_NAT',
	'halt.php' => 'http://doc.pfsense.org/index.php/Halt_System',
	'reboot.php' => 'http://doc.pfsense.org/index.php/Reboot_System',
	'status_filter_reload.php' => 'http://doc.pfsense.org/index.php/Filter_Reload_Status',
	'status_gateway_groups.php' => 'http://doc.pfsense.org/index.php/Gateway_Status',
	'status_gateways.php' => 'http://doc.pfsense.org/index.php/Gateway_Status',
	'status_graph.php' => 'http://doc.pfsense.org/index.php/Traffic_Graph',
	'status_graph_cpu.php' => 'http://doc.pfsense.org/index.php/CPU_Load',
	'status_interfaces.php' => 'http://doc.pfsense.org/index.php/Interface_Status',
	'status_services.php' => 'http://doc.pfsense.org/index.php/Services_Status',
	'status_wireless.php' => 'http://doc.pfsense.org/index.php/Wireless_Status',
	'pkg_mgr.php' => 'http://doc.pfsense.org/index.php/Package_Manager',
	'pkg_mgr_install.php' => 'http://doc.pfsense.org/index.php/Package_Manager',
	'pkg_mgr_installed.php' => 'http://doc.pfsense.org/index.php/Package_Manager',
	'pkg_mgr_settings.php' => 'http://doc.pfsense.org/index.php/Package_Manager_Settings',


	/* Below here are pages that may need some cleanup or have not been fully looked at yet */

	'diag_ipsec.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'diag_ipsec_sad.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'diag_ipsec_spd.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec_ca.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec_ca_edit.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec_ca_edit_create_cert.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec_edit.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec_keys.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec_keys_edit.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec_mobile.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec_phase1.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',
	'vpn_ipsec_phase2.php' => 'http://doc.pfsense.org/index.php/Category:IPsec',

	'status_openvpn.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_ccd.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_ccd_edit.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_cli.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_cli_edit.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_client.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_create_certs.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_crl.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_crl_edit.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_csc.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_server.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_srv.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'vpn_openvpn_srv_edit.php' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',
	'openvpn-client-export.xml' => 'http://doc.pfsense.org/index.php/Category:OpenVPN',

	'services_captiveportal.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'services_captiveportal_filemanager.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'services_captiveportal_ip.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'services_captiveportal_ip_edit.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'services_captiveportal_mac.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'services_captiveportal_mac_edit.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'services_captiveportal_users.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'services_captiveportal_users_edit.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'services_captiveportal_vouchers.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'services_captiveportal_vouchers_edit.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'status_captiveportal.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'status_captiveportal_test.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'status_captiveportal_voucher_rolls.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',
	'status_captiveportal_vouchers.php' => 'http://doc.pfsense.org/index.php/Category:Captive_Portal',

	'carp_status.php' => 'http://doc.pfsense.org/index.php/Category:CARP',
	'carp.xml' => 'http://doc.pfsense.org/index.php/Category:CARP',
	'carp_settings.xml' => 'http://doc.pfsense.org/index.php/Category:CARP',

	'load_balancer_monitor.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'load_balancer_monitor_edit.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'load_balancer_pool.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'load_balancer_pool_edit.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'load_balancer_relay_action.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'load_balancer_relay_action_edit.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'load_balancer_relay_protocol.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'load_balancer_relay_protocol_edit.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'load_balancer_virtual_server.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'load_balancer_virtual_server_edit.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'status_slbd_pool.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',
	'status_slbd_vs.php' => 'http://doc.pfsense.org/index.php/Category:Load_balancing',


	/* From here down are packages. Not checking these as strictly, 
	any information is better than nothing. */
	'autoconfigbackup.xml' => 'http://doc.pfsense.org/index.php/AutoConfigBackup',
	'phpservice.xml' => 'http://doc.pfsense.org/index.php/PHPService',
	'anyterm.xml' => 'http://doc.pfsense.org/index.php/AnyTerm_package',
	'avahi.xml' => 'http://doc.pfsense.org/index.php/Avahi_package',
	'squid.xml' => 'http://doc.pfsense.org/index.php/Category:Squid',
	'squid_auth.xml' => 'http://doc.pfsense.org/index.php/Category:Squid',
	'squid_cache.xml' => 'http://doc.pfsense.org/index.php/Category:Squid',
	'squid_extauth.xml' => 'http://doc.pfsense.org/index.php/Category:Squid',
	'squid_nac.xml' => 'http://doc.pfsense.org/index.php/Category:Squid',
	'squid_ng.xml' => 'http://doc.pfsense.org/index.php/Category:Squid',
	'squid_traffic.xml' => 'http://doc.pfsense.org/index.php/Category:Squid',
	'squid_upstream.xml' => 'http://doc.pfsense.org/index.php/Category:Squid',
	'squid_users.xml' => 'http://doc.pfsense.org/index.php/Category:Squid',
	'squidGuard.xml' => 'http://doc.pfsense.org/index.php/SquidGuard_package',
	'squidguard.xml' => 'http://doc.pfsense.org/index.php/SquidGuard_package',
	'squidguard_acl.xml' => 'http://doc.pfsense.org/index.php/SquidGuard_package',
	'squidguard_default.xml' => 'http://doc.pfsense.org/index.php/SquidGuard_package',
	'squidguard_dest.xml' => 'http://doc.pfsense.org/index.php/SquidGuard_package',
	'squidguard_log.xml' => 'http://doc.pfsense.org/index.php/SquidGuard_package',
	'squidguard_rewr.xml' => 'http://doc.pfsense.org/index.php/SquidGuard_package',
	'squidguard_time.xml' => 'http://doc.pfsense.org/index.php/SquidGuard_package',
	'bandwidthd.xml' => "http://doc.pfsense.org/index.php/How_can_I_monitor_bandwidth_usage%3F",
	'pfflowd.xml' => "http://doc.pfsense.org/index.php/How_can_I_monitor_bandwidth_usage%3F",
	'darkstat.xml' => "http://doc.pfsense.org/index.php/How_can_I_monitor_bandwidth_usage%3F",
	'rate.xml' => "http://doc.pfsense.org/index.php/How_can_I_monitor_bandwidth_usage%3F",
	'ntop.xml' => "http://doc.pfsense.org/index.php/How_can_I_monitor_bandwidth_usage%3F",
	'vnstat.xml' => "http://doc.pfsense.org/index.php/How_can_I_monitor_bandwidth_usage%3F",
	'widentd.xml' => 'http://doc.pfsense.org/index.php/Widentd_package',
	'tinydns.xml' => 'http://doc.pfsense.org/index.php/Tinydns_package',
	'tinydns_domains.xml' => 'http://doc.pfsense.org/index.php/Tinydns_package',
	'tinydns_sync.xml' => 'http://doc.pfsense.org/index.php/Tinydns_package',
	'blinkled.xml' => 'http://doc.pfsense.org/index.php/BlinkLED_Package',
	'freeswitch.xml' => 'http://doc.pfsense.org/index.php/FreeSWITCH',
	'freeswitch_modules.xml' => 'http://doc.pfsense.org/index.php/FreeSWITCH',
	'dialplan.default.xml' => 'http://doc.pfsense.org/index.php/FreeSWITCH',
	'dialplan.public.xml' => 'http://doc.pfsense.org/index.php/FreeSWITCH',
	'havp.xml' => 'http://doc.pfsense.org/index.php/HAVP_Package_for_HTTP_Anti-Virus_Scanning',
	'havp_avset.xml' => 'http://doc.pfsense.org/index.php/HAVP_Package_for_HTTP_Anti-Virus_Scanning',
	'havp_blacklist.xml' => 'http://doc.pfsense.org/index.php/HAVP_Package_for_HTTP_Anti-Virus_Scanning',
	'havp_fscan.xml' => 'http://doc.pfsense.org/index.php/HAVP_Package_for_HTTP_Anti-Virus_Scanning',
	'havp_trans_exclude.xml' => 'http://doc.pfsense.org/index.php/HAVP_Package_for_HTTP_Anti-Virus_Scanning',
	'havp_whitelist.xml' => 'http://doc.pfsense.org/index.php/HAVP_Package_for_HTTP_Anti-Virus_Scanning',
	'snort.xml' => 'http://doc.pfsense.org/index.php/Setup_Snort_Package',
	'snort_advanced.xml' => 'http://doc.pfsense.org/index.php/Setup_Snort_Package',
	'snort_define_servers.xml' => 'http://doc.pfsense.org/index.php/Setup_Snort_Package',
	'snort_threshold.xml' => 'http://doc.pfsense.org/index.php/Setup_Snort_Package',
	'snort_whitelist.xml' => 'http://doc.pfsense.org/index.php/Setup_Snort_Package',
	'stunnel.xml' => 'http://doc.pfsense.org/index.php/Stunnel_package',
	'stunnel_certs.xml' => 'http://doc.pfsense.org/index.php/Stunnel_package',
	'openbgpd.xml' => 'http://doc.pfsense.org/index.php/OpenBGPD_package',
	'openbgpd_groups.xml' => 'http://doc.pfsense.org/index.php/OpenBGPD_package',
	'openbgpd_neighbors.xml' => 'http://doc.pfsense.org/index.php/OpenBGPD_package',
	'iperf.xml' => 'http://doc.pfsense.org/index.php/Iperf_package',
	'iperfserver.xml' => 'http://doc.pfsense.org/index.php/Iperf_package',
	'jail_template.xml' => 'http://doc.pfsense.org/index.php/PfJailctl_package',
	'jailctl.xml' => 'http://doc.pfsense.org/index.php/PfJailctl_package',
	'jailctl.xml' => 'http://doc.pfsense.org/index.php/PfJailctl_package',
	'jailctl_defaults.xml' => 'http://doc.pfsense.org/index.php/PfJailctl_package',
	'jailctl_settings.xml' => 'http://doc.pfsense.org/index.php/PfJailctl_package',
	'siproxd.xml' => 'http://doc.pfsense.org/index.php/Siproxd_package',
	'siproxdusers.xml' => 'http://doc.pfsense.org/index.php/Siproxd_package',
	'open-vm-tools.xml' => 'http://doc.pfsense.org/index.php/Open_VM_Tools_package',
	'arping.xml' => 'http://doc.pfsense.org/index.php/Arping_package',

);

/*
Filename list (2.0 box as of 2009-11-15), entries with help maps should be
removed. Also, files which cannot normally be accessed by a user can
be removed.(e.g. xmlrpc.php)

Below this is a list of .xml files from built-in and add-on packages

	'interfaces.php' => '',
	'interfaces_assign.php' => '',
	'interfaces_bridge.php' => '',
	'interfaces_bridge_edit.php' => '',
	'interfaces_gif.php' => '',
	'interfaces_gif_edit.php' => '',
	'interfaces_gre.php' => '',
	'interfaces_gre_edit.php' => '',
	'interfaces_groups.php' => '',
	'interfaces_groups_edit.php' => '',
	'interfaces_lagg.php' => '',
	'interfaces_lagg_edit.php' => '',
	'interfaces_ppp.php' => '',
	'interfaces_ppp_edit.php' => '',
	'interfaces_qinq.php' => '',
	'interfaces_qinq_edit.php' => '',
	'interfaces_wlan_scan.php' => '',
	'services_dhcp.php' => '',
	'services_dhcp_edit.php' => '',
	'services_dhcp_relay.php' => '',
	'services_dnsmasq.php' => '',
	'services_dnsmasq_domainoverride_edit.php' => '',
	'services_dnsmasq_edit.php' => '',
	'services_dyndns.php' => '',
	'services_dyndns_edit.php' => '',
	'services_igmpproxy.php' => '',
	'services_igmpproxy_edit.php' => '',
	'services_proxyarp.php' => '',
	'services_proxyarp_edit.php' => '',
	'services_rfc2136.php' => '',
	'services_rfc2136_edit.php' => '',
	'services_snmp.php' => '',
	'services_usermanager.php' => '',
	'services_wol.php' => '',
	'services_wol_edit.php' => '',
	'system.php' => '',
	'system_advanced.php' => '',
	'system_advanced_admin.php' => '',
	'system_advanced_create_certs.php' => '',
	'system_advanced_firewall.php' => '',
	'system_advanced_misc.php' => '',
	'system_advanced_network.php' => '',
	'system_advanced_notifications.php' => '',
	'system_advanced_sysctl.php' => '',
	'system_authservers.php' => '',
	'system_camanager.php' => '',
	'system_certmanager.php' => '',
	'system_firmware.php' => '',
	'system_firmware_auto.php' => '',
	'system_firmware_check.php' => '',
	'system_firmware_settings.php' => '',
	'system_gateway_groups.php' => '',
	'system_gateway_groups_edit.php' => '',
	'system_gateways.php' => '',
	'system_gateways_edit.php' => '',
	'system_gateways_settings.php' => '',
	'system_groupmanager.php' => '',
	'system_groupmanager_addprivs.php' => '',
	'system_routes.php' => '',
	'system_routes_edit.php' => '',
	'system_usermanager.php' => '',
	'system_usermanager_addcert.php' => '',
	'system_usermanager_addprivs.php' => '',
	'system_usermanager_settings.php' => '',
	'system_usermanager_settings_ldapacpicker.php' => '',
	'system_usermanager_settings_test.php' => '',
	'vpn_l2tp.php' => '',
	'vpn_l2tp_users.php' => '',
	'vpn_l2tp_users_edit.php' => '',
	'vpn_pppoe.php' => '',
	'vpn_pppoe_users.php' => '',
	'vpn_pppoe_users_edit.php' => '',
	'vpn_pptp.php' => '',
	'vpn_pptp_users.php' => '',
	'vpn_pptp_users_edit.php' => '',

	'olsrd.xml' => '',
	'openntpd.xml' => '',
	'sasyncd.xml' => '',

Package .xml files (some may not be needed)
	'apache_mod_security.xml' => '',
	'apache_mod_security_settings.xml' => '',
	'arpwatch.xml' => '',
	'assp.xml' => '',
	'backup.xml' => '',
	'bsdstats.xml' => '',
	'cron.xml' => '',
	'ddns.xml' => '',
	'denyhosts.xml' => '',
	'dnsblacklist.xml' => '',
	'dyntables.xml' => '',
	'fit123.xml' => '',
	'freeradius.xml' => '',
	'freeradiusclients.xml' => '',
	'freeradiussettings.xml' => '',
	'frickin.xml' => '',
	'haproxy.xml' => '',
	'hula.xml' => '',
	'ifdepd.xml' => '',
	'ifstated.xml' => '',
	'igmpproxy.xml' => '',
	'imspector.xml' => '',
	'lcdproc.xml' => '',
	'lcdproc_screens.xml' => '',
	'lightsquid.xml' => '',
	'messages_de.xml' => '',
	'messages_en.xml' => '',
	'mtr-nox11.xml' => '',
	'netio-newpkg.xml' => '',
	'netio.xml' => '',
	'netioserver-newpkg.xml' => '',
	'netioserver.xml' => '',
	'new_zone_wizard.xml' => '',
	'nmap.xml' => '',
	'notes.xml' => '',
	'nrpe2.xml' => '',
	'nut.xml' => '',
	'per-user-bandwidth-distribution.xml' => '',
	'pfstat.xml' => '',
	'phpmrss.xml' => '',
	'phpsysinfo.xml' => '',
	'powerdns.xml' => '',
	'pure-ftpd.xml' => '',
	'pure-ftpdsettings.xml' => '',
	'quagga.xml' => '',
	'routed.xml' => '',
	'shellcmd.xml' => '',
	'spamd.xml' => '',
	'spamd_outlook.xml' => '',
	'spamd_settings.xml' => '',
	'spamd_whitelist.xml' => '',
	'sshterm.xml' => '',
	'tftp.xml' => '',
	'upclient.xml' => '',
	'viralator.xml' => '',
	'zabbix-agent.xml' => '',

 */

$pagename = "";
/* Check for parameter "page". */
if ($_GET && isset($_GET['page'])) {
	$pagename = $_GET['page'];
}

/* If "page" is not found, check referring URL */
if (empty($pagename)) {
	/* Attempt to parse out filename */
	$uri_split = "";
	preg_match("/\/(.*)\?(.*)/", $_SERVER["HTTP_REFERER"], $uri_split);

	/* If there was no match, there were no parameters, just grab the filename
		Otherwise, use the matched filename from above. */
	if (empty($uri_split[0])) {
		$pagename = ltrim($_SERVER["HTTP_REFERER"], '/');
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
}

/* Using the derived page name, attempt to find in the URL mapping hash */
if (array_key_exists($pagename, $helppages)) {
	$helppage = $helppages[$pagename];
}

/* If we haven't determined a proper page, use a generic help page
	 stating that a given page does not have help yet. */

if (empty($helppage)) {
	$helppage = "http://doc.pfsense.org/index.php/No_Help_Found";

}

/* Redirect to help page. */
header("Location: {$helppage}");

?>