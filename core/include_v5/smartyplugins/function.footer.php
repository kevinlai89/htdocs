<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function tpl_function_footer( $params, &$smarty )
{
	global $system;
				$system =& $system;
				$output =& $system->loadModel( "system/frontend" );
				$tmpdata = $system->getConf( "im.setting" );
				$data = unserialize( $tmpdata );
				$theme_dir = $system->base_url( )."themes/".$output->theme;
				echo $smarty->_fetch_compile_include( "shop:common/footer.html", array(
								"theme_dir" => $theme_dir,
								"certtext" => "<a href=\"http://www.miibeian.gov.cn/ \" target=\"blank\">".$system->getConf( "site.certtext" )."</a>",
								"mini_cart" => $system->getConf( "site.buy.target" ) == 3,
								"preview_theme" => $system->in_preview_theme,
								"im_setting" => $data,
								"system_url" => $system->base_url( ),
								"stateString" => "cron=".urlencode( $system->request['action']['controller'].":".$system->request['action']['method'] )."&p=".urlencode( $system->request['action']['args'][0] )
				) );
				if ( constant( "SHOP_DEVELOPER" ) )
				{
								$html .= $system->_debugger['log'];
				}
				if ( $system->getConf( "shopex.wss.show" ) )
				{
								$wssjs = $system->getConf( "shopex.wss.js" );
				}
				if ( $system->getConf( "certificate.channel.status" ) )
				{
								$channel = $system->getConf( "certificate.channel.service" )."<a href=\"".$system->getConf( "certificate.channel.url" )."\" target=\"_blank\">".$system->getConf( "certificate.channel.name" );
								$channel .= "</a>";
				}
				if ( $system->getConf( "site.shopex_certify" ) == 0 )
				{
								$ref = $_SERVER['HTTP_HOST'];
								$check = md5( $ref."ShopEx@Store" );
								$str = urlencode( $system->getConf( "certificate.str" ) );
								if ( !$str )
								{
												$str = urlencode( __( "无" ) );
								}
								if ( constant( "SAAS_MODE" ) )
								{
												$versionStr = "";
								}
								else
								{
												$versionStr = "v".$system->_app_version;
								}
								if ( $system->use_gzip )
								{
												$gzip = "enabled";
								}
								else
								{
												$gzip = "disabled";
								}
								$themeFoot = "<div class=\"themefoot\">".$system->getConf( "system.foot_edit" )."</div>";
								$PoweredStr = "<div style=\"font-family:Verdana;line-height:20px!important;height:auto!important;font-size:11px!important;text-align:center;overflow:none!important;text-indent:0!important;\">";
								if ( $system->getConf( "certificate.auth_type" ) == "commercial" )
								{
												$greencard = $system->getConf( "store.greencard" );
												if ( !isset( $greencard ) || $greencard )
												{
																$PoweredStr .= "<a href='http://service.shopex.cn/show/certinfo.php?certi_id=".$system->getConf( "certificate.id" )."&url=".rawurlencode( $system->base_url( ) )."' target='_blank'><img src='statics/bottom-authorize.gif'></a><br>";
												}
								}
								//$PoweredStr .= "<a href=\"http://store.shopex.cn/rating/store_detail.php?ref=".$ref."&check=".$check."&str=".$str."\" target=\"_blank\" style=\"color:#666;text-decoration:none;cursor:pointer\">";
								//$PoweredStr .= "Powered&nbsp;by&nbsp;<b style=\"color:#5c719e\">Shop</b><b style=\"color:#f39000\">Ex</b>";
								//$PoweredStr .= "</a>";
								//$PoweredStr .= "<span style=\"font-size:9px;\">&nbsp;".$versionStr."</span>";
								//$PoweredStr .= "<span style=\"color:#999;display:none\">&nbsp|Gzip ".$gzip."</span>&nbsp;";
								if ( $channel )
								{
												$PoweredStr .= "<br/><span>".$channel."</span>&nbsp;";
								}
								if ( $system->getConf( "site.certtext" ) )
								{
												$PoweredStr .= "<a href=\"http://www.miibeian.gov.cn/\" target=\"blank\" style=\"color:#666;text-decoration:none;cursor:pointer;display:block;\" class=\"textcenter\">".$system->getConf( "site.certtext" )."</a>";
								}
								if ( $wssjs )
								{
												$PoweredStr .= "<span style=\"display:none\">".$wssjs."</span>";
								}
								$PoweredStr .= "</div>";
				}
				return $html.$themeFoot.$PoweredStr;
}

?>
