<?php

include 'dbconnect.php';



$api_url="http://localhost/eneza_project/requests.php?action=fetch_courses";


$client= curl_init($api_url);
curl_setopt($client,CURLOPT_RETURNTRANSFER, true);
$response=curl_exec($client);

$result=json_decode($response);

$output='';

if(count($result) > 0)
{
	foreach ($result as $row) {
		



		$updatestring=stripcslashes("update('".$row->id."','".$row->course."')");
		$deletestring=stripcslashes("deleteCourse('".$row->id."','".$row->course."')");
		$output.='<tr  style="border-bottom:1px solid #ddd; padding-bottom: 20px;">
				<td width="50%">'.$row->course.'</td>

				<td width="20%" align="center">
					<table width="60%" align="center" style="margin: 5px;">
						<tr>
							<td width="50%">
								<button title="'.$row->id.'" id="edit"  onclick="'.$updatestring.'" name="edit" class="btn btn-warning">Edit</button>
							</td>
							<td width="50%">
								<button id="'.$row->id.'" name="delete" onclick="'.$deletestring.'"  class="btn btn-danger">Delete</button>
							</td>
						</tr>
					</table>
				</td>
				</tr>';

	}
}
else{

	$output.='<tr><td colspan="2" align="center">No Data Found</td></tr>';
}
echo $output;

?>