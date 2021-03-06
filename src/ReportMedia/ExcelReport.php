<?php

namespace Jimmyjs\ReportGenerator\ReportMedia;

use Jimmyjs\ReportGenerator\ReportGenerator;

class ExcelReport extends ReportGenerator
{
	public function download($filename)
	{
        return \App::make('excel')->create($filename, function($excel) use($filename) {
		    $excel->sheet('Sheet 1', function($sheet) {
				$headers = $this->headers;
				$query = $this->query;
				$columns = $this->columns;
				$limit = $this->limit;
				$groupByArr = $this->groupByArr;
				$orientation = $this->orientation;
				$editColumns = $this->editColumns;
				$showTotalColumns = $this->showTotalColumns;
				$styles = $this->styles;

				$sheet->setColumnFormat(['A:Z' => '@']);
		    	$sheet->loadView('report-generator-view::general-excel-template', compact('headers', 'columns', 'editColumns', 'showTotalColumns', 'styles', 'query', 'limit', 'groupByArr', 'orientation'));
		    });
        })->export('xls');
	}
}