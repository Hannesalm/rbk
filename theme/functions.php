<?php
/**
 * Theme related functions.
 *
 */

/**
 * Get title for the webpage by concatenating page specific title with site-wide title.
 *
 * @param string $title for this page.
 * @return string/null weather the favicon is defined or not.
 */
function get_title($title) {
    global $Orange;
    return $title . (isset($Orange['title_append']) ? $Orange['title_append'] : null);
}