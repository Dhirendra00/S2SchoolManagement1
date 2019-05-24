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
		// $count = 0;
		foreach($this->rows as $row){
			$html  .= '<tr>';
			// $count++;
		

			foreach($row as $key => $cell){
				if(!is_numeric($key))
					$html .= '<td>'.$cell.'</td>';
				// $count++;
			}
			// $html .=.echo "total:" $count;
			// Update label is used to update
			$html .='<td> <a href="update_user.php?id='.$row['id'].'">Update</a>';
			// $html .='<td> <a href="archive_process.php?id='.$row['id'].'">Archive</a>';
			$html .='<td> <a href="delete_user.php?delete='.$row['id'].'">Delete</a></td>';

			// $html .='<td> <a href="delete_users.php?id='.$row['id'].'">Delete</a>';
			$html .='</tr>';

		}
		$html .='</table>';
		return $html;
	} 
}
?>
<style>
	table{
		/*display: flex;*/
		border: 1px solid black;
		width: 100%;
		height: 10%;
		/*position: fixed;*/

	}
	table th{
		background-color: lightblue;
	}
	table tr{
	
		/*font-size: 18px;*/
		padding: 2px;
		
		
	}
	table td{
		/*width: 30%;*/
		overflow: auto;

	}
	tr:nth-child(even){background-color: #f2f2f2}    /*https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_table_responsive
</style>

