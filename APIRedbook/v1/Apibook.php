<?php 


	require_once '../includesbook/DbOperationbook.php';

	function isTheseParametersAvailable($params){
	
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
		
			echo json_encode($response);
			
		
			die();
		}
	}
	
	
	$response = array();
	

	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createbook':
				
				isTheseParametersAvailable(array('nome','genero','desclivro','rate','preco'));
				
				$db = new DbOperationbook();
				
				$result = $db->createBook(
					$_POST['nome'],
					$_POST['genero'],
					$_POST['desclivro'],
					$_POST['rate'],
					$_POST['preco']
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Livro adicionado com sucesso';

					
					$response['heroes'] = $db->getBook();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getbooks':
				$db = new DbOperationbook();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['heroes'] = $db->getBooks();
			break; 
			
			
		
			case 'updatebook':
				isTheseParametersAvailable(array('cod','nome','genero','desclivro','rate','preco'));
				$db = new DbOperationbook();
				$result = $db->updateBook(
					$_POST['cod'],
					$_POST['nome'],
					$_POST['genero'],
					$_POST['desclivro'],
					$_POST['rate'],
					$_POST['preco']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Livro atualizado com sucesso';
					$response['heroes'] = $db->getBooks();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deletebook':

				
				if(isset($_GET['cod'])){
					$db = new DbOperationbook();
					if($db->deleteBook($_GET['cod'])){
						$response['error'] = false; 
						$response['message'] = 'Herói excluído com sucesso';
						$response['heroes'] = $db->getBooks();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break; 
		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}
	

	echo json_encode($response);
	
	
