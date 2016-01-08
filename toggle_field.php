<?php

function fl_toggle_field_true($name, $value, $field) {
   
?>
<style>
.switch-field {
  font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;

    overflow: hidden;
}

.switch-title {
  margin-bottom: 6px;
}

.switch-field input {
  display: none;
}

.switch-field label {
  float: left;
}

.switch-field label {
  display: inline-block;
  width: 60px;
  background-color: #e4e4e4;
  color: rgba(0, 0, 0, 0.6);
  font-size: 14px;
  font-weight: normal;
  text-align: center;
  text-shadow: none;
  padding: 2px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition:    all 0.1s ease-in-out;
  -ms-transition:     all 0.1s ease-in-out;
  -o-transition:      all 0.1s ease-in-out;
  transition:         all 0.1s ease-in-out;
}

.switch-field label:hover {
    cursor: pointer;
}

.switch-field input:checked + label {
    <?php 
    if (array_key_exists('color', $field)) {
       $color = $field['color'];
   } else {
       $color = '#A5DC86';
   }
    ?>
  background-color: <?php echo $color; ?>;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.switch-field label:first-of-type {
  border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
  border-radius: 0 4px 4px 0;
}
</style>

<div class="switch-field">

<?php

    if (array_key_exists('options', $field)) {
        
        $options = $field['options'];
        
        $keys = array_keys($options);
        
        $leftKey = $keys[0];
        
        $rightKey = $keys[1];
	
        $leftValue = $options[$leftKey];
        
        $rightValue = $options[$rightKey];	
	
    } else {
        
        $leftKey = 'true';
        
        $rightKey = 'false';
        
        $leftValue = 'True';
        
        $rightValue = 'False';
        
    }
?>

      <input type="radio" id="switch_left" name="<?php echo $name; ?>" value="<?php echo $leftKey; ?>" <?php if (isset($value) && $value==$leftKey) echo "checked"; ?> />
      <label for="switch_left"><?php echo $leftValue; ?></label>
    
      <input type="radio" id="switch_right" name="<?php echo $name; ?>" value="<?php echo $rightKey; ?>" <?php if (isset($value) && $value==$rightKey) echo "checked"; ?> />
      <label for="switch_right"><?php echo $rightValue; ?></label>
    
    </div>
<?php

}

add_action('fl_builder_control_toggle', 'fl_toggle_field_true', 1, 3);
