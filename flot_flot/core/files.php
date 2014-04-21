<?php
	# files; file paths, reading writing, web url
	
	

	class ItemURL {

		public $s_relative_url; # stored without the leading slash

		function __construct($o_item) {
			$this->s_relative_url = $o_item->url;
			if(substr($this->s_relative_url, 0, 1) === '/')
				$this->s_relative_url = substr($this->s_relative_url, 1); # remove leading slash
		}

		function has_dirs() {
			# has directories in its path
			if((strlen($this->s_relative_url) > 0) && $this->is_empty() || (strpos($this->s_relative_url, '/') > 0))
				return true;
			return false;
		}
		function is_empty() {
			# doesn't have a filename in path
			if(!strpos($this->s_relative_url, '.'))
				return true;
			return false;
		}
		function dir_path(){
			echo "rel url: '".$this->s_relative_url."'";
			$i_end_index = strrpos($this->s_relative_url, '/');
			if(!$i_end_index)
				return $this->s_relative_url;
			return substr($this->s_relative_url, 0, $i_end_index);
		}

		function writing_filename(){
			# the filename to write the file as, this will be index.html if there was no file name
			if($this->is_empty())
				return 'index.html';
			else
			{
				$i_last_slash = strrpos($this->s_relative_url, '/');
				if($i_last_slash){
					// file was in a dir
					return substr($this->s_relative_url, $i_last_slash+1, strlen($this->s_relative_url));
				}else{
					// file exists by itself, no dir
					return $this->s_relative_url;
				}
			}
		}
		function writing_file_path($s_base_path) {
			$s_path = $s_base_path;
			if($this->has_dirs())
				$s_path .= $this->dir_path().'/';
			$s_path .= $this->writing_filename();
			return $s_path;
		}
	}
?>