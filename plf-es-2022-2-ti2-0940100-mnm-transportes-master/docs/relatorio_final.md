# MNM Transportes


**Gustavo Henrique Dos Santos Riegert, ghsriegert@sga.pucminas.br**

**Lucas Santos Rosa, lucas.rosa.1363147@sga.pucminas.br**

**Pedro Henrique Pessoa Cruz, pedro.cruz.1348623@sga.pucminas.br**

**Matheus Fontes Almeida Moreira Silva, matheus.fontes@sga.pucminas.br**

**André Avelar Moriya Sathler, aamsathler@sga.pucminas.br**

**Nicolás Melo Chabot, nicochabmelo@gmail.com**

**Cauã Veríssimo Dias, caua.dias@sga.pucminas.br**

---

Professores:

** Cristiano Geraldo Teixeira Silva **

** Felipe Augusto Lima Reis **

** Hugo Bastos de Paula **

---

_Curso de Engenharia de Software, Unidade Praça da Liberdade_

_Instituto de Informática e Ciências Exatas – Pontifícia Universidade de Minas Gerais (PUC MINAS), Belo Horizonte – MG – Brasil_

---

_**Resumo**. Este trabalho consiste na criação de um sistema que permite ao usuário realizar um pedido de orçamento de frete para um determinado processo de mudança. O objetivo do sistema é permitir ao usuário que tenha mais facilidade na organização de corretagem, além de disponibilizar um contato mais simplificado com a transportadora..._

---


## 1. Introdução

A organização de carretos, inclusive para mudanças a curta distância, demanda alta carga de trabalho devido à falta de especificação do serviço ofertado para a ampla quantidade de carretos disponíveis, demandando do cliente um tempo de pesquisa exacerbado para que se enquadre com suas especificações. E se houvesse uma maneira de resolver essas duas questões através de uma única forma? Essa foi a ideia que norteou a criação da aplicação MNM transportes, na qual o cliente informa a quantidade de itens para o carreto e encontra provedores do serviço para aquela demanda. 

    1.1 Contextualização

Atualmente o processo para carregamento de móveis são feitos de maneira informal, que normalmente ocorrem por indicações ou propagandas, eventualmente desagradando o solicitante, pois, o profissional não tem os devidos cuidados com a mobília. Dessa maneira, a MNM transportes foi pensada em facilitar esse sistema com a pesquisa por profissionais adequados, consequentemente melhorando a experiência do cliente com seu processo de mudanças. 

    1.2 Problema

O problema identificado pela MNM Transportes, é relacionado ao serviço de carreto, no qual o cliente tem problemas na busca da melhor condição para transportar seus móveis, visando uma entrega que não comprometa a integridade dos seus bens, e em um orçamento acessível. Além disso, as transportadoras não encontram um serviço que seja interessante para executar devido a falta de transporte para aquele tipo de item, ademais da falta de relacionamento e contato entre as partes. 

    1.3 Objetivo geral

A MNM Transportes busca elaborar um sistema para que o usuário possa usufruir de um serviço pré-moldado a partir do número de itens a serem transportados, assim garantindo que os produtos sejam carregados com o veículo de transporte adequado. Dessa forma, o sistema será responsável pela intermediação entre consumidor e transportadora, com base no tipo de transporte utilizado por cada empresa, agilizando a conversa de ambos para a realização do transporte.

        1.3.1 Objetivos específicos

- Desenvolver um sistema de comunicação entre cliente e prestador de serviço para que o processo de mudança seja planejado, negociado e organizado a partir da aplicação, diminuindo ambiguidades e a conversa entre ambas as partes. 

- Entregar ao cliente orçamentos pré-definidos não sendo refém das mudanças que ocorrem em carretos ofertadas no mercado. 

- Desenvolver a modelagem de processos de negócios, focando na organização do carreto, e interatividade entre os usuários. 
 

            1.4 Justificativas

A MNM Transporte foi planejada com o intuito de ser uma empresa que facilite o processo de mudança de moradores (clientes). Após análise, constataram-se as mazelas neste tipo de atividade, uma vez que as opções são escassas e a falta de opções ramificam o mercado, fazendo com que o cliente fique à mercê de empresas. Deste modo, a plataforma criada pelo grupo vai disponibilizar uma negociação entre interessados em adquirir o serviço e as empresas que realizam o mesmo. 


