<?print_r($promoted_brands);?>
<form  id="TopPicksForm" method="POST" enctype="multipart/form-data">
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> <b><? echo $website->we_domain; ?></b> Top Picks
    </div>      
    <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
        <input type="hidden" name="ab_id" value = "<? echo $affiliate_bran->ab_id; ?>">
    <? } ?>
    <div class="card-body">
      <div class="container">     
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="we_top_picks">Brands</label>
            <? if (isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
              <div>
                <select class="selectpicker" name="we_top_picks[]" data-max-options="10 "multiple title="<? echo $website->we_top_picks; ?>" style="max-width:auto-width;">
                <?$we_top_picks = explode(',',$website->we_top_picks);
                  foreach ($affiliate_brands as $brand) {
                    if (in_array($brand->ab_id, $we_top_picks)){ $selected = 'selected'; }else{ $selected = ''; }
                    echo ('<option value="'.$brand->ab_id.'" '.$selected.'>'.$brand->ab_brand_name.'('.$brand->ab_id.')</option>');
                  }?>
                </select>
              </div>
              <script>
                $('select').selectpicker();
                $('select[name=we_top_picks[]]').val(1);
                $('.selectpicker').selectpicker('refresh');
              </script>
            <? }else{ ?>
            <div>
              <select class="selectpicker" name="we_top_picks[]" data-max-options="10" multiple>
                <? foreach ($affiliate_bran as $brand) { ?>
                  <option value = "<? echo $brand->ab_id ?>"> <? echo $brand->ab_brand_name;?> </option> 
                <? } ?>
              </select>
            </div>
            <script>$('select').selectpicker();</script>
            <? } ?>
          </div>
          <div class="form-group col-md-4">
            <label for="we_top_picks"><? echo $website->we_domain; ?> Top Picks</label>
              <ol id="list1" class="list-group">
              <?$we_top_picks = explode(',',$website->we_top_picks);
                foreach ($affiliate_bran as $brand) {
                  if (in_array($brand->ab_id, $we_top_picks)){?>
                  <li class="list-group-item list-group-item-danger" value="<? $brand->ab_id?>"><i class="fas fa-arrows-alt-v"></i><? echo $brand->ab_brand_name; echo '(' .$brand->ab_id. ')';?></li>
                <?}}?>
              </ol>
          </div> 
        </div>
        <input type="submit" class="btn btn-primary btn-lg" name="UPDATE_TOP_PICKS" value="UPDATE TOP PICKS">
      </div>
    </div>    
  </div> 
</form>
<!--

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script scr="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

<ul id="sortable2">
<li class="dropped" data-order="0" data-id="1" data-content="blabla">first</li>
<li class="dropped" data-order="0" data-id="2" data-content="another content">second</li>
<li class="dropped" data-order="0" data-id="3" data-content="another content">third</li>
</ul>

<div id="result"></div>

<button class="send">Send</button>
<script type="text/javascript">
  $("#sortable2").sortable();
  $(".send").click(function() {

    var itterate = $(".dropped");
    var data_array = new Array();
    $(".dropped").each(function(){
        
        var item = {};
        item['data-order'] = $(this).data('order');
        item['data-id'] = $(this).data('id');
        item['data-content'] = $(this).data('content');

        data_array.push(item);

    });
    var serialized = JSON.stringify(data_array);

    $("#result").text(serialized);

});
</script>

-->
