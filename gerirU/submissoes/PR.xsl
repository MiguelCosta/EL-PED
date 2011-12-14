<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    version="2.0">
    
    <xsl:output method="xhtml" encoding="ISO-8859-1"/>
    
    <xsl:template match="/">
        <html>
            <head>
                <title>Project Record</title>
            </head>
            <body>
                <h2 align="center">Project Record</h2>
                <table width="100%" align="center" border="0">
                    <xsl:apply-templates/>
                </table>
            </body>
            <xsl:value-of select="current-date()"/>
        </html>
    </xsl:template>
    
    <xsl:template match="meta">
        <tr>
            <hr/>
            <td width="50%">
                <b>KEY NAME: </b><xsl:value-of select="keyname"/><br/>
            </td>
            <td width="50%">
                <b>BEGIN DATE: </b><xsl:value-of select="bdate"/><br/>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <b>TITLE: </b><xsl:value-of select="title"/><br/>
            </td>
            <td width="50%">
                <b>END DATE: </b><xsl:value-of select="edate"/><br/>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <xsl:if test="subtitle">
                    <b>SUBTITLE: </b><xsl:value-of select="subtitle"/>
                </xsl:if>
            </td>
            <td width="50%">                
                <xsl:apply-templates select="supervisors"/>
            </td>
        </tr>
    </xsl:template>
    
    <xsl:template match="supervisors">
            <b>SUPERVISOR:</b>
            <ul>
                <xsl:apply-templates/>
            </ul>
    </xsl:template>
    
    <xsl:template match="supervisor">
        <li>
            <xsl:value-of select="name"/> - <a href="mailto:{email}"><xsl:value-of select="email"/></a>
            <xsl:if test="url"> - <a href="{url}"><xsl:value-of select="url"/></a></xsl:if>
            <xsl:if test="affil"> - <xsl:value-of select="affil"/></xsl:if>
        </li>
    </xsl:template>
    
    <xsl:template match="workteam">
        <tr>
            <td colspan="2">
                <hr/><hr/>
                <h3>WorkTeam:</h3>
                <ol>
                    <xsl:apply-templates/>
                </ol>
            </td>
        </tr>
    </xsl:template>
    
    <xsl:template match="author">
        <li>
            <xsl:value-of select="name"/> - <xsl:value-of select="id"/> - <a href="mailto:{email}"><xsl:value-of select="email"/></a>
            <xsl:if test="url"> - <a href="{url}"><xsl:value-of select="url"/></a></xsl:if>
        </li>
    </xsl:template>
    
    <xsl:template match="abstract">
        <tr>
            <td colspan="2">
                <hr/><hr/>
                <h3>ABSTRACT:</h3>
                <xsl:apply-templates/>
            </td>
        </tr>
    </xsl:template>
    
    <xsl:template match="para">
        <p><xsl:apply-templates/></p>
    </xsl:template>
    
    <xsl:template match="b">
        <b><xsl:apply-templates/></b>
    </xsl:template>
    
    <xsl:template match="i">
        <i><xsl:apply-templates/></i>
    </xsl:template>
    
    <xsl:template match="u">
        <u><xsl:apply-templates/></u>
    </xsl:template>
    
    <xsl:template match="kw">
        <font color="red"><xsl:apply-templates/></font>
    </xsl:template>
    
    <xsl:template match="xref">
        <a href="{attribute::url}"><xsl:value-of select="."/></a>
    </xsl:template>
    
    <xsl:template match="deliverables">
        <tr>
            <td colspan="2">
                <hr/><hr/>
                <h3>Deliverables:</h3>
                <ul>
                    <xsl:apply-templates/>
                </ul>
                <hr/>
            </td>
        </tr>
    </xsl:template>
    
    <xsl:template match="deliverable">
        <li><a href="{path}"><xsl:value-of select="description"/></a></li>
    </xsl:template>
</xsl:stylesheet>