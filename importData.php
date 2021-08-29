<?php
if(isset($_POST['submit'])){
$doc_name=$_FILES;
echo "<pre>";
print_r($doc_name);
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="doc">
    <input type="submit" name="submit" id="">
</form>