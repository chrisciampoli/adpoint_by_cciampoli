<?php

echo "<pre>" . print_r($styles, true) . "</pre>";
die();
?>
<?php $this->load->view('manager/head', $styles); ?>
<body>
    <?php $this->load->view('manager/navigation/nav');?>
    <?php echo $content;?>
    <?php $this->load->view('manager/scripts', $scripts); ?>
</body>