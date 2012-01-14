<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xd="http://www.oxygenxml.com/ns/doc/xsl"
    exclude-result-prefixes="xs xd" version="2.0">
    <xd:doc scope="stylesheet">
        <xd:desc>
            <xd:p><xd:b>Created on:</xd:b> Jan 14, 2012</xd:p>
            <xd:p><xd:b>Author:</xd:b> Miguel Costa</xd:p>
            <xd:p/>
        </xd:desc>
    </xd:doc>

    <xsl:output method="xhtml" encoding="ISO-8859-1"/>

    <xsl:template match="/">
        <div id="form_submeter">
            <form name="projetc_record" enctype="multipart/form-data" autocomplete="on">
                <xsl:apply-templates select="//meta"/>
                <xsl:apply-templates select="//workteam"/>
                <xsl:apply-templates select="//abstract"/>
            </form>
        </div>
    </xsl:template>

    <xsl:template match="meta">
        <h3>Header</h3>
        <div id="form_input_left">
            <xsl:apply-templates select="./keyname"/>
            <xsl:apply-templates select="./title"/>
            <xsl:apply-templates select="./subtitle"/>
        </div>

        <div id="form_input_right">
            <xsl:apply-templates select="./bdate"/>
            <xsl:apply-templates select="./edate"/>
        </div>

        <div class="clr"/>

        <div id="form_submeter_supervisor">
            <h3>Supervisors</h3>
            <div class="clr"/>
            <xsl:apply-templates select="./supervisors"/>
        </div>
    </xsl:template>

    <xsl:template match="keyname">
        <label class="required">Key Name: </label>
        <input id="key_name" name="key_name" type="text" required="" readonly="" value="{.}"/>
        <div class="clr"/>
    </xsl:template>

    <xsl:template match="title">
        <label class="required">Title: </label>
        <input id="title" name="title" type="text" required="" readonly="" value="{.}"/>
        <div class="clr"/>
    </xsl:template>

    <xsl:template match="subtitle">
        <label>Subtitle: </label>
        <input name="subtitle" type="text" value="{.}"/>
    </xsl:template>

    <xsl:template match="bdate">
        <label class="required">Begin Date: </label>
        <input id="begin_date" name="begin_date" type="date" required="" readonly="" value="{.}"/>
        <div class="clr"/>
    </xsl:template>

    <xsl:template match="edate">
        <label class="required">End Date: </label>
        <input id="end_date" name="end_date" type="date" required="" readonly="" value="{.}"/>
    </xsl:template>

    <xsl:template match="supervisors">
 
            <table class="user">
                <tr>
                    <th class="user">Name</th>
                    <th class="user">Email</th>
                    <th class="user">URL</th>
                    <th class="user">Affil</th>
                </tr>
                <xsl:apply-templates select="supervisor"/>
            </table>
    </xsl:template>

    <xsl:template match="supervisor">
        <tr class="user">
            <td class="user">
                <xsl:value-of select="./name"/>
            </td>
            <td class="user">
                <xsl:value-of select="./email"/>
            </td>
            <td class="user">
                <xsl:value-of select="./url"/>
            </td>
            <td class="user">
                <xsl:value-of select="./affil"/>
            </td>
        </tr>
    </xsl:template>

    <xsl:template match="workteam">
        <div id="form_submeter_workteam">
            <h3>WorkTeam</h3>
                <table class="user">
                    <tr>
                        <th class="user">Name</th>
                        <th class="user">ID</th>
                        <th class="user">EMAIL</th>
                        <th class="user">URL</th>
                    </tr>
                    <xsl:apply-templates select="author"/>
                </table>
        </div>
    </xsl:template>
    
    <xsl:template match="author">
        <tr class="user">
            <td class="user">
                <xsl:value-of select="./name"/>
            </td>
            <td class="user">
                <xsl:value-of select="./id"/>
            </td>
            <td class="user">
                <xsl:value-of select="./email"/>
            </td>
            <td class="user">
                <xsl:value-of select="./url"/>
            </td>
        </tr>
    </xsl:template>
    
    <xsl:template match="abstract">
        
    </xsl:template>
    

</xsl:stylesheet>
