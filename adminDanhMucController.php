<?php

class adminDanhMucController
{
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc=new adminDanhMuc();
    }
    public function danhsachDanhMuc() {
        $danhsachDanhMuc=$this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc() {
        require_once './views/danhmuc/addDanhMuc.php';
        // var_dump('Thêm danh mục');
//  hien thi form them
    }
    public function AddDanhMuc() {
        // theem
        // var_dump($_POST);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $error =[];
            if (empty($ten_danh_muc)){
                $error['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if(empty($error)){
                $this -> modelDanhMuc -> insertDanhMuc($ten_danh_muc, $mo_ta);
                header("Location:?act=danh-muc " );
                exit();
            }else{
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
    }

    public function formEditAddDanhMuc() {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->DetailDanhMuc($id);
        if($danhMuc){
            require_once './views/danhmuc/editAddDanhMuc.php';
        }else{
            header("Location:?act=danh-muc " );
                exit();
        }
        
        // var_dump('Thêm danh mục');
//  hien thi form them
    }
    public function EditDanhMuc() {
        // theem
        // var_dump($_POST);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $error =[];
            if (empty($ten_danh_muc)){
                $error['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if(empty($error)){
                $this -> modelDanhMuc -> updateDanhMuc($id,$ten_danh_muc, $mo_ta);
                header("Location:?act=danh-muc " );
                exit();
            }else{
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta'=>$mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc() {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->DetailDanhMuc($id);

        if($danhMuc){
            $this -> modelDanhMuc -> destroyDanhMuc($id);
        }
            header("Location:?act=danh-muc");
            exit();
        
    }
}


