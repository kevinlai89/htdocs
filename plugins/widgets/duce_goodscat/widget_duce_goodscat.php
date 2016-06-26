<?php

function widget_duce_goodscat(&$setting, &$system) {

    $goodsCat = $virtualCat = $act = array();
    $show_treetype = $setting['show_treetype'];
    $selCat = array("zid" => 0, "current" => 0, "topid" => 0, "lastlevel" => 1);
    $isNode = false;
	//echo "brandshow=".$setting["brandshow"];
    $setting["show"] = ($system->request["action"]["controller"] == "page" && $system->request["action"]["method"] == "index") ? "index" : "";	
    if (RUN_IN == "FRONT_END") {
        $selCat['current'] = $system->duceGoods['current'];
        $selCat['lastlevel'] = $system->duceGoods['lastlevel'];
        $act['controller'] = $system->duceGoods['controller'];
        if (!$system->duceGoods) {
            $request = $system->parserequest();
            $act = $system->parse($request['query']);
            $cat_id = intval($act['args'][0]);
            $selCat['current'] = $cat_id;
            $selCat['lastlevel'] = $act['controller'] == "product" || $act['controller'] == "comment" ? 2 : 1;
            $act['controller'] = $act['controller'];
        }
    }
    if (in_array($setting['ducemenuIndex'], array("ducemenu-5.html", "ducemenu-6.html"))) {
        $selCat['zid'] = 0 < intval($setting['assignid']) ? intval($setting['assignid']): $selCat['current'];
    } else {
        $setting['assignid'] =  - 1;
    }
    if ($show_treetype != 1) {
        $o = $system->loadmodel("goods/productCat");
        $setting['pageDevide'] = $setting['pageDevide'] ? $setting['pageDevide']: 2;
        $setting['view'] = $system->getconf("gallery.default_view");
        $showbrand = true; //$setting['showbrand'] && in_array($setting['ducemenuIndex'], array("ducemenu-2.html", "ducemenu-6.html")) ? true : false;
        $brandGroup = ducedis_getcatlist($goodsCat, $o->gettreelist(), $setting['ducemenu_2_CatDepth'], $showbrand || $setting['ducemenuIndex'] == "ducemenu-9.html", $selCat);
        $zid = in_array($setting['ducemenuIndex'], array("ducemenu-6.html")) && $act['controller'] == "gallery" ? $selCat['topid']: $selCat['zid'];
        if (0 < $zid && 0 < $selCat['zid'] && $setting['assignid'] !=  - 1) {
            $temparr = array();
            foreach($goodsCat as $good) {
                if ($temparr){
					
				} else {
                    if ($good['cat_id'] == $zid) {
                        $selCat['lastlevel'] = 1;
                    }
                    if ($good['cat_id'] == $zid || $good['sub'][$zid] && empty($good['sub'][$zid]['sub'])) {
                        $good['gall'] = $zid;
                        $temparr[] = $good;
                        break;
                    } else if ($good['sub'][$zid] && $good['sub'][$zid]['sub']) {
                        $good['sub'][$zid]['gall'] = $zid;
                        $temparr[] = $good['sub'][$zid];
                    } else {
                        break;
                    }
                }
            }
            $goodsCat = $temparr[0]['sub'] ? $temparr : $goodsCat;
            $isNode = $goodsCat[0] ? true : false;
            if ($isNode) {
                $goodsCat[0]['lastlevel'] = $selCat['lastlevel'];
            }
        }
		foreach($goodsCat as $key => $cat) {
			//echo "key=".$key;
			$goodsCat[$key]["label"] = $setting["catsname"][$key]?$setting["catsname"][$key]:$goodsCat[$key]["label"];
			$goodsCat[$key]["url"] = $setting["resetlink"][$key]?$setting["resetlink"][$key]:$goodsCat[$key]["url"];
		}

    }
    if ($show_treetype) {
        $objCat = $system->loadmodel("goods/virtualcat");
        $selvCat = array("zid" => 0, "current" => 0, "topid" => 0);
        ducedis_getcatlist($virtualCat, $objCat->getmaptree(0, "", $setting['show_virtualid']), $setting['ducemenu_2_CatDepth'], false, $selvCat);
        if ($setting['show_treenode'] == "off") {
            $temparr = array();
            foreach($virtualCat as $d) {
                if ($d['sub']) {
                    foreach($d['sub']as $da) {
                        $temparr[] = $da;
                    }
                }
            }
            $virtualCat = $temparr;
        }
        foreach($virtualCat as $id => $cat) {
            if ($isNode) {
                $goodsCat[0]['sub']["t_".$id] = $cat;
            } else {
                $goodsCat["t_".$id] = $cat;
            }
        }
    }
    if ($brandGroup) {
        $cache = array();
        $file = HOME_DIR."/ducedis_cache_brand.data";
        $cachelife = intval($setting['cachelife']);
        $getcache = __ADMIN__ == "admin" && $setting['refresh'] ? 0 : $cachelife;
        $timestamp = time();
        if ($cachelife && $getcache) {
            $result = json_decode(file_get_contents($file), true);
            if ($timestamp < $result[0]) {
                $cachebrand = $result[1];
            } else {
                $getcache = 0;
            }
        }
        if (!$getcache) {
            $b = $system->loadmodel("goods/brand");
            $brands = array();
            foreach((array)$b->getAll() as $v) {
                $brands[$v['brand_id']] = $v['brand_name'];
            }
        }
		
		$modTag = $system->loadModel( "system/tag" );
		$tags = array();
		foreach((array)$modTag->tagList( "goods" ) as $value) {
			$tags[] = array("id"=>$value['tag_id'], "name"=>$value['tag_name']);
		}

        foreach($brandGroup as $catid => $v) {
            $c_catid = $catid;
            if ($isNode && $goodsCat[0]['cat_id'] == $catid) {
                $catid = 0;
                $c_catid = $goodsCat[0]['cat_id'];
            }
            if ($getcache) {
                $goodsCat[$catid]['brands'] = $brands;
                if (!$catid){

				}
                 else {
                    break;
                }
            } else {
                foreach((array)ducedis_GetCatBrand($v, $o) as $a => $k) {
                    if (!$k['brand_id']){}
                     else {
                        $goodsCat[$catid]['brands'][] = array("id" => $k['brand_id'], "name" => $brands[$k['brand_id']], "plus" => $k['brand_cat']);
                    }
                }
				//每个分类的设定要显示的标签列表
				$ctag = array();
				foreach($tags as $k => $v){
					foreach($setting['goodstag'][$catid] as $cv){
						if($cv == $v['id']){
							$ctag[] = $v;
						}
					}
				}
				$goodsCat[$catid]['tag'] = $ctag;

                if ($cachelife) {
                    $cache[$c_catid] = $goodsCat[$catid]['brands'];
                }
            }
        }
        if ($cachelife && !$getcache) {
            file_put_contents($file, json_encode(array($timestamp + $cachelife, $cache)));
        }
    }
    if ($setting['custommenus'] && is_array($setting['custommenus'])) {
        $newgoodsCat = array();
        $rewrite = intval($system->getconf("system.seo.emuStatic"));
        $baseurl = $system->base_url();
        foreach($setting['custommenus'] as $k => $m) {
            if (trim($m['text'])) {
                $m['url'] = $m['url'] ? preg_replace("/^(\\.\\/)*(\\?)?/es", "('\\1'?'{$baseurl}':'').({$rewrite}?'':'\\2')", trim($m['url'])): $baseurl;
                $cat = array("label" => $m['text'], "url" => $m['url'], "classname" => "cat-custom ".trim($m['classname']));
                if ($m['place']) {
                    if ($isNode) {
                        $goodsCat[0]['sub']["t_".$id] = $cat;
                    } else {
                        $goodsCat["c_".$k] = $cat;
                    }
                } else {
                    $newgoodsCat["c_".$k] = $cat;
                }
            }
        }
        if ($newgoodsCat) {
            $shiftCat = $isNode ? $goodsCat[0]['sub']: $goodsCat;
            foreach($shiftCat as $k => $g) {
                $newgoodsCat[$k] = $g;
            }
            if ($isNode) {
                $goodsCat[0]['sub'] = $newgoodsCat;
            } else {
                return $newgoodsCat;
            }
        }
    }
    //dumpArray($goodsCat);
    return $goodsCat;
}

