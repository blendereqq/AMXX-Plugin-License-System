#include <amxmodx>
#include <amxmisc>

native CheckLicense();


public plugin_init() {
	if (!CheckLicense())
	{
		register_plugin("Example Licensed Plug-In - OFF", "1.0", "BlendeR");
		server_print("Example Licensed Plug-In - License not valid!");
	}
	register_plugin("Example Licensed Plug-In", "1.0", "BlendeR");
	//Code Here....
}