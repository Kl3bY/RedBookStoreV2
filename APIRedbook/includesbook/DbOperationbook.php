<?php
 
class DbOperationbook
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnectbook.php';
 
     
        $db = new connect();
 

        $this->con = $db->connect();
    }
	
	
	function createBook($nome, $genero, $desclivro, $rate, $preco){
		$stmt = $this->con->prepare("INSERT INTO livro (nome, genero, desclivro, rate, preco) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssid", $nome, $genero, $desclivro, $rate, $preco);
		if($stmt->execute())
			return true; 
		return false; 
	}
		
	function getBooks(){
		$stmt = $this->con->prepare("SELECT cod, nome, genero, desclivro, rate, preco FROM livro");
		$stmt->execute();
		$stmt->bind_result($cod, $nome, $genero, $desclivro, $rate, $preco);
		
		$livros = array(); 
		
		while($stmt->fetch()){
			$livro  = array();
			$livro['cod'] = $cod; 
			$livro['nome'] = $nome; 
			$livro['genero'] = $genero; 
			$livro['descLivro'] = $desclivro; 
			$livro['rate'] = $rate;
			$livro['preco'] = $preco;
			
			array_push($livros, $livro); 
		}
		
		return $livros; 
	}
	
	
	function updateBook($cod, $nome, $genero, $desclivro, $rate, $preco){
		$stmt = $this->con->prepare("UPDATE livro SET nome = ?, genero = ?, desclivro = ?, rate = ?, preco = ? WHERE cod = ?");
		$stmt->bind_param("sssidi", $nome, $genero, $desclivro, $rate, $preco, $cod);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deleteBook($cod){
		$stmt = $this->con->prepare("DELETE FROM livro WHERE cod = ? ");
		$stmt->bind_param("i", $cod);
		if($stmt->execute())
			return true; 
		
		return false; 
	}
}