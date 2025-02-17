<?php
class AdminSanPhamController
{
    public $moldedSanPham;
    public $moldedThuongHieu;

    public function __construct()
    {
        $this->moldedSanPham = new AdminSanPham();
        $this->moldedThuongHieu = new AdminThuongHieu();

    }

    public function danhSachSanPham()
    {
        $listSanPham = $this->moldedSanPham->getAllSanPham();
        require_once './views/SanPham/listSanPham.php';
    }
    public function formAddSanPham()
    {
        $listThuongHieu = $this->moldedThuongHieu->getAllThuongHieu();
        require_once './views/Sanpham/addSanPham.php';

        deleteSessionError();
        
    }
    public function postAddSanPham()
    {
        // var_dump($_POST);
        //kiểm tra thêm dữ liệu có phải được submit ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lấy dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '' ;
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $thuong_hieu_id = $_POST['thuong_hieu_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh']  ?? null;

            $img_array = $_FILES['img_array']  ;

            $file_thumb = uploadFile($hinh_anh, './uploads/');



            
            
            // xu ly upload file
            $error = [] ;
            if (empty($ten_san_pham)) {
                $error['ten_san_pham'] = "Tên sản phẩm không được để trống";
            }
            if (empty($gia_san_pham)) {
                $error['gia_san_pham'] = "giá sản phẩm không được để trống";
            }
            if (empty($gia_khuyen_mai)) {
                $error['gia_khuyen_mai'] = "Giá Khuyến mãi sản phẩm  không được để trống";
            }
            if (empty($so_luong)) {
                $error['so_luong'] = "Số lượng sản phẩm không được để trống";
            }
            if (empty($ngay_nhap)) {
                $error['ngay_nhap'] = "Ngaỳ nhập sản phẩm không được để trống";
            }
            if (empty($thuong_hieu_id)) {
                $error['thuong_hieu_id'] = "Danh Mục sản phẩm phải chọn";
            }
            if (empty($trang_thai)) {
                $error['trang_thai'] = "Trạng thái sản phẩm phải chọn";
            }
            if ($hinh_anh['error'] !==0) {
                $error['hinh_anh'] = "Hình ảnh sản phẩm phải chọn";
            }
            $_SESSION['error'] = $error;
            // debug($_SESSION['error'])  ;die();
            //nếu không có lỗi tiến hành thêm danh mục
            if (empty($error)) {
              $this->moldedSanPham->insertSanPham($ten_san_pham,$gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$thuong_hieu_id,$trang_thai, $mo_ta,$file_thumb);


                header('location: ' . BASE_URL_ADMIN . '?act=san_pham');
                exit();
            } else {

                // require_once './views/SanPham/addSanPham.php';
                $_SESSION['flash'] = true;
                // debug($_SESSION['error']);                
                header('location: ' . BASE_URL_ADMIN . '?act=form_them_san_pham');
                exit();
                
            }
        }
    }
    public function formEditSanPham()
    {
        $id = $_GET['id_san_pham'];
        $SanPham = $this->moldedSanPham->getDetailSanPham($id);
        $listSanPham = $this->moldedSanPham->getListSanPham($id);
        $listThuongHieu = $this->moldedThuongHieu->getAllThuongHieu();
        if($SanPham){
            require_once './views/SanPham/editSanpham.php';
        }else{
            header('location :'.BASE_URL_ADMIN . '?act=san_pham');
            exit();

        }
        // require_once './views/SanPham/editsanPham.php';
    }
    public function postEditSanPham()
    {
        // var_dump($_POST);
        //kiểm tra thêm dữ liệu có phải được submit ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lấy dữ liệu
            $id = $_GET['id_san_pham']?? '';
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            
            $sanPhamOld = $this->moldedSanPham->getAllSanPham($id);

            // $old_file = $sanPhamOld['hinh_anh'];//ảnh cũ
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ten_thuong_hieu = $_POST['ten_thuong_hieu'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            

            
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
         
            // xu ly upload file
            $new_file = null;
            $error = [];
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            }

            if (empty($ten_san_pham)) {
                $error['ten_san_pham'] = "Tên thương hiệu không được để trống";
            }
            $_SESSION['error']=$error;
            //nếu không có lỗi tiến hành thêm danh mục
            if (empty($error)) {
                $this->moldedSanPham->updateSanPham($id, $ten_san_pham,$new_file ,$gia_san_pham,$so_luong,$ten_thuong_hieu,$trang_thai);
                header('location: ' . BASE_URL_ADMIN . '?act=san_pham');
                // var_dump($ten_thuong_hieu);
            } else {
                $_SESSION['flash'] = true;
                debug($_SESSION['error']);                
                header('location: ' . BASE_URL_ADMIN . '?act=form_sua_thuong_hieu&id_thuong_hieu=' . $id);
                exit();
            }
        }
    }
    public function deleteSanPham(){
        $id = $_GET['id_san_pham'];
        $SanPham = $this->moldedSanPham->getDetailSanPham($id);
        
        if ($SanPham) {
            deleteFile($SanPham['hinh_anh']);
            $this->moldedSanPham->destroySanPham($id);
            
        }
        header('location: ' . BASE_URL_ADMIN . '?act=san_pham');
        exit; 
    }

}
?>