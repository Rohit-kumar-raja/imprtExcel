<?php
if(isset($_POST['submit'])){

$extention=$_FILES['doc']['name'];
$extention=(pathinfo($extention))['extension'];
if($extention=='xl' || $extention=="xls" || $extention=="xlsx" || $extention=="csv"){
    require('./PHPExcel/PHPExcel.php');
    require('./PHPExcel/PHPExcel/IOFactory.php');
    $doc_name=$_FILES['doc']['tmp_name'];
    $obj=PHPExcel_IOFactory::load($doc_name);
    foreach($obj->getWorksheetIterator() as $all_data){
        // all data is the associtive array in the all the data of the excel file
       $number_of_row=$all_data->getHighestRow();
       for($i=2; $i<=$number_of_row; $i++){
        // here 0 and 1 is the number of index or colunmn in excel file 
        // $i is th number of data in rows 
echo $name=$all_data->getCellByColumnAndRow(0,$i)->getValue(); 
echo $email=$all_data->getCellByColumnAndRow(1,$i)->getValue();
echo "<br>";
// here can write the sql query for inserting the data in database

       }
    }

}
else{
    echo "format not mathed";
}

}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="doc">
    <input type="submit" name="submit" id="">
</form>