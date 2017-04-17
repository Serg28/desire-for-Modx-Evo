//<?php
/**
 * desire
 *
 * Список желаный
 *
 * @category    plugin
 * @version     0.1
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal    @properties &active=Клас который вказует что елемент в сравнении;string;active &desireSelecto=селектор елементов для добавления;string;.to-desire // &desireCount=Блок с количеством елементов ;string;#desire-count &storage=Где храниться информация ;string;cookie &js=Покдлючать js;string;1
 * @internal    @events OnWebPageInit,OnPageNotFound
 * @internal    @modx_category shop
 * @internal    @legacy_names desire
 * @internal    @installset base
 *
 * @author Dzhuryn Volodymyr / updated: 2017-04-09


 */


/*

&active=Клас который вказует что елемент в сравнении;string;active
&desireSelecto=селектор елементов для добавления;string;.to-desire //
&desireCount=Блок с количеством елементов ;string;#desire-count
&storage=Где храниться информация ;string;cookie
&js=Покдлючать js;string;1

*/


require MODX_BASE_PATH.'assets/snippets/desire/plugin.desire.php';