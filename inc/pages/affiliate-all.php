<div class="card mb-3">
  <div class="card-header"style="background-color: #27A746;color:white;">
    <i class="fas fa-table"></i>  All Affiliate Programs
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Program Name</th>
            <th>Brands</th> 
            <th>Website</th>                  
            <th>Affiliate Link</th>
            <th>Actions</th>                    
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Program Name</th>
            <th>Brands</th> 
            <th>Website</th>                   
            <th>Affiliate Link</th>
            <th>Actions</th>                     
          </tr>
        </tfoot>
        <tbody> 
          <? foreach($affiliate_programs as $affiliate): ?>
              <tr>
                <td><? echo $affiliate->ap_name; ?></td>
                <td><? $brandnames = explode(',',$affiliate->brand_name);
                      foreach ($brandnames as $brandname) {?>
                        <button type="button" class="btn btn-outline-primary" style="font-size: 12px; margin-right:4px; padding:4px;"><? echo $brandname; ?></button>
                    <? } ?>
                </td>
                <td><? echo $affiliate->ap_website; ?></td>
                <td><? echo $affiliate->ap_super_affiliate_link; ?></td>
                <td>
                  <a href="https://affiliate.playersmedia.net/?page=affiliate-brand&ap_id=<? echo $affiliate->ap_id?>"><button type="button" class="btn btn-success" style="width:100%"><i class="fas fa-plus-circle" > Add Brand</i></button></a>
                  <a href="https://affiliate.playersmedia.net/?page=affiliate&edit=<? echo $affiliate->ap_id?>"><button type="button" class="btn btn-warning" style="width:100%"><i class="fas fa-edit" > Edit Program</i></button></a><br>
                  <a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&ap_id=<? echo $affiliate->ap_id?>"> <button type="button" class="btn btn-danger" style="width:100%"><i class="fas fa-trash-alt"> Delete Program</i></button></a>
                </td>
            <? endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
  <p class="small text-center text-muted my-5"></p>
</div>