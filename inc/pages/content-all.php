<div class="card mb-3">
  <div class="card-header" style="background-color: #FCC10C;color: white;">
    <i class="fas fa-table"></i>  All <b><? echo $website->we_domain; ?></b> Contents 
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <?if(!$website->we_id){?> <th>Website</th> <?}?>
            <th>Title</th> 
            <th>Menu Item</th>                                
            <th>Brand</th>
            <th>Image</th>
            <th>Verticals</th>
            <th>Category</th>
            <th>Actions</th>                    
          </tr>
        </thead>
        <tfoot>
          <tr>
            <?if(!$website->we_id){?> <th>Website</th> <?}?>
            <th>Title</th>
            <th>Menu Item</th>
            <th>Brand</th>
            <th>Image</th>
            <th>Verticals</th>
            <th>Category</th>
            <th>Actions</th>                    
          </tr>
        </tfoot>
        <tbody> 
          <? foreach($contents as $content): ?>
            <tr>
              <?if(!$website->we_id){?> 
                <td><?foreach ($websites as $web){ if($web->we_id == $content->wc_we_id){ echo $web->we_domain;}}?></td>
              <?}?>
                <td> <a href="?page=content&edit=<? echo $content->wc_id?>"><button type="button" class="btn btn-outline-primary"><? echo $content->wc_title;?></button></a></td>
                <td>
                  <?foreach ($menu_items_co as $item){if($item->wm_id == $content->wc_wm_id){?><a href="?page=menu-item&edit=<? echo $item->wm_id?>"><button type="button" class="btn btn-outline-warning"><? echo $item->wm_menu_item;?></button></a><?}}?>
                </td>
                <td><?foreach ($affiliate_brands as $brandi){if($brandi->ab_id == $content->wc_ab_id){ echo $brandi->ab_brand_name;}}?></td>
                <td><img class="img-thumbnail" src="../img/content/<? echo $content->wc_image;?>"  style="width:50px;height:50px;"></td>
                <td>
                  <?$we_verticals = explode(',',$content->wc_verticals);foreach ($verticals as $vertical){if(in_array($vertical->ve_id, $we_verticals)){?><button type="button" class="btn btn-outline-success" style="font-size: 12px ; margin-right:4px; padding:4px;"><? echo $vertical->ve_vertical;?></button><?}}?> 
                </td>
                <td><? echo $content->wc_category; ?></td>
                <td>
                  <a href="https://<? echo $website->we_domain;?>"><button type="button" class="btn btn-warning" style="width:60px;color:white;">View </i></button></a>
                  <a href="?page=content&edit=<? echo $content->wc_id?>"><button type="button" class="btn btn-success" style="width:50px"><i class="fas fa-pencil-alt"></i></button></a>
                  <a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&wc_id=<? echo $content->wc_id?>"> <button type="button" class="btn btn-danger"style="width:50px;"><i class="fas fa-trash-alt"></i></button></a>
                </td>
              </tr>
            <? endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
  <p class="small text-center text-muted my-5"></p>
</div>
