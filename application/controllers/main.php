<?php
class Main extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $t = $this->loadView('sectionLayout/main');

        $t->set('title', 'Free E-Book | ระบบดาวโหลดเอกสารออนไลน์');
        $t->set('description','');

        $t->set('title_page', 'หน้าแรก');

        $loadTable = $this->loadAdmin();

        $book_model = $this->loadModel('book_model');
        $t->set('LoadTable',$book_model->book($loadTable));

        $t->render();
    }

    public function admin(){
        
        $t = $this->loadView('sectionLayout/login');

        $t->set('title', 'Free E-Book | ระบบดาวโหลดเอกสารออนไลน์');
        $t->set('description','');

        $t->render();

    }

    public function logout(){
        $_SESSION['adminSession'] = null;
        session_destroy();
        $this->redirect('/main/admin');
    }

    public function adminAction(){
        
        if(empty($_POST['username']) || empty($_POST['password'])){
             $this->redirect('/main/admin');
        }else{
            if($_POST['username'] == admin_user){
                if($_POST['password'] == admin_pass){
                    $_SESSION['adminSession'] = md5('benzadminlnwphp0641235678');
                    $this->redirect('/');
                }else{
                    $this->redirect('/main/admin');
                }
            }else{
                $this->redirect('/main/admin');
            }
        }
    }

    public function detail($id='')
    {
        if(is_numeric($id)){
            $t = $this->loadView('sectionLayout/detail');

            $book_model = $this->loadModel('book_model');

            $getDetail = $book_model->getDetail($id);

            $t->set('title', $getDetail['name'].' | Free E-Book | ระบบดาวโหลดเอกสารออนไลน์');
            $t->set('description', $getDetail['name'].' | Free E-Book | อ่าน '.$getDetail['name'].' โหลด '.$getDetail['name'].' เอกสาร '.$getDetail['name'].' ออนไลน์');

            $t->set('detail', $getDetail);
            

            $t->render();
        }else{
            $this->redirect('/error_view');
        }
    }

    public function upload($id='')
    {

        if(empty($_SESSION['adminSession'])){
            $this->redirect('/error_view');
            exit();
        }else{
            if($_SESSION['adminSession'] !== md5("benzadminlnwphp0641235678")){
                $this->redirect('/error_view');
                exit();
            }
        }
    
        if(is_numeric($id)){
            $t = $this->loadView('sectionLayout/upload');

            $book_model = $this->loadModel('book_model');

            $getDetail = $book_model->getDetail($id);
            $t->set('detail', $getDetail);
            $t->set('id',$id);
            $t->render();
        }else{
            $this->redirect('/error_view');
        }
    }

    public function category($id)
    {
        $t = $this->loadView('sectionLayout/main');

        $cateGory = array(
            '0' => 'ไม่มีหมวดหมู่',
            '1' => cat1,
            '2' => cat2,
            '3' => cat3,
        );

        $t->set('title', $cateGory[$id].' | Free E-Book | ระบบดาวโหลดเอกสารออนไลน์');
        $t->set('description','');

        $t->set('title_page', $cateGory[$id]);

        $loadTable = $this->loadAdmin();

        $book_model = $this->loadModel('book_model');
        $t->set('LoadTable',$book_model->book($loadTable,$id));

        $t->render();
    }

}
