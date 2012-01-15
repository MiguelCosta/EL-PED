<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    version="2.0">
    
    <xsl:output method="xml" encoding="ISO-8859-1" indent="yes"/>
    
    <xsl:template match="logs">
        <xsl:apply-templates>
            <xsl:sort select="date" order="descending"></xsl:sort>
        </xsl:apply-templates>
    </xsl:template>
    
    <xsl:template match="log">
        <log>
            <username><xsl:value-of select="username" /></username>
            <name><xsl:value-of select="name" /></name>
            <date><xsl:value-of select="date" /></date>
            <action><xsl:value-of select="action" /></action>
            <description><xsl:value-of select="description" /></description>
        </log>
    </xsl:template>
    
</xsl:stylesheet>