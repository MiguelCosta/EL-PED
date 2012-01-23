
<p>O Project Record, � um ficheiro com o nome pr.xml que est� dentro do zip do 
    pacote SIP, ou ent�o � criado automaticamente pelo formul�rio existente no WebSite.  
    Alguns dos campos s�o obtigat�rios preencher, outros s�o facultativos.
</p>
<br/>
Tem cinco �reas de conte�do:
<ul>
    <li>Header</li>
    <li>Supervisors</li>
    <li>WorkTeam</li>
    <li>Abstract</li>
    <li>Deliverables</li>
</ul>
<br/>
<p>O <b>Header</b> cont�m a informa��o que identifica o projecto e cont�m os campos:</p>
<ul>
    <li><b>KeyName</b> - algo que identifica o projecto, n�o precisa de ser �nico no sistema e � obrigat�rio.
    </li>
    <li><b>Title</b> - t�tulo do projecto, � obrigat�rio.
    </li>
    <li><b>Subtitle</b> - o subt�tulo � opcional, fica ao crit�rio do Produtor preencher ou n�o.
    </li>
    <li><b>Begin Date</b> - campo obrigat�rio e representa a data de inicio que o projecto que vai ser submetido come�ou a ser realizado.
    </li>
    <li><b>End Date</b> - campo obrigat�rio e corresponde � data que o projecto que vai ser submetido foi terminado.
    </li>
</ul>

<br/>
<p>
    Os supervisors s�o as pessoas que est�o identificadas ou porque o projecto foi acompanhado por elas ou foi pedido por estas para o realizarem.
</p>
<p>Um supervisor cont�m os campos:
</p>
<ul>
    <li><b>Name</b> - nome do supervisor, � obrigat�rio.</li>
    <li><b>Email</b> - � obrigat�rio e tem de ser �nico no sistema.</li>
    <li><b>URL</b> - geralmente corresponde � p�gina pessoal do supervisor, � opcional.</li>
    <li><b>Affil</b> - identifica o departamento ao qual pertence, tamb�m � opcional.</li>
</ul>

<br/>
<p>A WorkTeam � onde est�o identificadas as pessoas que realizaram o projecto, este � constitu�do por uma lista de  Authors que cont�m:
</p>
<ul>
    <li><b>Name</b> - nome do autor, � obrigat�rio.</li>
    <li><b>ID</b> - corresponde geralmente ao n�mero do aluno na institui��o a que pertence, � obrigat�rio.</li>
    <li><b>Email</b> - � obrigat�rio e tem de ser �nico no sistema.</li>
    <li><b>Course</b> - curso ao qual o autor pertence, � obrigat�rio.</li>
</ul>

<br/>
<p>O Abstract � um campo composto por outros elementos, � utilizado para escrever um resumo sobre o projecto que vai ser guardado no reposit�rio.
</p>
<p>Este elemento pode conter outros elementos como:
</p>
<ul>
    <li>Par�grafos</li>
    <li>Key Words</li>
    <li>Palavras a negrito</li>
    <li>Palavras a it�lico</li>
    <li>Palavras sublinhadas</li>
    <li>URL
</ul>
<br/>
<p>A estrutura do Abstract pode ser vista com mais detalhe no XML Schema criado para o efeito.
As keywords s�o os �nicos elementos que s�o tratados do abstract, s�o guardadas de forma a se conseguir relacionar projectos.
</p>
<p>Todos os ficheiros que sejam para acompanhar a submiss�o, s�o refer�nciados na �rea de Deliverables, esta pode ter at� seis ficheiros e cada um tem de ter:
</p>
<ul>
    <li>Path, local onde est� o ficheiro. � obrigat�rio.</li>
    <li>Description, pequena descri��o do ficheiro, geralmente coloca-se o nome que se quer que ele tenha. � obrigat�rio.</li>
</ul>

