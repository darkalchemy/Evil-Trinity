<?php
/**
 |--------------------------------------------------------------------------|
 |   https://github.com/3evils/                                             |
 |--------------------------------------------------------------------------|
 |   Licence Info: WTFPL                                                    |
 |--------------------------------------------------------------------------|
 |   Copyright (C) 2020 Evil-Trinity                                        |
 |--------------------------------------------------------------------------|
 |   A bittorrent tracker source based on an unreleased U-232               |
 |--------------------------------------------------------------------------|
 |   Project Leaders: AntiMidas,  Seeder                                    |
 |--------------------------------------------------------------------------|
                 _   _   _   _     _   _   _   _   _   _   _
                / \ / \ / \ / \   / \ / \ / \ / \ / \ / \ / \
               | E | v | i | l )-| T | r | i | n | i | t | y )
                \_/ \_/ \_/ \_/   \_/ \_/ \_/ \_/ \_/ \_/ \_/
*/
// === shoutbox 09
if ($CURUSER['opt1'] & user_options::SHOW_SHOUT) {
    $commandbutton = $refreshbutton = $smilebutton = $custombutton = $staffsmiliebutton = '';
    if ($CURUSER['class'] >= UC_STAFF) {
        $staffsmiliebutton.= "
		<span><a class='btn btn-mini' href=\"javascript:PopStaffSmiles('shbox','shbox_text')\"><i class='icon-wrench'></i>&nbsp;{$lang['index_shoutbox_ssmilies']}</a></span>";
    }
    if (get_smile() != '0') $custombutton.= "
	<span><a class='btn btn-mini' href=\"javascript:PopCustomSmiles('shbox','shbox_text')\"><i class='icon-barcode'></i>&nbsp;{$lang['index_shoutbox_csmilies']}</a></span>";
    if ($CURUSER['class'] >= UC_STAFF) {
        $commandbutton = "
		<span><a class='btn btn-mini' href=\"javascript:popUp('shoutbox_commands.php')\"><i class='icon-cog'></i>&nbsp;{$lang['index_shoutbox_commands']}</a></span>\n";
    }
$refreshbutton = "<a href='shoutbox.php' target='shoutbox'>{$lang['index_shoutbox_refresh']}</a>\n";
$smilebutton = "<a href=\"javascript:PopMoreSmiles('shbox','shbox_text')\">{$lang['index_shoutbox_smilies']}</a>\n";
$HTMLOUT.= "<div class='header panel panel-default'>";
$HTMLOUT .= "<div class='panel-heading'><!--<span><a class='btn btn-default' href='{$INSTALLER09['baseurl']}/shoutbox.php?show_shout=1&amp;show=no'>{$lang['index_shoutbox_close']}</a></span>&nbsp;-->";
$HTMLOUT .=  "<label for='checkbox_4' class='text-left'>";
$HTMLOUT.= "{$lang['index_shoutbox_general']}";
$HTMLOUT .= "</label>";
if ($CURUSER['class'] >= UC_STAFF)
{
$HTMLOUT.= "<span class='nav navbar-nav navbar-right'><a class='btn btn-primary btn-sm navbar-btn' style='margin-right:20px;margin-top:-2px;' href='{$INSTALLER09['baseurl']}/staffpanel.php?tool=shistory'>{$lang['index_shoutbox_history']}</a></span>";
}
$HTMLOUT .= "</div>";
$HTMLOUT.= "<div><iframe src='{$INSTALLER09['baseurl']}/auto_shout_scroll.php' width='100%' height='30px' frameborder='0' name='auto_shoutbox' marginwidth='0' marginheight='0'></iframe></div>";
    $HTMLOUT.= "<div class='container-fluid'><br>
<div class=''>";
$HTMLOUT.= "<form action='shoutbox.php' method='get' target='shoutbox' name='shbox' onsubmit='mysubmit()'>
<iframe src='{$INSTALLER09['baseurl']}/shoutbox.php' class='shout-table' name='shoutbox'></iframe>
</div>
   <br>
<div id='dropdown1' class='text-center shouthis collapse in'>
<div class='input-group'>
<div class='input-group-btn dropup'>
<button type=button class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>{$lang['index_shoutbox_shout']}&nbsp;&nbsp;<span class='caret'></span></button>
<ul class='dropdown-menu' role='menu'>
<li>{$commandbutton}</li>
<li>{$staffsmiliebutton}</li>
<li>{$smilebutton}</li>
<li>{$custombutton}</li>
<li>{$refreshbutton}</li>
</ul>
</div>
<input type='text' class='form-control col-md-18' name='shbox_text' placeholder='Shout Text'>
<span class='input-group-btn'>
<input class='btn btn-primary' type='submit' value='{$lang['index_shoutbox_send']}' />
<input type='hidden' name='sent' value='yes' />
</span>
</div>
<a href=\"javascript:SmileIT(':-)','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/smile1.gif' alt='Smile' title='Smile' /></a>
<a href=\"javascript:SmileIT(':smile:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/smile2.gif' alt='Smiling' title='Smiling' /></a>
<a href=\"javascript:SmileIT(':-D','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/grin.gif' alt='Grin' title='Grin' /></a>
<a href=\"javascript:SmileIT(':lol:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/laugh.gif' alt='Laughing' title='Laughing' /></a>
<a href=\"javascript:SmileIT(':w00t:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/w00t.gif' alt='W00t' title='W00t' /></a>
<a href=\"javascript:SmileIT(':blum:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/blum.gif' alt='Rasp' title='Rasp' /></a>
<a href=\"javascript:SmileIT(';-)','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/wink.gif' alt='Wink' title='Wink' /></a>
<a href=\"javascript:SmileIT(':devil:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/devil.gif' alt='Devil' title='Devil' /></a>
<a href=\"javascript:SmileIT(':yawn:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/yawn.gif' alt='Yawn' title='Yawn' /></a>
<a href=\"javascript:SmileIT(':-/','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/confused.gif' alt='Confused' title='Confused' /></a>
<a href=\"javascript:SmileIT(':o)','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/clown.gif' alt='Clown' title='Clown' /></a>
<a href=\"javascript:SmileIT(':innocent:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/innocent.gif' alt='Innocent' title='innocent' /></a>
<a href=\"javascript:SmileIT(':whistle:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/whistle.gif' alt='Whistle' title='Whistle' /></a>
<a href=\"javascript:SmileIT(':unsure:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/unsure.gif' alt='Unsure' title='Unsure' /></a>
<a href=\"javascript:SmileIT(':blush:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/blush.gif' alt='Blush' title='Blush' /></a>
<a href=\"javascript:SmileIT(':hmm:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/hmm.gif' alt='Hmm' title='Hmm' /></a>
<a href=\"javascript:SmileIT(':hmmm:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/hmmm.gif' alt='Hmmm' title='Hmmm' /></a>
<a href=\"javascript:SmileIT(':huh:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/huh.gif' alt='Huh' title='Huh' /></a>
<a href=\"javascript:SmileIT(':look:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/look.gif' alt='Look' title='Look' /></a>
<a href=\"javascript:SmileIT(':rolleyes:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/rolleyes.gif' alt='Roll Eyes' title='Roll Eyes' /></a>
<a href=\"javascript:SmileIT(':kiss:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/kiss.gif' alt='Kiss' title='Kiss' /></a>
<a href=\"javascript:SmileIT(':blink:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/blink.gif' alt='Blink' title='Blink' /></a>
<a href=\"javascript:SmileIT(':baby:','shbox','shbox_text')\"><img src='{$INSTALLER09['pic_base_url']}smilies/baby.gif' alt='Baby' title='Baby' /></a>
 
 
   </form></div></div><div style='display:block;height:20px;'></div></div>\n";
}
if (!($CURUSER['opt1'] & user_options::SHOW_SHOUT)) {
   $HTMLOUT.= "<fieldset class='header'><legend><b>{$lang['index_shoutbox']}</b></legend></fieldset>";
}
//==end 09 shoutbox
// End Class
// End File
