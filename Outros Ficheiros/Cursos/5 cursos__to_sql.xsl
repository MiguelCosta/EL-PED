<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xd="http://www.oxygenxml.com/ns/doc/xsl"
    exclude-result-prefixes="xs xd" version="2.0">
    <xd:doc scope="stylesheet">
        <xd:desc>
            <xd:p><xd:b>Created on:</xd:b> Jan 9, 2012</xd:p>
            <xd:p><xd:b>Author:</xd:b> miguel</xd:p>
            <xd:p/>
        </xd:desc>
    </xd:doc>

    <xsl:output method="text" encoding="ISO-8859-1"/>

    <xsl:template match="/">
        <xsl:apply-templates select="//curso"/>
    </xsl:template>

    <xsl:template match="curso">
        INSERT INTO Course VALUES ('<xsl:value-of select="id"/>', '<xsl:value-of select="nome"/>');
    </xsl:template>

</xsl:stylesheet>
