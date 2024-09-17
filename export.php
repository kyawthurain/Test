<?php

try{
$fp = fopen('C:\xampp\htdocs\admin-proj1\customers.csv','w');
$students = [['1','JohnDoe','jd@gmail.com'],
['2','JohnDoe','jd@gmail.com'],
['3','Kyaw','k@gmail.com'],
['4','Zaw Gyi','zk@gmail.com'],
['5','HackZoe','hz@gmail.com'],
];
foreach($students as $student){
    fputcsv($fp,$student);
}

}
catch(Exception $e){
    echo $e->getMessage();
}finally{
    fclose($fp);
    header('Content-type:application/csv');
    header('Content-Disposition:attachment;filename=export.csv');
}
