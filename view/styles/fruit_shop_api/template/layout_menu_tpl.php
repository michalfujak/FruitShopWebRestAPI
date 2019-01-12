<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.0.000
*  @copyright     Michal Fujak - Programator
*  @framework     n/a
*  @license       http://www.dev-droid.sk
*  @this website  http://www.android.dev-droid.sk [ Web urceni pre FruitShop Android application ]
*  @Copyring      14.12.2018 20:00
*  @File          layout_menu_tpl.php  [ TEMPLATE ]
*  @Update        edit:    [n/a][n/a]  version[n/a] [n/a]
*/

?>

<?php
// Index menu
?>
<!-- view white line starting -->
<div class="div_white">
    <div class="div_white_empty">
        <!-- empty element -->
    </div>
</div>
<!-- view logo api -->
<div class="div_menu_logo_first">
    <div class="div_menu_border_logo_first">
         <table align="center" cellpadding="0" cellspacing="0" style="width: 1280px; height: 150px">
             <tr>
                 <!-- Content menu template logo -->
                 <td class="menu_logo_table_td_logo_images">
                     <img src="./view/styles/fruit_shop_api/images/fruit_shop_api_logo.png" title="" />
                 </td>
                 <!-- Content menu template search -->
                 <td class="menu_logo_table_td_component_search">
                     <div class="menu_search_div">
                         <!-- Form search -->
                         <form class="menu_search_form" method="post" action="" >
                             <div class="menu_search_form_div_position">
                                 <table align="center" cellspacing="0" cellpadding="0" style="width: auto; height: 30px" >
                                     <tr>
                                         <!-- Array textfield METHOD=POST -->
                                         <td class="menu_search_table_td1_cell_textfield">
                                             <div class="menu_search_table_td_cell_textfield_div">
                                                 <input type="text" name="menu_search_textfield" class="menu_search_textfield" />
                                             </div>
                                         </td>
                                         <!-- Array submit METHOD=POST -->
                                         <td class="menu_search_table_td2_cell_submit">
                                             <div class="menu_search_table_td2_cell_submit_div">
                                                 <input type="submit" name="menu_search_submit" class="menu_search_submit" value="Hladaj" />
                                             </div>
                                         </td>
                                     </tr>
                                 </table>
                             </div>
                         </form>
                     </div>
                 </td>
                 <!-- Content menu template user info -->
                 <td class="menu_logo_table_td_component_profile">
                     <?php // Insert menu progile view ?>
                     <div class="div_basic_profile_pisition">
                         <table align="center" cellpadding="0" cellspacing="0" style="width: 396px; height: 144px">
                             <tr>
                                 <!-- Content profile user image avatar -->
                                 <td class="profile_basic_table_td1_view_images">
                                     <!-- Table center for img avatar and rank -->
                                     <table align="center" cellpadding="0" cellspacing="0" style="width: 150px; height: 144px">
                                         <!-- Avatar row -->
                                         <tr>
                                             <td class="profile_user_basic_table_td_avatar_img">
                                                 <div class="div_profile_img_avatar">
                                                     <img src="./images/upload/host.png" alt="" title="avatar" id="profile_img_avatar_images" />
                                                 </div>
                                             </td>
                                         </tr>
                                         <!-- Rank row -->
                                         <tr>
                                             <td class="profile_user_basic_table_td_rank">
                                                 <p class="profile_user_basic_table_td_rank_header_message_p">Host</p>
                                             </td>
                                         </tr>
                                     </table>
                                 </td>
                                 <!-- Content profile user ( Basic menu cascade ) -->
                                 <td class="profile_basic_table_td2_view_information">
                                     <div class="div_table_basic_slider_menu_items">
                                         <!-- Tables -->
                                         <table align="left" cellpadding="0" cellspacing="0" style="width: 246px; height: 144px" >
                                             <tr>
                                                 <td class="profile_select_this_table_td_row">
                                                     <div class="div_profile_select_this_table_td_row_item">
                                                         <table align="center" cellspacing="0" cellpadding="0" style="width: auto; height: 28px">
                                                             <tr>
                                                                 <!-- cascade menu, icon images -->
                                                                 <td class="table_td_items_img">
                                                                     <div class="div_table_td_items_img">
                                                                         <img class="div_table_td_items_img_images" src="./view/styles/fruit_shop_api/images/icons/user.png" alt="" title="" />
                                                                     </div>
                                                                 </td>
                                                                 <!-- cascade menu, string header -->
                                                                 <td class="table_td_items_header">
                                                                     <p class="text_profile_basic_items_header">Uzivatel: </p>
                                                                 </td>
                                                                 <!-- cascade menu, string content -->
                                                                 <td class="table_td_items_content">
                                                                     <p class="text_profile_basic_items_content">Anonym</p>
                                                                 </td>
                                                             </tr>
                                                         </table>
                                                     </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="profile_select_this_table_td_row">
                                                     <div class="div_profile_select_this_table_td_row_item">
                                                         <table align="center" cellspacing="0" cellpadding="0" style="width: auto; height: 28px">
                                                             <tr>
                                                                 <!-- cascade menu, icon images -->
                                                                 <td class="table_td_items_img">
                                                                     <div class="div_table_td_items_img">
                                                                         <img class="div_table_td_items_img_images" src="./view/styles/fruit_shop_api/images/icons/ip_computer.png" alt="" title="" />
                                                                     </div>
                                                                 </td>
                                                                 <!-- cascade menu, string header -->
                                                                 <td class="table_td_items_header">
                                                                     <p class="text_profile_basic_items_header">Ip: </p>
                                                                 </td>
                                                                 <!-- cascade menu, string content -->
                                                                 <td class="table_td_items_content">
                                                                     <p class="text_profile_basic_items_content"><?php print $_SERVER['REMOTE_ADDR']; ?></p>
                                                                 </td>
                                                             </tr>
                                                         </table>
                                                     </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="profile_select_this_table_td_row">
                                                     <div class="div_profile_select_this_table_td_row_item">
                                                         <table align="center" cellspacing="0" cellpadding="0" style="width: auto; height: 28px">
                                                             <tr>
                                                                 <!-- cascade menu, icon images -->
                                                                 <td class="table_td_items_img">
                                                                     <div class="div_table_td_items_img">
                                                                         <img class="div_table_td_items_img_images" src="./view/styles/fruit_shop_api/images/icons/mail.png" alt="" title="" />
                                                                     </div>
                                                                 </td>
                                                                 <!-- cascade menu, string header -->
                                                                 <td class="table_td_items_header">
                                                                     <p class="text_profile_basic_items_header">Spravy: </p>
                                                                 </td>
                                                                 <!-- cascade menu, string content -->
                                                                 <td class="table_td_items_content">
                                                                     <p class="text_profile_basic_items_content">[ n/a ]</p>
                                                                 </td>
                                                             </tr>
                                                         </table>
                                                     </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="profile_select_this_table_td_row">
                                                     <div class="div_profile_select_this_table_td_row_item">
                                                         <table align="center" cellspacing="0" cellpadding="0" style="width: auto; height: 28px">
                                                             <tr>
                                                                 <!-- cascade menu, icon images -->
                                                                 <td class="table_td_items_img">
                                                                     <div class="div_table_td_items_img">
                                                                         <img class="div_table_td_items_img_images" src="./view/styles/fruit_shop_api/images/icons/notification.png" alt="" title="" />
                                                                     </div>
                                                                 </td>
                                                                 <!-- cascade menu, string header -->
                                                                 <td class="table_td_items_header">
                                                                     <p class="text_profile_basic_items_header">Notifikacie: </p>
                                                                 </td>
                                                                 <!-- cascade menu, string content -->
                                                                 <td class="table_td_items_content">
                                                                     <p class="text_profile_basic_items_content">[ 0 ]</p>
                                                                 </td>
                                                             </tr>
                                                         </table>
                                                     </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="profile_select_this_table_td_row">
                                                     <div class="div_profile_select_this_table_td_row_item">
                                                         <table align="center" cellspacing="0" cellpadding="0" style="width: auto; height: 28px">
                                                             <tr>
                                                                 <!-- cascade menu, icon images -->
                                                                 <td class="table_td_items_img">
                                                                     <div class="div_table_td_items_img">
                                                                         <img class="div_table_td_items_img_images" src="./view/styles/fruit_shop_api/images/icons/profile.png" alt="" title="" />
                                                                     </div>
                                                                 </td>
                                                                 <!-- cascade menu, string header -->
                                                                 <td class="table_td_items_header">
                                                                     <p class="text_profile_basic_items_header">Prihlasenie </p>
                                                                 </td>
                                                                 <!-- cascade menu, string content -->
                                                                 <td class="table_td_items_content">
                                                                     <p class="text_profile_basic_items_content">Registracia</p>
                                                                 </td>
                                                             </tr>
                                                         </table>
                                                     </div>
                                                 </td>
                                             </tr>
                                         </table>
                                     </div>
                                 </td>
                             </tr>
                         </table>
                     </div>
                 </td>
             </tr>
         </table>
    </div>
