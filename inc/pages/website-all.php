<div class="card mb-3">
  <div class="card-header" style="background-color: #007CFD; color:white;">
    <i class="fas fa-table"></i>  All Websites
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>   
            <th>Webiste</th> 
            <th>Title</th>                                
            <th>Description</th>
            <th>Format</th>
            <th>Verticals</th>
            <th></th>                    
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Website</th> 
            <th>Title</th>                                
            <th>Description</th>
            <th>Format</th>
             <th>Verticals</th>  
             <th></th>             
          </tr>
        </tfoot>
        <tbody> 
          <?foreach($websites as $website){if($website->we_active=='y'){?>
            <tr>
              <td><? echo ucfirst(rtrim($website->we_domain,'.com'));?></td>
              <td><? echo $website->we_title;?></td>
              <td><? echo $website->we_description;?></td>
              <td><? echo $website->we_format;?></td>
              <td><?$we_verticals = explode(',',$website->we_verticals);
                    foreach ($verticals as $vertical){if(in_array($vertical->ve_id, $we_verticals)){?>
                      <button type="button" class="btn btn-outline-success" style="font-size: 12px ; margin-right:4px; padding:4px;"><? echo $vertical->ve_vertical;?></button>
                  <?}}?> 
              </td>
              <td><a href="http://www.<? echo $website->we_domain;?>"><button type="button" class="btn btn-primary"><i class="fas fa-globe-europe"></i> Visit </button></a></td>   
            </tr>
          <?}}?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  <p class="small text-center text-muted my-5"></p>
</div>