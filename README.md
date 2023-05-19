<h1 align="center"> Processo seletivo da CBC </h1>

## ✔️ Tecnologias utilizadas

- ``XAMPP 8.0.12``
- ``PHP Version 8.0.12``
- ``MySQL Version 5.7``
- ``WorkBench Version 8.0.33``
- ``Visual Studio Code``
- ``Postman``
- ``GitHub Desktop``

## ✔️ Instruções para executar o projeto

- `1` Copie esse projeto para dentro da pasta "htdocs" do XAMPP.
- `2` Crie no Mysql um novo schema com o nome "cbc" em localhost(127.0.0.1), com usuário "root" e senha vazia.
- `3` Dentro do projeto há a pasta "sqls" com os códigos para criar e popular as tabelas.

## ✔️ Urls para acesso a api

- `Lista Clubes (GET)` http://localhost/CBC/api/clubes

- `Add Clube (POST)` http://localhost/CBC/api/clubes
```JSON
	{	
	 "clube":"Clube A",
	 "saldo_disponivel":"2000,00"
	}
```

- `Consome Recurso (POST)` http://localhost/CBC/api/recursos/consome-recursos.php
```JSON
	{
	 "clube_id":"1",
	 "recurso_id":"1",
	 "valor_consumo":"500,00"
	}
```

- `É necessário ativar essa opção no Postman para o funcionamento correto da requisição`

	![Grid Garden screenshot](https://repository-images.githubusercontent.com/642474736/a5358c70-fd83-4af2-bb5a-0bdee65a3c15)
	
	
## ✔️ Observação:
Para este projeto, optei por utilizar PHP puro, pois entendi no documento enviado que o conhecimento, habilidade e raciocínio lógico seriam avaliados. Busquei reduzir a quantidade de arquivos para facilitar o entendimento.
No entanto, se fosse um projeto para produção, eu implementaria utilizando um framework PHP como Zend ou Laravel.
