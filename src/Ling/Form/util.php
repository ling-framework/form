<?php

// csrf must be default in feature
// if there's session, it automatically check
// and turn on manually by trait
// paginate must be same
// and we need some feature add feature

function generateCsrf() {
    // generate and save to session
}
function csrfField() {
    // generate and save it to session
    return '<input type="hidden" value=""/>';
}