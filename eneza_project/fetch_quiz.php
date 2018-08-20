<?php

include 'dbconnect.php';



$api_url="http://localhost/eneza_project/requests.php?action=fetch_quizzes";


$client= curl_init($api_url);
curl_setopt($client,CURLOPT_RETURNTRANSFER, true);
$response=curl_exec($client);

$result=json_decode($response);

$output='';

if(count($result) > 0)
{
	foreach ($result as $row) {
		$updatestring=stripcslashes("update('".$row->id."','".$row->question."','".$row->option1."','".$row->option2."','".$row->option3."','".$row->option4."','".$row->correctOption."','".$row->subject_id."')");
		$deletestring=stripcslashes("deleteQuiz('".$row->id."','".$row->question."','".$row->subject_id."')");
		$output.='<tr>
				<td colspan="2">'.$row->question.'</td></tr>

				<tr style="border-bottom:1px solid #ddd; padding-bottom: 20px;">
				<td align="center">
					<table width="100%" align="center" style="margin: 5px;">
						<tr>
							<td width="100%">
								<b><small>1.</small> '.$row->option1.'</b>';

						// Correct answer label
						if($row->correctOption==$row->option1){
							$output.='<span style="background: #249424;border-radius:10px;color:white;padding:2px 10px;font-size:12px;vertical-align: middle;margin-left:10px;">Correct Answer</span>';
						}
						$output.='</td>
						</tr>
						
						<tr>
							<td width="100%">
								<b><small>2.</small> '.$row->option2.'</b>';

						// Correct answer label		
						if($row->correctOption==$row->option2){
							$output.='<span style="background: #249424;border-radius:10px;color:white;padding:2px 10px;font-size:12px;vertical-align: middle;margin-left:10px;">Correct Answer</span>';
						}
						$output.='</td>
						</tr>';

						if($row->option3!=""){
							$output.='<tr>
											<td width="100%">
												<b><small>3.</small> '.$row->option3.'</b>';
								
												// Correct answer label		
												if($row->correctOption==$row->option3){
													$output.='<span style="background: #249424;border-radius:10px;color:white;padding:2px 10px;font-size:12px;vertical-align: middle;margin-left:10px;">Correct Answer</span>';
												}
												$output.='</td>
												</tr>';
						}
						
						
						if($row->option4!=""){
							$output.='<tr>
											<td width="100%">
												<b><small>4.</small> '.$row->option4.'</b>';
								
												// Correct answer label		
												if($row->correctOption==$row->option4){
													$output.='<span style="background: #249424;border-radius:10px;color:white;padding:2px 10px;font-size:12px;vertical-align: middle;margin-left:10px;">Correct Answer</span>';
												}
												$output.='</td>
												</tr>';
						}
						
						
				$output.='	
					</table>
				</td>

				<td width="20%">
				<table width="100%" align="center" style="margin: 5px;">
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