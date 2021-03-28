<form  id="game" method="POST" enctype="multipart/form-data">
  <div class="form-subtitle">
     <h1><?if ($_GET['edit'] > 0){ echo 'Edit';} else{ echo 'Add'; }?> Games</h1>
  </div>
    <div class="form-row">
      <?if(isset($_GET['edit']) && $_GET['edit'] > 0) {echo ('<input type="hidden" id="gm_id" name="gm_id" value="'.$game_edit->gm_id.'">');}?>
      <input type="hidden" name="wc_we_id" id="wc_we_id" value="<? echo $current_we_id; ?>">
      <div class="form-group col-md-4">
        <label for="gm_title">Title</label>
        <input type="text" class="form-control" id="gm_title" name="gm_title" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) {?> value="<? echo $game_edit->gm_title; ?>"<?}else{?> required <?}?> >
      </div>
      <div class="form-group col-md-4">
        <label for="gm_paylines_num">Paylines </label>
        <input type="text" class="form-control" id="gm_paylines_num" name="gm_paylines_num" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) {?> value="<? echo $game_edit->gm_paylines_num; ?>"<?}else{?> required <?}?> >
      </div>
      <div class="form-group col-md-4">
        <label for="gm_reels">Reels </label>
        <input type="text" class="form-control" id="gm_reels" name="gm_reels" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) {?> value="<? echo $game_edit->gm_reels; ?>"<?}else{?> required <?}?> >
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="gm_providers">Provider</label>
        <input type="text" class="form-control" id="gm_providers" name="gm_providers" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?> value="<? echo $game_edit->gm_providers; ?>"<?}else{?>placeholder="" required <?}?>>
      </div>
      <div class="form-group col-md-3">
        <label for="gm_rtp">RTP%</label>
        <input type="text" class="form-control" id="gm_rtp" name="gm_rtp" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?> value="<? echo $game_edit->gm_rtp; ?>"<?}else{?>placeholder="" required <?}?>>
      </div>
      <div class="form-group col-md-3">
        <label for="gm_min_bonus">min bet £</label>
        <input type="text" class="form-control" id="gm_min_bonus" name="gm_min_bonus" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?> value="<? echo $game_edit->gm_min_bonus; ?>"<?}else{?>placeholder="" required <?}?>>
      </div>
      <div class="form-group col-md-3">
        <label for="gm_max_bonus">max bet £</label>
        <input type="text" class="form-control" id="gm_max_bonus" name="gm_max_bonus" <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?> value="<? echo $game_edit->gm_max_bonus; ?>"<?}else{?>placeholder="" required <?}?>>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="gm_wild_symbol">Wild Symbol</label>
          <div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <?if($game_edit->gm_wild_symbol == 'yes'){$valuech='yes';$checked ='checked';}else{$valuech = 'no';$checked = '';} ?>
              <input type="checkbox" class="custom-control-input" id="gm_wild_symbol" name="gm_wild_symbol" onclick="<?if($valuech == 'yes'){$valuech ='no';$checked ='checked';}else{$valuech = 'yes';$checked = '';}?>" value="<? echo $valuech?>" <? echo $checked;?>>
              <label class="custom-control-label" for="gm_wild_symbol"></label>
            </div>
          </div>
      </div>
      <div class="form-group col-md-3">
        <label for="gm_progressive">Progressive</label>
          <div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <?if($game_edit->gm_progressive == 'yes'){$valuech='yes';$checked ='checked';}else{$valuech = 'no';$checked = '';} ?>
              <input type="checkbox" class="custom-control-input" id="gm_progressive" name="gm_progressive" onclick="<?if($valuech == 'yes'){$valuech ='no';$checked ='checked';}else{$valuech = 'yes';$checked = '';}?>" value="<? echo $valuech?>" <? echo $checked;?>>
              <label class="custom-control-label" for="gm_progressive"></label>
            </div>
          </div>
      </div>
      <div class="form-group col-md-3">
        <label for="gm_autoplay">Autoplay</label>
          <div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <?if($game_edit->gm_autoplay == 'yes'){$valuech='yes';$checked ='checked';}else{$valuech = 'no';$checked = '';} ?>
              <input type="checkbox" class="custom-control-input" id="gm_autoplay" name="gm_autoplay" onclick="<?if($valuech == 'yes'){$valuech ='no';$checked ='checked';}else{$valuech = 'yes';$checked = '';}?>" value="<? echo $valuech?>" <? echo $checked;?>>
              <label class="custom-control-label" for="gm_autoplay"></label>
            </div>
          </div>
      </div>
      <div class="form-group col-md-3">
        <label for="gm_mobile">Mobile</label>
          <div>
            <div class="custom-control custom-checkbox custom-control-inline">
              <?if($game_edit->gm_mobile == 'yes'){$valuech='yes';$checked ='checked';}else{$valuech = 'no';$checked = '';} ?>
              <input type="checkbox" class="custom-control-input" id="gm_mobile" name="gm_mobile" onclick="<?if($valuech == 'yes'){$valuech ='no';$checked ='checked';}else{$valuech = 'yes';$checked = '';}?>" value="<? echo $valuech?>" <? echo $checked;?>>
              <label class="custom-control-label" for="gm_mobile"></label>
            </div>
          </div>
      </div>
    </div>
    <? if(isset($_GET['edit']) && $_GET['edit'] > 0) { ?>
        <input type="submit" class="btn btn-primary btn-lg" name="UPDATE_GAME" value="UPDATE GAME">
    <? }else{ ?>
        <input type="submit" class="btn btn-primary btn-lg" name="ADD_GAME" value="ADD GAME">
    <? } ?>
</form>