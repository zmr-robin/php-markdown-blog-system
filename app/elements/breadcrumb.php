<?php
function breadcrumb($siteURL, $blogTitle, $blogURL){
    $breadcrumb =  "
<div class='header'>
    <h1>PMBS</h1>
    <div class='breadcrumb'>
        <p>
            ><span><a href='$siteURL'>Home</a></span>
            ><span><a href='{$siteURL}blog/$blogURL'>$blogTitle</a></span></p>
    </div>
</div>
    ";
    return $breadcrumb;
}
