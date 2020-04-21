<?php echo $this->render_table_name(); ?>
<?php if ($this->is_create or $this->is_csv or $this->is_print){?>
<div class="xcrud-top-actions">
    <div class="d-flex justify-content-between">
        <div>
            <?php echo $this->add_button('btn btn-success','fas fa-plus'); ?>
        </div>
        <div class="d-flex justify-content-between">
            <?php echo $this->print_button('btn btn-light','fas fa-print');
                echo $this->csv_button('btn btn-light','fas fa-file'); ?>
            <?php echo $this->render_search(); ?>
        </div>

    </div>
</div>

<?php }else{
    echo $this->render_search();
} ?>
<div class="xcrud-list-container">
    <table class="xcrud-list table-sm table-borderless table table-striped table-hover">
        <thead>
            <?php echo $this->render_grid_head('tr', 'th'); ?>
        </thead>
        <tbody>
            <?php echo $this->render_grid_body('tr', 'td'); ?>
        </tbody>
        <tfoot>
            <?php echo $this->render_grid_footer('tr', 'td'); ?>
        </tfoot>
    </table>
</div>
<div class="xcrud-nav">
    <?php //echo $this->render_limitlist(true); ?>
    <nav aria-label="Page navigation example">
        <?php echo $this->render_pagination(); ?>
    </nav>

    <?php echo $this->render_benchmark(); ?>
</div>