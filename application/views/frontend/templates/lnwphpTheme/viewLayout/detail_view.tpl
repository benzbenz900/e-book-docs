<div class="blog-post cii3-pra-blog">
  <div class="row m-0">


    <div class="col-12 p-2">
      {"{$detail.name}"|title:false}
    </div>

    <div class="col-12 p-2 text-center">
      <img class="lazyload rounded mx-auto d-block mw-100" data-src="{BASE_URL}upload/{$detail.image}"
        src="{BASE_URL}upload/thumbs_small/{$detail.image}">
    </div>

    <div class="col-12 p-2">

      {$detail.description}

    </div>

    <div class="col-12 p-2">
      {"โหลด และ อ่าน {$detail.name}"|title:false}
    </div>
    <table class="table table-sm table-borderless table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ชื่อ</th>
          <th scope="col">ขนาด</th>
          <th scope="col">โหลด/อ่าน</th>
        </tr>
      </thead>
      <tbody id="showListFiles">

      </tbody>
    </table>



  </div>
</div><!-- /.blog-post -->


<script>

  function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
  }

  $(function () {

    $.get('{BASE_URL}server/php/?idFolder={$detail.id}', (data) => {
      const json = JSON.parse(data);
      const array = json.files;
      var iCount = 0
      array.forEach(e => {
        iCount++
        $('#showListFiles').append('' +
          '<tr>' +
          '  <th scope="row">' + iCount + '</th>' +
          '  <td>' + e.name + '</td>' +
          '  <td>' + formatBytes(e.size) + '</td>' +
          '  <td><a href="' + e.url + '" target="_blank" title="' + e.name + '">โหลด</a> | <a href="' + e.url + '" target="_blank" title="' + e.name + '">อ่านออนไลน์</a></td>' +
          '</tr>' +
          '')
      });

    })

  });
</script>