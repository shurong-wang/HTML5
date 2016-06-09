<?php
class Upload {
	private $_max_size;			//最大尺寸
	private $_allow_ext_list;	//允许扩展名
	private $_type_map;			//MIME映射
	private $_allow_mime_list;	//允许MIME
	private $_upload_path;		//持久化目录
	private $_prefix;			//文件存储前缀
	private $_error;			//上传错误信息

	/**
	 * 初始化文件上传属性
	 * */
	public function __construct() {
		$this->_max_size = 1024*1024;
		$this->_allow_ext_list = array('.png', '.jpg');
		$this->_type_map = array(
			'.png' 	=> array('image/png', 'image/x-png'),
			'.jpg'	=> array('image/jpeg', 'image/pjpeg'),
			'.jpeg'	=> array('image/jpeg', 'image/pjpeg'),
			'.gif'	=> array('image/gif'),
			);
		
		$allow_mime_list = array();
		foreach($this->_allow_ext_list as $value) {
			//得到每个后缀名
			$allow_mime_list = array_merge($allow_mime_list, $this->_type_map[$value]);
		}
		// 去重
		$this->_allow_mime_list = array_unique($allow_mime_list);
				
		$this->_upload_path = './';
		$this->_prefix = '';
		$this->_error = '';
	}

	/**
	 * 上传单个文件
	 */
	public function uploadOne($tmp_file) {

		//检查文件信息是否合法
		$res = $this->checkUpload($tmp_file);
		if(! $res){
		    return false;
		}

		# 移动 -- 持久化存储
		# 上传文件存储地址
		//创建子目录
		$subdir = date('YmdH') . '/';
		if(! is_dir($this->_upload_path . $subdir)) {//检测是否存在
			//不存在
			mkdir( $this->_upload_path . $subdir, 0777, true );
		}
		
		# 重命名存储文件
		$ext = strtolower(strrchr($tmp_file['name'], '.'));
		$upload_filename = uniqID($this->_prefix, true) . $ext;
		$dset = $this->_upload_path . $subdir . $upload_filename;
		if (move_uploaded_file($tmp_file['tmp_name'], $dset)) {
			// 移动成功，返回文件名
			return $subdir . $upload_filename;
		} else {
			// 移动失败
			$this->_error = '移动失败';
			return false;
		}

	}

	/**
	 * 检查文件信息是否合法
	 * */
	public function checkUpload($tmp_file){
		# 检查上传错误
		if($tmp_file['error'] != 0) {
			$this->_error = '文件上传错误';
			return false;
		}
		
		# 检查文件大小
		if ($tmp_file['size'] > $this->_max_size) {
		    $this->_error = '文件过大';
		    return false;
		}
		
		# 检查类型
			# 设置一个后缀名与mime的映射关系
			# 保证修改允许的后缀名，可以联系 $allow_ext_list 和 $allow_mime_list
			 
			# 后缀名从原始文件名中提取
		$ext = strtolower(strrchr($tmp_file['name'], '.'));
		if ( !in_array($ext, $this->_allow_ext_list) ) {
			$this->_error = '类型不合法';
			return false;
		}
		
			# MIME
		if ( !in_array($tmp_file['type'], $this->_allow_mime_list) ) {
			$this->_error = '类型不合法';
			return false;
		}
		//PHP 获取文件的 mime 进行检测
		$finfo = new Finfo(FILEINFO_MIME_TYPE); //需要开启  extension=php.fileinfo.dll 扩展
		$mime_type = $finfo->file($tmp_file['tmp_name']); //检测
		if ( !in_array($mime_type, $this->_allow_mime_list) ) {
			$this->_error = '类型不合法';
			return false;
		}
		return true;
	}
	
	/**
	 * 错误信息
	 * */
	public function getError() {
		return $this->_error;
	}
	
	/**
	 * 重载文件上传属性
	 * */
	public function __set($p, $v) {
		$allow_set_list = array(
				'_max_size',
				'_upload_path',
				'_allow_ext_list',
				'_prefix',
		);
		if( substr($p, 0, 1) !== '_' ) {
			$p = '_' . $p;
		}
		$this->$p = $v;
	}
	
}