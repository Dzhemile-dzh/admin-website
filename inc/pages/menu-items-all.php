<!--ACTIVE TABLE-->
<div class="card mb-3">
  <div class="card-header" style="background-color:#99cc99;">
    <i class="fas fa-table"></i>  All Active <b><? echo $website->we_domain; ?></b> Menu Items
  </div>
  <div class="card-body">
    <div class="table-responsive" >
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <?if(!$website->we_id){?> <th>Website</th> <?}?>
            <th>Menu Item</th> 
            <th>Contents</th>   
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <?if(!$website->we_id){?> <th>Website</th> <?}?>
            <th>Menu Item</th>
            <th>Contents</th>
            <th>Actions</th>                    
          </tr>
        </tfoot>
        <tbody> 
          <?foreach($menu_items as $menu_item): ?>
            <tr><?if($menu_item->wm_active=='y'){?>
                <td><a href="?page=menu-item&edit=<? echo $menu_item->wm_id?>"><button type="button" class="btn btn-outline-primary"><? echo $menu_item->wm_menu_item;?></button></a></td>
                <td><?foreach($all_menu_items as $menu_content){if($menu_content->wm_id==$menu_item->wm_id){?> 
                  <a href="?page=content&edit=<? echo $menu_content->wc_id?>"><button type="button" class="btn btn-outline-success"><? echo $menu_content->wc_title;?></button></a><?}}?>
                </td>
                <td>
                  <a href="?page=menu-item&edit=<? echo $menu_item->wm_id?>"><button type="button" class="btn btn-success" style="width:100%;"><i class="fas fa-pencil-alt"></i></button></a><br>
                  <a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&wm_id=<? echo $menu_item->wm_id?>"> <button type="button" class="btn btn-danger"style="width:100%;"><i class="fas fa-trash-alt"></i></button></a>
                </td>
            <?}?></tr>
          <? endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>
   
<!--INACTIVE TABLE-->
<div class="card mb-3">
  <div class="card-header" style="background-color: #ff9999;">
    <i class="fas fa-table"></i>  All Inactive <b><? echo $website->we_domain; ?></b> Menu Items
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0" >
        <thead>
          <tr>
            <?if(!$website->we_id){?> <th>Website</th> <?}?>
            <th>Menu Item</th>
            <th>Contents</th> 
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <?if(!$website->we_id){?> <th>Website</th> <?}?>
            <th>Menu Item</th>
            <th>Contents</th> 
            <th>Actions</th>                   
          </tr>
        </tfoot>
        <tbody> 
          <?foreach($menu_items as $menu_itemn): ?>
            <tr><?if($menu_itemn->wm_active=='n'){?>
              <td><a href="?page=menu-item&edit=<? echo $menu_itemn->wm_id?>"><button type="button" class="btn btn-outline-dark"><? echo $menu_itemn->wm_menu_item;?></button></a></td>
              <td><?foreach($all_menu_items as $menu_contentn){if($menu_contentn->wm_id==$menu_itemn->wm_id){?>
                <a href="?page=content&edit=<? echo $menu_contentn->wc_id?>"><button type="button" class="btn btn-outline-danger"><? echo $menu_contentn->wc_title;?></button></a><?}}?>
              </td>
              <td>
                <a href="?page=menu-item&edit=<? echo $menu_itemn->wm_id?>"><button type="button" class="btn btn-success" style="width:50%;"><i class="fas fa-pencil-alt"></i></button></a><br>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&wm_id=<? echo $menu_itemn->wm_id?>"> <button type="button" class="btn btn-danger"style="width:50%;"><i class="fas fa-trash-alt"></i></button></a>
              </td>
            <?}?></tr>
          <? endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>