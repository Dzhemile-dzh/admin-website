<form  id="affiliateBrandForm" method="POST" enctype="multipart/form-data">
  <div class="form-subtitle">
    <h1><?if ($_GET['edit'] > 0){ echo 'Edit';} else{ echo 'Add'; }?>  Affiliate Brand</h1>
  </div>
    <div class="form-row">
      <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
        <input type="hidden" name="ab_id" value = "<? echo $aff_program_brand->ab_id; ?>">
      <? } ?>
        <input type="hidden" name="ab_ap_id" value = "<? echo $aff_program_brand->ab_ap_id; ?>">
      <div class="form-group col-md-6">
        <label for="ab_ap_id">Affiliate Program</label>
        <input type="text" class="form-control" id="ap_name" name="ap_name" placeholder="<? echo $aff_program_brand->ap_name; ?>" disabled >
      </div>
      <div class="form-group col-md-6">
        <label for="ab_brand_name">Brand Name </label>
        <input type="text" class="form-control" id="ab_brand_name" name="ab_brand_name" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) {?> value="<? echo $aff_program_brand->ab_brand_name; ?>"<?}else{?> placeholder="Bet365 Affiliates" required <?}?> >
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
          <label for="ab_verticals">Verticals</label>
          <? if (isset($_GET['edit']) && $_GET['edit'] > 0) {?>
            <div>
            <select class="selectpicker" name="ab_verticals[]" data-max-options="5 "multiple title="<? echo $aff_program_brand->ab_verticals; ?>" style="max-width:90%;">
            <? 
              $ab_verticals = explode(',',$aff_program_brand->ab_verticals);
              foreach ($verticals as $vertical) {
                if (in_array($vertical->ve_id, $ab_verticals)){ $selected = 'selected'; }else{ $selected = ''; }
                echo ('<option value="'.$vertical->ve_id.'" '.$selected.'>'.$vertical->ve_vertical.'('.$vertical->ve_id.')</option>');
              }
            ?>
            </select>
            </div>
            <script>
              $('select').selectpicker();
              $('select[name=ab_verticals[]]').val(1);
              $('.selectpicker').selectpicker('refresh');
            </script>
           <?}else{?>
            <div>
              <select class="selectpicker" name="ab_verticals[]" data-max-options="5" multiple>
                <? foreach ($verticals as $vertical) { ?>
                   <option value = "<? echo $vertical->ve_id ?>"> <? echo $vertical->ve_vertical;?> </option> 
                <? } ?>
              </select>
            </div>
            <script>$('select').selectpicker();</script>
          <? } ?>
      </div>
      <div class="form-group col-md-6">
        <label for="ab_markets">Markets </label>
          <div>
            <select id="ab_markets" name="ab_markets"   class="selectpicker"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){?> title="<? echo $aff_program_brand->ab_markets;?>"<?}?>>
              <option value="International"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){ $website->ab_markets == 'International'?'selected="selected"': ''?><?}?>>International</option>
              <option value="GR"<? if(isset($_GET['edit']) && $_GET['edit'] > 0){ $website->ab_markets == 'GR'?'selected="selected"': ''?><?}?>>GR</option>
              <option value="IT"<? if(isset($_GET['edit']) && $_GET['edit'] > 0){ $website->ab_markets == 'IT'?'selected="selected"': ''?><?}?>>IT</option>
              <option value="MX"<? if(isset($_GET['edit']) && $_GET['edit'] > 0){ $website->ab_markets == 'MX'?'selected="selected"': ''?><?}?>>MX</option>
              <option value="US"<? if(isset($_GET['edit']) && $_GET['edit'] > 0){ $website->ab_markets == 'US'?'selected="selected"': ''?><?}?>>US</option> 
              <option value="GB"<? if(isset($_GET['edit']) && $_GET['edit'] > 0){ $website->ab_markets == 'GB'?'selected="selected"': ''?><?}?>>GB</option>          
            </select>
          </div>
            <script>
              $('select').selectpicker(); 
              $('select[name=ab_markets]').val(1);
              $('.selectpicker').selectpicker('refresh');
            </script> 
      </div>
    </div>
    <div class="form-row">
      <div class=" form-group col-sm-6">
        <label for="ab_restricted">Restricted Countries</label>
        <textarea class="form-control" rows="10" cols="10" id="ab_restricted" name="ab_restricted"><? if ($_GET['edit'] > 0){ echo $aff_program_brand->ab_restricted; }?></textarea>
      </div>
      <div class=" form-group col-sm-6">
        <label for="ab_languages">Languages</label>
        <textarea class="form-control" rows="10" cols="10" id="ab_languages" name="ab_languages"><? if ($_GET['edit'] > 0){ echo $aff_program_brand->ab_languages; }?></textarea>
      </div>
    </div>
        <div class="form-row">
      <div class=" form-group col-sm-6">
        <label for="ab_currencies">Currencies</label>
        <textarea class="form-control" rows="5" cols="10" id="ab_currencies" name="ab_currencies"><? if ($_GET['edit'] > 0){ echo $aff_program_brand->ab_currencies; }?></textarea>
      </div>
      <div class=" form-group col-sm-6">
        <label for="ab_licenses">Licenses</label>
        <input type="text" class="form-control" id="ab_licenses" name="ab_licenses" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) {?> value="<? echo $aff_program_brand->ab_licenses; ?>"<?}?>>
      </div>
    </div>

    <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
        <input type="submit" class="btn btn-primary btn-lg" name="UPDATE_AFFILIATE_BRAND" value="UPDATE AFFILIATE BRAND">
    <? }else{ ?>
        <input type="submit" class="btn btn-primary btn-lg" name="ADD_AFFILIATE_BRAND" value="ADD AFFILIATE BRAND">
    <? } ?>
</form>