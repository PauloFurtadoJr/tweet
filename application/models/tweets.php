<?php
	class Tweets extends CI_Model
	{
		public function countByUser($id_usuario)
		{
			return $this->db->where('codigo_usuario', $id_usuario)->count_all_results('tweets');
		}

		public function insert($dados)    //função para inserir tweet no banco
		{
			$this->db->insert('tweets', $dados);
			return $this->db->insert_id();
		}
		
		public function getById ($tweets)

		{
			return $this->db->where('tweets', $tweets)->get('texto')->row();	
		}
		
	}

/* End of file tweets.php */