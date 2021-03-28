<div class="card mb-3">
    <div class="card-header" style="background-color: #27A746;color:white;">
        <i class="fas fa-table"></i> All Brands
     </div>
     <div class="card-body">
	    <div class="table-responsive">
	        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
	            <thead>
		            <tr>
		                <th>Brand Name</th>
		                <th>Program Name</th>
		                <th>Image</th> 
		                <th>Actions</th>                    
		            </tr>
	            </thead>
	            <tfoot>
		            <tr>
		                <th>Brand Name</th>
		                <th>Program Name</th> 
		                <th>Image</th>
		                <th>Actions</th>                     
		            </tr>
	            </tfoot>
	            <tbody> 
			        <?foreach ($brand_programs as $brand_program) {?> 
				        <tr>
					        <td><a href="?page=affiliate-brand&edit=<?echo $brand_program->ab_id?>"><button type="button" class="btn btn-outline-primary" style="font-size: 18px; margin-right:4px; padding:4px;"><?echo $brand_program->ab_brand_name; ?></button></a></td>
					        <td><? echo $brand_program->ap_name ?></td>   
					        <td><img class="img-thumbnail" src="../img/brand_logo/<? echo $brand_program->im_filename; ?>" style="width:100px;height:100px;"></td>  
					        <td>
		                      	<a href="https://affiliate.playersmedia.net/?page=affiliate-brand&edit=<?echo $brand_program->ab_id?>"><button type="button" class="btn btn-success" style="width:40%;"><i class="fas fa-edit"></i></button></a>
		                      	<a onclick="return confirm('Are you sure you want to delete this entry?')" href="?page=delete&ab_id=<?echo $brand_program->ab_id?>"> <button type="button" class="btn btn-danger"style="width:40%;"><i class="fas fa-trash-alt"></i></button></a>
		                    </td>
		                </tr>
                    <?}?>
	            </tbody>
	        </table>
	    </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    <p class="small text-center text-muted my-5"></p>
</div>