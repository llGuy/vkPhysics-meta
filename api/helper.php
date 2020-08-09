<?php

/* Generates a random user tag for a user
 * Users will store this user tag which will enable them to play the 
 * game without having to sign in each time they launch the game */
function generate_user_tag() {
    return random_int(1, 1000000);
}

?>
