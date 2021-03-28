
<div class="card mb-3">
  <div class="card-header" style="background-color: #DC3546; color:white;">
    <i class="fas fa-table"></i> All Images
  </div>                  
  <div class="card-body">
    <div class="table-responsive">

      <div class="row">
        <div class="col-sm"><h3>New Images</h3>
          <table class="table table-hover" id="dataTable" width="100%" cellspacing="0" >
            <thead>
              <tr style="background-color: #acdaf2">
                <th>Id</th>
                <th>Filename</th>                   
                <th>Image</th>
                <th>Type</th> 
                <th>Actions</th>         
              </tr>
            </thead>
            <tbody>
              <form  id="imageForm" method="POST" enctype="multipart/form-data">
                <? foreach($images as $image){if($image->im_type==''){?>
                  <tr>
                    <td>
                      <input type="text" class="form-control" id="im_id" name="im_id"  value="<? echo $image->im_id; ?>" style="box-sizing: border-box;border: none;">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="im_filename" name="im_filename" value="<? echo $image->im_filename; ?>" style="box-sizing: border-box;border: none;">
                    </td>
                    <td>
                      <img class="img-thumbnail" src="../img/content/<? echo $image->im_filename;?>"  style="width:100px; height:100px;" alt=""> 
                    </td>
                    <td>
                      <select id="im_type" name="im_type" class="selectpicker" title="<? echo $image->im_type;?>">
                        <option value="content" <? $image->im_type == 'content'?'selected="selected"': ''?>>Content</option>
                        <option value="brand_logo" <? $image->im_type == 'brand_logo'?'selected="selected"': ''?>>Brand Logo</option>
                        <option value="affiliate_logo" <? $image->im_type == 'affiliate_logo'?'selected="selected"': ''?>>Affiliate Logo</option>                    
                      </select>
                      <!--<script>
                        $('select').selectpicker(); 
                        $('select[name=im_type]').val(1);
                        $('.selectpicker').selectpicker('refresh');
                      </script> -->
                    </td>
                    <td>
                      <input type="submit" class="btn btn-success" name="UPDATE_IMAGE" value="UPDATE" style="width:100%;"> <br>                          
                      <a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&im_id=<? echo $image->im_id?>"> <button type="button" class="btn btn-danger" style="width:100%;">DELETE</button></a>
                    </td>
                  <tr>
               <?}}?>
              </form>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-sm"><h3>Contents Images</h3>
          <table class="table table-hover" id="dataTable" width="100%" cellspacing="0"  >
            <thead>
              <tr style="background-color: #acdaf2">
                <th>Id</th>
                <th>Filename</th>                   
                <th>Image</th>
                <th>Delete</th>          
              </tr>
            </thead>
            <tbody>
               <? foreach($images as $image){if($image->im_type=='content'){?>
                <tr>
                  <td><? echo $image->im_id; ?></td>
                  <td><? echo $image->im_filename; ?></td>
                  <td><img class="img-thumbnail" src="../img/content/<? echo $image->im_filename;?>" style="width:50px; height:50px;"alt=""></td>
                  <td>
                    <a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&im_id=<? echo $image->im_id?>"> 
                    <button type="button" class="btn btn-danger"style="width:100%;"><i class="fas fa-trash-alt"></i></button></a>
                  </td>
                </tr>
              <?}}?>
            </tbody>
          </table>
        </div>

        <div class="col-sm"><h3>Brands Images</h3>
          <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr style="background-color: #f2de79">
                <th>Id</th>
                <th>Filename</th>                   
                <th>Image</th>
                <th>Delete</th>          
              </tr>
            </thead>
            <tbody> 
               <? foreach($images as $image){if($image->im_type == 'brand_logo'){?>
                <tr>
                  <td><? echo $image->im_id; ?></td>
                  <td><? echo $image->im_filename; ?></td>
                  <td><img class="img-thumbnail" src="../img/content/<? echo $image->im_filename;?>"  style="width:50px; height:50px;" alt=""></td>
                  <td>
                    <a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&im_id=<?echo $image->im_id?>"> <button type="button" class="btn btn-danger"style="width:100%;"><i class="fas fa-trash-alt"></i></button></a>
                  </td>
                </tr>
              <?}}?>
            </tbody>
          </table>
        </div>

        <div class="col-sm"><h3>Affiliates Images</h3>
          <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr style="background-color: #fa6975">
                <th>Id</th>
                <th>Filename</th>                   
                <th>Image</th>        
                <th>Delete</th>  
              </tr>
            </thead>
            <tbody> 
               <? foreach($images as $image){if($image->im_type == 'affiliate_logo'){?>
                <tr>
                  <td><? echo $image->im_id; ?></td>
                  <td><? echo $image->im_filename; ?></td>
                  <td><img class="img-thumbnail" src="../img/content/<? echo $image->im_filename;?>"  style="width:100px; height:50px;" alt=""></td>
                  <td>                  
                    <a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&im_id=<?echo $image->im_id?>"> <button type="button" class="btn btn-danger"style="width:100%;"><i class="fas fa-trash-alt"></i></button></a>
                  </td>
                </tr>
              <?}}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>