## 2. Participantes do processo

**Cliente que deseja realizar a mudança** 

O cliente é o usuário final, ele irá cadastrar o número de móveis e endereços inicial e final da mudança. Assim as empresas verão se podem fazer o transporte e iniciaram o processo de negociação. Então, o cliente é o recebedor do serviço prestado.  

**Transportadora** 

A transportadora é a responsável pelo início do processo de mudança, após o cadastro feito pelo cliente ela escolherá e dará início a negociação do processo que mais a interessa. Portanto ela é a prestadora do serviço. 

**Carreto**

Carreto são os funcionários que realizarão o transporte, o número de funcionários varia de acordo com a quantidade de móveis e o peso dos mesmos. Refere-se aos responsáveis pelo trabalho manual do processo e são designados pela transportadora.  

## 3. Modelagem do processo de negócio

## 3.1. Análise da situação atual

Na atual conjuntura, o processo para contratar uma transportadora é mais uma dor de cabeça para o cliente na hora de realizar a mudança. Há uma grande dificuldade em encontrar o melhor custo benefício para esse serviço, muitas vezes o cliente chega até o prestador de serviço através da propaganda feita de pessoa para pessoa, ou então por meio de panfletos. O orçamento é feito presencialmente ou por ligação. Por fim, o contato empresa/cliente se encerra no momento em que o transporte é finalizado, negligenciando um feedback do cliente, fazendo assim com que a transportadora não evolua. 

## 3.2. Descrição Geral da proposta

Tema:
Plataforma para solicitação de serviços de mudança imobiliária

Descrição:
O intuito do website é promover uma interação entre pessoas que possuem dificuldades de efetuar o processo de mudança com empresas que têm esse tipo de serviço. O sistema permitirá a comunicação entre clientes e fornecedores, habilitando negociações entre os mesmos.

Partes interessadas:
- Cliente: Aquele que necessita de transporte para mudança
- Empresa de mudança: Terá um canal de venda de serviços através da plataforma
- Funcionário: Transportador que realizará o frete 

Processo: O cliente efetua o cadastro (ou o login, caso já seja cadastrado) e informa o local de origem e destino desejados para contratação do serviço, além disso deve dizer a quantidade de itens a ser transportada. As empresas de frete fornecem todas as informações de transporte e definem os moldes do transporte e valores.  O cliente recebe o orçamento e pode dialogar com a empresa fornecedora caso ache que o valor não condiz com o que o mesmo necessita. Caso não haja um acordo entre ambas as partes, um novo disparo é enviado para as empresas, possibilitando que haja nova negociação entre cliente e diferentes instituições. Quando há um acordo entre cliente e empresa, há o processo de pagamento e logo após o processo de mudança que ocorre na data solicitada.
Para finalizar de vez todo o processo, o sistema irá aguardar para que o cliente tenha um tempo para avaliar o serviço prestado e a avaliação irá para base de dados da empresa que fez o serviço. Caso não haja esse manifesto por parte do usuário final, o processo será finalizado. 

### Identificação e descrição geral dos processos

Processo de cadastro de usuário: O processo inicia-se no cadastro, caso o usuário não tenha um login ele será direcionado para um cadastro. No cadastro ele informará o tipo de usuário que ele será dentro do sistema (Cliente, transportadora), contendo dados pessoais para serem preenchidos.  

Processo de solicitação de serviço: Após a finalização do cadastro de dados pessoais o cliente poderá solicitar um serviço de transporte seguindo os seguintes passos. Inicialmente irá cadastrar o endereço de onde os itens serão levados e o endereço de destino, em seguida a quantidade de  itens serão inseridos no local indicado e a mudança ficará disponível para que as empresas vejam e deem início ao processo de negociação e pagamento, finalizando assim a solicitação.

Processo de seleção de orçamentos: Neste processo a transportadora ficará a par de todas solicitações disponíveis no sistema, ficando livre para acatar alguma das opções disponíveis, e assim entrando no processo de negociação e logo após sendo bem concluída a transportadora designará um funcionário.

