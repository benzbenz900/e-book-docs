<div class="blog-post cii3-pra-blog">
  <div class="row m-0">
{if isset($smarty.session.adminSession)}
<h1>เข้าระบบสำเร็จ</h1>
{else}

<div class="col-12 p-2">
      {"เข้าระบบ เพิ่ม E Book"|title:false}
    </div>


    <div class="col-12 p-2">

      <form action="{BASE_URL}main/adminAction/" method="POST">
        <div class="form-group">
          <label for="usernameadmin">UserName</label>
          <input type="text" class="form-control" id="usernameadmin" name="username"
            placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="passwordadmin">Password</label>
          <input type="password" class="form-control" id="passwordadmin" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>

    </div>

{/if}


  </div>
</div><!-- /.blog-post -->