</div>
<!-- DIV EMPTY 20PX -->
<div class="empty_menu_slider">
    <!-- EMPTY -->
</div>
<!-- View slidermenu ul li  -->
<div class="menu_slidermenu_static" align="center">
    <table align="center" cellpadding="0" cellspacing="0" style="width: 1280px; height: 50px">
        <tr>
            <td class="menu_slidermenu_td_left">
                <!-- LEFT OPACITY -->
            </td>
            <td class="menu_slidermenu_td_center">
                <div class="menu_slidermenu_td_center_div">
                    <ul>
                        <!-- Index -->
                        <li>
                            <div class="menu_slidermenu_ul_li_div_button">
                                Uvod
                            </div>
                        </li>
                        <!-- News -->
                        <li>
                            <div class="menu_slidermenu_ul_li_div_button">
                                Novinky
                            </div>
                        </li>
                        <!-- Aplikacie -->
                        <li>
                            <div class="menu_slidermenu_ul_li_div_button">
                                Aplikacie
                            </div>
                        </li>
                        <!-- Aplication data -->
                        <li>
                            <div class="menu_slidermenu_ul_li_div_button">
                                Aplikacne data
                            </div>
                        </li>
                        <!-- Servers -->
                        <li>
                            <div class="menu_slidermenu_ul_li_div_button">
                                Servery
                            </div>
                        </li>
                        <!-- Maps webSite -->
                        <li>
                            <div class="menu_slidermenu_ul_li_div_button">
                                Mapa stranky
                            </div>
                        </li>
                        <!-- Contact -->
                        <li>
                            <div class="menu_slidermenu_ul_li_div_button">
                                Kontakt
                            </div>
                        </li>
                    </ul>
                </div>
            </td>
            <td class="menu_slidermenu_td_right">
                <!-- RIGHT OPACITY -->
            </td>
        </tr>
    </table>
</div>




























