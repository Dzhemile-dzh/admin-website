<form  id="BrandOffersForm" method="POST" enctype="multipart/form-data">
  <div class="form-subtitle">
    <h1><?if ($_GET['edit'] > 0){ echo 'Edit';} else{ echo 'Add'; }?> Brand Offer </h1>
  </div>
    <div class="form-row">
      <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
        <input type="hidden" name="bo_id" value = "<? echo $brand_offers->bo_id; ?>">

      <? } ?>
      <input type="hidden" name="bo_ab_id" value = "<? echo $brand->ab_id; ?>">
      <input type="hidden" name="bo_country_id" value = "<? echo $country->id; ?>">
      <div class="form-group col-md-3">
        <label for="bo_ab_id">Brand</label>
        <div>
          <select id="bo_ab_id" name="bo_ab_id"  class="selectpicker" <?if($_GET['edit'] > 0){?>disabled <?}?>>
            <option value="0">Select Brand ...</option> 
            <? 
              foreach ($affiliate_brands as $brand) {
                if($_GET['edit'] > 0 && $brand->ab_id == $brand_offers->bo_ab_id){ 
                  $selected = 'selected'; 
                }else{ $selected = ''; }
                echo ('<option value="'.$brand->ab_id.'" '.$selected.'>'.$brand->ab_brand_name.'</option>');

              }              
            ?>
          </select>
        </div>
        <script>
          $('select').selectpicker(); 
          $('select[name=bo_ab_id]').val(1);
          $('.selectpicker').selectpicker('refresh');
        </script> 
      </div>
      <div class="form-group col-md-3">
        <label for="bo_type">Offer Type</label>
        <div>
          <select id="bo_type" name="bo_type"   class="selectpicker"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){?> title="<? echo $brand_offers->bo_type;?>"<?}?>>
            <option value="0">Select Offer Type ...</option> 
            <option value="welcome offer"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){ $brand_offers->bo_type == 'welcome offer'?'selected="selected"': ''?><?}?>>Welcome Offer</option>
            <option value="free bet"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){ $brand_offers->bo_type == 'free bet'?'selected="selected"': ''?><?}?>>Free Bet</option>
            <option value="bet credits"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){ $brand_offers->bo_type == 'bet credits'?'selected="selected"': ''?><?}?>>Bet Credits</option>    
          </select>
        </div>
        <script>
          $('select').selectpicker(); 
          $('select[name=bo_type]').val(1);
          $('.selectpicker').selectpicker('refresh');
        </script> 
      </div>
      <div class="form-group col-md-3">
        <label for="bo_id">Country</label>
        <div>
          <select id="bo_country_id" name="bo_country_id"  class="selectpicker" data-live-search="true">
            <option value="0">Select Country ...</option> 
              <? 
                foreach ($countries as $country) {
                  if($_GET['edit'] > 0 && $country->id == $brand_offers->bo_country_id){ 
                    $selected = 'selected'; 
                  }else{ $selected = ''; }
                  echo ('<option value="'.$country->id.'" '.$selected.'>'.$country->nicename.'</option>');
                }              
              ?>
          </select>
        </div>
      </div>
      <div class="form-group col-md-3">
        <label for="bo_currency">Currency</label>
        <div>
          <select id="bo_currency" name="bo_currency"   class="selectpicker"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){?> title="<? echo $brand_offers->bo_currency;?>"<?}?>>
            <option value="0">Select Currency ...</option> 
            <option value="€"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){ $brand_offers->bo_type == '€'?'selected="selected"': ''?><?}?>>€</option>
            <option value="£"<?if(isset($_GET['edit']) && $_GET['edit'] > 0){ $brand_offers->bo_type == '£'?'selected="selected"': ''?><?}?>>£</option>
          </select>
        </div>
          <script>
            $('select').selectpicker(); 
            $('select[name=bo_currency]').val(1);
            $('.selectpicker').selectpicker('refresh');
          </script> 
      </div>
    </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="bo_min_deposit">MIN Deposit</label>
          <input type="text" class="form-control" id="bo_min_deposit" name="bo_min_deposit" placeholder="10£"  <? if ($_GET['edit'] > 0) { ?> value="<? echo $brand_offers->bo_min_deposit; ?>" <? }else{ ?> required <? } ?>>
        </div>
        <div class="form-group col-md-4">
          <label for="bo_min">MIN</label>
          <input type="text" class="form-control" id="bo_min" name="bo_min" placeholder="20£"  <? if ($_GET['edit'] > 0) { ?> value="<? echo $brand_offers->bo_min; ?>" <? }else{ ?> required <? } ?>>
        </div>
        <div class="form-group col-md-4">
          <label for="bo_max">MAX</label>
          <input type="text" class="form-control" id="bo_max" name="bo_max" placeholder="60£" <? if ($_GET['edit'] > 0) { ?> value="<? echo $brand_offers->bo_max; ?>" <? }else{ ?> required <? } ?>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="bo_time">Time</label>
          <input type="text" class="form-control" id="bo_time" name="bo_time" placeholder="30 days" <? if ($_GET['edit'] > 0) { ?> value="<? echo $brand_offers->bo_time; ?>" <? }else{ ?> required <? } ?>>
        </div>
        <div class="form-group col-md-6">
          <label for="bo_requirments">Requirments</label>
          <input type="text" class="form-control" id="bo_requirments" name="bo_requirments" placeholder="1X" <? if ($_GET['edit'] > 0) { ?> value="<? echo $brand_offers->bo_requirments; ?>" <? }else{ ?> required <? } ?>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="bo_min_odds">Min Odds</label>
          <input type="text" class="form-control" id="bo_min_odds" name="bo_min_odds" placeholder="1.5"<? if ($_GET['edit'] > 0) { ?> value="<? echo $brand_offers->bo_min_odds; ?>" <? }else{ ?> required <? } ?>>
        </div>
        <div class="form-group col-md-6">
          <label for="bo_overal_rating">Overal Rating</label>
          <input type="text" class="form-control" id="bo_overal_rating" name="bo_overal_rating" placeholder="90%" <? if ($_GET['edit'] > 0) { ?> value="<? echo $brand_offers->bo_overal_rating; ?>" <? }else{ ?> required <? } ?>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="bo_small_print">Small Print</label>
          <input type="text" class="form-control" id="bo_small_print" name="bo_small_print" <? if ($_GET['edit'] > 0) { ?> value="<? echo $brand_offers->bo_small_print; ?>" <? }else{ ?> required <? } ?>>
        </div>
        <div class="form-group col-md-6">
          <label for="bo_custum_link">Custum Link</label>
          <input type="text" class="form-control" id="bo_custum_link" name="bo_custum_link" <? if ($_GET['edit'] > 0) { ?> value="<? echo $brand_offers->bo_custum_link; ?>" <? }else{ ?> required <? } ?>>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="bo_description">Description</label>
          <textarea class="form-control" id="bo_description" name="bo_description"></textarea>
        </div>
      </div>

    <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
        <input type="submit" class="btn btn-primary btn-lg" name="UPDATE_BRAND_OFFERS" value="UPDATE BRAND OFFER">
    <? }else{ ?>
        <input type="submit" class="btn btn-primary btn-lg" name="ADD_BRAND_OFFERS" value="ADD BRAND OFFER">
    <? } ?>
</form>