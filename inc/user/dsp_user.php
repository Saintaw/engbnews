<?php
$g_name = "No Name";
$g_email = "No Email";
$g_photo = "No Photo";

if (isset($_POST["wc"])&&(trim($_POST["wc"]) !== ""))
    {
    $g_name = trim($_POST["wc"]);
    }
if (isset($_POST["hg"])&&(trim($_POST["hg"]) !== ""))
    {
    $g_email = trim($_POST["hg"]);
    }
if (isset($_POST["Ph"])&&(trim($_POST["Ph"]) !== ""))
    {
    $m_photo = trim($_POST["Ph"]);
    $g_photo = '<img src="' .$m_photo .'"></img>';
    }    
?>


<div class="container ">
	<div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                <div class="card hovercard">
                    <div class="cardheader">

                    </div>
                    <div class="avatar">
                        <?php echo $g_photo; ?>
                    </div>
                    <div class="info">
                        <div class="title">
                            <a target="_blank" href="mailto:<?php echo $g_email; ?>"><?php echo $g_name; ?></a>
                        </div>
                        <div class="desc"><?php echo $g_email; ?></div>
                    </div>

                </div>

            </div>
            <div class="col-md-4"></div>
	</div>
</div>


