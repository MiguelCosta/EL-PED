<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    xmlns:xd="http://www.oxygenxml.com/ns/doc/xsl"
    exclude-result-prefixes="xs xd"
    version="1.0">
    <xd:doc scope="stylesheet">
        <xd:desc>
            <xd:p><xd:b>Created on:</xd:b> Jan 21, 2012</xd:p>
            <xd:p><xd:b>Author:</xd:b> miguel</xd:p>
            <xd:p></xd:p>
        </xd:desc>
    </xd:doc>
    
    <xsl:output method="html" encoding="ISO-8859-1"/>
    
    
    <xsl:template match="/">
        <table class="user">
            <th class="user">Projcode</th>
            <th class="user">keyname</th>
            <th class="user">Título</th>
            <th class="user">Data Submissão</th>
            <th class="user">Autores</th>
            <th class="user">Supervisores</th>
        <xsl:apply-templates/>
        </table>
    </xsl:template>
    
    <xsl:template match="pr">
        <tr class="user">
        <xsl:apply-templates/>
        </tr>
    </xsl:template>
    
    <xsl:template match="projcode">
        <td class="user">
            <xsl:value-of select="."/>
        </td>
    </xsl:template>
    
    <xsl:template match="keyname">
        <td class="user">
            <xsl:value-of select="."/>
        </td>
    </xsl:template>
    
    <xsl:template match="title">
        <td class="user">
            <xsl:value-of select="."/>
        </td>
    </xsl:template>
    
    <xsl:template match="subdate">
        <td class="user">
            <xsl:value-of select="."/>
        </td>
    </xsl:template>
    
    <xsl:template match="workteam">
        <td class="user">
            <ul>
                <xsl:apply-templates select="author"/>
            </ul>
        </td>
    </xsl:template>
    
    <xsl:template match="author">
        <li>
            <xsl:value-of select="."/>
        </li>
    </xsl:template>
    
    <xsl:template match="supervisors">
        <td class="user">
            <ul>
                <xsl:apply-templates select="supervisor"/>
            </ul>
        </td>
    </xsl:template>
    
    <xsl:template match="supervisor">
        <li>
            <xsl:value-of select="."/>
        </li>
    </xsl:template>
    
</xsl:stylesheet>