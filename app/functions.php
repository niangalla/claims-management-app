<?php

 function studentCredentials() {
    return filter_var(request('identifiant_student'), FILTER_VALIDATE_EMAIL) ? 'mail' : 'identifiant_student';
}

function adminCredentials() {
    return filter_var(request('identifiant_admin'), FILTER_VALIDATE_EMAIL) ? 'admin_mail' : 'identifiant_admin';
}

?>
