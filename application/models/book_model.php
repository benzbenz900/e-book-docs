<?php

class book_model extends Model
{

    public function book($xcrud,$id='')
    {
        $xcrud->table('my_book');
        	if(isset($_SESSION['adminSession'])){
                 $xcrud->button(BASE_URL.'main/upload/{id}/','อัพโหลด','fas fa-upload','',array('target'=>'_blank'));
    }else{
        $xcrud->unset_add();
        $xcrud->columns('name,up_date');
        $xcrud->column_callback('up_date','modifier_ago');
		$xcrud->unset_edit();
		$xcrud->unset_remove();
    }
        $xcrud->unset_view();
        $xcrud->unset_title();

        $xcrud->label(
            array(
                'name'=>'ชื่อเรื่อง',
                'image'=>'รูปภาพ',
                'description'=>'เรื่องย่อ',
                'catagory'=>'หมวดหมู่',
                'post_date'=>'เพิ่มเมื่อ',
                'up_date'=>'อัพเดจเมื่อ'
                )
            );

        $xcrud->change_type('image', 'image', '', array(
            'thumbs' => array(
                array('width' => 70, 'folder' => 'thumbs_small'),
                array('width' => 250, 'folder' => 'thumbs_middle'),
            ),
        ));

        $xcrud->columns('name');

        
        $xcrud->fields('post_date,post_date',true);
        $xcrud->no_quotes('post_date');
        $xcrud->pass_var('post_date', 'now()', 'create');

        $xcrud->no_quotes('up_date');
        $xcrud->pass_var('up_date', 'now()', 'create');
        $xcrud->pass_var('up_date', 'now()', 'edit');

        $xcrud->column_callback('name','modifier_name');

        if(!empty($id) && is_numeric($id)){
            $xcrud->where('catagory =',$id);
        }

        $xcrud->change_type('catagory','select','0',array(
            '0' => 'ไม่มีหมวดหมู่',
            '1' => cat1,
            '2' => cat2,
            '3' => cat3,
        ));

       

        $xcrud->limit(18);

        $xcrud->order_by('up_date', 'DESC');

        return $xcrud;
    }

    public function getDetail($id = '')
    {
        $value = "*";

        $getboradDetail = $this->query("SELECT $value FROM my_book WHERE id = ?;", $id)->fetchArray();

        return $getboradDetail;
    }

}
