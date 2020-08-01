#include <amxmodx>
#include <amxmisc>
#include <httpx>
/*
Define
*/
#define SITE "localhost"
#define LICENSEKEY "1ec6e653"
#define PLUGINNAME "plugin.amxx"

//Native responsible for checking the license
native CheckLicense();

public plugin_init(){
	register_plugin("Plugin License", "0.4", "BlendeR");
	return PLUGIN_CONTINUE;
}

public plugin_natives()
{
	register_native("CheckLicense", "nat_CheckLicense", 1);
	return PLUGIN_CONTINUE;
}


public nat_CheckLicense()
{
	new szIP[ 33 ],szText[128];
	get_user_ip( 0, szIP, charsmax( szIP ) );
	format(szText, 127, "%s/confirm.php?licen=%s&ip=%s",SITE,LICENSEKEY,szIP);
	server_print szText;
	HTTPX_Download(szText , "", "", "CheckLicense_Handler",(80<<443),REQUEST_GET, "", "");
	return PLUGIN_HANDLED;
}

public CheckLicense_Handler(Index, Error)
{
	new szData[64];
	HTTPX_GetData(szData, 63);
	if (!equal(szData, "true", 4))
	{
		pause("acd", PLUGINNAME, "");//Rename LicensedPlugin.amxx to Your Plugin Name
		server_print("%s - Has lost license !",PLUGINNAME);//Rename Licensed Plugin to Your Plugin Name or delete this line
	}
	else{
		server_print("%s - Has license !",PLUGINNAME);//Rename Licensed Plugin to Your Plugin Name or delete this line
	}
	return PLUGIN_CONTINUE;
}
/* AMXX-Studio Notes - DO NOT MODIFY BELOW HERE
*{\\ rtf1\\ ansi\\ deff0{\\ fonttbl{\\ f0\\ fnil Tahoma;}}\n\\ viewkind4\\ uc1\\ pard\\ lang1045\\ f0\\ fs16 \n\\ par }
*/
