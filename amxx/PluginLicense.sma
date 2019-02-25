#include <amxmodx>
#include <amxmisc>
#include <http2>

//Native responsible for checking the license
native CheckLicense();

public plugin_init()
{
	register_plugin("Plugin License", "0.3", "BlendeR");
	return PLUGIN_CONTINUE;
}

public plugin_natives()
{
	register_native("CheckLicense", "nat_CheckLicense", 1);
	return PLUGIN_CONTINUE;
}


public nat_CheckLicense()
{
	//Change YOURDOMAIN.NET to your domain, and LICENSEID to license id writed to txt
	HTTP2_Download("YOURDOMAIN.NET/?licen=LICENSEID", "", "", "CheckLicense_Handler",(80<<443),REQUEST_GET, "", "");
	return PLUGIN_HANDLED;
}

public CheckLicense_Handler(Index, Error)
{
	new szData[64];
	new iLen = 0;
	HTTP2_getData(szData, 63, iLen);
	if (!equal(szData, "true", 4))
	{
		pause("acd", "LicensedPlugin.amxx", "");//Rename LicensedPlugin.amxx to Your Plugin Name
		server_print("Licensed Plugin - Has lost license !");//Rename Licensed Plugin to Your Plugin Name or delete this line
	}
	return PLUGIN_CONTINUE;
}
/* AMXX-Studio Notes - DO NOT MODIFY BELOW HERE
*{\\ rtf1\\ ansi\\ deff0{\\ fonttbl{\\ f0\\ fnil Tahoma;}}\n\\ viewkind4\\ uc1\\ pard\\ lang1045\\ f0\\ fs16 \n\\ par }
*/
