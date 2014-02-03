<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php $this->load->view('head'); ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <?php echo $content; ?>
            </div>
            <?php $this->load->view('footer'); ?>
        </div>
    </body>
</html>