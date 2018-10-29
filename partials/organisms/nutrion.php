<div class="inf-window text-center" id="nutrion">
    <div class="content">
        <div class="nutrition-table clearfix">
            <div class="recipes_container">
                <?php
                $count_type = get_field_object('product_type');
                $count = (count($count_type['value']));
                while (have_rows('product_type')): the_row();
                    $product_type_row = get_row_index();
                    while (have_rows('variables_product')): the_row();
                        $variables_product_row = get_row_index();
                        ?>
                        <div class="nutrition <?php echo 'type-' . $product_type_row . '-variable-' . $variables_product_row; if($product_type_row != $count) { echo ' hide'; } ?>">
                            <div id="product-content-nutrition"><?php echo get_sub_field("nutrition_content"); ?></div>
                        </div>
                    <?php
                    endwhile;
                endwhile;
                ?>
            </div>
        </div>
    </div>
</div>