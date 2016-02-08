<?php

class CNavigation
{
    public static function getMenu() {
        $name = null;
        $user = null;
        if(CUser::isAuthenticated()){
            $name = CUser::getName();
            $user = "<li><a href='#'>Användare</a>
                         <ul>
                             <li><a href='add-news.php'>Lägg till nyhet</a></li>
                             <li><a href='#'>Lägg till event</a></li>
                             <li><a href='#'>Lägg till användare</a></li>
                             <li><a href='#'>Ladda upp bilder</a></li>
                             <li><a href='logout.php'>Logga ut</a></li>
                         </ul>
                     </li>
                    ";

        }

        $hem = "<li>
        <a href='index.php?p=hem'>Hem</a>
        <ul>
            <li><a href='login.php'>Logga in (webbredaktör)</a></li>
        </ul>
    </li>";
        if(CUser::isAuthenticated()){
            $hem = "<li>
        <a href='index.php?p=hem'>Hem</a>
    </li>";
        }

        $html = "<nav id='menu-wrap'><ul id=\"menu\">
        $hem
        <li>
        <a href=\"#\">Klubben</a>
        <ul>
            <li>
            <a href=\"#\">Bli medlem</a>
            <ul>
                <li><a href='medlem.php?p=klubben'>Anmälningsformulär</a></li>
            </ul>
            </li>
            <li><a href=\"#\">Styrelse</a></li>
            <li><a href=\"#\">Information</a></li>
            <li><a href=\"#\">Hitta till oss</a></li>
        </ul>
    </li>
        <li><a href=\"#\">Kurser</a></li>
    <li>
        <a href=\"#\">Tävlingar</a>
        <ul>
            <li><a href=\"#\">Tävlingsekipage</a></li>
            <li><a href=\"#\">Månadscupen</a></li>
        </ul>
    </li>
    <li><a href='calender.php'>Kalender</a></li>
    <li><a href='blog.php'>Blogg</a></li>
    <li><a href='galleri.php'>Galleri</a></li>
    $user
    </ul></nav>";


        return $html;
    }

    public static function get_navbar($menu)
    {
        // Keep default options in an array and merge with incoming options that can override the defaults.
        $default = array(
            'id'          => null,
            'class'       => null,
            'wrapper'     => 'nav',
            'create_url'  => function ($url) {
                return $url;
            },
        );
        $menu = array_replace_recursive($default, $menu);

        // Function to create urls
        $createUrl = $menu['create_url'];

        // Create the ul li menu from the array, use an anonomous recursive function that returns an array of values.
        $createMenu = function ($items, $callback) use (&$createMenu, $createUrl) {

            $html = null;
            $hasItemIsSelected = false;

            foreach ($items as $item) {

                // has submenu, call recursivly and keep track on if the submenu has a selected item in it.
                $submenu        = null;
                $selectedParent = null;

                if (isset($item['submenu'])) {
                    list($submenu, $selectedParent) = $createMenu($item['submenu']['items'], $callback);
                    $selectedParent = $selectedParent
                        ? "selected-parent "
                        : null;
                }

                // Check if the current menuitem is selected
                $selected = $callback($item['url'])
                    ? "selected "
                    : null;

                // Is there a class set for this item, then use it
                $class = isset($item['class']) && ! is_null($item['class'])
                    ? $item['class']
                    : null;

                // Prepare the class-attribute, if used
                $class = ($selected || $selectedParent || $class)
                    ? " class='{$selected}{$selectedParent}{$class}' "
                    : null;

                // Add the menu item
                $url = $createUrl($item['url']);
                $html .= "\n<li{$class}><a href='{$url}'>{$item['text']}</a><ul>{$submenu}</ul></li>\n";

                // To remember there is selected children when going up the menu hierarchy
                if ($selected) {
                    $hasItemIsSelected = true;
                }
            }

            // Return the menu
            return array($html, $hasItemIsSelected);
        };

        // Call the anonomous function to create the menu, and submenues if any.
        list($html, $ignore) = $createMenu($menu['items'], $menu['callback']);


        // Set the id & class element, only if it exists in the menu-array
        $id      = isset($menu['id'])    ? " id='{$menu['id']}'"       : null;
        $class   = isset($menu['class']) ? " class='{$menu['class']}'" : null;
        $wrapper = $menu['wrapper'];

        return "\n<{$wrapper}{$id}{$class}><ul id='menu'>{$html}</ul></{$wrapper}>\n";
    }
};
