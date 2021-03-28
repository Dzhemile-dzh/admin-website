<form  id="websiteForm" method="POST" enctype="multipart/form-data">
  <div class="form-subtitle">
    <h1><?if(isset($_GET['edit']) && $_GET['edit'] > 0){ echo 'Edit';} else{ echo 'Add'; }?> Website </h1>
  </div>
  <div class="form-row">
    <?if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
        <input type="hidden" name="we_id" value = "<? echo $website->we_id; ?>">
    <?}?>
    <div class="form-group col-md-6">
      <label for="we_domain">Domain</label>
      <input type="text" class="form-control" id="we_domain" name="we_domain"
      <?if(isset($_GET['edit']) && $_GET['edit'] > 0){?> value="<? echo $website->we_domain; ?>" readonly 
      <?}else{?>placeholder="domain.com" required <?}?>>
    </div>
    <div class="form-group col-md-6">
      <label for="we_title">Title</label>
      <input type="text" class="form-control" id="we_title" name="we_title"
      <?if(isset($_GET['edit']) && $_GET['edit'] > 0){?> value="<? echo $website->we_title; ?>"
      <?}else{?> placeholder="Have you won the lottery?" required <?}?>>
    </div>
  </div>
  <div class="form-group">
    <label for="we_description">Description</label>
    <input type="text" class="form-control" id="we_description" name="we_description" 
    <?if(isset($_GET['edit']) && $_GET['edit'] > 0){?> value="<? echo $website->we_description; ?>"
    <?}else{?>placeholder="Play at the top casinos" required <?}?>>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="we_verticals">Verticals</label>
      <?if(isset($_GET['edit']) && $_GET['edit'] > 0) {?>
        <div>
          <select class="selectpicker" name="we_verticals[]" data-max-options="5 "multiple title="<? echo $website->we_verticals; ?>" style="max-width:90%;">
            <?$we_verticals = explode(',',$website->wc_verticals);
              foreach ($verticals as $vertical) {
                if(in_array($vertical->ve_id, $we_verticals)){ $selected = 'selected'; }else{ $selected = ''; }
                echo ('<option value="'.$vertical->ve_id.'" '.$selected.'>'.$vertical->ve_vertical.'('.$vertical->ve_id.')</option>');
            }?>
          </select>
        </div>
        <script>                  
          $('select').selectpicker();
          $('select[name=we_verticals[]]').val(1);
          $('.selectpicker').selectpicker('refresh');
        </script> 
      <?}else{?>
        <div>
          <select class="selectpicker" name="we_verticals[]" data-max-options="5 "multiple data-live-search="true">
            <? foreach ($verticals as $vertical) { ?>
               <option value = "<? echo $vertical->ve_id ?>"> <? echo $vertical->ve_vertical;?> </option> 
            <?}?>
          </select>
         </div>
        <script>$('select').selectpicker();</script>
      <?}?>
    </div>
    <div class="form-group col-md-4">
      <label for="we_format" >Format</label>
      <div>
        <select id="we_format" name="we_format"  class="selectpicker"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){?> title="<? echo $website->we_format;?>"<?}?>>
          <option value="full"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){ $website->we_format == 'full'?'selected="selected"': ''?><?}?>>Full</option>
          <option value="list"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){ $website->we_format == 'list'?'selected="selected"': ''?><?}?>>List</option>
          <option value="blog"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){ $website->we_format == 'blog'?'selected="selected"': ''?><?}?>>Blog</option>
        </select>
      </div>
      <script>
        $('select').selectpicker(); 
        $('select[name=we_format]').val(1);
        $('.selectpicker').selectpicker('refresh');
      </script> 
    </div>
    <div class="form-group col-md-2">
      <label for="we_active">Active</label>
      <div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="we_active" name="we_active" value="y" <?echo($website->we_active == 'y'?'checked':'n')?>>
          <label class="custom-control-label" for="we_active"></label>
        </div>
      </div>
    </div>
  </div>
  <?if(isset($_GET['edit']) && $_GET['edit'] > 0){?>
    <input type="submit" class="btn btn-primary btn-lg" name="UPDATE_WEBSITE" value="UPDATE WEBSITE">
  <?}else{?>
    <input type="submit" class="btn btn-primary btn-lg" name="ADD_WEBSITE" value="ADD WEBSITE">
  <?}?>
</form>