Processo de negociação: Neste processo, o cliente receberá o orçamento feito previamente pela transportadora, e diante do orçamento, irá avaliar se as condições do preço e decidir se são as melhores condições de serviço disponíveis para realizar o serviço, podendo rejeitar ou aceitar o orçamento da empresa.

Processo de pagamento: Assim que o orçamento for aceito o cliente será redirecionado para a aba de pagamento, concluindo o pagamento a transportadora ficará pronta para realizar o serviço na data prevista.

Processo de avaliação: Ao finalizar a entrega, o usuário deve se deparar com uma página na qual permite ao mesmo avaliar a qualidade e eficiência da viagem realizada pela transportadora, selecionando a partir de um nível máximo de 5 estrelas.

## 3.3. Modelagem dos Processos

### 3.3.1 Processo 1 – CADASTRO DE USUÁRIO

Através desse processo o usuário poderá ser cadastrado, assim que o sistema garante que o usuário não está passando informações já disponíveis no banco de dados, o usuário é indagado sobre qual tipo de pessoa ele será no sistema(cliente ou transportadora). O cliente e a transportadora neste momento irão apenas cadastrar seus dados pessoais e assim finalizar seu processo.

![Modelagem Cadastro de usuário Diagrama](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/f0f895c707fecd45499b98da606d197c4abb2474/docs/imagens/Cadastro%20de%20usu%C3%A1rio%20Diagrama.png)

### 3.3.2 Processo 2 – CADASTRO DE FUNCIONÁRIO

Através desse processo a transportadora poderá cadastrar seu funcionário, a partir do momento que ela está logada poderá fazer essa solicitação informando apenas nome do seu funcionário e a partir do momento que verifica que este dado não existe o sistema finaliza o cadastro do funcionário.

![Modelagem Aceite de funcionário Diagrama](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/f0f895c707fecd45499b98da606d197c4abb2474/docs/imagens/Cadastro%20de%20funcion%C3%A1rio%20Diagrama.png)

### 3.3.3 Processo 3– SOLICITAÇÃO DO SERVIÇO

Durante o processo de solicitação do serviço o cliente irá fornecer as informações como endereço(local de busca e descarga) e quantidade, desta forma as informções irão passar para a transportadora selecionar um serviço, passando pelo processo de pagamento e por fim a entrega.

![Solicitação de serviço](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/5fd43cd3c84a6db6ac902c50a010bb154acbeba8/docs/imagens/Solicita%C3%A7%C3%A3o%20de%20servi%C3%A7o.jpeg)

 ### 3.3.4 Processo 4 - SELEÇÃO DE ORÇAMENTOS

Durante esse processo a transportadora irá selecionar um serviço dentre os disponíveis, e passando pela negociação, caso de negociação bem sucedida a empresa designará um funcionário para a execução.

![image](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/f0f895c707fecd45499b98da606d197c4abb2474/docs/imagens/Sele%C3%A7%C3%A3o%20de%20or%C3%A7amento%20Diagrama.png)

 ### 3.3.5 Processo 5 - NEGOCIAÇÃO

Durante esse processo a transportadora irá informar um preço inicial que será passado para o cliente, caso de aprovação, retira a solicitaçaõ do serviço do sistema e volta para a seleção de orçamento, caso de não aprovado a transportadora poderá escolher entre fazer um novo orçamento ou cancelar esse orçamento.

![image](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/25429928ac14b0b74db5060a731b766113b2f769/docs/imagens/Negocia%C3%A7%C3%A3o%20Diagrama.png)

### 3.3.6 Processo 6 - PAGAMENTO
Assim que terminar a entrega o funcionário fará a validação do pagamento, enviará uma mensagem avisando que o serviço foi pago, caso não haja o pagamento será adicionado como pagamento em atraso e o sistema fornecerá uma nova data, caso de não pagamento ainda usuário será bloqueado.

![image](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/5fd43cd3c84a6db6ac902c50a010bb154acbeba8/docs/imagens/Pagamento.jpeg)

### 3.3.7 Processo 7 – AVALIAÇÃO DA ENTREGA 

