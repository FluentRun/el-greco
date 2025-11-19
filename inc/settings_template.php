<?php

function cb_color_picker($name='',$var='',$set_key='',$set_value=[],$array='',$without_key = 0){
    $field_name = $array ? $array.'['.$var.']' : $var;
    if ( $without_key ) {
        $field_name = $var;
    }

    $current = '';
    if ( $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    } elseif ( ! $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    }

    ?>
    <div class="colorpicker_cont">
        <input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $var . '-' . $set_key ); ?>" value="<?php echo esc_attr( $current ); ?>" class="colorpicker" />
        <label for="<?php echo esc_attr( $var . '-' . $set_key ); ?>"><?php echo esc_html( $name ); ?></label>
    </div>
    <?php
}

function cb_checkbox($name='',$var='',$set_key='',$set_value=[],$array='',$under_text=''){
    $field_name = $array ? $array.'['.$var.']' : $var;
    $checked    = false;

    if ( $array && isset( $set_value[ $var ] ) ) {
        $checked = (bool) $set_value[ $var ];
    } elseif ( ! $array && isset( $set_value[ $var ] ) ) {
        $checked = (bool) $set_value[ $var ];
    }

    ?>
    <div class="glide_check">
        <input type="hidden" name="<?php echo esc_attr( $field_name ); ?>" value="0" />
        <input type="checkbox" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $var . '-' . $set_key ); ?>" value="1" <?php checked( $checked ); ?> />
        <label for="<?php echo esc_attr( $var . '-' . $set_key ); ?>"><?php echo esc_html( $name ); ?></label>
        <?php if ( $under_text ) : ?>
            <span class="form-tip"><?php echo esc_html( $under_text ); ?></span>
        <?php endif; ?>
    </div>
    <?php
}

function cb_image($name='',$var='',$set_key='',$set_value=[],$array='',$tip='',$without_key = 0,$prefix=''){
    $field_name = $array ? $array.'['.$var.']' : $var;
    if ( $without_key ) {
        $field_name = $var;
    }

    $current = '';
    if ( $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    } elseif ( ! $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    }

    ?>
    <div class="field-group uploadImg-box" data-width="" data-height="">
        <label for="<?php echo esc_attr( $var . '-' . $set_key ); ?>"><?php echo esc_html( $name ); ?></label>
        <div class="field-group image-cropper-container content-group active">
            <img src="<?php echo esc_attr( $current ); ?>" alt="" class="preview-upload" />
        </div>
        <?php if ( $tip ) : ?>
            <div class="form-tip"><?php echo esc_html( $tip ); ?></div>
        <?php endif; ?>
        <div class="field-group button_flex">
            <button type="button" class="btn btn-green upload_file"><i class="cb_i_upload"></i><span class="hidden-xs"><?php _e('Upload','elgreco'); ?></span></button>
            <button type="button" class="btn btn-default remove_file"><i class="cb_i_cross"></i><span class="hidden-xs"><?php _e('Remove','elgreco'); ?></span></button>
            <button type="button" class="btn btn-blue crop_file" style="display: none;"><i class="cb_i_crop"></i><span class="hidden-xs"><?php _e('Crop','elgreco'); ?></span></button>
        </div>
        <input type="hidden" class="file_url form-control" id="<?php echo esc_attr( $var . '-' . $set_key ); ?>" data-crop_name="<?php echo esc_attr( $var ); ?>-crop" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $current ); ?>" />
    </div>
    <?php
}

function cb_image_crop($name='',$var='',$set_key='',$set_value=[],$array='',$tip='',$without_key = 0,$prefix='',$width='', $height=''){
    $field_name = $array ? $array.'['.$var.']' : $var;
    if ( $without_key ) {
        $field_name = $var;
    }

    $current = '';
    if ( $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    } elseif ( ! $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    }

    ?>
    <div class="field-group uploadImg-box" data-width="<?php echo esc_attr( $width ); ?>" data-height="<?php echo esc_attr( $height ); ?>">
        <label for="<?php echo esc_attr( $var . '-' . $set_key ); ?>"><?php echo esc_html( $name ); ?></label>
        <div class="field-group image-cropper-container content-group active">
            <img src="<?php echo esc_attr( $current ); ?>" alt="" class="cropper preview-upload" />
        </div>
        <?php if ( $tip ) : ?>
            <div class="form-tip"><?php echo esc_html( $tip ); ?></div>
        <?php endif; ?>
        <div class="field-group button_flex">
            <button type="button" class="btn btn-green upload_file"><i class="cb_i_upload"></i><span class="hidden-xs"><?php _e('Upload','elgreco'); ?></span></button>
            <button type="button" class="btn btn-default remove_file"><i class="cb_i_cross"></i><span class="hidden-xs"><?php _e('Remove','elgreco'); ?></span></button>
            <button type="button" class="btn btn-blue crop_file" style="display: none;"><i class="cb_i_crop"></i><span class="hidden-xs"><?php _e('Crop','elgreco'); ?></span></button>
        </div>
        <input type="hidden" class="file_url form-control" id="<?php echo esc_attr( $var . '-' . $set_key ); ?>" data-crop_name="<?php echo esc_attr( $var ); ?>-crop" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $current ); ?>" />
    </div>
    <?php
}

