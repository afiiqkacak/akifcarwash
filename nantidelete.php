<form action="" method="post">

                                  <input name="applyid" autofocus class="input" type="hidden" value="<?php echo $row['ApplyID']; ?>">
                                  <input type="hidden" name="approvedby" value="<?php echo $stud; ?>">

                                  <?php
                                  if ($row['Status'] != "Rejected"){
                                    ?>
                                  <select class="form-control" name="status">
                                  <option><?php echo $row['Status'];?></option>
                                  <?php
                                  if ($row['Status'] == "Pending"){
                                  ?>
                                  <option value="Approved">Approved</option>
                                  <option value="Rejected">Rejected</option>
                                    
                                    <?php
                                    }elseif ($row['Status'] == "Approved"){
                                      ?>
                                  <option value="Pending">Pending</option>
                                  <option value="Rejected">Rejected</option>
                                  </select>
                                  
                                  <?php
                                  }
                                }else{
                                  ?> 
                                  <input name="status" value="<?php echo $row['Status'];?>" readonly>
                                  <?php   
                                }
                                ?>
                              </td>

                              <td><input type="text" class="form-control" name="reject" value="<?php echo $row['RejectReason'];?>"></td>  

                              <td></td>

                              <td><input type="submit" name="update" value="Update"></td>

                              </form>