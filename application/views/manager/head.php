<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="<?php echo base_url('public/js/main.js'); ?>"></script>
        <style>

/*F TABLE*/
table.f {font-size:11px; margin:10px 0 0px 0; width:100%; background:whitesmoke; border-collapse:collapse; color:#29509E; cursor:default;}

table.f tr {color:#777777; font-size:11px;}
table.f tr:hover {color:#777777; background-color:#CCDDEE;}
table.f tr.none:hover {background:whitesmoke; color:#777777;}

table.f tr#header_controls{background-color:#eeeeee;}
table.f tr#header_controls:hover{color:#555555; background-color:#eeeeee;}
table.f tr#header_controls th{background-color:#eee; background-image:none; border:1px solid #bbb; padding:4px 0;}

a.up_sort{background:url("/public/images/admin/sort_arrows2.png") no-repeat -18px -10px; position:absolute; top:1px; right:14px; height:12px; width:13px; /* border:1px solid blue; */}
a.up_sort.sort_selected{background-position:0 -10px;}
a.up_sort:hover{background-position:0 -10px;}
a.down_sort{background:url("/public/images/admin/sort_arrows2.png") no-repeat -18px 4px; position:absolute; top:0px; right:2px; height:12px; width:13px; /* border:1px solid green; */}
a.down_sort.sort_selected{background-position:0 4px;}
a.down_sort:hover{background-position:0 4px;}
table.f th a.sort_link{color:#555;}

#content input#help_button_x1{background:#ddd url(/public/images/admin/book.png) no-repeat 5px 4px; font-weight:bold; padding:4px 4px 3px 24px; margin:0 7px 0 0; border:1px solid #aaa;}
#content input#help_button_x1:hover{background-color:#ccc; border:1px solid #aaa;}
#content input#add_button_x1{background:#BDCFF3 url(/public/images/admin/add2.png) no-repeat 3px 4px; font-weight:bold; padding:4px 4px 3px 17px; border:1px solid #7997D5;}
#content input#add_button_x1:hover{background-color:#A2B8E5; border:1px solid #7997D5;}

div#page_box{float:left;}
div#per_page_box{float:left; margin:0 0 0 10px; padding:2px 0 0 0;}
div#per_page_box select{font-size:11px;}
div#header_controls_box{float:right; margin:0px 8px 0px 0;}

table.f tr#ft_header {background:#778899; color:#3D54A4;}
/*table.ftable tr#ft_header:hover{background: #778899; color: #3D54A4;}*/
table.f tr.odd {background:#E8E8E8;}
table.f tr.odd:hover {color:#777777; background:#CCDDEE;}

table.f tr.data_selected{background-color:#CCDDEE;}
table.f tr.odd.data_selected{background-color:#CCDDEE;}
table.f tr.new_row{background-color:#f1e5d7;}

#content table.f th{font-size:11px; color:#555; background:-moz-linear-gradient(center top , #eee 0%, #ccc 50%) repeat scroll 0 0 transparent; background:-webkit-gradient(linear, 0 0, 0 100%, from(#eee), to(#ccc));}
table.f th {text-align:center; border:1px silver solid; padding:2px 0;  width:120px; text-align:center;}

table.f td {border:1px silver solid; padding:4px 0; width:120px; text-align:center;}
table.f td.sub_row{text-align:left; background-color:#d2d2d2;}
table.f td.sub_row:hover{background-color:#cccccc;}

table.f td.row_summary{text-align:left; height:auto; font-size:11px;}
table.f td.row_summary div.td_div{float:left; height:auto; width:215px; overflow:hidden;}
table.f td.row_summary div.td_div a{text-decoration:underline;}
#content table.f td.row_summary ul{list-style-type:none; font-size:11px; padding:12px 0 15px 15px;}
#content table.f td.row_summary ul li{margin:0px 0 2px 0;}

table.f th.none, table.f td.none {border:1px silver solid;	width:auto;	padding:0.2em;	padding-left:20px;	padding-right:20px;	white-space:nowrap;	text-align:left;}
table.f caption {margin-left:inherit; margin-right:inherit;}
table.f td#end {width:440px; text-align:left;}

table#jtable th {background-color:#888888;}
table#jtable.f tr:hover {background:#4682B4; color:#F5F5F5;}
tr.row_error{background-color:#f1d1d1;}
table.f td.td_error{color:#aaaaaa; border:1px solid #efd1d1;}

table.f th.w50{width:50px;}
table.f th.w60{width:60px;}
table.f th.w70{width:70px;}
table.f th.w80{width:80px;}
table.f th.w90{width:90px;}
table.f th.w100{width:100px;}
table.f th.w110{width:110px;}
table.f th.w120{width:120px;}
table.f th.w130{width:130px;}
table.f th.w140{width:140px;}
table.f th.w150{width:150px;}
table.f th.w160{width:160px;}
table.f th.w170{width:170px;}
table.f th.w180{width:180px;}
table.f th.w190{width:190px;}
table.f th.w200{width:200px;}
table.f th.w210{width:210px;}
table.f th.w220{width:220px;}
table.f th.w230{width:230px;}
table.f th.w240{width:240px;}
table.f th.w250{width:250px;}


/*table links*/
tr#header_controls div.page_links{padding:2px 0 0 0;}
.page_links{padding-top:8px; display:block; text-align:left; height:22px; line-height:21px; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:normal;}
.page_links b{padding:2px 7px; border-radius:3px; margin-left:7px; background-color:#A2B8E5; border:1px solid #5473b1; font-family:Arial, Helvetica, sans-serif; text-decoration:none; color:#4F5155; cursor:default;} /* #7d97cb */
.page_links a:link, .page_links a:visited{padding:2px 7px; border-radius:3px; border:1px solid silver; margin-left:7px; font-family:Arial, Helvetica, sans-serif; text-decoration:none; background-color:#F5F5F5; width:22px; color:#666666; font-weight:bold;} /* color:#002166; font-weight:normal; */
.page_links a:hover{background-color:#A2B8E5; border:1px solid #5473b1; color:#4F5155;}

/*summary count*/
div.t_summary{font-size:10px;}

/*no results*/
div.no_results{background-color:#bfbfbf; padding:3px 0;}







/* DISCOUNTS */
#content table.discount_t1{border-spacing:0; border-collapse:collapse;}
#content table.discount_t1 th{font-size:11px; background:#c4c4c4; border:1px solid #aaa; color:#333; text-align:center;}
#content table.discount_t1 td{font-size:11px; border:1px solid #aaa; padding:2px; text-align:center;}

#content table.discount_t1 input{font-size:11px;}
#content th.value_val{width:100px;}
#content th.discount_val{width:70px;}
#content td.value_val{}
#content td.discount_val{}
#content td.value_val input{width:90px;}
#content td.discount_val input{width:60px;}

#content table.discount_t1 td a.add_b1{border:1px solid #999999; color:#444; padding:3px 5px 3px 16px; border-radius:3px; float:left; background:#C2C2C2 url('/public/images/admin/add.png') no-repeat 2px 4px;}

#content table.discount_t1 tr.d_even1{background-color:#bbb;}
#content table.discount_t1 tr.d_odd1{background-color:#c2c2c2;}

div.add_form div.discount_add1{float:left; /* border:1px solid purple; */ width:240px;}

div#values_x1{/* border:1px solid purple; */ float:left; width:240px;}
div#values_x1 label{padding:0; width:90px; color:#4F5155;}
div#values_x1 input{width:114px; font-size:11px;}

div#design_x1{/* border:1px solid orange; */ float:left; width:240px;}
div#design_x1 label{padding:0; width:90px; color:#4F5155;}
div#design_x1 select{width:120px; font-size:11px;}

div#design_x2{/* border:1px solid orange; */ float:left; width:240px;}
div#design_x2 label{padding:0; width:90px; color:#4F5155;}
div#design_x2 select{width:120px; font-size:11px;}

div#cardtype_x1{/* border:1px solid yellow; */ float:left; width:240px;}
div#cardtype_x1 label{padding:0; width:90px; color:#4F5155;}
div#cardtype_x1 select{width:120px; font-size:11px;}

div#cardtype_x2{float:left; width:240px;}
div#cardtype_x2 label{padding:0; width:90px; color:#4F5155;}
div#cardtype_x2 select{width:120px; font-size:11px;}

div#theme_opener{cursor:pointer; border:1px solid #bbb; background:#ddd; float:left; border-radius:3px;}
div#theme_opener a{display:block; padding:0 8px;}

div#theme_opener_plastic{cursor:pointer; border:1px solid #bbb; background:#ddd; float:left; border-radius:3px;}
div#theme_opener_plastic a{display:block; padding:0 8px;}

div#theme_hold_out{display:none;}
div#theme_holder{width:600px; height:auto; background:#ddd; border:1px solid #bbb; overflow:hidden; padding:5px; border-radius:0px;}
div.t_hold_in{cursor:pointer; text-align:center; font-size:10px; padding:3px 0 0 0; width:110px; height:78px; text-align:center; margin:2px; float:left; background:#eee; border:1px solid #bbb; border-radius:3px;}
div.t_hold_in:active{border:1px solid #aaa; background:#ddd;}






table.f_light{border-collapse:collapse; font-size:11px;}
table.f_light th{border:1px solid #ccc; background-color:#f6f6f6; padding:1px 4px 1px 10px; text-align:left;}
table.f_light th.j_right{text-align:right; padding-right:4px;}
table.f_light td{border:1px solid #ccc; padding:1px 10px;}
table.f_light td.j_right{text-align:right; padding-right:8px;}
table.f_light tr{background-color:#efefef;}
table.f_light tr.odd{background-color:#e2e2e2;}
















        </style>
        <title>Swift Schedules</title>

    </head>