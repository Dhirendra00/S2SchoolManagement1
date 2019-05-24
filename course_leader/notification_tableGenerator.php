<?php

// table is created using table generator.
class TableGenerator{
	//declare global heading
	public $headings;
	public $rows= [];
// declare function setHeading
	public function setHeadings($heading){
		$this->headings = $heading;
	}
// declare function add row
	public function addRow($row){
		$this->rows[] = $row;
	}
// declare function getHTML
	public function getHTML(){
		$html ='<table style="overflow-x:auto;">';
		$html .='<tr>';
		foreach($this->headings as $heading){
			$html .='<th>'.$heading.'</th> ';
		}
		
		$html .= '</tr>';
		foreach($this->rows as $row){
			$html  .= '<tr>';

			foreach($row as $key => $cell){
				if(!is_numeric($key))
					$html .= '<td>'.$cell.'</td>';
			}
			// Update label is used to update
			
			$html .='</tr>';
		}
		$html .='</table>';
		return $html;
	} 
}
?>
<style>
	table{
		/*border: 1px solid black;*/
		width: 100%;
		/*height: 100%;*/
		/*position: fixed;*/

	}
	table tr{
	
		font-size: 15px;
		padding: 2px;
		
		
	}
	table td{
		/*width: 30%;*/
		overflow: auto;
		border:1px solid;

	}
	tr:nth-child(even){background-color: #f2f2f2}    /*https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_table_responsive
</style>

