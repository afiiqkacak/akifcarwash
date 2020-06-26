<?php
include('connection/connect.php');
date_default_timezone_set('Asia/Kuala_Lumpur');	
?>	
				<tbody  class="table-active">
					<tr>
						<?php
						$tar= date("Y-m-d");
		  			$sql = "SELECT plate_num 
					FROM queue 
					WHERE date LIKE '$tar' AND status='In Progress' ORDER BY status DESC, queue_id ASC";
					$result = mysqli_query($connect,$sql);
					$x = 1;
					if(mysqli_num_rows($result) > 0 )
					{
					while($row = mysqli_fetch_array($result))
					{

						?>
						<td style="text-align:center">
							<?php echo $row['plate_num'];?>
						</td>
					</tr>
					<?php
				}
			}
			?>
				</tbody>