<div class="card mb-3">
  <div class="card-header" style="background-color:#353942;color:white;">
    <i class="fas fa-table"></i> All Brand Offers
  </div>
  <div class="card-body">
    <div class="table-responsive" >
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Logo</th>
            <th>Brand</th> 
            <th>Offer Type</th>  
            <th>Min Deposit</th> 
            <th>MIN</th>
            <th>MAX</th> 
            <th>Time</th>   
            <th>Requirments</th>
            <th>Min Odds</th> 
            <th>Overal Rating</th>   
            <th>Actions</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Logo </th>
            <th>Brand</th> 
            <th>Offer Type</th>
            <th>Min Deposit</th>   
            <th>MIN</th>
            <th>MAX</th> 
            <th>Time</th>   
            <th>Requirments</th>
            <th>Min Odds</th> 
            <th>Overal Rating</th>    
            <th>Actions</th>                 
          </tr>
        </tfoot>
        <tbody> 
          <?foreach($brand_offersi as $brand_offer):?>
            <tr>
                <td>
                	<?foreach ($images as $image) {if($brand_offer->ab_im_id == $image->im_id){?>
                		<img class="img-thumbnail" src="../img/brand_logo/<? echo $image->im_filename;?>" style="width:100px;height:100px;">
                	<? }}?>
                </td>

                <td>
                	<?foreach($affiliate_brands as $brand){if($brand->ab_id == $brand_offer->bo_ab_id){echo $brand->ab_brand_name;}} ?>
                </td>
               <?if($brand_offer->bo_type == 'bet credits'){?> <td style="color:#f54287"><? echo $brand_offer->bo_type; ?>
               <?}elseif($brand_offer->bo_type == 'welcome offer'){?> <td style="color:#6042f5"><? echo $brand_offer->bo_type; ?>
               <?}elseif($brand_offer->bo_type == 'free bet'){?> <td style="color:#42f55d"><? echo $brand_offer->bo_type; }?>
               </td>
                <td><? echo $brand_offer->bo_min_deposit.$brand_offer->bo_currency; ?></td>
                <td><? echo $brand_offer->bo_min.$brand_offer->bo_currency; ?></td>
                <td><? echo $brand_offer->bo_max.$brand_offer->bo_currency;; ?></td>
                <td><? echo $brand_offer->bo_time.' days'; ?></td>
                <td><? echo $brand_offer->bo_requirments; ?></td>
                <td><? echo $brand_offer->bo_min_odds; ?></td>
                <td><? echo number_format($brand_offer->bo_overal_rating,0).'%'; ?></td>
                <td>
                  <a href="?page=brand-offers&edit=<? echo $brand_offer->bo_id?>"><button type="button" class="btn btn-success" style="width:100%;"><i class="fas fa-pencil-alt"> </i></button></a><br>
                  <a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&bo_id=<?echo $brand_offer->bo_id?>"> <button type="button" class="btn btn-danger"style="width:100%;"><i class="fas fa-trash-alt"></i></button></a>
                </td>
            </tr>
          <? endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>
