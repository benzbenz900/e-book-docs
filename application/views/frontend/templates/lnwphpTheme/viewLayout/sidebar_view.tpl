<div class="blog-post cii3-pra-blog d-none d-sm-none d-md-block d-lg-block d-xl-block">
  <div class="row m-0">

    <div class="col-12 p-2">
      {"หมวดหมู่"|title:false}
    </div>

    <div class="col-12 px-2 mb-2">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="list-group list-group-flush">
            <a href="{BASE_URL}main/category/1/" class="list-group-item list-group-item-action">{cat1}</a>
            <a href="{BASE_URL}main/category/2/" class="list-group-item list-group-item-action">{cat2}</a>
            <a href="{BASE_URL}main/category/3/" class="list-group-item list-group-item-action">{cat3}</a>
            <a href="{BASE_URL}main/category/0/" class="list-group-item list-group-item-action">ไม่มีหมวดหมู่</a>
          </div>
        </div>
      </div>
    </div>
    {if isset($smarty.session.adminSession)}
    {if $smarty.session.adminSession == 'benzadminlnwphp0641235678'|md5}
    <div class="col-12 p-2">
      {"กำลังอยู่ในระบบ"|title:false}
    </div>

    <div class="col-12 px-2 mb-2">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="list-group list-group-flush">
            <a href="{BASE_URL}main/logout/"
              class="list-group-item text-white list-group-item-action bg-danger">ออกจากระบบ</a>
          </div>
        </div>
      </div>
    </div>
    {/if}
    {/if}



  </div>
</div>