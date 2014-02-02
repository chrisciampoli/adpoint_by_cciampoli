<?php

echo form_open('auth/logout');
echo form_input('logout', 'logout');
echo form_submit('mysubmit', 'Submit Post!');
echo form_close();

?>