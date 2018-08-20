<?php

include 'dbconnect.php';



$api_url="http://localhost/eneza_project/requests.php?action=fetch_subjects";


$client= curl_init($api_url);
curl_setopt($client,CURLOPT_RETURNTRANSFER, true);
$response=curl_exec($client);

$result=json_decode($response);

$output='';

if(count($result) > 0)
{
	foreach ($result as $row) {
		
		// GET COURSE NAME
		$course_id=$row->course_id;
		$course='';
		$query="SELECT * FROM courses WHERE id=".$course_id;
		$sres=mysqli_query($conn,$query);

		if(mysqli_num_rows($sres)>0){
			while($srow=mysqli_fetch_array($sres)){
				$course="<font style='color:#999;font-family: monospace;'>".$srow['course']."</font>";
			}
		}else{
				$course='<font style="color:#999;font-family: monospace;">[No course selected]</font>';
		}




		$updatestring=stripcslashes("update('".$row->id."','".$row->subject."','".$row->course_id."')");
		$deletestring=stripcslashes("deleteSubject('".$row->id."','".$row->subject."','".$row->course_id."')");
		$output.='<tr  style="border-bottom:1px solid #ddd; padding-bottom: 20px;">
				<td width="50%">'.$row->subject.'</td>
				<td>'.$course.'</td>

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