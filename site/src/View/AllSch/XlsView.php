<?php

namespace DSEWesternThessaloniki\Component\Schoolsj3\Site\View\AllSch;

defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_schoolsj3/vendor/autoload.php';

use Joomla\CMS\MVC\View\HtmlView;

class XlsView extends HtmlView
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

		// Create new PHPExcel object
		$writer = new \XLSXWriter();

		// Convert array of objects to 2D array
		$aa = 0;
		$expdata = [["ΑΑ", "Σχολείο", "Τύπος", "Γραφείο", "Δήμος", "Διεύθυνση", "ΤΚ", "Βάρδια", "Μόρια", "Ομάδα", "Τηλ1", "Τηλ2", "Email"]];
		foreach ($this->items as $i) {
			$aa++;
			$i->id = $aa;
			$expdata[] = (array) $i;
		}

		// Add some data
		$writer->writeSheet($expdata, 'Σχολεία');

		// Redirect output to a client's web browser
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="SxoleiaDDE.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$writer->writeToStdOut();
    }

}

?>
