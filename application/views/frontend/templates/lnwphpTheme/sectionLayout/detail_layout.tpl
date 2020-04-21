{if !isset($title) }
{$title="lnwPHP"}
{/if}

{include file="header.tpl"}
<div class="container">

  <main role="main">
    <div class="row">

     <aside class="col-md-3 blog-sidebar pl-1">

        {include file="viewLayout/sidebar_view.tpl"}

      </aside><!-- /.blog-sidebar -->
      
      <div class="col-md-9 blog-main pr-1">

        {include file="viewLayout/detail_view.tpl"}

      </div><!-- /.blog-main -->

    </div><!-- /.row -->

  </main><!-- /.container -->

</div>
{include file="footer.tpl"}