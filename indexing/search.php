<?php
$dir = "indexing/";
$image = "css/images/search2.png";
if (basename(getcwd()) != 'PED-Project'){
    $dir = "../indexing/";
    $image = "../css/images/search2.png";
}
?>

<div id="search">
    <form method="POST" action="<?= $dir ?>search2.php">
        <div id="search_form">
            <div id="search_form_text">
                <input type="text" placeholder="procurar..." required="" name="query" value="<?php if (isset($_POST['query']))
    echo $_POST['query']; ?>"/>
            </div>
            <input type="image" src="<? echo $image;?>"/>
        </div>
    </form>
</div>