//-------------------------------------------------------------------------

function dumpArray($vars, $label = '', $return = false) {
    if (ini_get('html_errors')) {
        $content = "<pre>\n";
        if ($label != '') {
            $content .= "<strong>{$label} :</strong>\n";
        }
        $content .= htmlspecialchars(print_r($vars, true));
        $content .= "\n</pre>\n";
    } else {
        $content = $label." :\n".print_r($vars, true);
    }
    if ($return) {
        return $content;
    }
    echo $content;
    return null;
}

//-------------------------------------------------------------------------

function ducedis_getcatlist(&$myData, $data, $CatDepth = 3, $showbrand = false, &$selCat) {
    $brandGroup = array();
    $i = 0;
    for (; $i < count($data); ++$i) {
        $cat_path = $data[$i]['cat_path'];
        $cat_name = $data[$i]['cat_name'];
        $cat_id = $data[$i]['cat_id'];
        if (empty($cat_path) || $cat_path == ",") {
            $myData[$cat_id]['label'] = $cat_name;
            $myData[$cat_id]['cat_id'] = $cat_id;
            $myData[$cat_id]['url'] = $data[$i]['url'];
            if ($showbrand) {
                $brandGroup[$cat_id][$cat_id] = $cat_id;
            }
            if ($selCat['current'] == $cat_id) {
                $myData[$cat_id]['curr'] = "current now";
            }
            if ($selCat['zid'] == $cat_id || !$selCat['zid'] && $selCat['current'] == $cat_id) {
                $selCat['topid'] = $selCat['zid'];
            }
        }
    }
    $i = 0;
    for (; $i < count($data); ++$i) {
        $cat_path = $data[$i]['cat_path'];
        $cat_name = $data[$i]['cat_name'];
        $cat_id = $data[$i]['cat_id'];
        $url = $data[$i]['url'];
        $parent_id = $data[$i]['pid'];
        if (trim($cat_path) == ",") {
            $count = 0;
        } else {
            $count = count(explode(",", $cat_path));
        }
        if ($count == 2) {
            $c_1 = intval($parent_id);
            $c_2 = intval($cat_id);
            $myData[$c_1]['sub'][$c_2]['label'] = $cat_name;
            $myData[$c_1]['sub'][$c_2]['cat_id'] = $cat_id;
            $myData[$c_1]['sub'][$c_2]['url'] = $url;
            if ($showbrand) {
                $brandGroup[$c_1][$c_2] = $c_2;
            }
            if ($selCat['current'] == $c_2) {
                $myData[$c_1]['curr'] = "current";
                $myData[$c_1]['sub'][$c_2]['curr'] = "current1 now";
            }
            if ($selCat['zid'] == $c_2 || !$selCat['zid'] && $selCat['current'] == $c_2) {
                $selCat['topid'] = $c_1;
            }
        }
        if ($count == 3) {
            $tmp = explode(",", $cat_path);
            $c_1 = intval($tmp[0]);
            $c_2 = intval($tmp[1]);
            $c_3 = intval($cat_id);
            $myData[$c_1]['sub'][$c_2]['sub'][$c_3]['label'] = $cat_name;
            $myData[$c_1]['sub'][$c_2]['sub'][$c_3]['cat_id'] = $cat_id;
            $myData[$c_1]['sub'][$c_2]['sub'][$c_3]['url'] = $url;
            if ($showbrand) {
                $brandGroup[$c_1][$c_2] = $c_2;
                $brandGroup[$c_1][$c_3] = $c_3;
            }
            if ($CatDepth == 3) {
                $myData[$c_1]['depth'] = 3;
            }
            if ($selCat['current'] == $c_3) {
                $myData[$c_1]['curr'] = "current";
                $myData[$c_1]['sub'][$c_2]['curr'] = "current1";
                $myData[$c_1]['sub'][$c_2]['sub'][$c_3]['curr'] = "current2 now";
            }
            if ($selCat['zid'] == $c_3 || !$selCat['zid'] && $selCat['current'] == $c_3) {
                $selCat['topid'] = $c_1;
            }
            if ($selCat['zid'] == $c_3) {
                $selCat['zid'] = $c_2;
            }
        }
    }
    return $brandGroup;
}

//-------------------------------------------------------------------------

function ducedis_GetCatBrand($cat_id, $o){
	if($cat_id){
		return $o->db->select("SELECT COUNT(brand_id) as brand_cat,brand_id From sdb_goods where cat_id IN(".implode(',',$cat_id).") AND marketable='true' AND disabled='false' GROUP By brand_id");
	}
	return array();
}

function ducedis_getbrand($cat_id, $o) {
    if ($cat_id) {
        return $o->db->select("SELECT COUNT(brand_id) as brand_cat,brand_id From sdb_goods where cat_id IN(".implode(",", $cat_id).
            ") AND marketable='true' AND disabled='false' GROUP By brand_id");
    }
    return array();
}
?>