Através desse processo o usuário irá avaliar todo o processo de mudança, assim como qualificar a empresa que forneceu todo o serviço, podendo nivelar, através de estrelas, todos os passos no transporte e caso necessário fazer a inclusão de um comentário, englobando funcionários e indústria em um modo geral.

![modelagemAvaliacaoNovo](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/b37ff7150a82c479b3517edb54838e1c9f06bc0f/docs/imagens/Avaliacao_Diagrama.png)

## 4. Projeto da Solução

### 4.1. Detalhamento das atividades

#### Processo 1 – CADASTRO DE USUÁRIO

**Dados de Login**

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Login | Caixa de Texto | Formato de e-mail |  |
| Senha | Caixa de Senha | |   |


**Informa dados pessoais**

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Nome completo | Caixa de Texto |   |   |
| E-mail | Caixa de Texto | Formato de e-mail |   |
| Senha | Caixa de Senha | |   |
| Confirmar senha | Caixa de Texto | Igual a senha |   |
| Telefone | Caixa de Texto | Formato de número |   |
| Tipo de usuario | Seleção unica| | Cliente |

**Informa dados empresariais**

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Nome da empresa | Caixa de Texto |   |   |
| E-mail | Caixa de Texto | Formato de e-mail |   |
| Senha | Caixa de Senha |  |   |
| Confirmar senha | Caixa de Texto | Igual a senha |   |
| Telefone | Caixa de Texto | Formato de número |   |
| CNPJ | Caixa de Texto | Formato de CNPJ | | 

### Processo 2 - CADASTRO DE FUNCIONARIO

**Informa dados do funcionário**

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Nome | Caixa de texto |  |  |

#### Processo 3 – SOLICITAÇÃO DE SERVIÇO

**Inserir dados da mudança**

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Endereço de retirada | Caixa de texto | Não pode ser igual ao endereço de entrega |  |
| Endereço de entrega  | Caixa de texto | Não pode ser igual ao endereço de retirada   |     
| Dia e hora desejados | Data | |
| Quantidade | Quantidade | |

#### Processo 4 – SELEÇÃO DE ORÇAMENTO

**Seleciona solicitações disponíveis**

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Tela de rolagem | Escolha unica | | |
| Designação | Multipla Escolha| valor mínimo 1| |

**Designa funcionário**

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Funcionário | Multiseleção | | |

#### Processo 5 – NEGOCIAÇÃO

**Área da transportadora**

**Envia orçamento para o cliente**

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Valor orçamento | Numero | Não pode ser negativo | 0,00 |
| Orçar novamente | Seleção Única | Não pode estar vazio| Sim |

**Área do cliente**

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Valor orçamento | Numero | Não pode ser negativo | 0,00 |
| Orçamento valido | Seleção única | Não pode ser negativo  | |

### Processo 7 - AVALIAÇÃO DA ENTREGA

| **Campo** | **Tipo** | **Restrições** | **Valor default** |
| --- | --- | --- | --- |
| Avaliação por estrelas | Pop-up | Apenas estrelas  |   |
| Comentário | Caixa de texto |  |   |

### 4.2. Tecnologias
Utilizaremos as linguagens PHP - framework Laravel para fazer o backend de todo o sistema que será criado, enquanto, para fazer o front, será utilizado HTML, CSS e Javascript. 

## 5. Modelo de dados

![Diagrama de modelo de dados MNM Transportes](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/master/docs/imagens/db%20mnm.jpg)

## 6. Indicadores de desempenho

Apresente aqui os principais indicadores de desempenho e algumas metas para o processo. Atenção: as informações necessárias para gerar os indicadores devem estar contempladas no diagrama de classe. Colocar no mínimo 5 indicadores.

Usar o seguinte modelo:

