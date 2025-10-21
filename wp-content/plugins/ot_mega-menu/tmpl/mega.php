<div id="tamm-panel-mega" class="tamm-panel-mega tamm-panel">

	<p class="mr-tamm-panel-box">
		<label>
			<input type="checkbox" name="{{ taMegaMenu.getFieldName( 'mega', data.data['menu-item-db-id'] ) }}"
			       value="1" {{ data.megaData.mega ? 'checked="checked"' : '' }} >
			<?php esc_html_e( 'Mega Menu', 'ot_mega-menu' ) ?>
        </label>
    </p>
	
	<p class="mr-tam-panel-box-large" style="display: none;">
		<label><?php esc_html_e( 'Mega Width', 'ot_mega-menu' ) ?></label>
		<select name="{{ taMegaMenu.getFieldName( 'mega_width', data.data['menu-item-db-id'] ) }}">
			<option value="mmenu-full-width" {{
			'mmenu-full-width' == data.megaData.mega_width ? 'selected="selected"' : '' }}><?php esc_html_e( 'Full Width', 'ot_mega-menu' ); ?></option>
			<option value="mmenu-boxed" {{
			'mmenu-boxed' == data.megaData.mega_width ? 'selected="selected"' : '' }}><?php esc_html_e( 'Boxed', 'ot_mega-menu' ); ?></option>
		</select>
	</p>

    <hr>
    <p class="mr-tamm-panel-box-large">
        <button type="button" class="ot-edit-mega-menu button-primary button-large"
                data-menu-id="{{data.data['menu-item-db-id']}}">    <?php esc_html_e( 'Edit Mega Menu Content', 'ot_mega-menu' ) ?></button>
    </p>
</div>
