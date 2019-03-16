<?php
$sql_server = "sql_server";
$sql_user = "sql_username";
$sql_pass = "sql_password";
$sql_dbname = "sql_dbname";

class getData
{
    public function connect($sql_server,$sql_user,$sql_pass,$sql_dbname)
    {
        $con = new mysqli("$sql_server","$sql_user","$sql_pass","$sql_dbname");
        mysqli_set_charset($con,"utf8");
        date_default_timezone_set("PRC");
        return $con;
    }
    
    public function getMainContent($sql,$connect)
    {
        $data = $connect->query($sql);
        $data_arrays = [];
        while ( $data_array = $data->fetch_array( MYSQLI_ASSOC ) )
        {  
            $data_arrays[] = $data_array;
        }
        mysqli_close($connect);
        return $data_arrays;
    }
    
    public function getSmallerData($sql,$connect)
    {
        $data = $connect->query($sql);
        $datas = $data->fetch_array( MYSQLI_ASSOC );
        mysqli_close($connect);
        return $datas;
    }

    public function getTotal($sql,$connect)
    {
        $data = $connect->query($sql);
        $total = $data->fetch_array();
        $totals = $total[0];
        return $totals;
    }

    public function changeContent($sql,$connect)
    {
        $connect->query( $sql );
        mysqli_close($connect);
        return $flag = 1;
    }
}

$getData = new getData();
?>