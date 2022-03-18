Esté código tem como finalidade criar um CRUD básico e interagir com um elemento table.

Utilazeremos no back-end uma estrutura MC - (MODEL-CONTROLLER) - em PHP onde os resultados serão requisitados via AJAX e impressa na tela. Para as requisições AJAX usaremos a biblioteca JQuery. E no front-end usaremos o framework Bootstrap. 

Nossa estrutura é uma forma de desenvolvimento Full Stack onde o back-end é separado do front-end. 

Usando o banco de dados MySQL, Criamos uma base de dados chamada "crud" e com a query a baixo vamos criar a tabela do nosso cliente :

CREATE TABLE `crud`.`cliente` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`nome` VARCHAR(100) NOT NULL , 
	`sobrenome` VARCHAR(100) NOT NULL ,
	`email` VARCHAR(250) NOT NULL , 
	`sexo` VARCHAR(1) NOT NULL ,  
	`rg` VARCHAR(13) NOT NULL , 
	`cpf` VARCHAR(15) NOT NULL , 
	`data_nascimento` DATE NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

Após criação da base de dados, vamos configurar nossa api. Abra o diretório api dentro do projeto e abra o arquivo environment.php e confira que o ambiente setado é o de desenvolvimento.

Feito isso, abra o arquivo config.php e entre as configurações da base de dados que acabou de criar. Neste momento, se tudo correu bem, você já está conectado a seu banco de dados e ao executar a aplicação no localhost, você verá a tela incial.

Toda classe e id nos códigos CSS e JS/JQeury que foram criadas por mim tem o prefixo crud- para diferenciar das classes do framework.

O detalhe dessa estrutura fica por conta de os códigos css e js ficarem no arquivo .html de cada página. Isso melhora o desempenho do carregamento pois não fica redundante o carregamento de certos códigos css e nem js, ajudando na implementação de uma PWA.

