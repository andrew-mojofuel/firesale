
    <section class="title">
        <h4><?php echo lang('firesale:gateways:install_title'); ?></h4>
    </section>

    <?php echo form_open(uri_string()); ?>

        <section class="item">
            <div class="content form_inputs">

                <fieldset>
                    <ul>
                        <?php foreach ($fields as $field): ?>
                            <li class="<?php echo alternator('even', ''); ?>">
                                <?php if ($field['type'] == 'boolean'): ?>
                                    <label for="<?php echo $field['field']; ?>"><?php echo $field['label']; ?> <span>*</span></label>
                                    <div class="input">
                                        <select name="<?php echo $field['field']; ?>">
                                            <option value="1"<?php echo set_select($field['field'], '1', isset($values[$field['field']]) AND $values[$field['field']] == '1' ? TRUE : $field['default'] === true); ?>>Yes</option>
                                            <option value="0"<?php echo set_select($field['field'], '0', isset($values[$field['field']]) AND $values[$field['field']] == '0' ? TRUE : $field['default'] === false); ?>>No</option>
                                        </select>
                                    </div>
                                <?php elseif ($field['type'] == 'text'): ?>
                                    <label for="<?php echo $field['field']; ?>"><?php echo $field['label']; ?> <span>*</span></label>
                                    <div class="input">
                                        <textarea id="<?php echo $field['field']; ?>" name="<?php echo $field['field']; ?>" style="width:250px"><?php echo set_value($field['field'], isset($values[$field['field']]) ? $values[$field['field']] : $field['default']); ?></textarea>
                                    </div>
                                <?php elseif ($field['type'] == 'array'): ?>
                                    <label for="<?php echo $field['field']; ?>"><?php echo $field['label']; ?> <span>*</span></label>
                                    <div class="input">
                                        <?php echo form_dropdown($field['field'], $field['options'], isset($values[$field['field']]) ? $values[$field['field']] : $field['default']); ?>
                                    </div>
                                <?php else: ?>
                                    <label for="<?php echo $field['field']; ?>"><?php echo $field['label']; ?> <span>*</span></label>
                                    <div class="input">
                                        <input type="text" name="<?php echo $field['field']; ?>" value="<?php echo set_value($field['field'], isset($values[$field['field']]) ? $values[$field['field']] : $field['default']); ?>" maxlength="100" id="<?php echo $field['field']; ?>" />
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </fieldset>
                <button class="btn blue" value="install" name="btnAction" type="submit">
                    <span><?php echo lang('global:install'); ?></span>
                </button>

            </div>
        </section>
    <?php echo form_close(); ?>
