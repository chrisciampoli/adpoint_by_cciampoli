<?php 
$data['styles'] = $styles;
$data['scripts'] = $scripts;
?>
<?php $this->load->view('manager/head', $data); ?>
<body>
    <?php $this->load->view('manager/navigation/nav');?>
    <?php echo $content;?>
    <?php $this->load->view('manager/scripts', $data); ?>
</body>