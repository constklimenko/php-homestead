

<form enctype="multipart/form-data" action="/parse/"  method="post">
    <input type="hidden" name="MAX_FILESIZE" value="500000">

    <input type="file" name="userfile">
    <input type="submit">

</form>


<?php
foreach ($data as $item){
    ?>
    <a href="<?=str_replace('/home/vagrant/code/public', '', $item['URL'])?>">
        <img src="/<?=$item['IMG_PATH'];?>"  style="width: 250px;height:auto;">
    </a>
<?php
}