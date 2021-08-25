<?php 
require_once 'PHPExcel.php';

			 $arrayExcel = PHPExcel_IOFactory::load('Тест.xlsx');

			 foreach ($arrayExcel->getWorksheetIterator() as $worksheet) {
			 	$Title = $worksheet->getTitle();
			 	$lastRow = $worksheet->getHighestRow();
			 	$lastColumn = $worksheet->getHighestColumn();
			 	$lastColumnIndex = PHPExcel_Cell::columnIndexFromString($lastColumn);

			 	echo '<table><tr>';
        		for ($row = 1; $row <= $lastRow; ++$row)
        		{
            	echo '<tr>';
            	for ($col = 0; $col < $lastColumnIndex; ++ $col) 
            	{
                	$val = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                	echo '<td class="cell">'.$val.'&nbsp;</td>';
            	};
            	echo '</tr>';
        		};
        		echo '</table>';
   				 }
?>