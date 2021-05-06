<!doctype html>
<html lang="en">
<meta charset="utf-8" />
    <title>Zaměstnanci</title>
    <style>
      .uprostred
      {
        text-align: center;
      }
    </style>
    

    <body>
    <div class="container">  
      <h1 class="uprostred">Zaměstnanci</h1><br />  

      <div class="table-responsive">  
           <table class="table table-striped">  
                <tr>  
                     <th>ID</th>  
                     <th>Jméno</th>  
                     <th>Přijmení</th>  
                     <th>Upravit</th>  
                     <th>Smazat</th>  
                </tr>  
           <?php  
           
                foreach($vypis_zamestnanci as $row)  
                {  
           ?>  
                <tr>  
                     <td><?php echo $row->id; ?></td>  
                     <td><?php echo $row->jmeno; ?></td>  
                     <td><?php echo $row->prijmeni; ?></td>    
                     <td><a href="<?php echo base_url(); ?>Controller/update_data/<?php echo $row->id; ?>">Upravit</a></td>  
                     <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">Smazat</a></td>
                </tr>  
           <?php       
                }  
              
           ?>  
           </table>  
      </div>

      <form method="post" action="<?php echo base_url()?>Controller/zamestnanci">  
           <?php  
           if($this->uri->segment(2) == "inserted")  
           {  
                echo '<p class="text-success">Data vložena</p>';  
           }  
           if($this->uri->segment(2) == "updated")  
           {  
                echo '<p class="text-success">Data upravena</p>';  
           }  
           ?>  
           <?php  
           
           if(isset($user_data))  
           {  
                foreach($user_data->result() as $row)  
                {  
           ?>  
           <div class="form-group">  
                <label>Jméno</label>  
                <input type="text" name="jmeno" value="<?php echo $row->jmeno; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("jmeno"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Přijmení</label>  
                <input type="text" name="prijmeni" value="<?php echo $row->prijmeni; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("prijmeni"); ?></span>  
           </div>  
           <div class="form-group">  
                <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />  
                <input type="submit" name="update" value="Upravit" class="btn btn-primary" />  
           </div>       
           <?php       
                }  
           }  
           else  
           {  
           ?>  
           <div class="form-group">  
                <label>Jméno</label>  
                <input type="text" name="jmeno" class="form-control" />  
                <span class="text-danger"><?php echo form_error("jmeno"); ?></span>  
           </div>  
           <div class="form-group">  
                <label>Přijmení</label>  
                <input type="text" name="prijmeni" class="form-control" />  
                <span class="text-danger"><?php echo form_error("prijmeni"); ?></span>  
           </div>  
           <div class="form-group">  
                <input type="submit" name="insert" value="Vložit" class="btn btn-primary" />  
           </div>       
           <?php  
           }  
           ?>  
      </form>  
      <br /><br /><br />  
        
      <script>  
      $(document).ready(function(){  
           $('.delete_data').click(function(){  
                var id = $(this).attr("id");  
                if(confirm("Opravdu chcete smazat tuto položku?"))  
                {  
                     window.location="<?php echo base_url(); ?>Controller/delete_data/"+id;  
                }  
                else  
                {  
                     return false;  
                }  
           });  
      });  
      </script>  
 </div>  
    </body>
</html>