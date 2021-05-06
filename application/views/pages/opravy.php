<!doctype html>
<html lang="en">
     <title>Opravy</title>
    <style>
      marg
      {
        margin-bottom: 25px;
      }
      .nadpis
      {
        text-align: center;
      }
    </style>
    

    <body>
    <div class="container">  
      <h1 class="nadpis">Opravy</h1><br />   

      <div class="table-responsive">  
           <table class="table table-striped">  
                <tr>
                     <th>ID</th>
                     <th>Datum</th> 
                     <th>Majitel</th> 
                     <th>Registrační značka</th>
                     <th>Značka</th> 
                     <th>Typ vozidla</th>
                     <th>Zaměstnanec</th>
                     <th>Díl</th>  
                     <th>Cena</th>
                     <th>Upravit</th>  
                     <th>Smazat</th>
                        
                </tr>  
           <?php  
           
                foreach($vypis_opravy as $row)  
                {  
           ?>  
                <tr>  
                     <td><?php echo $row->ID; ?></td> 
                     <td><?php echo $row->datum; ?></td>  
                     <td><?php echo $row->majitel; ?></td>  
                     <td><?php echo $row->spz; ?></td> 
                     <td><?php echo $row->znacka; ?></td>
                     <td><?php echo $row->typ; ?></td>
                     <td><?php echo $row->zamestnanec; ?></td>
                     <td><?php echo $row->dil; ?></td>
                     <td><?php echo $row->cena; ?></td>
                     <td><a href="<?php echo base_url(); ?>Controller/update_data_opravy/<?php echo $row->ID; ?>">Upravit</a></td>  
                     <td><a href="#" class="delete_data" id="<?php echo $row->ID; ?>">Smazat</a></td>
                </tr>  
           <?php       
                }  
              
           ?>  
           </table>  
      </div>  

      <form method="post" action="<?php echo base_url()?>Controller/opravy">  
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
                         <label>Datum</label>  
                         <input type="text" name="datum" value="<?php echo $row->datum; ?>" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("datum"); ?></span>  
                    </div>   
                    <div class="form-group">  
                         <label>Majitel</label>  
                         <input type="text" name="majitel" value="<?php echo $row->majitel; ?>" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("majitel"); ?></span>  
                    </div>  
                    <div class="form-group">  
                         <label>Registrační značka</label>  
                         <input type="text" name="spz" value="<?php echo $row->spz; ?>" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("registracni znacka"); ?></span>  
                    </div> 
                    <div class="form-group">  
                         <label>Značka</label>  
                         <input type="text" name="znacka" value="<?php echo $row->znacka; ?>" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("znacka"); ?></span>  
                    </div>
                    <div class="form-group">  
                         <label>Typ</label>  
                         <input type="text" name="typ" value="<?php echo $row->typ; ?>" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("typ"); ?></span>  
                    </div> 
                    <div class="form-group">  
                         <label>Zaměstnanec</label>  
                         <input type="text" name="zamestnanec" value="<?php echo $row->zamestnanec; ?>" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("zamestnanec"); ?></span>  
                    </div>
                    <div class="form-group">  
                         <label>Díl</label>  
                         <input type="text" name="dil" value="<?php echo $row->dil; ?>" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("dil"); ?></span>  
                    </div>
                    <div class="form-group">  
                         <label>Cena</label>  
                         <input type="text" name="cena" value="<?php echo $row->cena; ?>" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("cena"); ?></span>  
                    </div> 
                    <div class="form-group">  
                         <input type="hidden" name="hidden_id" value="<?php echo $row->ID; ?>" />  
                         <input type="submit" name="update" value="Upravit" class="btn btn-primary" />  
                    </div>       
           <?php       
                }  
           }  
           else  
           {  
           ?>  
                    <div class="form-group">  
                         <label>Datum</label>  
                         <input type="text" name="datum" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("datum"); ?></span>  
                    </div>  
                    <div class="form-group">  
                         <label>Majitel</label>  
                         <input type="text" name="majitel" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("majitel"); ?></span>  
                    </div>  
                    <div class="form-group">  
                         <label>Registrační značka</label>  
                         <input type="text" name="spz" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("registracni znacka"); ?></span>  
                    </div>  
                    <div class="form-group">  
                         <label>Značka</label>  
                         <input type="text" name="znacka" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("znacka"); ?></span>  
                    </div>
                    <div class="form-group">  
                         <label>Typ vozidla</label>  
                         <input type="text" name="typ" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("typ"); ?></span>  
                    </div>  
                    <div class="form-group">  
                         <label>Zaměstnanec</label>  
                         <input type="text" name="zamestnanec" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("zamestnanec"); ?></span>  
                    </div>
                    <div class="form-group">  
                         <label>Díl</label>  
                         <input type="text" name="dil" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("dil"); ?></span>  
                    </div>
                    <div class="form-group">  
                         <label>Cena</label>  
                         <input type="text" name="cena" class="form-control" />  
                         <span class="text-danger"><?php echo form_error("cena"); ?></span>  
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
                     window.location="<?php echo base_url(); ?>Controller/delete_data_opravy/"+id;  
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