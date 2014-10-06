<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Tweeter</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=base_url();?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
      body {
        padding-top: 70px;
      }
      .limitado {
        max-width: 1200px;
      }
      .navbar li:hover, .navbar li:active {
        border-bottom: 4px solid black;
      }
      .input-group input {
        border-bottom-left-radius: 20px;
        border-top-left-radius: 20px;
        border-right: none;
      }
      .input-group input:focus {
        outline: none;
        box-shadow: none;
        border-color: silver;
      }
      .input-group button {
        border-bottom-right-radius: 20px;
        border-top-right-radius: 20px; 
        border-left: none;
        color: grey;
      }
      .input-group button:hover {
        background-color: white;
        border-color: silver;
      }
      .perfil {
        font-size: 18px;
        font-weight: bold;
        color: black;
      }
      div.panel-heading {
        background-color: white !important;
      }
      .sum-label {
        color: grey;
        text-transform: uppercase;
        font-size: small;
      }
      .sum, .sum:hover {
        color: grey;
        text-decoration: none;
        font-size: 24px;
      }
    </style>
    <script type="text/javascript" src="<?=base_url();?>js/jquery.min.js"></script>
    
  </head>
  <body>
  	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Exibir menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <ul class="nav navbar-nav">
                <li><a href="<?=base_url();?>"><i class="glyphicon glyphicon-home"></i> Início</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-bell"></i> Notificações</a></li>
                <li><a href="#"><strong><big>#</big></strong> Descobrir</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Conta</a></li>
              </ul>
            </div><!-- col -->
            <div class="col-lg-6 col-md-6">
              <div style="line-height: 50px; display: table-cell; float: left; vertical-align: middle; margin-left: -15px;">
                <i style="color: blue; font-size: 22px;" class="fa fa-twitter"></i>
              </div>
              <ul class="nav navbar-nav navbar-right">

                <form class="navbar-form navbar-left" role="search" method="post" action="<?=base_url();?>usuario/buscar">
                  <div class="form-group">
                    <div class="input-group">
                      <input name="buscar" type="text" class="form-control" placeholder="Buscar no tweeter">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </span>
                    </div><!-- /input-group -->
                  </div>
                </form>

                <li><a href="#" title="Mensagens"><i class="glyphicon glyphicon-envelope"></i></a></li>
                <li><a href="#" title="Configurações"><i class="glyphicon glyphicon-cog"></i></a></li>
                <li><a href="#" title="Novo tweet"><i class="glyphicon glyphicon-edit"></i></a></li>
                <li><a href="<?=base_url();?>usuario/sair" title="Sair"><i class="glyphicon glyphicon-off"></i></a></li>
                
              </ul>
            </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container limitado">
      <div class="row">
        <div class="col-lg-4 col-md-4">
         <div class="panel panel-default">
          <div class="panel-body">
            <div class="row" style="background-color: #f3f3f3; padding-top: 12px;">
              <div class="col-lg-3 col-md-3 col-sm-3">
                <img src="imagens/thumbnail.png" class="thumbnail" style="width: 70px; height: 70px;">
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9" style="padding-top: 22px;">
                <a class="perfil"><?=$usuario->nome;?></a><br>
                <span style="color: grey;">@<?=$usuario->login;?></span>
              </div>
            </div><!-- row -->
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <small class="sum-label">TWEETS</small><br>
                <a class="sum" href="#"><?=$num_tweets;?></a>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <small class="sum-label">SEGUINDO</small><br>
                <a class="sum" href="#"><?=$num_seguindo;?></a>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <small class="sum-label">SEGUIDORES</small><br>
                <a class="sum" href="#"><?=$num_seguidores;?></a>
              </div>
            </div>
          </div>

          <style> 
              /* Esta classe faz com que o botão e o contador fiquem escondidos ao acessar a página. */
              .esconder {
                visibility: hidden;
                display: none;
              }
          </style>

          <div  class="panel-footer">
            
          <form role="form" method="post"
            action="<?=base_url();?>usuario/postartweet">   
          
            <textarea id="tweet" class="form-control" rows="1" cols="30" name="texto" maxlength="140"   onfocus="this.rows=4, mostrar()"  
                    onblur="if($('#tweet').val() == '') {this.rows=1; esconder(); }" 
                    onkeyup="" style="resize:none;" placeholder="Publique seu tweet..."></textarea>
           
            <div id="botaoecont" class="esconder">
             
            
            <span id="content-countdown" title="140" style="margin-top:10px !important;">140</span>
                
            <button  id="bt" type="submit" class="btn btn-primary" style="float:right; margin-top:10px;">Enviar</button>
            <div style="clear: both;"></div> 
            </div>

          
        </form>
          </div><!-- panel-footer -->

           <script type="text/javascript">
           
            function mostrar(){
                document.getElementById("botaoecont").style.visibility="visible";
                document.getElementById("botaoecont").style.display="block";
              }
              
              function esconder(){
                document.getElementById("botaoecont").style.visibility="hidden";
                document.getElementById("botaoecont").style.display="none";
              }
            
            

              $(function(){
           
              $("textarea").keyup(function(event){
           
                 
                  var target    = $("#content-countdown");
           
                
                  var max        = target.attr('title');
           
                
                  var len     = $(this).val().length;
           
               
                  var remain    = max - len;
           
                  
                  if(len > max)
                  {
                    
                      var val = $(this).val();
                      $(this).val(val.substr(0, max));
           
                     
                      remain = 0;
                  }
           
                 target.html(remain);
           
              });
           
          });
 
  
      
    </script>


         </div><!-- panel -->

         <div class="panel panel-default">
          <div class="panel-body">
            <big style="font-size: 22px; letter-spacing: 1.5px;">Quem seguir</big> · <a href="#">Atualizar</a> · <a href="#">Ver todos</a>
          </div>
         </div><!-- panel -->
        </div><!-- col -->

        <div class="col-lg-8 col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading">
              <big style="font-size: 22px;">Tweets</big>
            </div>
            
            
            
            <div class="panel-body">
            	<?php if (isset($tweets))
                  foreach ($tweets as $tweet) {
                ?>
                	<div class="panel panel-default">
                    
                    <form role="form" method="post">
                      <input type="hidden" name="codigo"
                        id="codigo" value="<?=$tweets->texto?>">

                      
                   </div> <?php }?>  
                    

                <?php if (isset($resultados))
                  foreach ($resultados as $resultado) {
                ?>
                   <div class="panel panel-default">   
                    
                    <?php if (($usuario->login)== ($resultado->login)){?>
					 
                    <div class="panel-body" >
                        
                     <form role="form" method="post">
                      <input type="hidden" name="codigo"
                        id="codigo" value="<?=$resultado->codigo?>">

                      <input type="hidden" name="codigo_seguido"              
                        id="codigo_seguido" value="<?=$resultado->codigo?>"> 


                      <div class="col-lg-4 col-md-4 col-sm-4">
						
                        <label for="nome">Nome completo</label>
                        <input type="text" name="nome" id="nome" readonly
                        class="form-control" placeholder="Nome completo"
                        value="<?=$resultado->nome?>">
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <label for="email">e-mail</label>
                        <input type="text" name="email" id="email" readonly
                        class="form-control" placeholder="e-mail"
                        value="<?=$resultado->email?>">
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <label for="login">Nome de usuário</label>
                        <input type="text" name="login" id="login" readonly
                        class="form-control" placeholder="Login"
                        value="<?=$resultado->login?>">
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="descricao">Descrição</label>
                        <input name="descricao" id="descricao" readonly
                          class="form-control" placeholder="Descrição detalhada da conta"
                          value="<?=$resultado->descricao?>"> 
                      </div>
                                   
                      <div class="col-lg-4 col-md-4 col-sm-4">

                        <small class="sum-label">TWEETS</small><br>
                        <a class="sum" value="#"><?=$resultado->num_tweets?></a>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <small class="sum-label">SEGUINDO</small><br>
                        <a class="sum" value="#"><?=$resultado->num_seguindo?></a>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <small class="sum-label">SEGUIDORES</small><br>
                        <a class="sum" value="#"><?=$resultado->num_seguidores?></a>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                       
                        
                       <!-- retirado os botoes -->
                                          
                     </div>
                  </div> <?php } else { ?> 
              
					 
                    <div class="panel-body" >
                        
                     <form role="form" method="post">
                      <input type="hidden" name="codigo"
                        id="codigo" value="<?=$resultado->codigo?>">

                      <input type="hidden" name="codigo_seguido"              
                        id="codigo_seguido" value="<?=$resultado->codigo?>"> 


                      <div class="col-lg-4 col-md-4 col-sm-4">

                        <label for="nome">Nome completo</label>
                        <input type="text" name="nome" id="nome" readonly
                        class="form-control" placeholder="Nome completo"
                        value="<?=$resultado->nome?>">
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <label for="email">e-mail</label>
                        <input type="text" name="email" id="email" readonly
                        class="form-control" placeholder="e-mail"
                        value="<?=$resultado->email?>">
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <label for="login">Nome de usuário</label>
                        <input type="text" name="login" id="login" readonly
                        class="form-control" placeholder="Login"
                        value="<?=$resultado->login?>">
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="descricao">Descrição</label>
                        <input name="descricao" id="descricao" readonly
                          class="form-control" placeholder="Descrição detalhada da conta"
                          value="<?=$resultado->descricao?>"> 
                      </div>
                                   
                      <div class="col-lg-4 col-md-4 col-sm-4">

                        <small class="sum-label">TWEETS</small><br>
                        <a class="sum" value="#"><?=$resultado->num_tweets?></a>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <small class="sum-label">SEGUINDO</small><br>
                        <a class="sum" value="#"><?=$resultado->num_seguindo?></a>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <small class="sum-label">SEGUIDORES</small><br>
                        <a class="sum" value="#"><?=$resultado->num_seguidores?></a>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                      
                    
                       
                      <?php if (!$resultado->seguindo){?> 
					   
                        <button id="seguir" type="submit" onclick="action='<?=base_url();?>usuario/seguir'"
                          class="btn btn-primary ">Seguir</button>
                          
                       <?php } else {?> 

                        <button id="naoseguir" type="submit" onclick="action='<?=base_url();?>usuario/naoseguir'"
                          class="btn btn-primary pull-right">Deixar de Seguir</button>
                          
                          <?php } ?>  
                      </div> 
                      </form> 
                                         
                     </div>
                  </div> <?php }?>
                  
                  
                  
                  
                <?php
                } ?>

            </div>
          </div><!-- panel -->
          </div><!-- panel -->
        </div><!-- col -->
      </div><!-- row -->
    </div><!-- container -->

  	<script type="text/javascript" src="<?=base_url();?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>js/bootstrap.min.js"></script>
  </body>
</html>