| **Indicador** | **Objetivos** | **Descrição** | **Cálculo** | **Fonte dados** | **Perspectiva** |
| --- | --- | --- | --- | --- | --- |
| -Nota media da empresa  | Avaliar a qualidade da empresa | Média das notas dadas pelos clientes | Soma total das notas / quantidade de notas | Tabela avaliação | Aumento da média |
| Tempo médio da entrega | Analisar a demora na entrega | Mede quantos dias em média são necessarios pro serviço ser concluido | Soma dos tempos de entrega / quantidade de serviços | Tabela Serviço | Diminuição do tempo médio |
| Adesão de novos clientes | Analisa a quantidade de usuários cadastrados| Indica quantos clientes foram cadastrados por dia | numero de cleintes cadastrados na data selecionada | Tabela Cliente | Aumento da quantidade de novos clientes |
| Adesão de novas empresas |  Analisa a quantidade de empresas cadastradas | Indica quantas empresas foram cadastrados por dia | numero de clientes cadastrados na data selecionada | Aumento da quantidade de novas transportadoras |
| Taxa de serviços por transportadora  | Analisa a quantidade de serviços executados pela transportadora | Indica o total de serviços feitos por cada transportadoras | Quantidade de serviços atribuida à aquela transportadora | Tabela serviços | Aumento da quantidade de |
| Taxa de cancelamento |  |  | Quantidade total de serviços / serviços cancelados | Tabela de Serviços | Diminuição da quantidade de cancelamentos |

Obs.: todas as informações para gerar os indicadores devem estar no diagrama de classe **a ser proposto**

## 7.Sistema desenvolvido
MNM Transportes traz uma maneira fluida e rápida que apresenta pro usuário um leque mais amplo de opções de empresa para realização de mudanças, abrindo espaço para negociação de valores, avaliação do serviço, agendamento e pagamento feitos diretamente pela plataforma. 

Ao iniciar-se o projeto de mudança o usuário acessa a pagina inicial, onde explicamos oque é o MNM Transportes e qual a nossa finalidade e ele pode dar inicio ao processo. ![Tela Inicial](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.53.46.jpeg)

Outra página que permitira ao cliente conhecer mais sobre o grupo é a página contato, onde as informações de contato para perguntas e sugestões. ![Tela de Contato](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.54.04.jpeg)

Temos também a pagina sobre que trará as informaçoes sobre a equipe e a plataforma unicamente. ![Sobre](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.54.22.jpeg)

Para possiveis interessados em agregar a equipe apresentamos a pagina Trabalhe Conosco, que apresenta o status de contratação atual da equipe. ![Trabalhe conosco](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.54.41.jpeg)

Iniciando o processo, temos a pagina de login onde, se já cadastrado, o cliente podera entrar em sua pagina para acompanhar seu processo de mudança ou cadastrar um novo. ![Login Cliente](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.55.02.jpeg)

Se o cliente não possuir cadastro, ao selecionar Cadastrar-se na tela de login será redirecionado a esta pagina, onde será feita a verificação do sistema se as informações fornecidas já existem em uma conta, caso não exista a conta será criada e o cliente cadastrado no sistema. ![Cadastro Cliente](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.56.21.jpeg)

A página do cliente será um menu disfarçado, onde o cliente poderá acessar os serviços existentes, finalizados e cadastrados em sua conta. Na tela também será possível prosseguir para a página de cadastro do serviço, através do botão "Novo Serviço" no canto alto direito da tela. ![Tela do Cliente](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.57.01.jpeg)

Na tela de cadastro do serviço o cliente irá fornecer os dados necessários para a realização da mudança, como endereço de retirada, data, entrega, quantidade de items, Após fornecer esses dados o cliente poderá confirmar o serviço ou calcela-lo e retornar. Caso o serviço seja confirmado o mesmo ficará disponível para a transportadora seleciona-lo e começar a negociação. ![Novo Serviço](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.58.55.jpeg)

Caso seja uma transportadora a pagina de login altera, solicitando não mais o e-mail, mas sim o CNPJ. Caso a mesma não possua cadastro ela pode ser levada para a pagina de cadastros. ![Login Transportadora](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.55.34.jpeg)

Se a transportadora não possuir cadastro, será redirecionada ao clicar em Cadastrar-se na tela de login para tela de cadastro da transportadora, onde os dados solicitados serão diferentes dos dados solicitados aos clientes e também passaram por uma verificação para chegagem de sua pre-existência no sistema. Caso a conta seja cadastrada com sucesso a transportadora realizara login sem problemas a partir desse momento. ![Cadastro Transportadora](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2014.55.57.jpeg)

