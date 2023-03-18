<?php

use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class Schoolsj3ViewAllsch extends HtmlView
{
    protected $items;

    public function display($tpl = null)
    {
		$this->items = $this->get('Items');

		if (count($errors = $this->get('Errors')))
		{
			throw new \Exception(implode("\n", $errors), 500);
			die;
		}

		require_once JPATH_SITE.'/components/com_schoolsj3/helpers/PHPExcel/Classes/PHPExcel.php';

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("ΔΔΕ Δυτ. Θεσσαλονίκης")
									->setLastModifiedBy("ΔΔΕ Δυτ. Θεσσαλονίκης")
									->setTitle("Σχολεία ΔΔΕ Δυτ. Θεσσαλονίκης");

		// Convert array of objects to 2D array
		$aa = 0;
		$expdata = array();
		foreach ($this->items as $i) {
			$aa++;
			$i->id = $aa;
			$expdata[] = (array) $i;
		}
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
				->fromArray($expdata);

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Σχολεία');


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/x-msexcel');
		header('Content-Disposition: attachment;filename="SxoleiaDDE.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
    }

}

?>
