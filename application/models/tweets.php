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
		
		public function get_todos_tweets_usuario($login_usuario){

            $resultado = $this->db->query("( select tweets.data_hora_post, usuarios.login_usuario, tweets.id_tweeter, tweets.texto, tweets.id_usuario, tweets.id_origem, usuarios.nome_usuario
            from tweets, usuarios
            where tweets.id_usuario = usuarios.id_usuario
            AND usuarios.login_usuario ='".$login_usuario."')
             UNION
                    (SELECT tweets.data_hora_post, usuarios.login_usuario, tweets.id_tweeter, tweets.texto, tweets.id_usuario, tweets.id_origem, usuarios.nome_usuario
                     FROM tweets, retweets, usuarios
                     WHERE retweets.id_tweeter = tweets.id_tweeter
                           AND retweets.id_usuario = usuarios.id_usuario AND usuarios.login_usuario = '".$login_usuario."')
                    order by  data_hora_post desc ");

            

            if ($resultado->num_rows()>0){
                return $resultado->result();
             }else{
                return 0;}
        }
	}

/* End of file tweets.php */