Como transportadora será possível o cadastro e gerenciamente de funcionários na empresa. Para isso a tela de "Meus funcionários" conta com um botão para a busca e uma lista para que todos os funcionários sejam mostrados e possiveis de encontrar. ![Funcionários](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2015.02.25.jpeg)

Após o cadastro do serviço a transportadora poderá vizualisar o serviço, os dados como endereços, data, nome do cliente e código do serviço. Caso esteja interassada a mesma poderá enviar uma proposta de orçamento para o serviço e caberá ao cliente aceita-la ou fazer uma contra-proposta. ![Visualizar Serviço](https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes/blob/470c7a521399100919c35b65d207b938ae32f4d5/docs/imagens/WhatsApp%20Image%202022-12-14%20at%2015.03.09.jpeg)
## 8. Conclusão

    É fato que todo o trabalho foi desafiador para cada componente do grupo, uma vez que cada um teve sua parcela de contibuição, seja em códigos ou modelagem de banco de dados, por exemplo. Diante desse contexto, torna-se importante ressaltar o resultado final obtido pelo grupo e a tamanha satisfação de todos em ter entregue um software estruturado e de muita boa serventia. 
    
    A MNM Transporte, nome dado ao sistema criado, serve como uma ligação entre pessoas que desejam efetuar uma mudança de endereço e transportadoras que prestam esses serviços de frete. Sendo uma plataforma bem didática, permite que o usuário, seja cliente ou empresa filiada, se cadastre e tenho acesso a todos os benefícios internos, como cotação de mudança, adição de móveis transportados, disponibilidade de negociação, etc.
    
    Por fim, é de suma necessidade adicionar que a disciplina de TIS II fez com que cada componente do grupo saísse do semestre com uma experiência bastante construtora para carreira de cada um, já que foram utilizadas diversas tecnologias e linguagens que, em muitas das vezes, certos aluno não tinham familiaridade. 
    
    Em nome do grupo, esclarecemos que estamos abertos á quaisquer sugestões e críticas construtivas para que possamos dar continuidade ao software que, em nossa visão, tem grande valor de mercado.

# REFERÊNCIAS

Como um projeto de software não requer revisão bibliográfica, a inclusão das referências não é obrigatória. No entanto, caso você deseje incluir referências relacionadas às tecnologias, padrões, ou metodologias que serão usadas no seu trabalho, relacione-as de acordo com a ABNT.

Verifique no link abaixo como devem ser as referências no padrão ABNT:

http://www.pucminas.br/imagedb/documento/DOC\_DSC\_NOME\_ARQUI20160217102425.pdf


**[1.1]** - _ELMASRI, Ramez; NAVATHE, Sham. **Sistemas de banco de dados**. 7. ed. São Paulo: Pearson, c2019. E-book. ISBN 9788543025001._

**[1.2]** - _COPPIN, Ben. **Inteligência artificial**. Rio de Janeiro, RJ: LTC, c2010. E-book. ISBN 978-85-216-2936-8._

**[1.3]** - _CORMEN, Thomas H. et al. **Algoritmos: teoria e prática**. Rio de Janeiro, RJ: Elsevier, Campus, c2012. xvi, 926 p. ISBN 9788535236996._

**[1.4]** - _SUTHERLAND, Jeffrey Victor. **Scrum: a arte de fazer o dobro do trabalho na metade do tempo**. 2. ed. rev. São Paulo, SP: Leya, 2016. 236, [4] p. ISBN 9788544104514._

**[1.5]** - _RUSSELL, Stuart J.; NORVIG, Peter. **Inteligência artificial**. Rio de Janeiro: Elsevier, c2013. xxi, 988 p. ISBN 9788535237016._



# APÊNDICES

**Colocar link:**

https://github.com/ICEI-PUC-Minas-PPLES-TI/plf-es-2022-2-ti2-0924100-mnm-transportes.git


Dos artefatos (armazenado do repositório);

Da apresentação final (armazenado no repositório);

Do vídeo de apresentação (armazenado no repositório).




