
<p>O Project Record, é um ficheiro com o nome pr.xml que está dentro do zip do 
    pacote SIP, ou então é criado automaticamente pelo formulário existente no WebSite.  
    Alguns dos campos são obtigatórios preencher, outros são facultativos.
</p>
<br/>
Tem cinco áreas de conteúdo:
<ul>
    <li>Header</li>
    <li>Supervisors</li>
    <li>WorkTeam</li>
    <li>Abstract</li>
    <li>Deliverables</li>
</ul>
<br/>
<p>O <b>Header</b> contêm a informação que identifica o projecto e contêm os campos:</p>
<ul>
    <li><b>KeyName</b> - algo que identifica o projecto, não precisa de ser único no sistema e é obrigatório.
    </li>
    <li><b>Title</b> - título do projecto, é obrigatório.
    </li>
    <li><b>Subtitle</b> - o subtítulo é opcional, fica ao critério do Produtor preencher ou não.
    </li>
    <li><b>Begin Date</b> - campo obrigatório e representa a data de inicio que o projecto que vai ser submetido começou a ser realizado.
    </li>
    <li><b>End Date</b> - campo obrigatório e corresponde à data que o projecto que vai ser submetido foi terminado.
    </li>
</ul>

<br/>
<p>
    Os supervisors são as pessoas que estão identificadas ou porque o projecto foi acompanhado por elas ou foi pedido por estas para o realizarem.
</p>
<p>Um supervisor contêm os campos:
</p>
<ul>
    <li><b>Name</b> - nome do supervisor, é obrigatório.</li>
    <li><b>Email</b> - é obrigatório e tem de ser único no sistema.</li>
    <li><b>URL</b> - geralmente corresponde à página pessoal do supervisor, é opcional.</li>
    <li><b>Affil</b> - identifica o departamento ao qual pertence, também é opcional.</li>
</ul>

<br/>
<p>A WorkTeam é onde estão identificadas as pessoas que realizaram o projecto, este é constituído por uma lista de  Authors que contêm:
</p>
<ul>
    <li><b>Name</b> - nome do autor, é obrigatório.</li>
    <li><b>ID</b> - corresponde geralmente ao número do aluno na instituição a que pertence, é obrigatório.</li>
    <li><b>Email</b> - é obrigatório e tem de ser único no sistema.</li>
    <li><b>Course</b> - curso ao qual o autor pertence, é obrigatório.</li>
</ul>

<br/>
<p>O Abstract é um campo composto por outros elementos, é utilizado para escrever um resumo sobre o projecto que vai ser guardado no repositório.
</p>
<p>Este elemento pode conter outros elementos como:
</p>
<ul>
    <li>Parágrafos</li>
    <li>Key Words</li>
    <li>Palavras a negrito</li>
    <li>Palavras a itálico</li>
    <li>Palavras sublinhadas</li>
    <li>URL
</ul>
<br/>
<p>A estrutura do Abstract pode ser vista com mais detalhe no XML Schema criado para o efeito.
As keywords são os únicos elementos que são tratados do abstract, são guardadas de forma a se conseguir relacionar projectos.
</p>
<p>Todos os ficheiros que sejam para acompanhar a submissão, são referênciados na área de Deliverables, esta pode ter até seis ficheiros e cada um tem de ter:
</p>
<ul>
    <li>Path, local onde está o ficheiro. É obrigatório.</li>
    <li>Description, pequena descrição do ficheiro, geralmente coloca-se o nome que se quer que ele tenha. É obrigatório.</li>
</ul>

