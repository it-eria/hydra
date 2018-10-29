<div class="inf-window" id="store">
    <h5>Store Locator:</h5>
    <div class="content">
        <a href="#" class="specific-product">Select Specific Products</a>
        <form action="#">
            <input type="text" id="search-text" placeholder="City/Zip Code" class="search-box">
        </form>
        <div class="results">
            <div class="results__header">
                <div class="row">
                    <div class="col-4 pr-0 list-count"></div>
                    <div class="col-4 text-center"></div>
                    <div class="col-4 text-right">
                        <i class="mail"></i>
                    </div>
                </div>
            </div>
            <?php if (have_rows('addresses')): ?>
            <div class="results__list">
                <ul id="list">
                    <?php while (have_rows('addresses')): the_row();
                        $address = get_sub_field('address');
                        $location_on_google = get_sub_field('location_on_google');
                        ?>
                        <li class="hiding out hidden">
                            <div class="row align-items-center">
                                <?php if ($address): ?>
                                    <div class="col-9">
                                        <address>
                                            <?php echo $address; ?>
                                        </address>
                                    </div>
                                    <?php if ($location_on_google): ?>
                                        <div class="col-3 text-right">
                                            <a target="_blank"
                                               href="<?php echo $location_on_google; ?>"
                                               class="more"></a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endwhile; ?>
                    <div class="empty-item show-res">
                        <?php the_field('locator_content', 'option'); ?>
                    </div>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>