function cb_input($name='',$var='',$set_key='',$set_value=[],$array='',$placeholder='',$tooltip='',$under_text=''){
    $field_name = $array ? $array.'['.$var.']' : $var;
    $current    = '';

    if ( $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    } elseif ( ! $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    }

    ?>
    <div>
        <label for="<?php echo esc_attr( $var . '-' . $set_key ); ?>"><?php echo esc_html( $name ); ?> <?php if ( $tooltip ) : ?><span class="css_tooltip <?php echo esc_attr( $tooltip ); ?>">?</span><?php endif; ?></label>
        <input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $var . '-' . $set_key ); ?>" value="<?php echo esc_attr( $current ); ?>" placeholder="<?php echo esc_attr( $placeholder ); ?>" />
        <?php if ( $under_text ) : ?>
            <span class="form-tip"><?php echo esc_html( $under_text ); ?></span>
        <?php endif; ?>
    </div>
    <?php
}

function cb_textarea($name='',$var='',$set_key='',$set_value=[],$array='',$tip=''){
    $field_name = $array ? $array.'['.$var.']' : $var;
    $current    = '';

    if ( $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    } elseif ( ! $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    }

    ?>
    <div>
        <label for="<?php echo esc_attr( $var . '-' . $set_key ); ?>"><?php echo esc_html( $name ); ?></label>
        <textarea name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $var . '-' . $set_key ); ?>"><?php echo esc_textarea( $current ); ?></textarea>
        <?php if ( $tip ) : ?>
            <div class="form-tip"><?php echo esc_html( $tip ); ?></div>
        <?php endif; ?>
    </div>
    <?php
}

function cb_textarea_big($name='',$var='',$set_key='',$set_value=[],$array=''){
    $field_name = $array ? $array.'['.$var.']' : $var;
    $current    = '';

    if ( $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    } elseif ( ! $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    }

    ?>
    <div>
        <label for="<?php echo esc_attr( $var . '-' . $set_key ); ?>"><?php echo esc_html( $name ); ?></label>
        <textarea class="textarea_big editor" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $var . '-' . $set_key ); ?>"><?php echo esc_textarea( $current ); ?></textarea>
        <span></span>
    </div>
    <?php
}

function cb_separate($name=''){
    ?>
    <div class="cb_separate"><hr><h4><?php echo esc_html( $name ); ?></h4></div>
    <?php
}

function cb_radio($name='',$var='', $key=0, $set_value=[]){
    $current = isset( $set_value[ $var ] ) ? $set_value[ $var ] : '';
    ?>
    <div class="glide_check">
        <input type="radio" name="<?php echo esc_attr( $var ); ?>" id="<?php echo esc_attr( $var . '-' . $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php checked( $current, $key ); ?> />
        <label for="<?php echo esc_attr( $var . '-' . $key ); ?>"><?php echo esc_html( $name ); ?></label>
    </div>
    <?php
}

function cb_select($name='',$var='',$set_data=[], $set_value=[], $actor='',$array=''){
    $field_name = $array ? $array.'['.$var.']' : $var;
    $current    = '';

    if ( $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    } elseif ( ! $array && isset( $set_value[ $var ] ) ) {
        $current = $set_value[ $var ];
    }

    $values_key = 'values_' . $var;
    $options    = isset( $set_data[ $values_key ] ) ? $set_data[ $values_key ] : [];

    ?>
    <div class="select_block" <?php echo $actor; ?>>
        <label><?php echo esc_html( $name ); ?></label>
        <select name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $var ); ?>">
            <?php foreach ( $options as $option ) : ?>
                <?php
                $value = isset( $option['value'] ) ? $option['value'] : '';
                $title = isset( $option['title'] ) ? $option['title'] : '';
                ?>
                <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current, $value ); ?>><?php echo esc_html( $title ); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php
}

