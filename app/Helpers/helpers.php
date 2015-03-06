<?php

/**
 * Redirect to the given url and show important messages.
 *
 * @author dilbadil
 * @param string $message
 * @param string $url
 * @return Redirect
 */
function redirectImportant($url, $message)
{
    return redirect($url)->with([
        'flash_message' => $message,
        'flash_message_important' => true
    ]);
}
