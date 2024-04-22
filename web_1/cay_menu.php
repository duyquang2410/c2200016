<?php
include_once("conn.php");
$query = "SELECT MA_DM, TEN_DM, PARENT FROM danhmuc ORDER BY PARENT ASC, TEN_DM";
$result = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));

$menus = array(
    'items' => array(),
    'parents' => array()
);

while ($items = mysqli_fetch_assoc($result)) {
    $menus['items'][$items['MA_DM']] = $items;
    $menus['parents'][$items['PARENT']][] = $items['MA_DM'];
}

function createMenu($parent, $menu)
{
    $html = "";
    if (isset($menu['parents'][$parent])) {
        foreach ($menu['parents'][$parent] as $itemId) {
            if (!isset($menu['parents'][$itemId])) {
                $html .= "<li> 
                         <a href='products.php?id=" . $menu['items'][$itemId]['MA_DM'] . "'>" . $menu['items'][$itemId]['TEN_DM'] . "</a> 
                     </li>";
            }
            if (isset($menu['parents'][$itemId])) {
                $html .= "<li class='dropdown'> 
                  <a class='dropdown-toggle' data-toggle='dropdown' href='products.php?id=" . $menu['items'][$itemId]['MA_DM'] . "'>" . $menu['items'][$itemId]['TEN_DM'] .  "</a>";
                $html .= '<ul class="dropdown-menu">';
                $html .= createMenu($itemId, $menu);
                $html .= '</ul>';

                $html .= "</li>";
            }
        }
    }
    return $html;
}
?>
